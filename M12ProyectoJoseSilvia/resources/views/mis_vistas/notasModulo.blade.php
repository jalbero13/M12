<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms)}} PROF
            </h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
                  <li class="breadcrumb-item"><a href="/modul/{{$modulo->cicle_id}}">Mòduls</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Llistat de qualificacions</li>
                </ol>
            </nav>
        </x-slot>
        <h1>{{$modulo->nom.'. '. $modulo->descripcio}}</h1>
        <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th class="tabla-fila"></th>
                <th scope="col" colspan="{{count($modulo->ufs)*2}}" style="text-align: center">Qualificació de les unitats formatives del mòdul profesional</th>
                <th scope="col" colspan="4" rowspan="2" style="text-align: center; margin:auto">Qualificació final del mòdul</th>
              </tr>
              <tr class="tabla-amarillo">
                <td ></td>
                @foreach($modulo->ufs as $uf)
                  <td scope="col" colspan="2" style="text-align: center">{{$uf->nom}}</td>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr class="tabla-amarillo">
                <td style="text-align: center">Alumnat</td>
                @foreach($modulo->ufs as $uf)
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                @endforeach
                <td style="text-align: center">Hores Totals</td>
                <td style="text-align: center">Qualif. Final</td>
              </tr>
              <form action="{{route('updateNotesUf')}}" method="POST">
                @csrf
                @method('PUT')
                @foreach($modulo->alumnes as $alumno )
                  @php
                      $notafinal = 0;
                      $nota0=1;
                  @endphp
                  <input name="id" value="{{$modulo->id}}" hidden>
                  <tr class="tabla-fila">
                    <td style="text-align: center">{{$alumno->nom . ' '. $alumno->cognoms}}</td>
                    @foreach($alumno->ufs as $uf)
                      @if($uf->modul_id == $modulo->id)
                      <td style="text-align: center">{{$uf->hores}}</td>
                      <td style="text-align: center">
                        <select name="nota_{{$alumno->id}}_{{$uf->id}}">
                          <option value="0"@if($uf->pivot->nota == 0) selected @endif>N.P.</option>
                          @for($i=1;$i<=10;$i++)
                            <option value="{{$i}}"@if($uf->pivot->nota == $i) selected @endif>{{$i}}</option>
                          @endfor
                        </select>
                      </td>
                      @php
                      if($uf->pivot->nota >4){
                        $notafinal = $notafinal + ($uf->pivot->nota * $uf->hores) ;
                      }else{
                        $nota0 = 0;
                      }
                      @endphp
                      @endif
                    @endforeach
                    <td style="text-align: center">{{$modulo->hores}}</td>
                    <td style="text-align: center"><input class="form-control" name="nota_media" value="@if($nota0!=0){{$notafinal / $modulo->hores}}@else{{$nota0}}@endif" disabled></td>
                  </tr>
                @endforeach
                <tr>
                  <td><button type="submit" class="btn btn-ins">Modificar notes</button></td>
                </tr>
              </form>
            </tbody>
          </table>
    </x-app-layout>
</div>
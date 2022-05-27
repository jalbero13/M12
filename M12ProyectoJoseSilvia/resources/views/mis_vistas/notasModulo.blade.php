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
                <th scope="col" rowspan="3" style="text-align: center; margin:auto" >Accions</th>
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
                <td colspan="2" style="text-align: center">Hores Totals</td>
                <td colspan="2" style="text-align: center">Qualif. Final</td>
                <td ></td>
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
                    @php
                    $notafinal = $notafinal / $modulo->hores;
                    $notafinal = round($notafinal, 0);
                    @endphp
                    <td colspan="2" style="text-align: center">{{$modulo->hores}}</td>
                    <td colspan="2" style="text-align: center"><input class="form-control"  name="nota_media"  value="@if($nota0!=0){{$notafinal}}@else{{$nota0}}@endif" disabled></td>
                    <td><a href="/comentario/{{$alumno->id}}/{{$modulo->id}}" type="button" class="btn btn-outline-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                      </svg>
                      <span class="visually-hidden">Comentar</span>
                    </a></td>
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
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
        <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th class="tabla-fila"></th>
                <th scope="col" colspan="8" style="text-align: center">Qualificació de les unitats formatives del mòdul profesional</th>
                <th scope="col" colspan="4" rowspan="2" style="text-align: center; margin:auto">Qualificació final del mòdul</th>
              </tr>
              <tr>
                <td class="tabla-fila"></td>
                @foreach($ufs as $uf)
                  <td scope="col" colspan="2" style="text-align: center">{{$uf->nom}}</td>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr class="tabla-amarillo">
                <td style="text-align: center">Alumnat</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
              </tr>
              @foreach($ufs->alumnes as $alumno )
              <tr class="tabla-fila">
                <td style="text-align: center">{{$alumno->nom . ' '. $alumno->cognoms}}</td>
                @foreach($ufs as $uf)
                <td style="text-align: center">{{$uf->hores}}30</td>
                <td style="text-align: center">
                  <select name="">
                    @for($i=1;$i<10;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </td>
                @endforeach
              </tr>
              @endforeach
                <td style="text-align: center">165</td>
                <td style="text-align: center">7</td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
</div>
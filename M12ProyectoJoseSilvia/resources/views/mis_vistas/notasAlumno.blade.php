<div class="container">
    <x-app-layout>
        <x-slot name="header">
        <h3>Llistat de qualificacions</h3>
        <h3>Desenvolupament d'aplicacions web II</h3>
        <h3>{{$alumno->nom.' '.$alumno->cognoms}}</h3>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
          <li class="breadcrumb-item"><a href="/alumnes">Alumnes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Llistat de notes</li>
        </ol>
    </nav>
        </x-slot>
    <table class="table tabla">
        <thead class="tabla-amarillo">
            <tr>
                <th scope="col">Mòdul</th>
                <th scope="col">Hores</th>
                <th scope="col">Qualificació</th>
                <th scope="col">%Aprovat per UF</th>
            </tr>
            @foreach($alumno->moduls as $modulo)
            <tr class="tabla-amarillo">      
                <td>{{$modulo->nom. '. '. $modulo->descripcio }}</td>
                <td>{{$modulo->hores}}</td>
                <td>{{$modulo->pivot->nota_media}}</td>
                <td>100%</td> 
            </tr>
                @foreach($alumno->ufs as $uf)
                @if($uf->modul_id == $modulo->id)
            <tr class="tabla-amarillo2">
                <td>{{$uf->nom. '. '. $uf->descripcio}}</td>
                <td>{{$uf->hores}}</td>
                <td>{{$uf->pivot->nota}}</td>
                <td></td>
            </tr>
                @endif
                @endforeach
            @endforeach
        </thead>
    </table>
    </x-app-layout>
</div>

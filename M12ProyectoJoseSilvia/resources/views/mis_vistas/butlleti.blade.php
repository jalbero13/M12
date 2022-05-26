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
        <thead >
            <tr>
                <th scope="col"><b>Mòdul</b></th>
                <th scope="col"><b>Hores</b></th>
                <th scope="col"><b>Qualificació</b></th>
                <th scope="col"><b>%Aprovat per UF</b></th>
            </tr>
            @foreach($alumno->moduls as $modulo)
            <tr class="tabla-amarillo">      
                <td><b>{{$modulo->nom. '. '. $modulo->descripcio }}</b></td>
                <td><b>{{$modulo->hores}}</b></td>
                <td><b>{{$modulo->pivot->nota_media}}</b></td>
                <td><b>100%</b></td> 
            </tr>
                @foreach($alumno->ufs as $uf)
                @if($uf->modul_id == $modulo->id)
            <tr>
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
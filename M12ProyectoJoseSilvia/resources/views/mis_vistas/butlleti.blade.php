<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$alumno->nom.' '.$alumno->cognoms}}</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">Mòdul</th>
                <th scope="col">Hores</th>
                <th scope="col">Qualificació</th>
                <th scope="col">%Aprovat per UF</th>
            </tr>
            @foreach($alumno->moduls as $modulo)
            <tr>      
                <td><b>{{$modulo->nom. '. '. $modulo->descripcio }}</b></td>
                <td><b>{{$modulo->hores}}</b></td>
                <td><b>{{$modulo->pivot->nota_media}}</b></td>
                <td>100%</td> 
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
</body>
</html>
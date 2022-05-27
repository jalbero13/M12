<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
</head>
<body>
    <p><b>Informe de qualificacions del curs escolar 2021 - 2022</b></p>
    <hr width="550">
    <p><b>Dades del centre</b></p>
    <hr width="550">
    <p>Nom &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Codi &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Municipi</p>
    <p>Institut camí de mar &nbsp; 43007257 &nbsp; Calafell</p>
    <p><b>Dades de l'alumne</b></p>
    <hr width="550">
    <p>Alumne &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; DNI</p>
    <p>{{$alumno->nom.' '.$alumno->cognoms}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$alumno->dni}}</p>
    <p><b>Qualificacions</b></p>
    <hr width="550">
    <p>Mòdul &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hores &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Qualificació &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; %Aprovat per UF</p>
    @php $texto = ''; @endphp 
    @foreach($alumno->moduls as $modulo)       
        <p><b>{{$modulo->nom. '. '. $modulo->descripcio }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$modulo->hores}} &nbsp; &nbsp; &nbsp; &nbsp; {{$modulo->pivot->nota_media}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;100%</b></p>           
        @foreach($alumno->ufs as $uf)
        @if($uf->modul_id == $modulo->id)
        <p>{{$uf->nom. '. '. $uf->descripcio}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$uf->hores}} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{$uf->pivot->nota}}</p>
        @endif
        @endforeach
    @endforeach
    <p><b>Comentaris</b></p>
    <hr width="550">
    @foreach($alumno->moduls as $modulo)
    <p>{{$modulo->nom}}  {{$modulo->pivot->comentario}} <br></p>
    @endforeach
</body>
</html>
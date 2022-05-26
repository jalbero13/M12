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
        <div class="container">
            <form action="{{route('editComentari')}}" method="POST">
            @csrf
            @method('PUT')
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Comentari</label>
                        <input name="idModulo" value="{{$modulo->id}}" hidden>
                        <input name="idAlumno" value="{{$alumno->id}}" hidden>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        @foreach($modulo->alumnes as $alumne)
                            @if($alumno->id === $alumne->id)
                                <textarea class="form-control" name="comentario" rows="10" cols="50">{{$alumne->pivot->comentario}}</textarea>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-ins">Desar el comentari</button>
                    </div>
                </div>
            </form>
        </div>
    </x-app-layout>
</div>
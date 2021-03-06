<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognom) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" style="width: 500rem" >
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" aria-current="page" href="/dashboard">Alumne</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/cicle">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista-activo active" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateUf')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom de la unitat formativa</label>
                        <input type="text" class="form-control" name="nombreUF" value="{{$Uf->nom}}" required>
                        <input type="number" class="form-control" name="idUf" value="{{$Uf->id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Número d'hores de la unitat formativa</label>
                        <input type="number" class="form-control" name="horasUF" value="{{$Uf->hores}}" required>
                    </div>
                </div>
                
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Descripció de la unitat formativa</label>
                        <input type="text" class="form-control" name="descripcionUF" value="{{$Uf->descripcio}}" required>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Id del mòdul</label><br>
                        <select class="form-control" name="idModulo">
                            @foreach($arrayModulos as $key => $modulo)
                            @if($modulo->id == $Uf->modul_id)
                            <option value="{{$Uf->modul_id}}"selected>{{$modulo->nom . " " . $modulo->descripcio}}</option>
                            @else
                                <option value="{{$modulo->id}}">{{$modulo->nom . " " . $modulo->descripcio}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Modificar unitat formativa</button>
            </div>
          </form>
    </x-app-layout>
    </div>
<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs">
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
                <a class="nav-link  lista-activo active" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateModul')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom del mòdul</label>
                        <input type="text" class="form-control" name="nombreModulo" value="{{$Modul->nom}}" required>
                        <input type="number" class="form-control" name="idModulo" value="{{$Modul->id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Descripció del mòdul</label>
                        <input type="text" class="form-control" name="descripcionModulo" value="{{$Modul->descripcio}}" required>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Número d'hores del mòdul</label>
                            <input type="number" class="form-control" name="horasModulo" value="{{$Modul->hores}}" required>
                          </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Id del cicle</label><br>
                            <select class="form-control" name="idCiclo">
                                @foreach ($arrayCiclos as $key => $ciclo)
                                @if($ciclo->id == $Modul->cicle_id)
                                    <option value="{{$Modul->cicle_id}}" selected>{{$ciclo->nom}}</option>
                                @else
                                    <option value="{{$ciclo->id}}">{{$ciclo->nom}}</option>
                                @endif                                    
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <input hidden>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Modificar mòdul</button>
            </div>
          </form>
    </x-app-layout>
    </div>
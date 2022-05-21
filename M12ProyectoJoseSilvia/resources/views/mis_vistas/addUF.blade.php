<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs">
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" aria-current="page" href="/dashboard" >Alumne</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/profesor" >Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/cicle" >Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista" href="/modul" >Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista-activo active" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('storeUF')}}" method="POST">
            @csrf
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom de la unitat formativa</label>
                        <input type="text" class="form-control" name="nombreUF" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Número d'hores de la unitat formativa</label>
                        <input type="number" class="form-control" name="horasUF" required>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Descripció de la unitat formativa</label>
                        <input type="text" class="form-control" name="descripcionUF" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Id del mòdul</label>
                        <select class="form-control" name="idModulo">
                            @foreach($arrayModulos as $key => $modulo)
                                <option value="{{$modulo->id}}">{{$modulo->nom . " " .$modulo->descripcio}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Afegir unitat formativa</button>
            </div>
          </form>
    </x-app-layout>
    </div>
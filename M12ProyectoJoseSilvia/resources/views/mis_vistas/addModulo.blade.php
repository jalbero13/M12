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
                <a class="nav-link lista-activo active" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF" >Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('storeModulo')}}" method="POST">
            @csrf
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom del mòdul</label>
                        <input type="text" class="form-control" name="nombreModulo" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Descripció del mòdul</label>
                        <input type="text" class="form-control" name="descripcionModulo" required>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Número d'hores del mòdul</label>
                            <input type="number" class="form-control" name="horasModulo" required>
                          </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Id del cicle</label>
                            <select class="form-control" name="idCiclo">
                                @foreach($arrayCiclos as $key => $ciclo)
                                    <option value="{{$ciclo->id}}">{{$ciclo->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Afegir mòdul</button>
            </div>
          </form>
    </x-app-layout>
    </div>
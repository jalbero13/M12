<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" style="width: 500rem" >
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" aria-current="page" href="/dashboard" style="background-color: lightyellow; color: #498f9d">Alumne</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" href="/profesor" style="background-color: lightyellow; color: #498f9d">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" href="/cicle" style="background-color: lightyellow; color: #498f9d">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link active" href="/modul" style="background-color: #498f9d; color:lightyellow">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link" href="/UF" style="background-color: lightyellow; color: #498f9d">Unitat Formativa</a>
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
                            <select name="idCiclo">
                                @foreach($arrayCiclos as $key => $ciclo)
                                <option value="{{$ciclo->id}}">{{$ciclo->nom}}</option>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--<input type="hidden" name="modificado_por" value="jmolina">-->
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Afegir mòdul</button>
            </div>
          </form>
    </x-app-layout>
    </div>
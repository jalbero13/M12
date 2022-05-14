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
              <a class="nav-link active" href="/profesor" style="background-color: #498f9d; color:lightyellow">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" href="/cicle" style="background-color: lightyellow; color: #498f9d">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link" href="/modul" style="background-color: lightyellow; color: #498f9d">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link" href="/UF" style="background-color: lightyellow; color: #498f9d">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('storeModulUser')}}" method="POST">
            @csrf
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Professor</label>
                        <input name="nombreProfe" value="{{$profesor->nom . ' ' . $profesor->cognoms}}" disabled>
                        <input name="idProfe" value="{{$id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Inscriure al mòdul</label>
                        <select name="idModulo">
                            @foreach($arrayModuls as $modul)
                                <option value="{{$modul->id}}">{{$modul->nom . ' ' . $modul->descripcio}}</option>
                            @endforeach
                        </select>
                      </div>
                </div>
                
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Inscriure professor</button>
            </div>
          </form>

    </x-app-layout>
    </div>
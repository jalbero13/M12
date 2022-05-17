<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognom) }}
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
                <a class="nav-link" href="/modul" style="background-color: lightyellow; color: #498f9d">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link active" href="/UF" style="background-color: #498f9d; color:lightyellow">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateUF')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom de la unitat formativa</label>
                        <input type="text" class="form-control" name="nombreUF" value="{{$Uf->nom}}">
                        <input type="number" class="form-control" name="idUf" value="{{$Uf->id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Número d'hores de la unitat formativa</label>
                        <input type="number" class="form-control" name="horasUF" value="{{$Uf->hores}}">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Descripció de la unitat formativa</label>
                        <input type="text" class="form-control" name="descripcionUF" value="{{$Uf->descripcio}}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Id del mòdul</label>
                        <input type="number" class="form-control" name="idModulo" value="{{$Uf->modul_id}}">
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Afegir unitat formativa</button>
            </div>
          </form>
    </x-app-layout>
    </div>
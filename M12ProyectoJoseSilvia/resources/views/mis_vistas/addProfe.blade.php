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
              <a class="nav-link lista-activo active" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/cicle" >Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista" href="/modul" >Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF" >Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('storeProfe')}}" method="POST">
            @csrf
            @if($error!='')     
            <div class="alert alert-danger alertdismissible">
                <h3>{{$error}}</h3>
            </div>
            @endif
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom professor</label>
                        <input type="text" class="form-control" name="nombreProfe" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Cognoms professor</label>
                        <input type="text" class="form-control" name="apellidosProfe" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select class="form-control" name="idRol">
                    <option value="1">Administrador</option>
                    <option value="2">Professor</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Correu professor</label>
                <input id="correoProfe" type="email" class="form-control" name="correoProfe" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Contrasenya</label>
              <input type="password" class="form-control" name="contra" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins" >Afegir professor</button>
            </div>
          </form>

    </x-app-layout>
    </div>
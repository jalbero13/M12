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
              <a class="nav-link lista-activo active" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/cicle">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateProfe')}}" method="POST">
            @csrf
            @method('PUT')
            @if($error!='')     
            <div class="alert alert-danger alertdismissible">
                <h3>{{$error}}</h3>
            </div>
            @endif
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom professor</label>
                        <input type="text" class="form-control" name="nombreProfe" value="{{$Profe->nom}}" required>
                        <input type="number" class="form-control" name="idProfe" value="{{$Profe->id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Cognoms professor</label>
                        <input type="text" class="form-control" name="apellidosProfe" value="{{$Profe->cognoms}}" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Correu professor</label>
                <input id="correoProfe" type="email" class="form-control" name="correoProfe" value="{{$Profe->email}}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="idRol">
                    <option value="1" @if($Profe->role_id == 1) selected @endif>Administrador</option>
                    <option value="2" @if($Profe->role_id == 2) selected @endif>Professor</option>
                </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Contrasenya</label>
              <input type="password" class="form-control" name="contra" value="{{$Profe->password}}" disabled>
            </div>
            <input type="hidden" name="role_id" value="2">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Modificar professor</button>
            </div>
          </form>

    </x-app-layout>
    </div>
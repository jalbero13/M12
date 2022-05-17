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
          <form action="{{route('updateProfe')}}" method="POST">
            @csrf
            @method('PUT')
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
              <label class="form-label">Contrasenya</label>
              <input type="password" class="form-control" name="contra" value="{{$Profe->password}}" disabled>
            </div>
            <input type="hidden" name="role_id" value="2">
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Modificar professor</button>
            </div>
          </form>

    </x-app-layout>
    </div>
<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" style="width: 500rem" >
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link active" aria-current="page" href="/dashboard" style="background-color: #498f9d; color:lightyellow">Alumne</a>
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
                <a class="nav-link" href="/UF" style="background-color: lightyellow; color: #498f9d">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateAlumno')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom alumne</label>
                        <input type="text" class="form-control" name="nombreAlumno" value="{{$Alumno->nom}}" required>
                        <input type="number" class="form-control" name="idAlumno" value="{{$Alumno->id}}" hidden>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Cognoms alumne</label>
                        <input type="text" class="form-control" name="apellidosAlumno" value="{{$Alumno->cognoms}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Telèfon alumne</label>
                        <input id="telefonoAlumno" type="text" class="form-control" name="telefonoAlumno" maxlength="9" value="{{$Alumno->telefon}}" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">DNI alumne</label>
                        <input id="dniAlumno" type="text" class="form-control" name="dniAlumno" maxlength="9" value="{{$Alumno->dni}}" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Direcció alumne</label>
                <input type="text" class="form-control" name="direccionAlumno" value="{{$Alumno->direccio}}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correu alumne</label>
                <input type="email" class="form-control" name="correoAlumno" value="{{$Alumno->mail}}" required>
            </div>
            <div class="mb-3">
              <label  class="form-label">Data de naixement alumne</label>
              <input type="date" class="form-control" name="fecha_nacimientoAlumno" value="{{$Alumno->data_naixement}}" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Modificar alumne</button>
            </div>
          </form>
    </x-app-layout>
    </div>
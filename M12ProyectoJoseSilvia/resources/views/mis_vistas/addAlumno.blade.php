<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs">
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista-activo active" aria-current="page" href="/dashboard">Alumne</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/profesor">Professor</a>
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
          <form action="{{route('storeAlumno')}}" method="POST">
            @csrf
            @if($error!='')     
            <div class="alert alert-danger alertdismissible">
                <h3>{{$error}}</h3>
            </div>
            @endif
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Nom alumne</label>
                        <input type="text" class="form-control" name="nombreAlumno" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Cognoms alumne</label>
                        <input type="text" class="form-control" name="apellidosAlumno" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Telèfon alumne</label>
                        <input id="telefonoAlumno" type="text" class="form-control" name="telefonoAlumno" maxlength="9" required>
                      </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">DNI alumne</label>
                        <input id="dniAlumno" type="text" class="form-control" name="dniAlumno" maxlength="9" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Direcció alumne</label>
                <input type="text" class="form-control" name="direccionAlumno" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correu alumne</label>
                <input type="email" class="form-control" name="correoAlumno" required>
            </div>
            <div class="mb-3">
              <label  class="form-label">Data de naixement alumne</label>
              <input type="date" class="form-control" name="fecha_nacimientoAlumno" required>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Inscriure al cicle</label>
                    <select class="form-control" name="idCiclo">
                        @foreach($arrayCicles as $key => $cicle)
                            <option value="{{$cicle->id}}">{{$cicle->nom}}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Afegir alumne</button>
            </div>
          </form>
    </x-app-layout>
    </div>
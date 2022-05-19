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
              <a class="nav-link lista" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista-activo active" href="/cicle">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form action="{{route('updateCicle')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Nom del cicle</label>
              <input type="text" class="form-control" name="nombreCiclo" value="{{$Ciclo->nom}}" required>
              <input type="number" class="form-control" name="idCiclo" value="{{$Ciclo->id}}" hidden>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-ins">Modificar cicle</button>
            </div>
          </form>
    </x-app-layout>
    </div>
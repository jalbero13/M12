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
              <a class="nav-link active" href="/cicle" style="background-color: #498f9d; color:lightyellow">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link" href="/modul" style="background-color: lightyellow; color: #498f9d">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link" href="/UF" style="background-color: lightyellow; color: #498f9d">Unitat Formativa</a>
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
                <button type="submit" class="btn" style="background-color: #498f9d">Modificar cicle</button>
            </div>
          </form>
    </x-app-layout>
    </div>
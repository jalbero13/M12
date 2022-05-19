<div class="container">
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs">
        <li class="nav-item" style="font-size: 1.2rem">
          <a class="nav-link lista-activo active" aria-current="page" href="/dashboard" >Alumne</a>
        </li>
        <li class="nav-item" style="font-size: 1.2rem">
          <a class="nav-link lista" href="/profesor" >Professor</a>
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

      <table class="table tabla">
        <thead class="tabla-amarillo">
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Cognoms</th>
            <th scope="col">Direcció</th>
            <th scope="col">Data de naixement</th>
            <th scope="col">DNI</th>
            <th scope="col">Telèfon</th>
            <th scope="col">Correu</th>
            <th scope="col">Accions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($arrayAlumnes as $key => $alumno)
          <tr class="tabla-fila">
            <td>{{$alumno->nom}}</td>
            <td>{{$alumno->cognoms}}</td>
            <td>{{$alumno->direccio}}</td>
            <td>{{$alumno->data_naixement}}</td>
            <td>{{$alumno->dni}}</td>
            <td>{{$alumno->telefon}}</td>
            <td>{{$alumno->mail}}</td>
            <td><a type="button" class="btn btn-dark" href="/editAlumne/{{$alumno->id}}">Editar</a> |
              <form method="POST" action="{{route('eliminarAlumno', $alumno->id)}}" >
                @method('DELETE')
                @csrf
                    <button type="submit" class="btn btn-dark">Esborrar alumne</button>
              </form> | 
            <a type="button" class="btn btn-dark" href="/inscriureAlumne/{{$alumno->id}}">Inscriure en el cicle</a>
            </td>
          </tr>
        @endforeach
          <tr class="tabla-amarillo">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a class="btn btn-ins" href="addAlumne">Afegir un alumne</a></td>
          </tr>
        </tbody>
      </table>
</x-app-layout>
</div>
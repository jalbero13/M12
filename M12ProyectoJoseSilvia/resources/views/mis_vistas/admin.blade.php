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

      <table class="table" style="color:#1a374d">
        <thead style="background-color: #f7ce51">
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
          <tr style="background-color: white">
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
          <tr style="background-color: #f7ce51">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="addAlumne">Afegir un alumne</a></td>
          </tr>
        </tbody>
      </table>
</x-app-layout>
</div>
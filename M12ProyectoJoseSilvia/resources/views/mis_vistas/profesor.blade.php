<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" style="width: 500rem" >
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
    
          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Cognoms</th>
                <th scope="col">Correu</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($arrayUsers as $key => $profe)
              <tr class="tabla-fila">
                <td>{{$profe->nom}}</td>
                <td>{{$profe->cognoms}}</td>
                <td>{{$profe->email}}</td>
                <td>
                  <a type="button" class="btn btn-ins" href="/editProfe/{{$profe->id}}">Editar</a> 
                @if($profe->id !=1) 
                | <form method="POST" action="{{route('eliminarProfesor', $profe->id)}}" >
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-ins">Esborrar professor</button>
                  </form> @endif | 
                  <a type="button" class="btn btn-ins" href="/inscriureProfessor/{{$profe->id}}">Inscriure a modul</a> | 
                  <a type="button" class="btn btn-ins" href="/inscriureProfessorCicle/{{$profe->id}}">Inscriure a cicle</a>
                </td>
              </tr>
              @endforeach
              <tr class="tabla-amarillo">
                <td></td>
                <td></td>
                <td></td>
                <td><a type="button" class="btn btn-ins" href="/addProfe">Afegir un professor</a></td>
              </tr>
            </tbody> 
          </table>
    </x-app-layout>
    </div>
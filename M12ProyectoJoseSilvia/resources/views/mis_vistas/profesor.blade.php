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
    
          <table class="table" style="color:#1a374d">
            <thead style="background-color: #f7ce51">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Cognoms</th>
                <th scope="col">Correu</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($arrayUsers as $key => $profe)
              <tr style="background-color: white">
                <td>{{$profe->nom}}</td>
                <td>{{$profe->cognoms}}</td>
                <td>{{$profe->email}}</td>
                <td>
                  <a type="button" class="btn btn-dark" href="/editProfe/{{$profe->id}}">Editar</a> 
                @if($profe->id !=1) 
                | <form method="POST" action="{{route('eliminarProfesor', $profe->id)}}" >
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-dark">Esborrar professor</button>
                  </form> @endif | 
                  <a type="button" class="btn btn-dark" href="/inscriureProfessor/{{$profe->id}}">Inscriure a modul</a> | 
                  <a type="button" class="btn btn-dark" href="/inscriureProfessorCicle/{{$profe->id}}">Inscriure a cicle</a>
                </td>
              </tr>
              @endforeach
              <tr style="background-color: #f7ce51">
                <td></td>
                <td></td>
                <td></td>
                <td><a type="button" class="btn btn-dark" href="/addProfe">Afegir un professor</a></td>
              </tr>
            </tbody> 
          </table>
    </x-app-layout>
    </div>
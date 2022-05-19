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
              <a class="nav-link lista" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link lista" href="/cicle">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link lista-activo active" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
    
          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Descripció</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($arrayModuls as $key => $modul)
              <tr class="tabla-fila">
                <td>{{$modul->nom}}</td>
                <td>{{$modul->descripcio}}</td>
                <td>
                  <a class="btn btn-ins" href="/editModul/{{$modul->id}}">Editar</a> 
                  | <form method="POST" action="{{route('eliminarModulo', $modul->id)}}" >
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-ins">Esborrar mòdul</button>
                  </form>
              </tr>
              @endforeach
              <tr class="tabla-amarillo">
                <td></td>
                <td></td>
                <td><a class="btn btn-ins" href="/addModul">Afegir un mòdul</a></td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
    </div>
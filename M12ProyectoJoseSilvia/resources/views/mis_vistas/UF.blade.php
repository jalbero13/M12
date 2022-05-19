<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" >
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
                <a class="nav-link lista" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link lista-activo active" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
    
          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Descripció</th>
                <th scope="col">Hores</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($arrayUfs as $key => $uf)
              <tr class="tabla-fila">
                <td>{{$uf->nom}}</td>
                <td>{{$uf->descripcio}}</td>
                <td>{{$uf->hores}}</td>
                <td>
                  <a href="/editUf/{{$uf->id}}">Editar</a> 
                  | <form method="POST" action="{{route('eliminarUf', $uf->id)}}" >
                    @method('DELETE')
                    @csrf
                        <button type="submit" class="btn btn-ins">Esborrar UF</button>
                  </form>
              </tr>
              @endforeach
              <tr class="tabla-amarillo">
                <td></td>
                <td></td>
                <td></td>
                <td><a class="btn btn-ins" href="/addUF">Afegir una unitat formativa</a></td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
    </div>
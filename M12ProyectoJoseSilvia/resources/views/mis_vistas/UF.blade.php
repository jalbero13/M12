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
              <a class="nav-link" href="/cicle" style="background-color: lightyellow; color: #498f9d">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link" href="/modul" style="background-color: lightyellow; color: #498f9d">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link active" href="/UF" style="background-color: #498f9d; color:lightyellow">Unitat Formativa</a>
            </li>
          </ul>
    
          <table class="table" style="color:#1a374d">
            <thead style="background-color: #f7ce51">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Descripció</th>
                <th scope="col">Hores</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($arrayUfs as $key => $uf)
              <tr style="background-color: white">
                <td>{{$uf->nom}}</td>
                <td>{{$uf->descripcio}}</td>
                <td>{{$uf->hores}}</td>
                <td><a href="/editUf/{{$uf->id}}">Editar</a> | <a href="#">Esborrar</a></td>
              </tr>
              @endforeach
              <tr style="background-color: #f7ce51">
                <td></td>
                <td></td>
                <td></td>
                <td><a href="/addUF">Afegir una unitat formativa</a></td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
    </div>
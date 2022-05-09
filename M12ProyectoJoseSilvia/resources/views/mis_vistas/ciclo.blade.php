<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms) }}
            </h2>
        </x-slot>
        <ul class="nav nav-tabs" style="width: 500rem" >
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" aria-current="page" href="/dashboard">Alumne</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link" href="/profesor">Professor</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
              <a class="nav-link active" href="/cicle" style="background-color: #498f9d; color:lightyellow">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link" href="/modul">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
    
          <table class="table" style="color:#1a374d">
            <thead style="background-color: #f7ce51">
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              <tr style="background-color: white">
                <td>CFGS Desenvolupament d'aplicacions web 1</td>
                <td><a href="#">Editar</a> | <a href="#">Esborrar</a></td>
              </tr>
              <tr style="background-color: lightyellow">
                <td>CFGS Desenvolupament d'aplicacions web 2</td>
                <td><a href="#">Editar</a> | <a href="#">Esborrar</a></td>
              </tr>
              <tr style="background-color: #f7ce51">
                <td></td>
                <td><a href="/addCicle">Afegir un cicle</a></td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
    </div>
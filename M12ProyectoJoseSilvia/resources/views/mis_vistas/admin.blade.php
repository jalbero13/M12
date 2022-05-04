<div class="container">
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __(Auth()->user()->nom .' '. Auth()->user()->cognom) }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" style="width: 500px">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Alumne</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Professor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cicle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Mòdul</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Unitat Formativa</a>
        </li>
      </ul>

      <table class="table">
        <thead style="background-color: orange">
          <tr>
            <th scope="col">Dni</th>
            <th scope="col">Nom</th>
            <th scope="col">Cognoms</th>
            <th scope="col">Direcció</th>
            <th scope="col">Data de naixement</th>
            <th scope="col">Correu</th>
            <th scope="col">Accions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>12345678 B</td>
            <td>Juan Andrés</td>
            <td>Méndez Muñoz</td>
            <td>C/ falsa 123</td>
            <td>31/02/1985</td>
            <td>jmendez@camidemar.cat</td>
            <td><a href="#">Editar</a> | <a href="#">Esborrar</a></td>
          </tr>
          <tr>
            <td>87654321 C</td>
            <td>Rigoberta</td>
            <td>Tejero Undargarín</td>
            <td>C/ de mentira 321</td>
            <td>24/09/1979</td>
            <td>rtejero@camidemar.cat</td>
            <td><a href="#">Editar</a> | <a href="#">Esborrar</a></td>
          </tr>
          <tr>
            <td>58745894 S</td>
            <td>Ramón</td>
            <td>Ramirez Cortado</td>
            <td>C/ verdadera 456</td>
            <td>02/07/1963</td>
            <td>rramirez@camidemar.cat</td>
            <td><a href="#">Editar</a> | <a href="#">Esborrar</a></td>
          </tr>
        </tbody>
      </table>
</x-app-layout>
</div>
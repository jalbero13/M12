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
          <form>
 
            <div class="mb-3">
                <label class="form-label">Nom del cicle</label>
                <input type="text" class="form-control">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Afegir cicle</button>
            </div>
          </form>
    </x-app-layout>
    </div>
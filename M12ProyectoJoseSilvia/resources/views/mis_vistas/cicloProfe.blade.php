<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms)}} PROF
            </h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Cicles</li>
                </ol>
            </nav>
        </x-slot>

          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">Grup</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($profe->cicles as $cicle)
              <tr class="tabla-fila">
                <td>{{$cicle->nom}}</td>
                <td><a class="btn btn-ins" href="/modul/{{$cicle->id}}">Veure detalls</a> |
                <a class="btn btn-ins" href="/alumnes">Mostra alumnes</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </x-app-layout>
</div>
<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms)}} PROF
            </h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Alumnat</li>
                </ol>
            </nav>
        </x-slot>

          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">Nom Alumne</th>
                <th scope="col">cognoms</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($alumnos as $alumne)
              <tr class="tabla-fila">
                <td>{{$alumne->nom}}</td>
                <td>{{$alumne->cognoms}}</td>
                <td><a class="btn btn-ins" href="/notes">Veure notes</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </x-app-layout>
</div>
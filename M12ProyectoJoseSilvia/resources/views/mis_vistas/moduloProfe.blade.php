<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms)}} PROF
            </h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Mòduls</li>
                </ol>
            </nav>
        </x-slot>

          <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Grup</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="tabla-fila">
                <td>1</td>
                <td>M3 Programació II</td>
                <td><a class="btn btn-ins" href="/notesModul">Veure detalls</a></td>
              </tr>

              <tr class="tabla-fila">
                <td>2</td>
                <td>M6 Desenvolupament web en entorn client</td>
                <td><a class="btn btn-ins" href="/notesModul">Veure detalls</a></td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
</div>
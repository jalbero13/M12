<div class="container">
    <x-app-layout>
        <x-slot name="header">
        <h3>Llistat de qualificacions</h3>
        <h3>Desenvolupament d'aplicacions web II</h3>
        <h3>Francisco Franquiciado Aguilés</h3>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
          <li class="breadcrumb-item"><a href="/alumnes">Alumnes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Llistat de notes</li>
        </ol>
    </nav>
        </x-slot>
    <table class="table tabla">
        <thead class="tabla-amarillo">
            <tr>
                <th scope="col">Mòdul</th>
                <th scope="col">Hores</th>
                <th scope="col">Qualificació</th>
                <th scope="col">Comentari</th>
                <th scope="col">%Aprovat per UF</th>
            </tr>
            <tr class="tabla-amarillo2">
                <td>M02. Bases de dades</td>
                <td>33</td>
                <td>8</td>
                <td><a href="#">Afegir un comentari</a></td>
                <td>100%</td>
            </tr>
            <tr>
                <td>UF4. Bases de dades objecte-relacionals(POSTGRES)</td>
                <td>33</td>
                <td>8</td>
                <td></td>
                <td></td>
            </tr>
            <tr class="tabla-amarillo2">
                <td>M03. Programació II</td>
                <td>297</td>
                <td>7</td>
                <td><a href="#">Afegir un comentari</a></td>
                <td>100%</td>
            </tr>
            <tr>
                <td>UF4. Programació orientada a objectes. Fonaments</td>
                <td>35</td>
                <td>7</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
    </table>
    </x-app-layout>
</div>

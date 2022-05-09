z<div class="container">
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
              <a class="nav-link" href="/cicle">Cicle</a>
            </li>
            <li class="nav-item" style="font-size: 1.2rem">
                <a class="nav-link active" href="/modul" style="background-color: #498f9d; color:lightyellow">Mòdul</a>
            </li>
            <li class="nav-item" style="font-size: 1.3rem">
                <a class="nav-link" href="/UF">Unitat Formativa</a>
            </li>
          </ul>
          <form>
            <div class="row" style="margin-top: 20px">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Nom del Alumne</label>
                        <input type="text" class="form-control" disabled>
                      </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Cicle</label><br>
                        <select id="cicle">
                            <option value="cicle_id1">ciclo1</option>
                            <option value="cicle_id2">ciclo2</option>
                        </select>
                      </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12 ">
                    <div class="mb-3">
                        <label class="form-label">Mòdul</label><br>
                        <input type="checkbox"  id="modul" name="modul1"> <label class="form-label">M01 Sistemes informatics</label><br>
                      </div>
                </div>
                <div class="col-12 ">
                    <div class="mb-3">
                        <label class="form-label">Unitats formatives</label><br>
                        <input type="radio" id="u1" name="Uf1" value="uf_id"><label class="form.label"> Uf1 Intalacio de sistemes operatius</label><br>
                        <input type="radio" id="u1" name="Uf2" value="uf_id"><label class="form.label"> Uf2 Intalacio de servidor</label><br>
                        <input type="radio" id="u1" name="Uf3" value="uf_id"><label class="form.label"> Uf3 Intalacio de sistemes informàtics</label><br>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <label class="form-label">M02 Bases de dades</label><br>
                        <input type="checkbox"  id="modul" name="modul1"> <label class="form-label">Uf 1 Diseny de bases de dades</label><br>
                        <input type="checkbox"  id="modul" name="modul1"> <label class="form-label">Uf 2 Consulta a bases de dades</label><br>
                        <input type="checkbox"  id="modul" name="modul1"> <label class="form-label">Uf 3 </label><br>

                      </div>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn" style="background-color: #498f9d">Afegir mòdul</button>
            </div>
          </form>
    </x-app-layout>
    </div>
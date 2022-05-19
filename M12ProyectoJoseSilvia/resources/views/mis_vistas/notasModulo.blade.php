<div class="container">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __(Auth()->user()->nom .' '. Auth()->user()->cognoms)}} PROF
            </h2>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/dashboard">Cicles</a></li>
                  <li class="breadcrumb-item"><a href="/modul">Mòduls</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Llistat de qualificacions</li>
                </ol>
            </nav>
        </x-slot>
        <table class="table tabla">
            <thead class="tabla-amarillo">
              <tr>
                <th class="tabla-fila"></th>
                <th scope="col" colspan="8" style="text-align: center">Qualificació de les unitats formatives del mòdul profesional</th>
                <th scope="col" colspan="4" rowspan="2" style="text-align: center; margin:auto">Qualificació final del mòdul</th>
              </tr>
              <tr>
                <td class="tabla-fila"></td>
                <td scope="col" colspan="2" style="text-align: center">UF1</td>
                <td scope="col" colspan="2" style="text-align: center">UF2</td>
                <td scope="col" colspan="2" style="text-align: center">UF3</td>
                <td scope="col" colspan="2" style="text-align: center">UF4</td>
              </tr>
            </thead>
            <tbody>
              <tr class="tabla-amarillo">
                <td style="text-align: center">Alumnat</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
                <td style="text-align: center">Hores</td>
                <td style="text-align: center">Qualif.</td>
              </tr>

              <tr class="tabla-fila">
                <td style="text-align: center">Lopez Castaño, Emmanuel</td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">42</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">165</td>
                <td style="text-align: center">7</td>
              </tr>
              <tr style="background-color: white">
                <td style="text-align: center">Fuentes Ibáñez, Rosa María</td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">42</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">165</td>
                <td style="text-align: center">7</td>
              </tr>
              <tr style="background-color: white">
                <td style="text-align: center">Sillero Pinos, Claudia Alberta</td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">42</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">30</td>
                <td style="text-align: center">
                  <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </td>
                <td style="text-align: center">165</td>
                <td style="text-align: center">7</td>
              </tr>
            </tbody>
          </table>
    </x-app-layout>
</div>
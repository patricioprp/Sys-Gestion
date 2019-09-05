 <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Listado de Notas de Alummnos</title>

      <style>
        .attendance-table table{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
      }
      .blank-cell{
        min-width: 50px;
      }
      .attendance-cell{
        padding: 8px;
      }
      .attendance-table table th.attendance-cell, .attendance-table table td.attendance-cell {
          border: 1px solid #000;
      }
      th {
          background-color:#80C59A;
          color: white;
      }
      h1,h3 {
          background-color: #14703f;
          color: white;
          border: 1px solid #000;
          position: center;
      }
      h4{
          background-color: darkgray;
          color: black;
          border: 1px solid #000;
      }
      </style>
  </head>
  <body>
       <center><h1>Colegio Nueva Concepcion</h1></center>
       <center><h3>Listado de Notas de Alummnos</h3></center>
        <h4>Tipo de Nota: {{$tipoNota->DESCRIPCION}}</h4>
       <h4>Modalidad del Examen: {{$tipoNota->modalidad->DESCRIPCION}}</h4>
             <p><div>
                <img src='http://subirimagen.me/uploads/20190202225415.png'/>
             </div></p>
    <hr />
     <p align="right">
        <div>
            <table>
                <tr>
                    <th style="attendance-cell">#</th>
                    <th style="attendance-cell">APELLIDO</th>
                    <th style="attendance-cell">NOMBRE</th>
                    <th style="attendance-cell">NOTA</th>
                    <th style="attendance-cell">AÑO</th>
                    <th style="attendance-cell">NIVEL</th>
                    <th style="attendance-cell">DIVISION</th>
                  </tr>

                    @foreach ($notas as $nota)
                    <tr>
                      <td>{{$nota->NOTAID}}</td>
                      <td>{{$nota->APELLIDOS}}</td>
                      <td>{{$nota->NOMBRES}}</td>
                      <td>{{$nota->NOTA}}</td>
                      <td>{{$nota->ANIO}}</td>
                      <td>{{$nota->IDNIVELES}}</td>
                      <td>{{$nota->IDDIVISION}}</td>
                  </tr>
                    @endforeach
              </table>
        </div>
    </p>
    <footer>
    <h4>Fecha del Reporte:  {{$date}}</h4>
    <h4>Hora del Reporte:   {{$time}}</h4>
    </footer>
  </body>
  </html>


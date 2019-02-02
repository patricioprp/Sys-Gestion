<table>
    <tr>
        <th>#</th>
        <th>APELLIDO</th>
        <th>NOMBRE</th>
        <th>NOTA</th>
        <th>AÑO</th>
        <th>NIVEL</th>
        <th>DIVISION</th>
      </tr>

        @foreach ($notas as $nota)
        <tr>
          <td>{{$nota->NOTAID}}</td>
          <td>{{$nota->alumno->APELLIDOS}}</td>
          <td>{{$nota->alumno->NOMBRES}}</td>
          <td>{{$nota->NOTA}}</td>
          <td>{{$nota->ANIO}}</td>
        <td>{{$nota->IDNIVELES}}</td>
        <td>{{$nota->IDDIVISION}}</td>
      </tr>
        @endforeach
  </table>

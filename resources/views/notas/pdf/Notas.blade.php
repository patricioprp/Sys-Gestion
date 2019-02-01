<table>
    <tr>
      <th>#</th>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Nota</th>
      <th>Accion</th>
    </tr>

      @foreach ($notas as $nota)
      <tr>
        <td>{{$nota->NOTAID}}</td>
        <td>{{$nota->alumno->APELLIDOS}}</td>
        <td>{{$nota->alumno->NOMBRES}}</td>
        <td>{{$nota->NOTA}}</td>
    </tr>
      @endforeach

  </table>

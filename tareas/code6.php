<?php

  require "conexion.php";

  $pres = $_POST["pres"];

  if (!empty($pres)) {

    $consulta = $link->query("SELECT id, tarea, hh, hh_real FROM tareas4 WHERE `id_equipo` = $pres");

    echo "<table class = 'table2' border = '1px' align ='center'>
          <tr>
            <th>Tarea</th>
            <th>Horas</th>
            <th>Real</th>
            <th>*</th>
          </tr>

    ";
    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['tarea']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['hh']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['hh_real']."</td>
        <td><button id ='eliminar_2' data-id= '".$registro['id']."'>Eliminar</button></td>
      </tr>";
    }
  }

?>

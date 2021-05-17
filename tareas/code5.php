<?php

  require "conexion.php";

  $pres = $_POST["pres"];

    if (!empty($pres)) {

    $consulta = $link->query("SELECT id, em, hh, hh_real FROM equipo_m WHERE `id_equipo` = $pres");

    echo "<table border = '1px' align ='center'>
          <tr>
            <th>Equipo Mayor</th>
            <th>Horas</th>
            <th>Real</th>
            <th>*</th>
          </tr>

    ";
    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['em']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['hh']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['hh_real']."</td>
        <td><button id ='eliminar_1' data-id= '".$registro['id']."'>Eliminar</button></td>
        
      </tr>";
    }
  }

?>

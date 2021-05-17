<?php

  require "conexion.php";

  $pres = $_POST["pres"];

  if (!empty($pres)) {
    $consulta = $link->query("SELECT p.id, concat_ws('',t.nss,' - ', t.nombre,' ', t.Apellido_Paterno,' ', t.Apellido_Materno) as trabajador, c.nombre, p.hh, p.hh_real
    FROM `planilla` as p INNER JOIN trabajador as t on t.id = p.`id_trabajador` INNER JOIN categoria as c on c.id = p.`id_categoria` WHERE p.`id_equipo` = $pres");

    echo "<table border = '1px' align ='center'>
          <tr>
            <th>Trabajador</th>
            <th>Categoria</th>
            <th>Horas</th>
            <th>Real</th>
            <th>*</th>
          </tr>

    ";
    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['trabajador']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['nombre']."</td>
        <td id ='inicio' data-id_inicio = '".$registro['id']."'>".$registro['hh']."</td>
        <td id ='inicio' data-id_inicio = '".$registro['id']."'>".$registro['hh_real']."</td>
        <td><button id ='eliminar' data-id= '".$registro['id']."'>Eliminar</button></td>
      </tr>";
    }
  }

?>

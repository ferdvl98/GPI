<?php
//echo $sup;

require_once "conexion.php";

    $consulta = $link->query("SELECT a.id, a.nombre as n, c.nombre, concat_ws(' ', t.nombre, t.apellido_paterno, t.apellido_materno) as tra, a.`ruta`, a.`fecha`, a.`vv` 
    FROM `archivos` as a INNER JOIN cuentas as c on c.id_user = a.`id_super` INNER JOIN equipos as e on e.id = a.`id_jefe` INNER JOIN trabajador as t 
    on t.id = e.id_trabajador");

    echo "<table border = '1px' align ='center'>
        <tr>
          <th>Supervisor</th>
          <th>Jefe de Equipo</th>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Check</th>
          <th>Archivo</th>
        </tr>

  ";

    while ($registro = mysqli_fetch_array($consulta)) {

        echo "
    <tr>
      <td id ='proyecto' data-id_proyecto = '" . $registro['id'] . "'>" . $registro['nombre'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['tra'] . "</td>
      <td id ='inicio' data-id_inicio = '" . $registro['id'] . "'>" . $registro['n'] . "</td>
      <td id ='fin' data-id_fin = '" . $registro['id'] . "'>" . $registro['fecha'] . "</td>
      <td><input type='checkbox' id='cbox2' data-id = '" . $registro['id'] . "' ".$registro['vv'] ."></td>

      <td><a href ='".$registro['ruta']."' download = '".$registro['ruta']."' class = 'btn btn-success btn-sm'><span class = 'fas fa-download'></span></a>
      </td>
    </tr>";
    }


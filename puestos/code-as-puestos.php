<?php
require_once "conexion.php";

$consulta = $link->query("SELECT a.`id`, per.nombre, po.puesto, a.status FROM `as_puesto` as a INNER JOIN cuentas as per ON a.`id_persona` = per.id_user INNER JOIN puesto as po ON a.`id_puesto` = po.id_puesto ORDER BY per.nombre");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Empleado</th>
        <th>Puesto</th>
        <th>Status</th>
        <th>A/B</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['nombre']."</td>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['puesto']."</td>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['status']."</td>
    <td><button id ='eliminar' data-id= '".$registro['id']."'>Cambiar</button></td>
  </tr>";
}

 ?>

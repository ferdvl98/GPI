<?php

require_once "conexion.php";

$id = $_GET["id"];

$consulta = $link->query("SELECT ap.id, p.nombre, p.presupuesto, t.nombre as tipo FROM pres as p INNER JOIN `aux_pres2` as ap ON p.id = ap.`id_presupuesto`
  INNER JOIN tipo as t ON t.id = p.id_tipo WHERE a = $id");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Total</th>
        <th>Presupuesto</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['tipo']."</td>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['nombre']."</td>
    <td id ='nombre' data-id_puesto = '".$registro['id']."'>".number_format($registro['presupuesto'])."</td>
    <td><button id ='eliminar' data-id= '".$registro['id']."'>Eliminar</button></td>
  </tr>";
}

 ?>

<?php

require_once "conexion.php";

$consulta = $link->query("SELECT * FROM trabajador");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Número de Seguro Social</th>
        <th>Trabajador</th>
        <th>ApelidoPaterno</th>
        <th>Status</th>
        <th>A/B</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
  <td>".$registro['NSS']."</td>
  <td id ='nombre' data-id_puesto = '".$registro['id']."'contenteditable>".$registro['Nombre']."</td>
  <td id ='paterno' data-id_paterno = '".$registro['id']."'contenteditable>".$registro['Apellido_Paterno']."</td>
  <td id ='nombres' data-id_status = '".$registro['id']."'>".$registro['Movimiento']."</td>
  <td><button id ='eliminar' data-id= '".$registro['id']."'>Cambiar</button></td>
  </tr>";
}

 ?>

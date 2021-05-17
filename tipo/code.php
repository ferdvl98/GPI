<?php

require_once "conexion.php";

$consulta = $link->query("SELECT * FROM tipo");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Código</th>
        <th>Área</th>
        <th>Status</th>
        <th>A/B</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
  <td>".$registro['codigo']."</td>
  <td id ='nombre' data-id_puesto = '".$registro['id']."'contenteditable>".$registro['nombre']."</td>
  <td id ='nombres' data-id_status = '".$registro['id']."'>".$registro['status']."</td>
  <td><button id ='eliminar' data-id= '".$registro['id']."'>Cambiar</button></td>
  </tr>";
}

 ?>

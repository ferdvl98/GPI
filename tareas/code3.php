<?php

require_once "conexion.php";

$consulta = $link->query("SELECT * FROM aux_superv");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Responsable</th>
        <th>Categoria</th>
        <th>Presupuesto</th>
        <th>Tarea</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

echo "
<tr>
  <td id ='user' data-id_nombre = '".$registro['id'].$registro['nombre']."</td>
  <td id ='categoria' data-id_tipo = '".$registro['id']."'>".$registro['categoria']."</td>
  <td id ='presh' data-id_tipo = '".$registro['id']."'>".$registro['presupuestoH']."</td>
  <td id ='tarea' data-id = '".$registro['id']."'>".$registro['tarea']."</td>
</tr>";
}

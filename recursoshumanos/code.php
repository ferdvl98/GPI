<?php

require_once "conexion.php";

$consulta = $link->query("SELECT * FROM pagos");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Número de Seguro Social</th>
        <th>Trabajador</th>
        <th>Costo</th>
        <th>Periodo</th>
        
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
  <td>".$registro['NSS']."</td>
  <td id ='nombre' data-id_puesto = '".$registro['id']."'contenteditable>".$registro['Nombre']."</td>
  <td id ='paterno' data-id_costo = '".$registro['id']."'contenteditable>".$registro['Costo']."</td>
  <td id ='paterno' data-id_fecha = '".$registro['id']."'contenteditable>".$registro['fecha']."</td>
  
  </tr>";
}

 ?>

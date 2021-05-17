<?php

  require_once "conexion.php";

  $consulta = $link->query("SELECT * FROM estado");

  echo "<table border = '1px' align ='center'>
        <tr>
          <th>Nombre</th>
          <th>Status</th>
          <th>A/B</th>
        </tr>

  ";

  while ($registro = mysqli_fetch_array($consulta)) {

    echo "
    <tr>
      <td id ='nombre' data-id_puesto = '".$registro['id_estado']."'contenteditable>".$registro['estado']."</td>
      <td id ='nombres' data-id_puesto = '".$registro['id_estado']."'>".$registro['status']."</td>
      <td><button id ='eliminar' data-id= '".$registro['id_estado']."'>Cambiar</button></td>
    </tr>";
  }

?>

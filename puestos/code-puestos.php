<?php

  require_once "conexion.php";

  $consulta = $link->query("SELECT * FROM puesto");

  echo "<table border = '1px' align ='center'>
        <tr>
          <th>Puesto</th>
          <th>Status</th>
          <th>A/B</th>
        </tr>

  ";

  while ($registro = mysqli_fetch_array($consulta)) {

    echo "
    <tr>
      <td id ='nombre' data-id_puesto = '".$registro['id_puesto']."'contenteditable>".$registro['puesto']."</td>
      <td id ='nombres' data-id_puesto = '".$registro['id_puesto']."'>".$registro['status']."</td>
      <td><button id ='eliminar' data-id= '".$registro['id_puesto']."'>Cambiar</button></td>
    </tr>";
  }

?>

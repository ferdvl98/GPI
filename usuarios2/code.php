<?php

  require_once "conexion.php";

  $consulta = $link->query("SELECT * FROM `cuentas`");

  echo "<table border = '1px' align ='center'>
          <tr>
            <th>Nombre</th>
            <th>Cuenta</th>
            <th>Status</th>
            <th>A/B</th>
          </tr>
  ";
    while ($registro = mysqli_fetch_array($consulta)) {
      echo "
        <tr>
          <td id ='nombre_user' data-id_nombre = '".$registro['id_user']."'contenteditable>".$registro['nombre']."</td>
          <td id ='usuario' data-id_usuario = '".$registro['id_user']."'contenteditable>".$registro['usuario']."</td>
          <td id ='status' data-id_status = '".$registro['id_user']."'>".$registro['status']."</td>
          <td><button id ='eliminar' data-id= '".$registro['id_user']."'>Cambiar</button></td>

        </tr>";
    }

  echo "</table>";

  ?>

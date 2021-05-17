<?php

require_once "conexion.php";

$consulta = $link->query("SELECT pe.id_persona, pe.nombre, e.estado, d.ciudad, d.calle, d.colonia, d.cp, d.num_in, d.num_ex, t.telefono, u.email, pe.status FROM persona as pe INNER JOIN direccion as d ON d.id_direccion = pe.id_direccion INNER JOIN estado as e ON d.id_estado = e.id_estado INNER JOIN telefono as t ON t.id_telefono = pe.id_telefono LEFT JOIN usuario as u ON pe.id_usuario = u.id_user");

echo "<table border = '1px' align ='center'>
        <tr>
          <th>Nombre</th>
          <th>Estado</th>
          <th>Ciudad</th>
          <th>Calle</th>
          <th>Colonia</th>
          <th>C.P.</th>
          <th>Num. In.</th>
          <th>Num. Ex.</th>
          <th>Telefono</th>
          <th>Usuario</th>
          <th>Status</th>
          <th>A/B</th>
        </tr>
";
  while ($registro = mysqli_fetch_array($consulta)) {
    echo "
      <tr>
        <td id ='nombre_user' data-id_nombre = '".$registro['id_persona']."'contenteditable>".$registro['nombre']."</td>
        <td id ='estado' data-id_estado = '".$registro['id_persona']."'>".$registro['estado']."</td>
        <td id ='ciudad' data-id_ciudad = '".$registro['id_persona']."'contenteditable>".$registro['ciudad']."</td>
        <td id ='calle' data-id_calle = '".$registro['id_persona']."'contenteditable>".$registro['calle']."</td>
        <td id ='colonia' data-id_colonia = '".$registro['id_persona']."'contenteditable>".$registro['colonia']."</td>
        <td id ='cp' data-id_cp = '".$registro['id_persona']."'contenteditable>".$registro['cp']."</td>
        <td id ='ni' data-id_ni = '".$registro['id_persona']."'contenteditable>".$registro['num_in']."</td>
        <td id ='ne' data-id_ne = '".$registro['id_persona']."'contenteditable>".$registro['num_ex']."</td>
        <td id ='telefono' data-id_telefono = '".$registro['id_persona']."'contenteditable>".$registro['telefono']."</td>
        <td id ='usuario' data-id_usuario = '".$registro['id_persona']."'contenteditable>".$registro['email']."</td>
        <td id ='AB' data-id_ab = '".$registro['id_persona']."'>".$registro['status']."</td>
        <td><button id ='eliminar' data-id= '".$registro['id_persona']."'>Cambiar</button></td>

      </tr>";
  }

echo "</table>";

?>

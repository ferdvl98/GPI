<?php
  require_once "conexion.php";

  $id_user = filter_input(INPUT_POST, 'id');

  if($id_user == "s"){

  }else{
    $consulta = $link->query("SELECT a.`id`, p.privilegio FROM `asig_priv` as a INNER JOIN puesto as c on c.id_puesto = a.`id_cuenta` INNER JOIN privilegios as p on p.id_priv = a.id_priv where a.id_cuenta = $id_user");
    echo "<table class = 'tabla' border = '1px' align ='center'>
          <tr>
            <th>Privilegio</th>
            <th>*</th>
          </tr>

    ";

    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
      <tr>
        <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['privilegio']."</td>
        <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
      </tr>";
    }
  }




?>

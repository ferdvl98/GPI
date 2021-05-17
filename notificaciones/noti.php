<?php
    $id = $_POST["id"];
    

    require_once "conexion.php";
    
    $consulta = $link->query("SELECT n.id, n.fecha, c.nombre, n.asunto FROM `notificaciones` as n INNER JOIN cuentas as c ON n.`notifico` = c.id_user WHERE n.`id_user` = $id");
    
    echo "<table border = '1px' align ='center'>
          <tr>
            <th>Fecha</th>
            <th>Notificó</th>
            <th>Asunto</th>
            <th>*</th>
          </tr>
    
    ";
    
    while ($registro = mysqli_fetch_array($consulta)) {
    
      echo "
      <tr>
        <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['fecha']."</td>
        <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['nombre']."</td>
        <td id ='nombre' data-id_puesto = '".$registro['id']."'>".$registro['asunto']."</td>
        <td><button id ='eliminar' data-id= '".$registro['id']."'>Confirmar</button></td>
      </tr>";
    }


    
?>
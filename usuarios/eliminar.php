<?php

  require_once "conexion.php";

  $id = $_POST["id"];

  $usuario = $direccion = $telefono = "";

  $sql = "SELECT  status FROM persona where id_persona = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $usuario = $row["status"];
    }
  }

  if($usuario == "A"){
    $consulta = $link->query("UPDATE persona SET status = 'B' WHERE  id_persona = $id");
  }else if($usuario == "B"){
    $consulta = $link->query("UPDATE persona SET status = 'A' WHERE  id_persona = $id");
  }
  #$consulta = $link->query("DELETE FROM persona WHERE id_persona = $id");
  #$consulta2 = $link->query("DELETE FROM usuario WHERE  id_user = $usuario");
  #$consulta3 = $link->query("DELETE FROM telefono WHERE  id_telefono = $telefono");
  #$consulta4 = $link->query("DELETE FROM direccion WHERE  id_direccion = $direccion");

  if(!$consulta){
    echo "Error al cambiar status";
  }else{
    echo "Status cambiado con exito";
  }

?>

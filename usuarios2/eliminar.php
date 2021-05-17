<?php

  require_once "conexion.php";

  $id = $_POST["id"];

  $usuario = $direccion = $telefono = "";

  $sql = "SELECT  status FROM cuentas where id_user = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $usuario = $row["status"];
    }
  }

  if($usuario == "A"){
    $consulta = $link->query("UPDATE cuentas SET status = 'B' WHERE  id_user = $id");
  }else if($usuario == "B"){
    $consulta = $link->query("UPDATE cuentas SET status = 'A' WHERE  id_user = $id");
  }
  if(!$consulta){
    echo "Error al cambiar status";
  }else{
    echo "Status cambiado con exito";
  }

?>

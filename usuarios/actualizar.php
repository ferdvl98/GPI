<?php

require_once "conexion.php";

$id = $_POST["id"];
$texto = $_POST["texto"];
$columna = $_POST["columna"];
$si = $_POST["si"];
$id_dic = $id_dic2 = $sql = $result = $consulta = "";

if($si == "1"){
  $consulta = $link->query("UPDATE persona SET $columna = '$texto' WHERE  id_persona = $id");
}else if($si == "2"){
  $sql = "SELECT  id_direccion FROM persona where id_persona = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic = $row["id_direccion"];
    }
  }

  $consulta = $link->query("UPDATE direccion SET $columna = '$texto' WHERE  id_direccion = $id_dic");
}else if($si == "3"){
  $sql = "SELECT  id_telefono FROM persona where id_persona = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic = $row["id_telefono"];
    }
  }

  $consulta = $link->query("UPDATE telefono SET $columna = '$texto' WHERE  id_telefono = $id_dic");
}else if($si == "4"){
  $sql = "SELECT id_usuario FROM persona where id_persona = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic = $row["id_usuario"];
      if(!$id_dic){
        $consulta = $link->query("INSERT INTO `usuario` (`$columna`) VALUES ('$texto')");
        $sql = "SELECT id_user FROM usuario where email ='$texto' ";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            $id_dic = $row["id_user"];
            $consulta = $link->query("UPDATE persona SET id_usuario = $id_dic WHERE  id_persona = $id");
          }
        }
      }else{
        $consulta = $link->query("UPDATE usuario SET $columna = '$texto' WHERE  id_user = $id_dic");
      }
      #
    }
  }

}else if($si == "5"){
  $sql = "SELECT  id_estado FROM estado where estado = '$texto'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic = $row["id_estado"];
    }
  }
  $sql = "SELECT  id_direccion FROM persona where id_persona = $id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic2 = $row["id_direccion"];
    }
  }

  $consulta = $link->query("UPDATE direccion SET `id_estado` = $id_dic WHERE `id_direccion` = $id_dic2");
}else if($si == "6"){
  $sql = "SELECT id_puesto FROM puesto where puesto = '$texto'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $id_dic = $row["id_puesto"];
    }
  }
  $consulta = $link->query("UPDATE persona SET `id_puesto` = $id_dic WHERE `id_persona` = $id");
}

if(!$consulta){
  echo "Error al actualizar los datos ";
  exit();
}else{
  echo "Se han actualizado los datos";
}

?>

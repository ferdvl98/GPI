<?php

  require 'conexion.php';

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];
  $tabla = $_POST["tabla"];
  $aux = "aux_";
  $id2 = "id_";
  $row2 = "";

  $id_btl = $id2.$tabla;
  $tabla_u = $aux.$tabla;
  //settype($id_btl , 'string');

  if($tabla == "vyt"){
    $sql = "SELECT id_vyt FROM vyt where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE $tabla SET `nombre` = '$texto' WHERE $id_btl = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar vyt";
      }
    }
  }else if($tabla == "co"){
    $sql = "SELECT id_co FROM co where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE $tabla SET `nombre` = '$texto' WHERE $id_btl = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar co";
      }
    }
  }else if($tabla == "seguros"){
    $sql = "SELECT id_seg FROM seguros where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE seguros SET `nombre` = '$texto' WHERE id_seg = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar co";
      }
    }
  }else if($tabla == "instalaciones"){
    $sql = "SELECT id_ins FROM instalaciones where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE instalaciones SET `nombre` = '$texto' WHERE id_ins = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar ins";
      }
    }
  }else if($tabla == "equipos"){
    $sql = "SELECT id_eq FROM equipos where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE equipos SET `nombre` = '$texto' WHERE id_eq = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar eq";
      }
    }
  }else if($tabla == "admin"){
    $sql = "SELECT id_admin FROM admin where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE admin SET `nombre` = '$texto' WHERE id_admin = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar admin";
      }
    }
  }else if($tabla == "fya"){
    $sql = "SELECT id_fya FROM fya where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE fya SET `nombre` = '$texto' WHERE id_fya = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar fya";
      }
    }
  }else if($tabla == "hyc"){
    $sql = "SELECT id_hyc FROM hyc where nombre = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El nombre que desea registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE hyc SET `nombre` = '$texto' WHERE id_hyc = $id")){
        echo "Dato modificado";
      }else {
        echo "Error al modoficar hyc";
      }
    }
  }



 ?>
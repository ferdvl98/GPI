<?php

  require_once "conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $columna = $_POST["columna"];

  if($columna == "usuario"){
    $sql = "SELECT * FROM cuentas where usuario = '$texto'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
      echo "¡El correo electrónico que intenta registrar ya existe, intente con otro!";
    }else{
      if($consulta = $link->query("UPDATE cuentas SET $columna = '$texto' WHERE  id_user = $id")){
        echo "Dato actualizado";
      }else{
        echo "Erro al actualizar usuario";
      }
    }
  }else{
    if($consulta = $link->query("UPDATE cuentas SET $columna = '$texto' WHERE  id_user = $id")){
      echo "Dato actualizado";
    }else{
      echo "Erro al actualizar ",$columna;
    }
  }
 ?>

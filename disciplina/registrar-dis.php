<?php

  require_once "conexion.php";

  $dis = $_POST["disciplina"];
  $cod = $_POST["codigo"];

  if(empty(trim($dis)) || empty(trim($cod))){
    echo "Debe llenar todos los campos";
  }else{
    $sql = "SELECT * FROM disciplinas WHERE nombre = '$dis' OR codigo = '$cod'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "La disciplina ya está registrada";
    }else {
      if($consulta = $link->query("INSERT INTO disciplinas (nombre,codigo, status) VALUES ('$dis','$cod','A')")){
        echo "Disciplina registrada";
      }else {
        echo "Error al registrar Disciplina";
      }
    }
  }







?>

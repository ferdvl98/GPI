<?php

  require_once "conexion.php";

  $user = $_POST["usuairos"];
  $priv = $_POST["priv"];

  if($user!="s"){
    if($priv!="s"){
      $sql = "SELECT * FROM asig_priv WHERE id_cuenta = $user AND id_priv = $priv";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        echo "El privilegio ya está otorgado";
      }else{
        if($consulta = $link->query("INSERT INTO asig_priv (id_cuenta, id_priv) VALUES ($user, $priv)")){
          echo "Privilegio otorgado";
        }else {
          echo "Error al otorgar privilegio";
        }
      }
    }else{
      echo "Seleccione un privilegio";
    }
  }else{
    echo "Seleccione a un usuario";
  }

?>

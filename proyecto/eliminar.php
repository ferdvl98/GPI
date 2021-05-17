<?php

require_once "conexion.php";

$id = $_POST["id"];


$sql = "SELECT * FROM `aux_pres2` where id=$id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  if($consulta = $link->query("DELETE FROM `aux_pres2` WHERE id = $id")){
    echo "Registro elimiando";
  }else {
    echo "Error al eliminar registro";
  }
  /*
  // output data of each row
  while($pres = $result->fetch_assoc()) {
    if($pres["pres"]=="Viajes"){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE vyt = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -VyT";
        }else {
          echo "Error al eliminar registro -VyT";
        }
      }else {
        echo "Error al eliminar registro -VyT2";
      }

    }else if($pres["pres"]=="Costos O."){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE co = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -CO";
        }else {
          echo "Error al eliminar registro CO";
        }
      }else {
        echo "Error al eliminar registro CO2";
      }

    }else if($pres["pres"]=="SyF."){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE seg = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -SyF";
        }else {
          echo "Error al eliminar registro SyF";
        }
      }else {
        echo "Error al eliminar registro SyF2";
      }

    }else if($pres["pres"]=="Instalaciones"){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE ins = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -Ins";
        }else {
          echo "Error al eliminar registro -Ins";
        }
      }else {
        echo "Error al eliminar registro -Ins2";
      }

    }else if($pres["pres"]=="Equipos"){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE eq = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -Eq";
        }else {
          echo "Error al eliminar registro -Eq";
        }
      }else {
        echo "Error al eliminar registro -Eq2";
      }
    }

    else if($pres["pres"]=="Administración"){
      if($consulta = $link->query("DELETE FROM aux_pre WHERE admin = (select id_pre from aux_aux_pre where id=$id)")){
        if($consulta = $link->query("DELETE FROM aux_aux_pre WHERE id = $id")){
          echo "Registro elimiando -Admin";
        }else {
          echo "Error al eliminar registro -Admin";
        }
      }else {
        echo "Error al eliminar registro -Admin2";
      }
    }




  }*/
}


/*
if($consulta = $link->query("DELETE FROM aux_pre WHERE id = $id")){
  echo "Registro eliminado";
}else {
  echo "Error al eliminar registro";
}
*/
?>

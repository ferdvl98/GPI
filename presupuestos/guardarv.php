<?php

  require_once "conexion.php";
  if($_POST["status"]=="VyT"){
  $nombre = $_POST["nombrev"];
  $id = $sum = "";

    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM vyt WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_vty` (`id_vty`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_vyt, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM vyt as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - VyT -1 ";
          $sql = "SELECT `id_vyt` FROM `vyt` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_vyt"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_vty` WHERE `id_vty` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `vyt` SET `total`= $sum WHERE `id_vyt` = $id")){

          }else{
            echo "Error al actualizar Total VyT";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `vyt`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_vty` (`id_vty`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_vyt, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM vyt as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - VyT";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }




  }else if($_POST["status"]=="CO"){
    $nombre = $_POST["nombrec"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM co WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_co` (`id_co`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_co, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM co as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - CO -1 ";
          $sql = "SELECT `id_co` FROM `co` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_co"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_co` WHERE `id_co` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `co` SET `total`= $sum WHERE `id_co` = $id")){

          }else{
            echo "Error al actualizar Total CO";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `co`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_co` (`id_co`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_co, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM co as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - CO";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }


  }else if($_POST["status"]=="seguros"){
    $nombre = $_POST["nombres"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM seguros WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_seg` (`id_seg`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_seg, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM seguros as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - Seg -1 ";
          $sql = "SELECT `id_seg` FROM `seguros` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_seg"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_seg` WHERE `id_seg` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `seguros` SET `total`= $sum WHERE `id_seg` = $id")){

          }else{
            echo "Error al actualizar Total Seguros";
          }
        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `seguros`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_seg` (`id_seg`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_seg, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM seguros as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - SF";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }


  }else if($_POST["status"]=="instalaciones"){
    $nombre = $_POST["nombrei"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM instalaciones WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_ins` (`id_ins`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_ins, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM instalaciones as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - ins -1 ";
          $sql = "SELECT `id_ins` FROM `Instalaciones` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_ins"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_ins` WHERE `id_ins` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `instalaciones` SET `total`= $sum WHERE `id_ins` = $id")){

          }else{
            echo "Error al actualizar Total ins";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `instalaciones`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_ins` (`id_ins`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_ins, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM instalaciones as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - IP";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }



  }else if($_POST["status"]=="equipos"){
    $nombre = $_POST["nombree"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM equipos WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_eq` (`id_eq`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_eq, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM equipos as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - Eq -1 ";
          $sql = "SELECT `id_eq` FROM `equipos` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_eq"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_eq` WHERE `id_eq` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `equipos` SET `total`= $sum WHERE `id_eq` = $id")){

          }else{
            echo "Error al actualizar Total Eq";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `equipos`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_eq` (`id_eq`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_eq, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM equipos as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - EQ";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }



  }else if($_POST["status"]=="admin"){
    $nombre = $_POST["nombrea"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM admin WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_admin` (`id_admin`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_admin, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM admin as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - admin -1 ";
          $sql = "SELECT `id_admin` FROM `admin` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_admin"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_admin` WHERE `id_admin` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `admin` SET `total`= $sum WHERE `id_admin` = $id")){

          }else{
            echo "Error al actualizar Total admin";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `admin`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_admin` (`id_admin`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_admin, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM admin as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - AD";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }



  }else if($_POST["status"]=="fya"){
    $nombre = $_POST["nombrefya"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM fya WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_fya` (`id_fya`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_fya, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM fya as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - fya -1 ";
          $sql = "SELECT `id_fya` FROM `fya` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_fya"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_fya` WHERE `id_fya` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `fya` SET `total`= $sum WHERE `id_fya` = $id")){

          }else{
            echo "Error al actualizar Total fya";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `fya`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_fya` (`id_fya`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_fya, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM fya as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - FyA";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }


  }else if($_POST["status"]=="hyc"){
    $nombre = $_POST["nombrehyc"];
    if( empty(trim($nombre))){
      echo "Debe escribir un nombre para el presupuesto";
    }else{
      $sql = "SELECT * FROM hyc WHERE nombre = '$nombre'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        if($consulta = $link->query("INSERT INTO `aux_hyc` (`id_hyc`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_hyc, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM hyc as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
          echo "Presupuesto Agregado - hyc -1 ";
          $sql = "SELECT `id_hyc` FROM `hyc` WHERE `nombre` = '$nombre'";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $id= $row["id_hyc"];
            }
          }
          $sql = "SELECT SUM(`ig`) as total FROM `aux_hyc` WHERE `id_hyc` = $id";
          $result = mysqli_query($link, $sql);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $sum = $row["total"];
            }
          }
          if($consulta = $link->query("UPDATE `hyc` SET `total`= $sum WHERE `id_hyc` = $id")){

          }else{
            echo "Error al actualizar Total hyc";
          }

        }else {
          echo "Error 2-1 al agregar";
        }
      }else {
        if($consulta = $link->query("INSERT INTO `hyc`( `nombre`, `total`) VALUES ('$nombre', (SELECT sum(`ig`) FROM `aux_aux`))")){
          $consulta = "";
          if($consulta = $link->query("INSERT INTO `aux_hyc` (`id_hyc`, `id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) SELECT v.id_hyc, a.`id_area`, a.`id_dis`, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM hyc as v INNER JOIN aux_aux as a where v.nombre= '$nombre';")){
            echo "Presupuesto Agregado - HyC";
          }else {
            echo "Error 2 al agregar";
          }
        }else {
          echo "Error 1 al agregar";
        }
      }
    }
  }
 ?>

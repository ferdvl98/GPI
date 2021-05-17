<?php

  require_once "conexion.php";

  $id = $_GET["id"];
  $pres = $_POST["presupuesto"];
  $area = $_POST["area"];
  $disciplina = $_POST["disc"];
  $concepto =$_POST["Concepto"];
  $unidad = $_POST["unidad"];
  $cantidad = $_POST["cantidad"];
  $impU = $_POST["iu"];
  $impG = $cantidad*$impU;

  //echo "presupuesto: $tipo, nombre: $nombre, area: $area,  Disciplina: $disciplina,  concepto: $concepto, \n unidad:  $unidad,  cantidad: $cantidad,  imu: $impU, img: $impG";


  if(empty(trim($concepto)) || empty(trim($unidad)) || empty(trim($cantidad)) ||  empty(trim($impU)) ){
    echo "Debe llenar todos los campos";
  }else{
    $sql = "SELECT * FROM `aux_presupuestos2` where `tipo` = $pres and `id_area` = $area and  `id_disciplina` = $disciplina
    and  `concepto` = '$concepto' and a = $id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
      echo "¡No puede repetir el concepto!";
    }else{
      if($consulta = $link->query("INSERT INTO `aux_presupuestos2`(`tipo`,`id_area`, `id_disciplina`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`, `a`)
       VALUES   ($pres,$area, $disciplina, '$concepto', '$unidad', $cantidad, $impU, $impG, $id)")){
        echo "Agregado";
      }else {
        echo "Error al agregar";
      }
    }



  }
?>

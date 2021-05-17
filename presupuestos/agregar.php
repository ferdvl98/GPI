<?php

  require_once "conexion.php";

  if($_POST["status"]=="VyT"){
    $area = $_POST["areav"];
    $disciplina = $_POST["discv"];
    $concepto =$_POST["Conceptov"];
    $unidad = $_POST["unidadv"];
    $cantidad = $_POST["cantidadv"];
    $impU = $_POST["iuv"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="CO"){
    $area = $_POST["areac"];
    $disciplina = $_POST["discc"];
    $concepto =$_POST["Conceptoc"];
    $unidad = $_POST["unidadc"];
    $cantidad = $_POST["cantidadc"];
    $impU = $_POST["iuc"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="seguros"){
    $area = $_POST["areas"];
    $disciplina = $_POST["discs"];
    $concepto =$_POST["Conceptos"];
    $unidad = $_POST["unidads"];
    $cantidad = $_POST["cantidads"];
    $impU = $_POST["ius"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="instalaciones"){
    $area = $_POST["areai"];
    $disciplina = $_POST["disci"];
    $concepto =$_POST["Conceptoi"];
    $unidad = $_POST["unidadi"];
    $cantidad = $_POST["cantidadi"];
    $impU = $_POST["iui"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="equipos"){
    $area = $_POST["areae"];
    $disciplina = $_POST["disce"];
    $concepto =$_POST["Conceptoe"];
    $unidad = $_POST["unidade"];
    $cantidad = $_POST["cantidade"];
    $impU = $_POST["iue"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="admin"){
    $area = $_POST["areaa"];
    $disciplina = $_POST["disca"];
    $concepto =$_POST["Conceptoa"];
    $unidad = $_POST["unidada"];
    $cantidad = $_POST["cantidada"];
    $impU = $_POST["iua"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="fya"){
    $area = $_POST["areafya"];
    $disciplina = $_POST["discfya"];
    $concepto =$_POST["Conceptofya"];
    $unidad = $_POST["unidadfya"];
    $cantidad = $_POST["cantidadfya"];
    $impU = $_POST["iufya"];
    $impG = $cantidad*$impU;

  }else if($_POST["status"]=="hyc"){
    $area = $_POST["areahyc"];
    $disciplina = $_POST["dischyc"];
    $concepto =$_POST["Conceptohyc"];
    $unidad = $_POST["unidadhyc"];
    $cantidad = $_POST["cantidadhyc"];
    $impU = $_POST["iuhyc"];
    $impG = $cantidad*$impU;

  }



    if( empty(trim($concepto)) || empty(trim($unidad)) || empty(trim($cantidad)) ||  empty(trim($impU)) ){
      echo "Debe llenar todos los campos";
    }else{
      if($consulta = $link->query("INSERT INTO aux_aux (`id_area`, `id_dis`, `concepto`, `unidad`, `cantidad`, `iu`, `ig`) VALUES   ($area, $disciplina, '$concepto', '$unidad', $cantidad, $impU, $impG)")){
        echo "Agregado";
      }else {
        echo "Error al agregar";
      }

    }
 ?>

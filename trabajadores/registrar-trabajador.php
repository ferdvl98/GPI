<?php

  require_once "conexion.php";

  $fec = $_POST["fecha"];
  //$dis = $_POST["area"];
  $cod = $_POST["codigo"];
  $nom = $_POST["empleado"];
  $apat = $_POST["apaterno"];
  $ama = $_POST["amaterno"];
  //$mov = $_POST["movimiento"];
  //$con = $_POST["contratista"];
  //$obs = $_POST["observacion"];
  //$com = $_POST["comentario"];
  //$usu = $_POST["usuario"];



  if(empty(trim($fec)) || empty(trim($cod)) || empty(trim($nom)) || empty(trim($apat)) || empty(trim($ama))){
    echo "Debe llenar todos los campos";
  }else{
    $sql = "SELECT * FROM trabajador WHERE NSS = '$cod'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "El trabajador ya está registrado";
    }else {
      if($consulta = $link->query("INSERT INTO trabajador (Fecha_de_Movimiento,NSS,Nombre,Apellido_Paterno,Apellido_Materno,Movimiento) 
              VALUES ('$fec','$cod','$nom','$apat','$ama','Alta')")){
        echo "Trabajador registrado";
      }else {
        echo "Error al registrar Trabajador";
      }
    }
  }







?>

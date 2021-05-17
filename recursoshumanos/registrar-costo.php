<?php

  require_once "conexion.php";

  $fec = $_POST["fecha"];
  //$dis = $_POST["area"];
  $cod = $_POST["codigo"];
  $nom = $_POST["empleado"];
  $apat = $_POST["iu"];
  //$ama = $_POST["amaterno"];
  //$mov = $_POST["movimiento"];
  //$con = $_POST["contratista"];
  //$obs = $_POST["observacion"];
  //$com = $_POST["comentario"];
  //$usu = $_POST["usuario"];



  if(empty(trim($fec)) || empty(trim($cod)) || empty(trim($nom)) || empty(trim($apat))){
    echo "Debe llenar todos los campos";
  }else{
    if($consulta = $link->query("INSERT INTO pagos (fecha,NSS,Nombre,Costo, activo) 
              VALUES ('$fec','$cod','$nom','$apat', '1')")){
        echo "Trabajador registrado";
      }else {
        echo "Error al registrar Trabajador";
      }
  }







?>

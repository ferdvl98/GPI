<?php

require "conexion.php";


$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = "A";


$sentencia = $link->prepare("INSERT INTO trabajadores
      ( nss, nombre, status)
VALUES('$d1','$d2','$d3')");

$sentencia->execute();

<?php
  require_once "conexion.php";

  $nombre = $_POST["nombre"];
  if(isset($_POST['AB'])){
    $AB = "A";
  }else{
    $AB = "B";
  }
  //$cuenta = $_POST["cuenta"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $estado = $_POST["estado"];
  $ciudad = $_POST["ciudad"];
  $colonia = $_POST["colonia"];
  $calle = $_POST["calle"];
  $cp = $_POST["CP"];
  $ni = $_POST["NI"];
  $ne = $_POST["NE"];
  $telefono = $_POST["telefono"];

  if(isset($_POST["cuenta"])){
    if(empty(trim($nombre)) || empty(trim($email)) || empty(trim($password)) || empty(trim($ciudad)) || empty(trim($colonia)) || empty(trim($calle))){
      echo "Debe llenar todos los campos";
    }else{
      //con cuenta
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_email = $email;
      $sql = "INSERT INTO usuario (password, email) VALUES ('$param_password','$param_email')";
       mysqli_query($link, $sql);

      $sql = "SELECT  id_user FROM usuario where password = '$param_password' and email = '$param_email'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id_email = $row["id_user"];
        }
      }

      $sql = "INSERT INTO telefono (telefono) VALUES ('$telefono')";
      mysqli_query($link, $sql);

      $sql = "SELECT  id_telefono FROM telefono where telefono = '$telefono'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id_tel = $row["id_telefono"];
        }
      }

      $sql = "INSERT INTO direccion (calle, num_in, num_ex, colonia, cp, ciudad, id_estado) VALUES ('$calle', $ni, $ne, '$colonia', $cp, '$ciudad', $estado)";
      mysqli_query($link, $sql);

      $sql = "SELECT  id_direccion FROM direccion where calle = '$calle' and num_in=$ni and num_ex = $ne and colonia = '$colonia' and cp = $cp and ciudad = '$ciudad' and id_estado = $estado";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id_dic = $row["id_direccion"];
        }
      }


      $sql = "INSERT INTO `persona`( `nombre`, `id_direccion`, `id_telefono`, `id_usuario`, `status`) VALUES ('$nombre', $id_dic, $id_tel,$id_email, '$AB')";
      echo mysqli_query($link, $sql);
    }
  }else{
    if(empty(trim($nombre)) || empty(trim($ciudad)) || empty(trim($colonia)) || empty(trim($calle))){
      echo "Debe llenar todos los datos";
    }else{
      $sql = "INSERT INTO telefono (telefono) VALUES ('$telefono')";
      mysqli_query($link, $sql);

      $sql = "SELECT  id_telefono FROM telefono where telefono = '$telefono'";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id_tel = $row["id_telefono"];
        }
      }

      $sql = "INSERT INTO direccion (calle, num_in, num_ex, colonia, cp, ciudad, id_estado) VALUES ('$calle', $ni, $ne, '$colonia', $cp, '$ciudad', $estado)";
      mysqli_query($link, $sql);

      $sql = "SELECT  id_direccion FROM direccion where calle = '$calle' and num_in=$ni and num_ex = $ne and colonia = '$colonia' and cp = $cp and ciudad = '$ciudad' and id_estado = $estado";
      $result = mysqli_query($link, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $id_dic = $row["id_direccion"];
        }
      }


      $sql = "INSERT INTO `persona`( `nombre`, `id_direccion`, `id_telefono`,  `status`) VALUES ( '$nombre', $id_dic, $id_tel, '$AB')";
      echo mysqli_query($link, $sql);
    }
  }








?>

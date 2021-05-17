<?php
  //require "code-login.php"
  require "./email/enviar2.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GPI</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
  	<link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <form class="formulario" action="" method="post">
      <h1>Recuperar</h1>
      <div class="contenedor">

        <div class="input-contenedor">
          <i class="fas fa-envelope icon"></i>
          <input type="text" placeholder="Correo electrónico" name="email" id="email">
          <span class="msg-error"> <?php echo $email_err; ?> </span>
        </div>

        <input type="submit" name="submit"  value="Enviar" class="button">
        <br><br>
        <p>¿Recordaste tu contraseña? <a class ="link"  href="index.php">Inicia Sesión</a> </p>
      </div>
    </form>
  </body>
</html>

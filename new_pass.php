<?php
  //require "conexion.php";
  require "cambiar.php";

  /*$id = $_GET["token"];
  $sql = "SELECT * FROM cuentas where token = $id";
  $result = $link->query($sql);
  $email_err="";

  if ($result->num_rows > 0) {;
  }else{
    echo "El link ya ha sido utilizado";
    header('location:index.php');
    die();
  }*/
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
    <script src="jquery-3.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

      /*$("#crear").click(function() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "cambiar.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            alert(data);
          }
        });
        return true;
      });*/
    });
  </script>
  </head>
  <body>
    <form class="formulario" id="formulario" action="" method="post">
      <h1>Recuperar</h1>
      <span class="msg-error"> <?php echo $email_err; ?> </span>
      <div class="contenedor">

        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input type="password" placeholder="Nueva Contraseña" name="password1" autocomplete="off">
        </div>
        <div class="input-contenedor">
          <i class="fas fa-key icon"></i>
          <input type="password" placeholder="Confirmar Contraseña" name="password2" autocomplete="off">
        </div>
        <button  id = "crear" value="Cambiar"  name = "submit" class="button">Cambiar</button>
        <br><br>
      </div>
    </form>
  </body>
</html>

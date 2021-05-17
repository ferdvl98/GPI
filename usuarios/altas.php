<?php
  require "conexion.php";
  //require "code-altas.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#enviar").click(function(){
        var datos = $("#formulario").serialize();
        $.ajax({
          type: "POST",
          url: "code-altas2.php",
          data:datos,
          success: function(r){
            //alert(r);
            if(r == 1){
              alert("Usuario registrado");
            }else{
              alert("Error al Registrar Usuario");
            }
          }
        });
      });
    });
    </script>
  </head>
  <body>
      <form  class="formulario2" id="formulario" method="POST">
        <div class="contenedor">

          <label>Nombre Completo</label>
          <input type="text" placeholder="Nombre completo" size="35" name="nombre"/>

          
          <input type="checkbox" name="AB">
          <label>Usuario en función</label><br>

          <!--
          <span class="msg-error"><?php echo "$nombre_err"; ?></span>
          <span class="msg-error"><?php echo "$puesto_err"; ?></span>-->
          <input type="checkbox" name="cuenta">
          <label>Crear una cuenta</label><br>
          <fieldset>
          <legend>Crear cuenta</legend>
          <label>Correo electrónico</label>
          <input type="text" placeholder="Correo electrónico" size="25" name="email"/>

          <label for="contrasena">Contraseña</label>
          <input type="password"  placeholder="Contraseña" size="25" name="password"/>
          <br><br>
          </fieldset>
<!--
          <span class="msg-error"><?php echo "$email_err"; ?></span>
          <span class="msg-error"><?php echo "$password_err"; ?></span>-->


              <fieldset>
                <legend>Dirección del usuario</legend><br>
                <label>Estado de procedencia</label>
                <select class="caja" name="estado">
                    <?php
                      $query = $link -> query ("SELECT * FROM estado where status = 'A'");
                      while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[id_estado].'">'.$valores[estado].'</option>';
                      }
                    ?>
                  </select>

                  <label for="nombre">Ciudad </label>
                  <input type="text" placeholder="Ciudad" size="28" name = "ciudad"/>

                  <label for="nombre">Colonia </label>
                  <input type="text" placeholder="Colonia" size="28" name = "colonia"/><br><br>

                  <label for="nombre">Calle  </label>
                  <input type="text" placeholder="Calle" size="35" name = "calle"/>

                  <label for="nombre">Código postal  </label>
                  <input type="number" name = "CP" value = "1" min = "1" max = "1000000" step = "1"/>

                  <label for="nombre">Número Interior  </label>
                  <input type="number" name = "NI" value = "1" min = "1" max = "1000000" step = "1"/>

                  <label for="nombre">Número Exterior  </label>
                  <input type="number" name = "NE" value = "1" min = "1" max = "1000000" step = "1"/><br><br><br>

                  <label for="nombre">Número de teléfono  </label>
                  <input type="number" name = "telefono" value = "1" min = "1"  step = "1"/><br><br>
                </fieldset>
                <!--
                <span class="msg-error"><?php echo "$estado_err"; ?></span>
                <span class="msg-error"><?php echo "$ciudad_err"; ?></span>
                <span class="msg-error"><?php echo "$colonia_err"; ?></span>
                <span class="msg-error"><?php echo "$calle_err"; ?></span>
                <span class="msg-error"><?php echo "$cp_err"; ?></span>
                <span class="msg-error"><?php echo "$ni_err"; ?></span>
                <span class="msg-error"><?php echo "$ne_err"; ?></span>
                <span class="msg-error"><?php echo "$num_err"; ?></span>-->


        <!--  <span class="msg-error"><?php echo "$ready_err"; ?></span><br>-->


        </div>
        <input type="submit" id="enviar" value="Registrar" class="button"/>
      </form>


  </body>
</html>

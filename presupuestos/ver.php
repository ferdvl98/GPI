<?php

require "conexion.php";

?>


<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos-ab.css">
  <script src="jquery-3.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {



      var tipo2 = $("#tipos").val();
      var nn2 = $("#asig").val();

      function mostrar_datos(tipo, an) {
        $.ajax({
          url: "code-ver.php",
          method: "POST",
          data: {
            tipo: tipo,
            an: an
          },
          success: function(data) {
            $("#result").html(data)
            //alert(data);
          }
        });
      }
      mostrar_datos(tipo2, nn2);

      $('#tipos').change(function() {
        var tipo = $(this).val();
        var an = $("#asig").val();
        mostrar_datos(tipo, an);
      });

      $('#asig').change(function() {
        var tipo = $("#tipos").val();
        var an = $("#asig").val();
        mostrar_datos(tipo, an);
      });


    });
  </script>
  </hed>

<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">
      <legend>Presupuestos</legend>

      <select name="asig" id="asig" class="caja">
        <option value="no">No Asigandos</option>
        <option value="si">Asignados</option>
      </select>
      <label for="nombre">Tipo de Presupuesto</label>
      <select id="tipos" name="tipos" class="caja">
        <?php
        $query = $link->query("SELECT * FROM `tipo` WHERE status = 'A'");
        while ($valores = mysqli_fetch_array($query)) {
          echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
        }
        ?>
      </select>

      <legend></legend>
      <div id="container">
        <div id="result"></div>
      </div>
    </form>
  </div>

</body>

</html>
<?php
require "conexion.php";

$id = $_GET["id"];
//echo "$id";

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Proyecto</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos-ab.css">
  <script src="jquery-3.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      function vyt() {
        var tipo = $("#pres").val();
        //alert(tipo);
        $.ajax({
          url: "vyt.php",
          method: "POST",
          data: {
            tipo: tipo
          },
          success: function(data) {
            $("#result").html(data)
          }
        });
      }
      vyt();
      $("#pres").change(function() {
        //obtener_datos();
        //totalv();
        vyt();
      });

      function borrar2() {
        $.ajax({
          url: "borrar2.php",
          method: "POST",
          success: function(data) {
            obtener_datos();
            totalv();
          }
        });
      }

      function totalv() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "total.php?id=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            $("#result4").html(data)
          }
        });
      }



      function obtener_datos() {
        $.ajax({
          url: "code.php?id=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            $("#result3").html(data)
          }
        })
      }

      $("#crear").click(function() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "crear-p.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            alert(data);
            borrar2();
          }
        });
        return true;
      });

      $("#agregarv").click(function() {
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          url: "tabla.php",
          method: "POST",
          data: datos,
          success: function(data) {
            $("#result2").html(data)

          }
        });

      });

      $("#agregar").click(function() {
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          url: "agregar.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            alert(data);
            obtener_datos();
            totalv();

          }
        });

      });

      $(document).on("click", "#eliminar", function() {
        if (confirm("¿Estas seguro que desea eliminar registro?")) {
          var id = $(this).data("id");
          $.ajax({
            url: "eliminar.php",
            method: "POST",
            data: {
              id: id
            },
            success: function(data) {
              obtener_datos();
              alert(data);
              totalv();
            }
          });
          return false;

        };
      });

      $("#cancelar").click(function() {
        if (confirm("¿Estas seguro que desea cancelar los registros?")) {
          $.ajax({
            url: "borrar.php?id=<?php echo $id; ?>",
            method: "POST",
            success: function(data) {
              obtener_datos();
              totalv();
              alert(data);
            }
          });
        };
      });

      //mostrar();
      obtener_datos();
      totalv();
      borrar2();

    });
  </script>
</head>

<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">
      <fieldset>
        <legend>Nuevo Proyecto</legend>
        <div class="dos">
          <label for="nombre">Nombre</label>
          <input class="uno" type="text" placeholder="Nombre del proyecto" size="35" name="nombre" id="dis" required="" list ="proyecto" autocomplete="off"/>
          <datalist id="proyecto">
            <?php
                $query = $link->query("SELECT * FROM `proyecto`");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'. $valores['nombre'] . '">'.'</option>';
                }
            ?>
        </datalist>
          <label for="">Presupuesto de </label>
          <select class="caja" name="presupuesto" id="pres">
            <option value="s" selected>- Seleccione -</option>
            <?php
            $query = $link->query("SELECT * FROM `tipo` WHERE status = 'A'");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
            }
            ?>
          </select>
        </div>
        <fieldset>
          <legend></legend>

          <div id="result"></div>
          <button type="button" id="agregarv" class="button2">Ver</button>
          <button type="button" id="agregar" class="button2">Agregar</button>
        </fieldset>
        <fieldset>
          <legend></legend>
          <div id="result2"></div>
        </fieldset>
        <fieldset>
          <legend>Agregados</legend>
          <div id="result3"></div>
          <div id="result4"></div>
        </fieldset>

      </fieldset>

      <div class="botones">
        <button type="button" id="crear" class="button3">Crear</button>
        <button type="button" id="cancelar" class="button3">Cancelar</button>

      </div>
    </form>
  </div>
</body>

</html>
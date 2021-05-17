<?php
$id = $_GET["id"];

require 'conexion.php';

// Tareas
$sql = "SELECT id, nombre FROM tareas where id_per_pues = $id";
$query = mysqli_query($link, $sql);
$filas = mysqli_fetch_all($query, MYSQLI_ASSOC);

//Encargado
$sql2 = "SELECT asp.id, p.nombre, po.puesto from as_puesto as asp INNER JOIN cuentas as p on asp.id_persona = p.id_user INNER JOIN puesto as po ON asp.id_puesto = po.id_puesto where po.`id_puesto` = 3 ORDER BY p.nombre ";
$query2 = mysqli_query($link, $sql2);
$filas2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);

//Trabajador - Plantilla
$sql3 = "SELECT id, Nombre, Apellido_Paterno,Apellido_Materno FROM trabajador WHERE movimiento = 'Alta'";
$query3 = mysqli_query($link, $sql3);
$filas3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);

//Categtoria
$sql4 = "SELECT id, nombre FROM categoria WHERE STATUS = 'A'";
$query4 = mysqli_query($link, $sql4);
$filas4 = mysqli_fetch_all($query4, MYSQLI_ASSOC);

mysqli_close($link);
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
      var total = $('#total');

      function obtener_dat() {
        $.ajax({
          url: "code3.php?id=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            $("#result3").html(data);
          }
        });

      }
      obtener_dat();

      function obtener_datos() {
        $.ajax({
          url: "code2.php?id=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            $("#result2").html(data);
          }
        });

      }
      obtener_datos();

      function obtener_total(id_proy) {
        $.ajax({
          url: "code_total2.php",
          method: "POST",
          data: {
            id_proy: id_proy
          },
          success: function(data) {
            //alert(data);
            $("#result").html(data);
          }
        });
      }

      $('#proyectos').change(function() {
        var proy = $(this).val();
        //obtener_total(proy);
        $.ajax({
          url: "aux_tareas2.php",
          method: "POST",
          data: {
            id_proy: proy
          },
          success: function(data) {
            //mostrar_datos();
            //alert(data);
            $("#total").val(data);
          }
        });
      });

      function obtener_user(user) {
        $.ajax({
          url: "user2.php",
          method: "POST",
          data: {
            user: user
          },
          success: function(data) {
            $("#result").html(data);
          }
        });

      }

      $('#user').change(function() {
        var user = $(this).val();
        obtener_user(user);

      });

      $("#enviar").click(function() {
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          url: "registrar2.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            //mostrar_datos();
            alert(data);
            obtener_datos();
          }
        });
      });

      $(document).on("click", "#eliminar", function() {
        if (confirm("¿Está seguro que desea eliminar la tarea?")) {
          var id = $(this).data("id");
          alert(id);
          $.ajax({
            url: "eliminara.php?id2=<?php echo $id; ?>",
            method: "POST",
            data: {
              id: id
            },
            success: function(data) {
              obtener_datos();
              alert(data);
            }
          });
          return false;

        };
      });

      $("#cancela").click(function() {
        if (confirm("¿Está seguro que desea cancelar las tareas?")) {
          $.ajax({
            url: "cancelar2.php?id2=<?php echo $id; ?>",
            method: "POST",
            success: function(data) {
              obtener_datos();
              alert(data);
            }
          });
          return false;
        }

      });

      $("#guardar").click(function() {
        var user = $("#user").val();
        $.ajax({
          url: "guardar2.php?id2=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            obtener_datos();
            alert(data);
            obtener_user(user);
          }
        });
        return false;
      });

      // box categoria
      $('#categoria').click(function() {
        var categoria = $("#formulario").serialize();
        // alert(categoria);
      });

      // box plantilla
      $('#plantilla').click(function() {
        var plantilla = $("#formulario").serialize();
        // alert(plantilla);
      });

      //Asignar (Prev de plantilla)
      $("#agregarPlantilla").click(function() {
        var alldatos = $("#formulario").serialize();
        $.ajax({
          url: "registrar3.php?id=<?php echo $id; ?>",
          method: "POST",
          data: alldatos,
          success: function(data) {
            alert(data);
            obtener_datos();
          }
        });
      });


    });
  </script>
</head>

<body>
  <form class="formulario2" id="formulario" method="POST">
    <div class="contenedor">
      <legend>Asignar Presupuesto a Supervisor</legend>
      <center>
        <label for="nombre">Responsable</label>
        <select class="caja" name="responsable" id="user">
          <option value="s" selected>- Seleccione -</option>
          <?php foreach ($filas2 as $op) : //llenar las opciones del primer select
          ?>
            <option value="<?= $op['id'] ?>"><?= $op['nombre'] . " - " . $op['puesto'] ?></option>
          <?php endforeach; ?>
        </select>

        <label for="blanco">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>

        <label for="nombre">Plantilla</label>
        <select class="caja" name="plantilla" id="plantilla">
          <option value="s" selected>- Trabajador -</option>
          <?php foreach ($filas3 as $op) : //llenar las opciones del primer select
          ?>
            <option value="<?= $op['id'] ?>"><?= $op['Nombre'] ." ". $op['Apellido_Paterno']." ".$op['Apellido_Materno'] ?></option>
          <?php endforeach; ?>
        </select>
        <button type="button" id="agregarPlantilla" class="button2">Agregar</button>
        <hr>

        <!-- Apartado para previsualizar la pantilla -->
        <div id="resultP"></div>

        <hr>

        <label for="nombre">Identificación: </label>
        <input type="text" placeholder="Identificación" size="10" name="identificacion" id="nss" required="" />

        <label for="blanco">&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>

        <label for="nombre">Categoría</label>
        <select class="caja" name="categoria" id="categoria">
          <option value="s" selected>- Seleccione -</option>
          <?php foreach ($filas4 as $op) : //llenar las opciones del primer select
          ?>
            <option value="<?= $op['id'] ?>"><?= $op['nombre'] ?></option>
          <?php endforeach; ?>
        </select>

      </center>
      <legend>&nbsp; &nbsp;Horas Hombre</legend>
      <center>
        <label for="nombre">Presupuesto: </label>
        <input type="number" id="horasH" placeholder="Total $" size="20" name="presupuestoH" id="presh" min="0" required="" />

        <label for="blanco">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>

        <label for="nombre">Tarea: </label>
        <input type="text" placeholder="Tarea" size="60" name="tarea" id="tarea" required="" />
        <button type="button" id="asignar" class="button2">Asignar</button>
      </center>
      <legend></legend>
      <div id="container">
        <!-- <div id="result"></div> -->
        <legend></legend>
        <div id="result3"></div>
      </div>
      <div class="botones">
        <button type="submit" id="guardar" class="button3">Guardar</button>
        <button type="submit" id="cancela" class="button3">Cancelar</button>
      </div>
    </div>
  </form>

</body>

</html>
<?php

require_once "conexion.php";

$id = $_GET["id"];
//$id = 7;
//echo $id;

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

      function obtener_auxt3() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "auxt3.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            $("#result").html(data);
          }
        });
      }
      $("#a").change(function() {
        obtener_auxt3();
        //alert($(this).val())
      });

      function actualizar_datos(id, texto, columna) {
        $.ajax({
          url: "actualizar_su.php",
          method: "POST",
          data: {
            id: id,
            texto: texto,
            columna: columna
          },
          success: function(data) {
            obtener_auxt3();
            alert(data);
          }
        });
      }


      $(document).on("click", "#eliminar", function() {
          var id = $(this).data("id");
          location.href='../excel/excel.php?id=' + id;
        return false;
      });


      obtener_auxt3();
      $("#agregar").click(function() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "agregar_super.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            obtener_auxt3();
            //totalv();
            alert(data);
          }
        });
      });

      $("#guardar").click(function() {
        var datos = $("#formulario").serialize();
        $.ajax({
          url: "guardar3.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            obtener_auxt3();
            //totalv();
            alert(data);
          }
        });
      });

      $("#cancelar").click(function() {
        if (confirm("¿Estas seguro que desea eliminar registro?")) {
          var datos = $("#formulario").serialize();
          $.ajax({
            url: "cancelar3.php?id=<?php echo $id; ?>",
            method: "POST",
            data: datos,
            success: function(data) {
              obtener_auxt3();
              //totalv();
              alert(data);
            }
          });
        }
      });

    });
  </script>
</head>

<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">
      <div class="col-auto text-center">

        <legend>Presupuesto</legend>
        <label for="nombre">Presupuesto</label><br>
        <select class="caja" name="pres[]" style="width:1000px" id="a" multiple>
          <?php
          $query = $link->query("SELECT t3.id, concat_ws('', py.nombre,' - ',ps.nombre,' - ', t.nombre,' - ', a.nombre, ' - ',d.nombre,' - ', ps2.concepto,': $', t3.presupuesto) as a
              FROM `tareas3` as t3 INNER JOIN tareas2 as t2 on t2.id = t3.`id_tarea` INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as
              py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto
              INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina
              WHERE t3.`id_cuenta` = $id");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id'] . '">' . $valores['a'] . '</option>';
          }
          ?>
        </select>
        <legend>Jefe de equipo</legend>
        <label for="nombre">Jefe de Equipo</label>
        <select class="caja" name="je">
          <?php
          $query = $link->query("SELECT id,nss, nombre , Apellido_Paterno, Apellido_Materno FROM `trabajador` WHERE movimiento = 'Alta'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id'] . '">' . $valores['nss'] . " - " . $valores['nombre'] . " " . $valores['Apellido_Paterno'] . " " . $valores['Apellido_Materno'] . '</option>';
          }
          ?>
        </select>
        <label for="nombre">Inicio: </label>
        <input type="date" name="inicio">
        <label for="nombre">Fin: </label>
        <input type="date" name="fin">
        <button type="button" id="agregar" class="button2">Agregar</button>


      </div>

      <legend></legend>
      <div id="container">
        <div id="result"></div>
      </div>

    </form>
  </div>

</body>

</html>
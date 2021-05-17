<?php

require_once "conexion.php";

$id = $_GET["id"];
//$id = 6;
//echo "$id";

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

      function obtener_datos() {
        var pres = $("#pres").val()
        var id = <?php echo $id ?>;
        //alert(pres);
        $.ajax({
          url: "code-sup.php",
          method: "POST",
          data: {
            id: id
          },
          success: function(data) {
            $("#result").html(data);
          }
        });
      }


      function obtener_datos2() {
        //var pres = $("#pres").val()
        var sup = $("#sup").val();
        //alert(pres);
        $.ajax({
          url: "code-sup2.php",
          method: "POST",
          data: {
            sup: sup
          },
          success: function(data) {
            $("#result2").html(data);
          }
        });
      }
      obtener_datos2();
      obtener_datos();

      $("#pres").change(function() {
        //obtener_datos();
        obtener_datos2();
        var id = $(this).val();
        //alert(id);
        $.ajax({
          url: "aux_concepto3.php",
          method: "POST",
          data: {
            id: id
          },
          success: function(data) {
            //alert(data);
            $("#hh").val(data);
          }
        });
      });

      $("#agregar").click(function() {
        //var datos = $("#formulario").serialize();
        var pres = $("#pres").val();
        var sup = $("#sup").val();
        var hh = $("#hh").val();
        var id = <?php echo $id ?>
        //alert(datos);
        $.ajax({
          url: "asig-sup.php",
          method: "POST",
          data: {
            id: id,
            pres: pres,
            sup: sup,
            hh: hh
          },
          success: function(data) {
            obtener_datos();
            obtener_datos2();
            //totalv();
            alert(data);
          }
        });
      });

      function actualizar_datos(id, texto, columna) {
        $.ajax({
          url: "modi-sup.php",
          method: "POST",
          data: {
            id: id,
            texto: texto,
            columna: columna
          },
          success: function(data) {
            obtener_datos();
            alert(data);
          }
        });
      }


      $(document).on("blur", "#horas", function() {
        var id = $(this).data("id_horas");
        var nombre = $(this).text();
        nombre = nombre.replace(/,/g, "");
        actualizar_datos(id, nombre, "horas");
      });

      $(document).on("click", "#eliminar", function() {
        if (confirm("¿Estas seguro que desea eliminar registro?")) {
          var id = $(this).data("id");
          actualizar_datos(id, "", "");
        };
        return false;
      });

      $("#guardar").click(function() {
        var id = <?php echo $id ?>;
        $.ajax({
          url: "guardar-sup.php",
          method: "POST",
          data: {
            id: id
          },
          success: function(data) {
            obtener_datos();
            obtener_datos2();
            alert(data);
          }
        });
      });
      $("#sup").change(function() {
        obtener_datos2();
      });

    });
  </script>
</head>

<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">
      <legend>Presupuesto</legend>
      <div class="col-auto text-center">
        <label for="nombre">Presupuesto</label>
        <select class="caja" name="pres" style="width:1000px" id="pres">
          <option value="s">- Seleccione -</option>
          <?php
          $query = $link->query("SELECT t2.`id`, concat_ws('',py.nombre,' - ', ps.nombre, ' - ',t.nombre,' - ', a.nombre, ' - ',
                  d.nombre,' - ', ps2.concepto, ': $',t2.`presupuesto`) as tarea FROM `tareas2` as t2 INNER JOIN tareas as ts on ts.id=t2.`id_tarea`
                  INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 ON ps2.id = ts.id_pres INNER JOIN pres
                  as ps ON ps.id = ps2.id_presupuesto INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN
                  disciplinas as d on d.id = ps2.id_disciplina where t2.`id_cuenta` = $id");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id'] . '">' . $valores['tarea'] . '</option>';
          }
          ?>
        </select>
      </div>

      <legend>Asignar Presupuesto</legend>
      <div class="col-auto text-center">
        <label for="nombre">Supervisor</label>
        <select class="caja" name="super" id="sup">
          <?php
          $query = $link->query("SELECT p.id_user, p.nombre FROM `as_puesto` AS ap INNER JOIN cuentas AS p ON ap.id_persona = p.id_user WHERE ap.id_puesto = 3 AND ap.`status` = 'A'");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="' . $valores['id_user'] . '">' . $valores['nombre'] . '</option>';
          }
          ?>
        </select>
        <label for="nombre">Presupuesto: </label>
        <input type="number" id="hh" placeholder="Presupuesto" name="hh" value="1" min="1" max="1000000" step="1" size="10" />
        <button type="button" id="agregar" class="button2">Asignar</button>
      </div>

      <legend></legend>
      <div id="container">
        <div id="result"></div>
      </div>
      <div class="col-auto text-center">
        <button type="button" id="guardar" class="button2">Guardar</button>
        <button type="button" id="cancelar" class="button2">Cancelar</button>
      </div>
      <div id="container">
        <div id="result2"></div>
      </div>

    </form>
  </div>

</body>

</html>
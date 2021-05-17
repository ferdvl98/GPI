<?php
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Ver Proyecto</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos-ab.css">
  <script src="jquery-3.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var presupuestos = $('#a');

      document.getElementById("status2").style.display = "inline-block";
      document.getElementById("status3").style.display = "none";
      document.getElementById("a").style.display = "none";
      $("#status").change(function() {
        var datos = $(this).val();
        //alert(datos);
        if (datos == 'pres') {
          document.getElementById("status2").style.display = "inline-block";
          document.getElementById("status3").style.display = "none";
          document.getElementById("a").style.display = "none";
        } else if (datos == 'trs') {
          document.getElementById("status2").style.display = "none";
          document.getElementById("status3").style.display = "inline-block";
          document.getElementById("a").style.display = "inline-block";
        } else if (datos == 's') {
          document.getElementById("status2").style.display = "none";
          document.getElementById("status3").style.display = "none";
          document.getElementById("a").style.display = "none";

        }
      });

      $("#status3").change(function() {
        var gs = $(this).val();
        var pyt = $("#p").val();
        var pt = $("#status").val();

        //alert(gs+" "+pyt+" "+pt);
        $.ajax({
          data: {
            gs: gs,
            proy: pyt,
            pt: pt
          }, //variables o parametros a enviar, formato => nombre_de_variable:contenido
          dataType: 'html', //tipo de datos que esperamos de regreso
          type: 'POST', //mandar variables como post o get
          url: 'get_user.php' //url que recibe las variables
        }).done(function(data) { //metodo que se ejecuta cuando ajax ha completado su ejecucion
          presupuestos.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
          presupuestos.prop('disabled', false); //habilitar el select
          //alert("df");
        });
      });

      $("#ver").click(function() {
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          //url: "datos.php",
          url: "datos2.php",
          method: "POST",
          data: datos,
          success: function(data) {
            $("#result").html(data)
          }
        });
      });

      function ver(){
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          //url: "datos.php",
          url: "datos2.php",
          method: "POST",
          data: datos,
          success: function(data) {
            $("#result").html(data)
          }
        });
      }

      $(document).on("click", "#eliminar", function(){
        if(confirm("¿Estas seguro que desea quitar el presupuesto?")){
          var id =$(this).data("id");
          var pt = $("#status3").val();
          //alert(id);
          $.ajax({
            url: "quitar.php",
            method: "POST",
            data: {id: id, pt:pt},
            success: function(data){
              //mostrar();
              alert(data);
              ver();
            }
          })
        };
        return false;
      })

    });
  </script>
  <script>
    function imprim1(imp1) {
      var printContents = document.getElementById('result').innerHTML;
      w = window.open();
      w.document.write(printContents);
      w.document.close(); // necessary for IE >= 10
      w.focus(); // necessary for IE >= 10
      w.print();
      w.close();
      return true;
    }
  </script>
</head>

<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">
      <fieldset>
        <legend>Proyecto</legend>
        <div class="pr">
          <label for="nombre">Seleccione Proyecto</label>
          <select class="caja" name="pro" id="p">
            <option value="s" selected>- Seleccione -</option>
            <?php
            $query = $link->query("SELECT * FROM `proyecto`");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="' . $valores['id_proyecto'] . '">' . $valores['nombre'] . '</option>';
            }
            ?>
          </select>
          <label for="">Ver </label>
          <select id="status" name="accion" class="caja" style="width:200px">
            <option value="s">- Seleccione -</option>
            <option value="pres" selected>Presupuesto</option>
            <option value="trs">Tareas</option>
          </select>

          <label for="">De </label>
          <select style="display:display;" id="status2" name="status2" class="caja" style="width:200px">
            <option value="s" selected>Ver todo</option>
            <?php
            $query = $link->query("SELECT * FROM `tipo` WHERE status = 'A'");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="' . $valores['id'] . '">' . $valores['nombre'] . '</option>';
            }
            ?>
          </select>

          <select style="display:display;" id="status3" name="statuss" class="caja" style="width:200px">
            <option value="s" selected>- Seleccione -</option>
            <option value="g">Gerentes</option>
            <option value="si">Superintendentes</option>
            <option value="su">Supervisores</option>
            <option value="eq">Equipos</option>
          </select>

          <select style="display:display;" id="a" name="a" class="caja" style="width:200px">
            <option value="s">- Seleccione -</option>
          </select>

          <button type="button" id="ver" class="button2">Ver</button>
        </div>

      </fieldset>

      <div id="result">
        <fieldset>
          <legend></legend>
        </fieldset>
      </div>
      <button type="button" class="button4" onclick="javascript:imprim1(result);">Imprimir</button>

    </form>
  </div>
</body>

</html>
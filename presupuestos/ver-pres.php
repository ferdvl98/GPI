<?php
  require_once "conexion.php";
$id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Puestos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          var id = "<?php echo $id; ?>";
          function obtener_datos(id){

          }

          obtener_datos(id);

          $("#status2").change(function(){
            var datos = $("#formulario").serialize();
            //alert(datos);
            $.ajax({
              url: "veeeer.php?id=<?php echo $id; ?>",
              method: "POST",
              data: datos,
              success: function(data){
                $("#result").html(data)
                //alert(data);
              }
            })
          });
    });

    </script>
  </head>
<body>
  <div class="contenedor">
    <form class="formulario2" id="formulario" method="POST">

      <label for="nombre">Seleccione Proyecto</label>
      <select class="caja" name ="pro" id = "p">
        <option value="s" selected>- Seleccione -</option>
          <?php
            $query = $link -> query ("SELECT py.id_proyecto, py.nombre FROM `tareas` as t INNER JOIN proyecto as py on py.id_proyecto = t.`id_proyecto`
              WHERE t.`id_cuenta` = $id GROUP BY py.id_proyecto");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="'.$valores[id_proyecto].'">'.$valores[nombre].'</option>';
            }
          ?>
        </select>

        <label for="">De </label>
        <select style="display:display;" id="status2" name="status2"  class = "caja">
          <option value="s" selected disabled>- Seleccione -</option>
          <?php
            $query = $link -> query ("SELECT * FROM `tipo` WHERE status = 'A'");
            while ($valores = mysqli_fetch_array($query)) {
              echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
            }
          ?>
          </select>



      <div>
          <legend>Presupuestos Asignados - Gerentes</legend>
      <div id="result"></div>

      </div>
    </form>
  </div>

</body>

<?php
    $id = $_GET["id"];
    //$id = 4;
  require 'conexion.php';


  $sql = "SELECT at.id, concat_ws('', p.nombre,' - ', ps.nombre,' - ', t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', p2.concepto,': $', at.presupuesto) as asunto FROM `tareas` AS at INNER JOIN proyecto AS p ON p.id_proyecto = at.`id_proyecto` INNER JOIN presupuestos2 AS p2 ON p2.id = at.`id_pres` INNER JOIN pres AS ps ON ps.id = p2.id_presupuesto INNER JOIN tipo AS t ON t.id = ps.id_tipo INNER JOIN area AS a ON a.id = p2.id_area INNER JOIN disciplinas AS d ON d.id = p2.id_disciplina WHERE at.id_cuenta = $id";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  //mysqli_close($link);

  $sql2 = "SELECT asp.id, p.nombre, po.puesto from as_puesto as asp INNER JOIN cuentas as p on asp.id_persona = p.id_user INNER JOIN puesto as po
  ON asp.id_puesto = po.id_puesto where asp.status = 'A' AND p.status = 'A' AND po.status = 'A' and po.`id_puesto` = 2 ORDER BY p.nombre ";
  $query2 = mysqli_query($link, $sql2);
  $filas2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
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
      $(document).ready(function(){
           var total = $('#total');

          function obtener_datos(){
              $.ajax({
              url: "code2.php?id=<?php echo $id;?>",
              method: "POST",
              success: function(data){
                  $("#result2").html(data);
              }
            });

          }
          obtener_datos();
          function obtener_total(id_proy){
            $.ajax({
              url: "code_total2.php",
              method: "POST",
              data: {id_proy:id_proy},
              success: function(data){
                //alert(data);
                $("#result").html(data);
              }
            });
          }

          $('#proyectos').change(function(){
              var proy = $(this).val();
              //obtener_total(proy);
              $.ajax({
              url: "aux_tareas2.php",
              method: "POST",
              data: {id_proy:proy},
              success: function(data){
                //mostrar_datos();
                //alert(data);
                $("#total").val(data);
              }
            });
          });
          function obtener_user(user){
              $.ajax({
              url: "user2.php",
              method: "POST",
              data: {user:user},
              success: function(data){
                  $("#result").html(data);
              }
            });

          }

          $('#user').change(function(){
              var user = $(this).val();
              obtener_user(user);

          });

          $("#enviar").click(function(){
            var datos = $("#formulario").serialize();
            //alert(datos);
            $.ajax({
              url: "registrar2.php?id=<?php echo $id;?>",
              method: "POST",
              data: datos,
              success: function(data){
                //mostrar_datos();
                alert(data);
                obtener_datos();
              }
            });
        });

        $(document).on("click", "#eliminar", function(){
        if(confirm("¿Está seguro que desea eliminar la tarea?")){
          var id =$(this).data("id");
          //alert(id);
          $.ajax({
            url: "eliminara.php?id2=<?php echo $id;?>",
            method: "POST",
            data: {id:id},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          });
          return false;

        };
      });

      $("#cancela").click(function(){
            if(confirm("¿Está seguro que desea cancelar las tareas?")){
              $.ajax({
                url: "cancelar2.php?id2=<?php echo $id;?>",
                method: "POST",
                success: function(data){
                  obtener_datos();
                          alert(data);
                }
              });
              return false;
            }

        });

        $("#guardar").click(function(){
            var user = $("#user").val();
            $.ajax({
              url: "guardar2.php?id2=<?php echo $id;?>",
              method: "POST",
              success: function(data){
                obtener_datos();
                alert(data);
                obtener_user(user);
              }
            });
            return false;
        });

      });
    </script>
  </head>
  <body>
    <form class="formulario2" id="formulario" method="POST">
      <div class="contenedor">
        <div class="col-auto text-center">
        <legend>Asignar Presupuesto</legend>
        <label for="nombre">Presupuesto</label>
        <select class="caja" name ="proy" id="proyectos" style="width:1000px">
          <option value="s" selected>- Seleccione -</option>
          <?php foreach ($filas as $op): //llenar las opciones del primer select ?>
          <option value="<?= $op['id'] ?>"><?= $op['asunto']?></option>
          <?php endforeach; ?>
        </select><br>
        <label for="nombre">Responsable</label>
            <select class="caja" name ="empl" id="user">
              <option value="s" selected>- Seleccione -</option>
              <?php foreach ($filas2 as $op): //llenar las opciones del primer select ?>
              <option value="<?= $op['id'] ?>"><?= $op['nombre']. " - ".$op['puesto']?></option>
              <?php endforeach; ?>
            </select>

            <label for="nombre">Presupuesto: </label>
            <input type="number" id="total" placeholder="Total $" size="20" name="total" id="tarea"  min="0" required=""/>

            <button type="button" id="enviar" class="button2">Asignar</button>
          </div>
            <legend></legend>
            <div id = "container">
                <div id="result"></div>
                <legend></legend>
                <div id="result2"></div>
          </div>
        <div class="botones">
            <button type="submit" id="guardar" class="button3">Guardar</button>
            <button type="submit" id="cancela" class="button3">Cancelar</button>
        </div>
      </div>
    </form>

  </body>
</html>

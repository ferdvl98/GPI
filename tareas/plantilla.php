<?php

  require_once "conexion.php";

  $id = $_GET["id"];
  //$id = 7;
  //echo $id;

  $a = "";

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
        var pres = $("#pres").val();    
        
        $.ajax({
              url: "code10.php",
              method: "POST",
              data: {pres:pres},
              success: function(data){
                $("#result").html(data)
              }
            });

        function obtener_datos(){
          var pres = $("#pres").val();
            $.ajax({
              url: "code4.php",
              method: "POST",
              data: {pres:pres},
              success: function(data){
                $("#result").html(data)
              }
            });
          }
          
          function obtener_datos2(){
            var pres = $("#pres").val();
              $.ajax({
                url: "code5.php",
                method: "POST",
                data: {pres:pres},
                success: function(data){
                  $("#result2").html(data)
                }
              });
            }
            function obtener_datos3(){
              var pres = $("#pres").val();
                $.ajax({
                  url: "code6.php",
                  method: "POST",
                  data: {pres:pres},
                  success: function(data){
                    $("#result3").html(data)
                  }
                });
              }
          function actualizar_datos(id, n){
              $.ajax({
                url: "eliminar1.php",
                method: "POST",
                data: {id:id, n:n},
                success: function(data){
                  alert(data);
                  obtener_datos();
                }
              });
            }

          obtener_datos();
          obtener_datos2();
          obtener_datos3()
          $("#pres").change(function(){
            obtener_datos();
            obtener_datos2();
            obtener_datos3()
          });
        $("#agregar1").click(function(){
            var datos = $("#formulario").serialize();
            $.ajax({
              url: "agregar_plan.php",
              method: "POST",
              data: datos,
              success: function(data){

                //totalv();
                alert(data);
                obtener_datos();
                //borrar2();
              }
            });

        });

        $("#agregar2").click(function(){
            var datos = $("#formulario").serialize();
            $.ajax({
              url: "agregar_em.php",
              method: "POST",
              data: datos,
              success: function(data){

                //totalv();
                alert(data);
                obtener_datos2();
                //borrar2();
              }
            });

        });
        $("#agregar3").click(function(){
            var datos = $("#formulario").serialize();
            $.ajax({
              url: "agregar_tar.php",
              method: "POST",
              data: datos,
              success: function(data){
                alert(data);
                obtener_datos3();
              }
            });
        });

        $("#excel").click(function(){
          var a = $("#pres").val();
          location.href='../excel/excel.php?id=' + a+'&a='+<?php echo $id;?>;
          //alert('../excel/excel.php?id=' + a+'&a='+<?php echo $id;?>);

        });

        

        $(document).on("click", "#eliminar", function(){
        if(confirm("¿Estas seguro que desea eliminar registro?")){
          var id =$(this).data("id");
          actualizar_datos(id, "1");
        };
        return false;
      });

      });
    </script>
  </head>
  <body>
    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
        <div class="col-auto text-center">
          <legend>Equipos</legend>
          <label for="nombre">Jefe de Equipo</label>
          <select class="caja" name ="pres" style="width:1000px" id = "pres">
              <?php
                $query = $link -> query ("SELECT e.id, concat_ws('',py.nombre,' - ', ps.nombre, ' - ',t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', ps2.concepto,': ',
                 tr.NSS, ' - ',tr.nombre, ' ', tr.Apellido_Paterno, ' ',tr.Apellido_Materno) as a FROM `equipos` as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id 
                 INNER JOIN tareas3 as t3 on t3.id = pe.id_pres INNER JOIN tareas2 as t2 on t2.id = t3.id_tarea INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN
                  proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = 
                  ps2.id_presupuesto INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = 
                  ps2.id_disciplina INNER JOIN trabajador as tr ON tr.id = e.`id_trabajador` where t3.id_cuenta = $id group by e.id");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores['id'].'">'.$valores['a'].'</option>';
                }
              ?>
            </select>
            <legend>Plantilla</legend>
            <select class="caja" name ="tra" id = "tra" style="width:450px">
                <?php
                  $query = $link -> query ("SELECT t.id, t.nss, t.nombre, t.Apellido_Paterno, t.Apellido_Materno FROM trabajador as t where not EXISTS (SELECT * FROM equipos as e WHERE e.id_trabajador = t.id) and t.Movimiento = 'Alta'");
                  while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id'].'">'.$valores['nss']." - ".$valores['nombre']." ".$valores['Apellido_Paterno']." ".$valores['Apellido_Materno'].'</option>';
                  }
                ?>
              </select>
              <label for="nombre">Categoria</label>
              <select class="caja" name ="cat" id = "cat" style="width:250px">
                  <?php
                    $query = $link -> query ("SELECT id,nombre FROM `categoria` WHERE status = 'A'");
                    while ($valores = mysqli_fetch_array($query)) {
                      echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                    }
                  ?>
                </select>
                <label for="nombre">Horas </label>
                <input type="number" name = "horas1" id="horas1" value = "1" min = "1" max = "1000000" step = "1" size="10" placeholder="HH"/>
                <button type="button" id="agregar1" class="button2">Agregar</button>
                <div id = "container">
                  <div id="result"></div>
                </div>
              <legend>Equipo Mayor</legend>
              <input type="text" name = "em"  placeholder="Equipo Mayor" size="25" required=""/>
              <label for="nombre">Horas </label>
              <input type="number" name = "hh1" value = "1" min = "1" max = "1000000" step = "1" size="10" placeholder="HH"/>
              <button type="button" id="agregar2" class="button2">Agregar</button>
              <div id = "container">
                <div id="result2"></div>
              </div>
              <legend>Tareas</legend>
              <textarea name="tareas" rows="5" cols="200" placeholder="Describa las Tareas"></textarea><br>
              <label for="nombre">Horas </label>
              <input type="number" name = "hh2" value = "1" min = "1" max = "1000000" step = "1" size="10" placeholder="HH"/>
              <button type="button" id="agregar3" class="button2">Agregar</button>
              <div id = "container">
                <div id="result3"></div>
              </div>
              <legend>Análisis de Desempeño</legend>
              <textarea disabled id = "ad" name="ad" rows="5" cols="200" placeholder="Una vez que se haya importado la Hoja de Tarabajo, aquí podrá ver el Análisis de Desempeño"></textarea><br>
              <legend>Acciones</legend>
              <textarea disabled id = "ac" name="accion" rows="5" cols="200" placeholder="Una vez que se haya importado la Hoja de Tarabajo, aquí podrá ver las Acciones "></textarea><br>
              <br>
              <button type="button" id="excel" class="button2">Descargar</button>
              
        </div>
      </form>
    </div>

  </body>
</html>

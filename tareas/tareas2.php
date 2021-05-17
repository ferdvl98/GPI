<?php
  require 'conexion.php';

  $id = $_GET["id"];
  //echo $id;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tareas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script src="jquery.maskedinput.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        var presupuestos = $('#presupuestos');
        var area = $('#area');
        var tipos2 = $('#tipos');
        var proy2 = $('#proyectos');
        var disc = $('#disc');
        var concepto = $('#concepto');
        var total = $('#total');
        var name = t_pres = id_pres = id_area2 = "";




        //tipos2.prop('disabled', true);
        $('#proyectos').change(function(){
            $("#total").val("");
            $("#presupuestos").find('option').not(':first').remove();
            $("#area").find('option').not(':first').remove();
            $("#disc").find('option').not(':first').remove();
            $("#concepto").find('option').not(':first').remove();
            $("#tipos").val('s');
            $("#presupuestos").val('s');
            $("#area").val('s');
            $("#disc").val('s');
            $("#concepto").val('s');
            /*presupuestos.prop('disabled', true);
            area.prop('disabled', true);
            disc.prop('disabled', true);
            concepto.prop('disabled', true);*/

            var proy = $(this).val();
            //alert(proy);
            if(proy !== 's'){
              tipos2.prop('disabled', false);
            }else{
              /*tipos2.prop('disabled', true);
              presupuestos.prop('disabled', true);
              area.prop('disabled', true);
              disc.prop('disabled', true);
              concepto.prop('disabled', true);*/

            }
        });

        //selecionar tipo el presupuesto del proyecto
        $('#tipos').change(function(){
            $("#total").val("");
          $("#presupuestos").find('option').not(':first').remove();
          $("#area").find('option').not(':first').remove();
          $("#disc").find('option').not(':first').remove();
          $("#concepto").find('option').not(':first').remove();

          $("#area").val('s');
          $("#disc").val('s');
          $("#concepto").val('s');

          /*area.prop('disabled', true);
          disc.prop('disabled', true);
          concepto.prop('disabled', true);*/
          var tipo = $(this).val();
          name = $("#proyectos").val()
          //alert(name);
          if(tipo !== 's'){
            $.ajax({
              data: {tipo:tipo, name:name},
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_tipo.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
              presupuestos.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
              presupuestos.prop('disabled', false); //habilitar el select
              //alert(data);
            });
          }else{ //en caso de seleccionar una opcion no valida
            presupuestos.val('s'); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            //presupuestos.prop('disabled', true); //deshabilitar el select
          }
        });


        function obtener_total(id_proy, tipo, nom_pres){
            $.ajax({
              url: "code_total.php",
              method: "POST",
              data: {id_proy:id_proy, tipo:tipo, nom_pres:nom_pres},
              success: function(data){
                //alert(data);
                $("#result").html(data)
              }
            });
          }
          function mostrar_datos_user(id){
              $.ajax({
                url: "user.php",
                method: "POST",
                data: {id:id},
                success: function(data){
                  $("#result3").html(data)
                }
              });
          }

          function mostrar_datos(){
              $.ajax({
                url: "code.php?id=<?php echo $id; ?>",
                method: "POST",
                success: function(data){
                  $("#result2").html(data)
                }
              });
            }
            function limpiar(){
                $.ajax({
                  url: "limpiar.php",
                  method: "POST",
                  success: function(data){
                  }
                });
              }
            mostrar_datos();


        function print_total(){
          pres = $("#presupuestos").val();//presupuesto
          proyecto = $("#proyectos").val();//id del proyecto
          tipo = $("#tipos").val();//tipo

          $.ajax({
            data: {pres:pres, proyecto:proyecto, tipo:tipo},
            dataType: 'html', //tipo de datos que esperamos de regreso
            type: 'POST', //mandar variables como post o get
            url: 'get_total.php' //url que recibe las variables
          }).done(function(data){
            //alert(data); //metodo que se ejecuta cuando ajax ha completado su ejecucion
            total.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
            //area.prop('disabled', false); //habilitar el select
          });

        }

        $('#presupuestos').change(function(){
            $("#total").val("");
          $("#area").find('option').not(':first').remove();
          $("#disc").find('option').not(':first').remove();
          $("#concepto").find('option').not(':first').remove();

          $("#disc").val('s');
          $("#concepto").val('s');
          /*disc.prop('disabled', true);
          concepto.prop('disabled', true);*/

          var nom_pres = $(this).val();//id_presupuesto
          name = $("#proyectos").val();//id del proyecto
          t_pres = $("#tipos").val();//tipo

          obtener_total(name, t_pres, nom_pres);

          if(nom_pres !== 's'){
            $.ajax({
              data: {id_pres:nom_pres, id_proy:name, t_pres:t_pres},
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_area.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
              area.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
              print_total();
              //area.prop('disabled', false); //habilitar el select
            });
          }else{ //en caso de seleccionar una opcion no valida
            area.val('s'); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            //area.prop('disabled', true); //deshabilitar el select
          }
        });

        $('#area').change(function(){
            $("#total").val("");
          $("#disc").find('option').not(':first').remove();
          $("#concepto").find('option').not(':first').remove();
          $("#concepto").val('s');
          //concepto.prop('disabled', true);

          var id_area = $(this).val();//id_area
          name = $("#proyectos").val();//id del proyecto
          t_pres = $("#tipos").val();//tipo
          id_pres = $("#presupuestos").val(); //id del presupuesto

          if(id_area !== 's'){
            $.ajax({
              data: {id_area:id_area, id_proy:name, t_pres:t_pres, id_pres:id_pres},
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_dis.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
              //alert(data);
              disc.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
              disc.prop('disabled', false); //habilitar el select
            });
          }else{ //en caso de seleccionar una opcion no valida
            disc.val('s'); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            //disc.prop('disabled', true); //deshabilitar el select
          }
        });

        $('#disc').change(function(){
            $("#total").val("");
          $("#concepto").find('option').not(':first').remove();
          var id_dis = $(this).val();//id_disciplina
          name = $("#proyectos").val();//id del proyecto
          t_pres = $("#tipos").val();//tipo
          id_pres = $("#presupuestos").val(); //id del presupuesto
          id_area2 = $("#area").val(); //id_area

          if(id_dis !== 's'){
            $.ajax({
              data: {id_area2:id_area2, id_proy:name, t_pres:t_pres, id_pres:id_pres, id_dis:id_dis}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
              dataType: 'html', //tipo de datos que esperamos de regreso
              type: 'POST', //mandar variables como post o get
              url: 'get_concp.php' //url que recibe las variables
            }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
              //alert(data);
              concepto.html(data); //establecemos el contenido html de discos con la informacion que regresa ajax
              concepto.prop('disabled', false); //habilitar el select
            });
          }else{ //en caso de seleccionar una opcion no valida
            concepto.val('s'); //seleccionar la opcion "- Seleccione -", osea como reiniciar la opcion del select
            //concepto.prop('disabled', true); //deshabilitar el select
          }
        });

        $('#concepto').change(function(){
            $("#total").val("");
            var conc = $(this).val();
            var dis = $("#disc").val();
            name = $("#proyectos").val();//id del proyecto
            t_pres = $("#tipos").val();//tipo
            id_pres = $("#presupuestos").val(); //id del presupuesto
            id_area2 = $("#area").val(); //id_area

            $.ajax({
              url: "conc_total.php",
              method: "POST",
              data: {conc:conc, dis:dis, id_proy:name, t_pres:t_pres, id_pres:id_pres, id_area2:id_area2},
              success: function(data){
                //mostrar_datos();
                //alert(data);
                $("#total").val(data);
              }
            });
        });

        var id = "<?php echo $id; ?>";

        $("#enviar").click(function(){
            var datos = $("#formulario").serialize();
            //alert(datos);
            $.ajax({
              url: "registrar.php?id=<?php echo $id; ?>",
              method: "POST",
              data: datos,
              success: function(data){
                mostrar_datos();
                alert(data);
              }
            });
        });


        $("#cancela").click(function(){
            if(confirm("¿Está seguro que desea cancelar las tareas?")){
              $.ajax({
                url: "cancelar.php?id=<?php echo $id; ?>",
                method: "POST",
                success: function(data){
                  mostrar_datos();
                  alert(data);
                }
              });
            }

        });


        $("#guardar").click(function(){
            var user = $("#user").val();
            $.ajax({
              url: "guardar.php?id2=<?php echo $id; ?>",
              method: "POST",
              data: {id:id, user:user},
              success: function(data){
                limpiar();
                mostrar_datos();
                mostrar_datos_user(user);
                alert(data);
              }
            });
            return false;
        });

        $(document).on("click", "#eliminar", function(){
        if(confirm("¿Está seguro que desea eliminar la tarea?")){
          var id =$(this).data("id");
          var conc = $('#concepto').val();//a
          name = $("#proyectos").val();//id del proyecto
          var presupuesto =$(this).data("presupuesto2");
          $.ajax({
            url: "eliminar.php",
            method: "POST",
            data: {id:id, a:conc, id_proy:name, presupuesto:presupuesto},
            success: function(data){
              mostrar_datos();
              alert(data);
            }
          });
          return false;

        };
      });
      function actualizar_datos(id, texto,columna){
        $.ajax({
          url: "actualizar.php",
          method: "POST",
          data: {id: id, texto:texto, columna:columna},
          success: function(data){
            mostrar_datos();
            alert(data);
          }
        });
      }

      $(document).on("blur", "#tarea2", function(){
        var id = $(this).data("id_tarea2");
        var nombre = $(this).text();
        actualizar_datos(id, nombre, "tarea");
      });
      $(document).on("blur", "#presupuesto2", function(){
        var id = $(this).data("id_presupuesto2");
        var nombre = $(this).text();
        actualizar_datos(id, nombre, "presupuesto");
      });
        $('#user').change(function(){
            var id = $("#user").val();
            //alert(id);
            mostrar_datos_user(id);

        });



      });
    </script>
  </head>
  <body>
    <form class="formulario2" id="formulario" method="POST">
      <div class="contenedor">
        <fieldset>
          <legend>Proyecto</legend>
          <label>Proyecto</label>
          <select class="caja" name ="proy" id="proyectos">
            <option value="s" selected>- Seleccione -</option>
            <?php
              $query = $link -> query ("SELECT * FROM proyecto order by id_proyecto");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores[id_proyecto].'">'.$valores[nombre].'</option>';
              }
            ?>
          </select>


          <label for="nombre">Tipo de Presupuesto</label>
          <select id="tipos" name="tipos"  class = "caja">
            <option value="s" selected>- Seleccione -</option>
            <?php
              $query = $link -> query ("SELECT * FROM `tipo` WHERE status = 'A'");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
              }
            ?>
          </select>

          <label>Presupuesto</label>
          <select class="caja" name ="pres" id="presupuestos">
            <option value="s">- Seleccione -</option>
          </select>

          <legend>Presupuesto</legend>
          <label>Área</label>
          <select class="caja" name ="area" id="area">
            <option value="s">- Seleccione -</option>
          </select>

          <label>Disciplina</label>
          <select class="caja" name ="disc" id="disc">
            <option value="s">- Seleccione -</option>
          </select>

          <label>Concepto</label>
          <select class="caja" name ="concepto" id="concepto" >
            <option value="s">- Seleccione -</option>
          </select>

          <legend>Asignar Presupuesto</legend>
          <div class="contenedor">
            <label for="nombre" class="aa">Responsable</label>
            <select class="caja" name ="empl" id="user">
              <option value="s" selected>- Seleccione -</option>
              <?php
                $query = $link -> query ("SELECT c.id_user, c.nombre, p.puesto FROM `as_puesto` as ap INNER JOIN cuentas as c on c.id_user = ap.`id_persona`
                  INNER JOIN puesto as p ON p.id_puesto = ap.`id_puesto` WHERE ap.status = 'A' and c.status = 'A' ORDER BY c.id_user");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_user].'">'.$valores[nombre]." - ".$valores[puesto].'</option>';
                }
              ?>
            </select>

            <label for="nombre">Presupuesto: </label>
            <input type="number" id="total" placeholder="Total $" size="20" name="total" id="tarea"  min="0" required=""/>

            <button type="button" id="enviar" class="button2">Asignar</button>
          </div>
          <legend></legend>
          <div id="result3"></div>
          <legend></legend>
          <div id = "container">
            <div id="result"></div>
            <div id="result2"></div>
          </div>

        </fieldset>
      </div>
      <div class="botones">
        <button type="submit" id="guardar" class="button3">Guardar</button>
        <button type="button" id="cancela" class="button3">Cancelar</button>

      </div>
    </form>


  </body>
</html>

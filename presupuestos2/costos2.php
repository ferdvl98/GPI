<?php
  require "conexion.php";

  $id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <style>
      .contenedor {margin-right:auto;}
    </style>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          function obtener_datos(){
            var pres = $("#pres").val();
              $.ajax({
                url: "code.php?id=<?php echo $id;?>",
                method: "POST",
                data: {pres:pres},
                success: function(data){
                  $("#result").html(data)
                }
              });
          }


            obtener_datos();

            function totalv(){
              var tipo = $("#pres").val();
              $.ajax({
                url: "total.php?id=<?php echo $id;?>",
                method: "POST",
                data: {tipo:tipo},
                success: function(data){
                  $("#result2").html(data)
                }
              });
            }

            totalv();
            $("#pres").change(function(){
              obtener_datos();
              totalv();
            });

          $("#agregar").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "agregar.php?id=<?php echo $id;?>",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);
                  //borrar2();
                }
              });

          });

          function actualizar_datos(id, texto,columna){
            $.ajax({
              url: "actualizar.php?id2=<?php echo $id;?>",
              method: "POST",
              data: {id: id, texto:texto, columna:columna},
              success: function(data){
                obtener_datos();
                alert(data);
                totalv();
              }
            });
          }

          $(document).on("blur", "#nombre", function(){
            var id = $(this).data("id_nombre");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "nombre");
          });

          $(document).on("blur", "#concepto", function(){
            var id = $(this).data("id_concepto");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "concepto");
          });

          $(document).on("blur", "#unidad", function(){
            var id = $(this).data("id_unidad");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "unidad");
          });

          $(document).on("blur", "#cantidad", function(){
            var id = $(this).data("id_cantidad");
            var nombre = $(this).text();
            nombre = nombre.replace(/,/g, "");
            actualizar_datos(id, nombre, "cantidad");
          });

          $(document).on("blur", "#iu", function(){
            var id = $(this).data("id_iu");
            var nombre = $(this).text();
            nombre = nombre.replace(/,/g, "");
            actualizar_datos(id, nombre, "iu");
          });


          $(document).on("click", "#eliminar", function(){
          if(confirm("¿Esta seguro que desea eliminar el registro?")){
            var id =$(this).data("id");
            $.ajax({
              url: "eliminar.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                obtener_datos();
                totalv();
                alert(data);
              }
            })
            return false;

          };
          });
          $("#guardar").click(function(){
            var tipo = $("#pres").val();
            var nombre = $("#nom").val();

              $.ajax({
                url: "guardar.php?id=<?php echo $id;?>",
                method: "POST",
                data: {tipo:tipo, nombre:nombre},
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);
                  //borrar2();
                }
              });
          });

          $("#cancela").click(function(){
            if(confirm("¿Estas seguro que desea cancelar los registros?")){
              var tipo = $("#pres").val();
              $.ajax({
                url: "borrar.php?id=<?php echo $id;?>",
                method: "POST",
                data: {tipo:tipo},
                success: function(data){
                  obtener_datos();
                  totalv();
                  alert(data);
                }
              });
            };
          });


        });

    </script>
  </head>
  <body>
    <form class="formulario2" id="formulario" method="POST">
      <div class="col-auto text-center">  
        <legend>Crear Presupuesto</legend>
        <label for="nombre">Tipo de presupuesto: </label>
        <select class="caja" name ="presupuesto" id="pres">
            <?php
              $query = $link -> query ("SELECT * FROM `tipo` WHERE status = 'A'");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
              }
            ?>
          </select>


            <label for="nombre">Nombre</label>
            <input class="uno" type="text" placeholder="Nombre del presupuesto" size="35" name="nombre" id="nom" required=""/>
            <legend></legend>
            <label for="nombre">Área</label>
            <select class="caja" name ="area">
                <?php
                  $query = $link -> query ("SELECT * FROM `area` WHERE status = 'A'");
                  while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                  }
                ?>
              </select>
            <label for="nombre">Disciplina</label>
            <select class="caja" name ="disc">
                <?php
                  $query = $link -> query ("SELECT * FROM `disciplinas` WHERE status = 'A'");
                  while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores['id'].'">'.$valores['nombre'].'</option>';
                  }
                ?>
              </select>
              <label for="nombre">Concepto</label>
              <input type="text" placeholder="Concepto" size="27" name="Concepto" id="dis" required=""/>

              <legend></legend>
              <label for="nombre">Unidad  </label>
              <input type="text" name = "unidad"  placeholder="Unidad" size="10" required=""/>

              <label for="nombre">Cantidad  </label>
              <input type="number" name = "cantidad" value = "1" min = "1" max = "1000000" step = "1" size="10"/>

              <label for="nombre">Importe unitario  </label>
              <input type="number" name = "iu" value = "1" min = "1" max = "1000000" step = "1" size="10"/>


              <button type="button" id="agregar" class="button2">Agregar</button>
              <br>
              <legend>Costos</legend>
              <div id = "container">
                <div id="result"></div>
                <div id="result2"></div>
              </div>
            </fieldset>
            <div class="btn">
              <button type="button" id="guardar" class="button3">Guardar</button>
              <button type="button" id="cancela" class="button3">Cancelar</button>

            </div>

        </div>
      </form>
  </body>
</html>

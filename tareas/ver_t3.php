<?php

  require 'conexion.php';

  $id = $_GET["id"];
  //$id = 7;
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
      var pres = $('#pres');
      var sup = $('#sup');


      function uno(){
        var a = $("#pres").val()
        //alert(a);
        $("#sup").find('option').not(':first').remove();
        $.ajax({
          data: {a:a}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
          dataType: 'html', //tipo de datos que esperamos de regreso
          type: 'POST', //mandar variables como post o get
          url: 'get_sup.php?id=<?php echo $id; ?>' //url que recibe las variables
        }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
          sup.html(data);
        });
      }
      uno();
        $('#pres').change(function(){
          var a = $("#pres").val()
          $("#sup").find('option').not(':first').remove();
          $.ajax({
            data: {a:a}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
            dataType: 'html', //tipo de datos que esperamos de regreso
            type: 'POST', //mandar variables como post o get
            url: 'get_sup.php' //url que recibe las variables
          }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
            sup.html(data);
          });
        });

        $('#sup').change(function(){
          var a = $("#pres").val()
          var b = $("#sup").val()
          $("#je").find('option').not(':first').remove();
          $.ajax({
            data: {pres:a, supe:b}, //variables o parametros a enviar, formato => nombre_de_variable:contenido
            dataType: 'html', //tipo de datos que esperamos de regreso
            type: 'POST', //mandar variables como post o get
            url: 'get_je.php' //url que recibe las variables
          }).done(function(data){ //metodo que se ejecuta cuando ajax ha completado su ejecucion
            je.html(data);
          });
        });
        function real(){
          var datos = $("#formulario").serialize();
          $.ajax({
            url: "real.php",
            method: "POST",
            data: datos,
            success: function(data){
              $("#result1").html(data);
            }
          });
        }

        function datos(){
          var datos = $("#formulario").serialize();
            $.ajax({
              url: "ver.php",
              method: "POST",
              data: datos,
              success: function(data){
                $("#result").html(data);
                real();
              }
          });
        }

        function ver(){
            var datos = $("#pres").val();
            $.ajax({
              url: "ver.php?id=<?php echo $id; ?>",
              method: "POST",
              data: datos,
              success: function(data){
                $("#result").html(data);
                //real();
              }
          });
        }
        ver();
        function actualizar_datos(id, texto, columna){
          $.ajax({
            url: "actualizar_su2.php",
            method: "POST",
            data: {id: id, texto:texto, columna:columna},
            success: function(data){
              //obtener_auxt3();
              alert(data);
              real();
              datos();
            }
          });
          }

        $(document).on("blur", "#hhr", function(){
          var id = $(this).data("id_hhr");
          var nombre = $(this).text();
          if(nombre ==""){
            nombre = 0;
          }
          actualizar_datos(id, nombre, "real_hh");
        });

        $(document).on("blur", "#emr", function(){
          var id = $(this).data("id_emr");
          var nombre = $(this).text();
          if(nombre ==""){
            nombre = 0;
          }
          actualizar_datos(id, nombre, "real_em");
        });

        $(document).on("blur", "#tarea", function(){
          var id = $(this).data("id_tarea");
          var nombre = $(this).text();
          actualizar_datos(id, nombre, "tarea");
        });



    });
    </script>
  </head>
  <body>
    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
        <legend>Presupuesto asignado a Supervisor</legend>

            <br>
          </div>
          <legend></legend>
          <div id = "container">
            <div id="result"></div>
            <div id="result1"></div>
          </div>
        </form>
      </div>
  </body>
</html>

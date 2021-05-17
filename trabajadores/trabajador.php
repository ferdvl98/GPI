<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Nuevo código -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Código viejo -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        
      $(document).ready(function(){

        /**NUEEVA ACTUALIZACIÓN */
        $("#enviar").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "nss.php",
                method: "POST",
                data: datos,
                success: function(data){
                  alert(data);
                }
              });
          });

          /**FIN NUEVA ACT */

        function obtener_datos(){
            $.ajax({
              url: "code.php",
              method: "POST",
              success: function(data){
                $("#result").html(data)
              }
            })
          }


          obtener_datos();

          $("#enviar").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "registrar-trabajador.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              });

          });

          function actualizar_datos(id, texto, columna){
            $.ajax({
              url: "actualizar-trabajador.php",
              method: "POST",
              data: {id: id, texto:texto, columna:columna},
              success: function(data){
                obtener_datos();
                alert(data);
              }
            });
            }

          $(document).on("blur", "#nombre", function(){
            var id = $(this).data("id_puesto");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "nombre");
          });

          $(document).on("blur", "#paterno", function(){
            var id = $(this).data("id_paterno");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "Apellido_Paterno");
          });

        $(document).on("click", "#eliminar", function(){
          if(confirm("¿Esta seguro de realizar el cambio?")){
          var id =$(this).data("id");
          $.ajax({
            url: "eliminar-trabajador.php",
            method: "POST",
            data: {id:id},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          })

        };
      })
       /* 
        $('#btn_lectura').click(function () {
            valores=new Array();
            var contador = 0;
            $('#my_file_output tr').each(function () {
    
                var d1= $(this).find('td').eq(0).html();
                var d2 = $(this).find('td').eq(1).html();
                valor=new Array(d1, d2);
                valores.push(valor);
                console.log (valor);
               // alert(valor);
                $.post('insertar.php', {d1:d1, d2:d2}, function (datos) {
                    $('#respuesta').html(datos);
                    obtener_datos();
                });
    
                contador = contador + 1;
                $('#contador').html("Se registro "+contador+" registros correctamente.");
            });
        });
        **/

        /**Nueva act */


      });

    </script>
    
    <script type="text/javascript">
      function cargarHojaExcel()
      {
        if(document.frmcargararchivo.excel.value=="")
        {
          alert("Suba un archivo");
          document.frmcargararchivo.excel.focus();
          return false;
        }		

        document.frmcargararchivo.action = "procesar.php" ;
        document.frmcargararchivo.submit();
        
      }
      //obtener_datos();
    </script>
    
    <title>TRABAJADOR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-us.css">
  </head>

 <!--NUEVOS--> 
  <body>
    <fieldset>
      <legend>Nuevo Trabajador</legend>
      <form class="formulario2" id="formulario" method="POST">
        <div class="contenedor2">
          <left>
            
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Fecha: </label>
              <!--<label for="nombre">Fecha </label>
            <input type="text" placeholder="Fecha" size="20" name="fecha" id="dis" required=""/>-->
            <input type="date" placeholder="Fecha" size="40" name="fecha" id="dis" step="1" min="2021-01-01" max="2021-12-31" value="<?php echo date("Y-m-d");?>">

            <label for="nombre"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Número de Seguro Social: </label>
            <input type="text" placeholder="Escriba el NSS" size="20" name="codigo" id="dis" required=""/>
            <br><br>
          
            <label for="nombre">&nbsp;&nbsp; Nombre del Trabajador: </label>
            <input type="text" placeholder="Nombre del Trabajador" size="20" name="empleado" id="dis" required=""/>
            <label for="nombre"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Apellido Paterno: </label>
            <input type="text" placeholder="ApellidoPa" size="20" name="apaterno" id="dis" required=""/>
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; Apellido Materno: </label>
            <input type="text" placeholder="ApellidoMa" size="20" name="amaterno" id="dis" required=""/>
            <br>
            <!--
            <label for="nombre"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Movimiento: </label>
            <input type="text" placeholder="Movimiento" size="20" name="movimiento" id="dis" required=""/>
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Contratista: </label>
            <input type="text" placeholder="Contratista" size="20" name="contratista" id="dis" required=""/>
            <label for="nombre"> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Observación: </label>
            <input type="text" placeholder="Observación" size="20" name="observacion" id="dis" required=""/>
            
            <br><br>
            
            <label for="nombre"> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; Comentario: </label>
            <input type="text" placeholder="Comentario" size="20" name="comentario" id="dis" required=""/>
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Usuario: </label>
            <input type="text" placeholder="Usuario" size="20" name="usuario" id="dis" required=""/>
            -->
            <br><br>
            <center>
              <button type="button" id="enviar" class="button"> Registrar </button>
            </center>
          </left>
         
        </div>
      </form>
    </fieldset>
    
    
    <fieldset>
      <legend>Cargar datos de excel</legend>
      <div id = "container">
        <section>
          <form name="frmcargararchivo" method="post" enctype="multipart/form-data">
            <p><input type="file" name="excel" id="excel" /></p>
            <p><input type="button" class="button" value="Subir" onclick="cargarHojaExcel();" /></p>
          </form>
	      </section>
      </div>
    </fieldset>


    <fieldset>
      <legend>Trabajadores</legend>
      <div id = "container">


        <div id="result"></div>
      </div>
    </fieldset>
    
    <script>
        
    </script>

  </body>
</html>

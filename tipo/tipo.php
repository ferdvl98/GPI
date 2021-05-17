<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

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
                url: "registrar-tipo.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              });

          });

          function actualizar_datos(id, texto){
          $.ajax({
            url: "actualizar-tipo.php",
            method: "POST",
            data: {id: id, texto:texto},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          });
        }

          $(document).on("blur", "#nombre", function(){
          var id = $(this).data("id_puesto");
          var puesto = $(this).text();
          actualizar_datos(id, puesto);
        });

          $(document).on("click", "#eliminar", function(){
            if(confirm("¿Esta seguro de realizar el cambio?")){
            var id =$(this).data("id");
            $.ajax({
              url: "eliminar-tipo.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                obtener_datos();
                alert(data);
              }
            })

          };
        })

      });

    </script>
    <title>Tipo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-us.css">
  </head>
  <body>
    <fieldset>
      <legend>Nuevo Tipo</legend>
      <form class="formulario" id="formulario" method="POST">
        <div class="contenedor">
          <label for="nombre">Nombre del Tipo: </label>
          <input type="text" placeholder="Nombre del Tipo" size="35" name="area" id="dis" required=""/>

          <label for="nombre">Código: </label>
          <input type="text" placeholder="Escriba el código" size="20" name="codigo" id="dis" required=""/>
          <button type="button" id="enviar" class="button">Registrar</button>
        </div>
      </form>
    </fieldset>


    <fieldset>
      <legend>Tipos</legend>
      <div id = "container">


        <div id="result"></div>
      </div>
    </fieldset>

  </body>
</html>

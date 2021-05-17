<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Puestos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-us.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        function obtener_datos(){
            $.ajax({
              url: "code-puestos.php",
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
                url: "registrar.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              })

          });

          function actualizar_datos(id, texto){
          $.ajax({
            url: "actualizar.php",
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
          url: "eliminar.php",
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
  </head>
  <body>
    <fieldset>
      <legend>Nuevo Puesto</legend>
      <form class="formulario" id="formulario" method="POST">
        <div class="contenedor">
          <label for="nombre">Nombre del puesto: </label>
          <input type="text" placeholder="Nombre del Puesto" size="35" name="puesto" id="dis" required=""/>
          <button type="button" id="enviar" class="button">Agregar</button>
        </div>
      </form>
    </fieldset>

    <fieldset>
      <legend>Puestos</legend>
      <div id = "container">
        <div id="result"></div>

          <div id="result2"></div>
      </div>
    </fieldset>
  </body>
</html>

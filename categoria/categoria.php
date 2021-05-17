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
                url: "registrar-categoria.php",
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
            url: "actualizar-categoria.php",
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
              url: "eliminar-categoria.php",
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
    <title>Categoria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-us.css">
  </head>
  <body>
    <fieldset>
      <legend>Nueva Categoria</legend>
      <form class="formulario" id="formulario" method="POST">
        <div class="contenedor">
          <label for="nombre">Nombre de la Categoria: </label>
          <input type="text" placeholder="Nombre de la Categoria" size="35" name="categoria" id="dis" required=""/>

          <label for="nombre">Código: </label>
          <input type="text" placeholder="Escriba el código" size="20" name="codigo" id="dis" required=""/>
          <button type="button" id="enviar" class="button">Registrar</button>
        </div>
      </form>
    </fieldset>


    <fieldset>
      <legend>Categorias</legend>
      <div id = "container">


        <div id="result"></div>
      </div>
    </fieldset>

  </body>
</html>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script>
    $(document).ready(function(){

      function mostrar(){
        $.ajax({
          url: "code.php",
          method: "POST",
          success: function(data){
            $("#result").html(data)
          }
        });
      }
      mostrar();

      function actualizar_datos(id, texto, columna){
        $.ajax({
          url: "actualizar.php",
          method: "POST",
          data: {id: id, texto:texto, columna:columna},
          success: function(data){
            mostrar();
            alert(data);
          }
        });
      }

      $(document).on("blur", "#nombre_user", function(){
        var id = $(this).data("id_nombre");
        var nombre = $(this).text();
        actualizar_datos(id, nombre, "nombre");
      });
      $(document).on("blur", "#usuario", function(){
        var id = $(this).data("id_usuario");
        var nombre = $(this).text();
        actualizar_datos(id, nombre, "usuario");
      });
      $(document).on("click", "#eliminar", function(){
        if(confirm("¿Estas seguro que desea cambiar el estado del usuario?")){
          var id =$(this).data("id");
          $.ajax({
            url: "eliminar.php",
            method: "POST",
            data: {id: id,},
            success: function(data){
              mostrar();
              alert(data);
            }
          })
        };
      })

      $("#enviar").click(function(){
        var datos = $("#formulario").serialize();
        $.ajax({
          type: "POST",
          url: "code-altas.php",
          data:datos,
          success: function(r){
            alert(r);
            mostrar();
          }
        });
      });
    });
    </script>
  </head>
  <body>

      <div class="contenedor">
        <form class="formulario2" id="formulario" method="POST">
          <legend>Nuevo Usuario</legend>
          <label for="nombre">Nombre Completo: </label>
          <input class="uno" type="text" placeholder="Nombre completo" size="35" name="nombre" id="dis" required=""/>
          <label for="nombre">Correo Electrónico: </label>
          <input type="email" name="email" placeholder="Correo electrónico" size="35" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"/>
          <label for="contrasena">Contraseña:</label>
          <input type="password"  placeholder="Contraseña" size="25" name="pass"/>
          <input type="button" id="enviar" value="Registrar" class="button2"/>
          <br><br>
          <legend>Usuarios registrados</legend>
          <div id = "container">
            <div id="result"></div>
          </div>
        </form>


      </div>


  </body>
</html>

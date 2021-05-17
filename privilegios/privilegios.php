<?php
  require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es ab" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        function obtener_datos(id){
            $.ajax({
              url: "priv.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                $("#result").html(data)
              }
            });
          }

        $("#user").change(function(){
            var a = $(this).val();
            obtener_datos(a);
	      });

        $("#asignar").click(function(){
            var user = $("#user").val();
            var datos = $("#formulario").serialize();
            //alert(datos);
            $.ajax({
              url: "asignar.php",
              method: "POST",
              data: datos,
              success: function(data){
                obtener_datos(user);
                alert(data);
              }
            })

        });

        $(document).on("click", "#eliminar", function(){
          if(confirm("¿Esta seguro de quitar el privilegio?")){
            var id =$(this).data("id");
            var user = $("#user").val();
            $.ajax({
              url: "eliminar.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                 //location.reload();
                obtener_datos(user);
                alert(data);
              }
            });
            return false;
          };
        });

      });
    </script>
  </head>
  <body>
    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
        <legend>Otorgar Privilegios</legend>
        <div class="pr">
          <label for="nombre">Usuarios </label>
          <select class="caja" name ="usuairos" id = "user">
            <option value="s" selected>Seleccione</option>
              <?php
                $query = $link -> query ("SELECT * FROM `puesto` WHERE status = 'A'");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_puesto].'">'.$valores[puesto].'</option>';
                }
              ?>
            </select>
            <label for="">Privilegio </label>
            <select id="status" name="priv" id = "priv" class = "caja">
              <option value="s" selected>Seleccione</option>
              <?php
                $query = $link -> query ("SELECT * FROM `privilegios`");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_priv].'">'.$valores[privilegio].'</option>';
                }
              ?>
            </select>
            <button type="button" id="asignar" class="button2">Otorgar</button>

        </div>
        <legend>Privilegios</legend>
        <div id="result">
      </form>
    </div>
  </body>
</html>

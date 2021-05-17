<?php
  require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Asignar Puesto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-ab.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        function obtener_datos(){
            $.ajax({
              url: "code-as-puestos.php",
              method: "POST",
              success: function(data){
                $("#result").html(data)
              }
            })
          }

          $(document).on("click", "#eliminar", function(){
            if(confirm("¿Esta seguro de realizar el cambio?")){
              var id =$(this).data("id");
              $.ajax({
                url: "eliminar-ps.php",
                method: "POST",
                data: {id:id},
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              });
            };
          });

          obtener_datos();

          $("#asignar").click(function(){
              var datos = $("#formulario").serialize();
              //alert(datos);
              $.ajax({
                url: "asignar-p.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              })

          });
      });
    </script>
  </head>
  <body>
    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
        <fieldset>
          <legend>Asignar puesto</legend>
          <div class="pr">
            <label for="nombre">Seleccione al usuario</label>
            <select class="caja" name ="empleado">
              <option value="s" selected>Seleccione</option>
                <?php
                  $query = $link -> query ("SELECT * FROM `cuentas` WHERE status = 'A'");
                  while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[id_user].'">'.$valores[nombre].'</option>';
                  }
                ?>
              </select>
              <label for="">Seleccione el puesto </label>
              <select id="status" name="puesto" class = "caja">
                <option value="s" selected>Seleccione</option>
                <?php
                  $query = $link -> query ("SELECT * FROM `puesto` WHERE status = 'A'");
                  while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="'.$valores[id_puesto].'">'.$valores[puesto].'</option>';
                  }
                ?>
              </select>
              <button type="button" id="asignar" class="button2">Asignar</button>
          </div>

        </fieldset>
        <fieldset>
          <legend>Puestos</legend>
          <div id="result">
        </fieldset>


        </div>
      </form>
    </div>

  </body>
</html>

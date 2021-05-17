<?php
    $id = $_GET["id"];
    //echo $id;
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
    <script>
        $(document).ready(function(){
            var id = "<?php echo $id; ?>";

            function obtener_datos(){
            $.ajax({
              url: "noti.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                $("#result").html(data)
                //alert(data);
              }
            });
          }

        obtener_datos();
        });
    </script>
  </head>
  <body>
    <div class="contenedor">
      <form class="formulario2" id="formulario" method="POST">
        <legend>Notificaciones</legend>
        <div id="result">
      </form>
    </div>

  </body>
</html>

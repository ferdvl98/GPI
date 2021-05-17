<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="jquery-3.0.0.min.js"></script>
    <script>
      $(document).ready(function(){
          //obteniendo los datos
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



        function actualizar_datos(id, texto, columna,si){
          $.ajax({
            url: "actualizar.php",
            method: "POST",
            data: {id: id, texto:texto, columna:columna, si:si},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          });
        }

        //Actualizar registros
        $(document).on("blur", "#nombre_user", function(){
          var id = $(this).data("id_nombre");
          var nombre = $(this).text();
          actualizar_datos(id, nombre, "nombre","1");
        })

        $(document).on("blur", "#ciudad", function(){
          var id = $(this).data("id_ciudad");
          var ciudad = $(this).text();
          actualizar_datos(id, ciudad, "ciudad", "2");
        })

        $(document).on("blur", "#calle", function(){
          var id = $(this).data("id_calle");
          var calle = $(this).text();
          actualizar_datos(id, calle, "calle","2");
        })

        $(document).on("blur", "#colonia", function(){
          var id = $(this).data("id_colonia");
          var colonia = $(this).text();
          actualizar_datos(id, colonia, "colonia","2");
        })

        $(document).on("blur", "#cp", function(){
          var id = $(this).data("id_cp");
          var cp = $(this).text();
          actualizar_datos(id, cp, "cp","2");
        })
        $(document).on("blur", "#ni", function(){
          var id = $(this).data("id_ni");
          var ni = $(this).text();
          actualizar_datos(id, ni,"num_in", "2");
        })

        $(document).on("blur", "#ne", function(){
          var id = $(this).data("id_ne");
          var ne = $(this).text();
          actualizar_datos(id, ne,"num_ex" ,"2");
        })

        $(document).on("blur", "#telefono", function(){
          var id = $(this).data("id_telefono");
          var telefono = $(this).text();
          actualizar_datos(id, telefono, "telefono","3");
        })

        $(document).on("blur", "#usuario", function(){
          var id = $(this).data("id_usuario");
          var usuario = $(this).text();
          actualizar_datos(id, usuario, "email","4");
        })

        $(document).on("blur", "#estado", function(){
          var id = $(this).data("id_estado");
          var estado = $(this).text();
          actualizar_datos(id, estado, "estado","5");
        })

        $(document).on("blur", "#puesto", function(){
          var id = $(this).data("id_puesto");
          var puesto = $(this).text();
          actualizar_datos(id, puesto, "puesto","6");
        })


        //Eliminar usuario
        $(document).on("click", "#eliminar", function(){
          if(confirm("¿Estas seguro que desea cambiar el estado del usuario?")){
            var id =$(this).data("id");
            $.ajax({
              url: "eliminar.php",
              method: "POST",
              data: {id: id,},
              success: function(data){
                obtener_datos();
                alert(data);
              }
            })
          };
        })


      });
    </script>

    <title></title>
    <link rel="stylesheet" href="estilos-us.css">


  </head>
  <body>
    <div id = "container">
      <div id="result"></div>
    </div>
  </body>
</html>

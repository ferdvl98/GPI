<?php
    $id = $_GET["id"];
    //$id."hhh";
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos-ab.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="jquery-3.0.0.min.js"></script>
    <title>Document</title>
    <script>
        $(document).ready(function() {
            var ids = "<?php echo $id; ?>";

            function datos() {
                $.ajax({
                    url: "code.php",
                    method: "POST",
                    data: datos,
                    success: function(data) {
                        $("#result").html(data);
                        //real();
                    }
                });
            }

            $(document).on("click", "#cbox2", function() {
                    var id = $(this).data("id");
                    //alert(id);
                   $.ajax({
                        url: "notificar.php?ids=<?php echo $id; ?>",
                        method: "POST",
                        data: {
                            id: id, //ids: ids 
                        },
                        success: function(data) {
                            //mostrar();
                            alert(data);
                        }
                    })

            })
            datos();
            

        });
    </script>
</head>

<body>
    <div class="contenedor">
        <form class="formulario2" id="formulario" method="POST">
            <legend>Hojas de Trabajo</legend>

            <br>
    </div>
    <legend></legend>
    <div id="container">
        <div id="result"></div>
        <div id="result1"></div>
    </div>
    </form>
    </div>
</body>

</html>
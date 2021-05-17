<?php
require "conexion.php";
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../tareas/estilos-ab.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        var a = $("#pres").val();
        document.getElementById("caja_valor").value = a;

        var id = "<?php echo $id ?>";
        document.getElementById("caja_valor2").value = id;

        $("#pres").change(function() {
            var a = $("#pres").val();
            //alert(a);
            document.getElementById("caja_valor").value = a;
        });

        /*$("#btn").click(function() {
            //alert("Handler for .click() called.");
            var datos = $("#form").serialize();
            alert(datos);
            $.ajax({
                //url: "guardar_ar.php",
                method: "POST",
                data: datos,
                success: function(data) {
                    //obtener_datos();
                    alert(data);
                }
            })
        });*/

    });
</script>

<body>
    <div class="container">
        <br>
        <legend>Cargar Hoja de Trabajo</legend>

    </div>
    <div class="contenedor">
        <form class="formulario2" id="formulario" method="POST">
            <div class="col-auto text-center">
                <label for="nombre">Jefe de Equipo</label>
                <select class="caja" name="pres" style="width:1000px" id="pres">
                    <?php
                    $query = $link->query("SELECT e.id, concat_ws('',py.nombre,' - ', ps.nombre, ' - ',t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', ps2.concepto,': ', tr.NSS, ' - ',tr.nombre, ' ', tr.Apellido_Paterno, ' ',tr.Apellido_Materno) as a FROM `equipos` as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id INNER JOIN tareas3 as t3 on t3.id = pe.id_pres INNER JOIN tareas2 as t2 on t2.id = t3.id_tarea INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina INNER JOIN trabajador as tr ON tr.id = e.`id_trabajador` where t3.id_cuenta = $id group by e.id");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id'] . '">' . $valores['a'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <hr>
                <form method="post" id="form" action="../excel/subir.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-md-3">Seleccione el Archivo</label>
                        <div class="col-md-8">
                            <input type="file" name="uploadfile" id="uploadfile" class="form-control" />
                            <input type="hidden" name="caja_valor" id="caja_valor" value="">
                            <input type="hidden" name="caja_valor2" id="caja_valor2" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3"></label>
                        <div class="col-md-8">
                            <input type="submit" name="submit" id="btn" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
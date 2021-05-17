<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>GPI</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/interfazStyle.css">
    <link rel="stylesheet" href="css/interfazBox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <!-- head f-->
    <div class="topbar">
        <div class="container">
            <p><a href="cerrar-sesion.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Salir</a></p>
        </div>
    </div>
    <!-- head main  -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            <div class="navbar-header"><a class="navbar-brand" href="#"><img src="css/images/logo.png"></a></div>

            <div class="droppdown nav navbar-nav navbar-right">
                <button class="droppbtn" onclick="myFunction()" >Proyecto
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="droppdown-content" id="objUno">
                    <a href="proyecto/proyecto.php" target="workarea">Crear</a>
                    <a href="proyecto/ver-proy.php" target="workarea">Ver</a>
                </div>
            </div>
            
            <div class="droppdown nav navbar-nav navbar-right">
                <button class="droppbtn" onclick="myFunction6()">Presupuesto
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="droppdown-content" id="objSeis">
                    <a href="area/area.php" target="workarea">Área</a>
                    <a href="disciplina/disciplina.php" target="workarea">Disciplina</a>
                    <a href="presupuestos/costos.php" target="workarea">Crear Presupuesto</a>
                    <a href="presupuestos/ver.php" target="workarea">Ver Presupuesto</a>
                </div>
            </div>
            
            <div class="droppdown nav navbar-nav navbar-right">
                <button class="droppbtn" onclick="myFunction2()">Usuarios
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="droppdown-content" id="objDos">
                    <a href="usuarios2/altas.php" target="workarea">Agregar/Ver</a>
                </div>
            </div>
            
            <div class="droppdown nav navbar-nav navbar-right">
                <button class="droppbtn" onclick="myFunction4()">Tareas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="droppdown-content" id="objCuatro">
                    <a href="tareas/tareas2.php" target="workarea">Asignar</a>
                </div>
            </div>

            <div class="droppdown nav navbar-nav navbar-right">
                <button class="droppbtn" onclick="myFunction3()">Puestos
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="droppdown-content" id="objTres">
                    <a href="puestos/puestos.php" target="workarea">Crear</a>
                    <a href="puestos/asignar.php" target="workarea">Asignar</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="divPrincipal">
        <iframe name="workarea" src="proyecto/proyecto.php" frameborder="0" style="overflow: hidden; height: 80%;
        width: 100%; position: absolute;"></iframe>
    </div>
</body>
 <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">

     //SH-COR
     function myFunction() {
        document.getElementById("objUno").classList.toggle("show");
        $("#objDos").hide();
        $("#objTres").hide();
        $("#objCuatro").hide();
        $("#objSeis").hide();
    }
    function myFunction2() {
        document.getElementById("objDos").classList.toggle("show");
    }
    function myFunction6() {
        document.getElementById("objSeis").classList.toggle("show");
    }
    function myFunction3() {
        document.getElementById("objTres").classList.toggle("show");
    }
     function myFunction4() {
        document.getElementById("objCuatro").classList.toggle("show");
     }


    window.onclick = function(e) {
        if (!e.target.matches('.droppbtn')) {
            var objUno = document.getElementById("objUno");
            if (objUno.classList.contains('show')) {
                objUno.classList.remove('show');
            }
            var objDos = document.getElementById("objDos");
            if (objDos.classList.contains('show')) {
                objDos.classList.remove('show');
            }
            var objTres = document.getElementById("objTres");
            if (objTres.classList.contains('show')) {
                objTres.classList.remove('show');
            }
            var objCuatro = document.getElementById("objCuatro");
            if (objCuatro.classList.contains('show')) {
                objCuatro.classList.remove('show');
            }

            var objSeis = document.getElementById("objSeis");
            if (objSeis.classList.contains('show')) {
                objSeis.classList.remove('show');
            }
        }
    }
</script>

</html>

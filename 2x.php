<?php
$id = $_GET["id"];
$id = base64_decode($id);
if (!$id) {
    header("location: cerrar-sesion.php");
}

require_once "conexion.php";
header("Content-Type: text/html;charset=utf-8");
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
}


$row2 =  $id2 = "";
$cpts = $apts = $aus = $ca = $cd = $cpr = $vpr = $apg = $cp = $vp = $op = $apsi = $vpg = $vpsi = $ce = $ape = $rh = $tp =  $iht = 0;
$aps = $vps = $cc = 0;
//echo $id;

$sql = "SELECT nombre FROM cuentas where id_user = $id";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $row2 = $row["nombre"];
    }
}

$sql = "SELECT `id_puesto` FROM `as_puesto` WHERE `id_persona` = $id and status = 'A'";
$result = $link->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $id2 = $row["id_puesto"];
    }
}

$sql = "SELECT id_priv FROM asig_priv where id_cuenta = $id2";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($row["id_priv"] == 1) {
            $cpts = 1;
        }
        if ($row["id_priv"] == 2) {
            $apts = 1;
        }
        if ($row["id_priv"] == 3) {
            $aus = 1;
        }
        if ($row["id_priv"] == 4) {
            $ca = 1;
        }
        if ($row["id_priv"] == 5) {
            $cd = 1;
        }
        if ($row["id_priv"] == 6) {
            $cpr = 1;
        }
        if ($row["id_priv"] == 7) {
            $vpr = 1;
        }
        if ($row["id_priv"] == 8) {
            $apg = 1;
        }
        if ($row["id_priv"] == 9) {
            $cp = 1;
        }
        if ($row["id_priv"] == 10) {
            $vp = 1;
        }
        if ($row["id_priv"] == 11) {
            $op = 1;
        }
        if ($row["id_priv"] == 12) {
            $apsi = 1;
        }
        if ($row["id_priv"] == 13) {
            $vpg = 1;
        }
        if ($row["id_priv"] == 14) {
            $vpsi = 1;
        }
        if ($row["id_priv"] == 15) {
            $aps = 1;
        }
        if ($row["id_priv"] == 16) {
            $vps = 1;
        }
        if ($row["id_priv"] == 17) {
            $cc = 1;
        }
        if ($row["id_priv"] == 18) {
            $ce = 1;
        }
        if ($row["id_priv"] == 19) {
            $ape = 1;
        }
        if ($row["id_priv"] == 20) {
            $rh = 1;
        }
        if ($row["id_priv"] == 21) {
            $tp = 1;
        }
        if ($row["id_priv"] == 22) {
            $iht = 1;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <title>GPI</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/interfazStyle.css">
    <link rel="stylesheet" href="x.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var puesto = "<?php echo $id2; ?>";

            
            var apt = "<?php echo $apts; ?>";
            var cpt = "<?php echo $cpts; ?>";
            var aus = "<?php echo $aus; ?>";
            var privi = "<?php echo $op; ?>";
            var dis = "<?php echo $cd; ?>";
            var area = "<?php echo $ca; ?>";
            var cpres = "<?php echo $cpr; ?>";
            var vpres = "<?php echo $vpr; ?>";
            var apg = "<?php echo $apg; ?>";
            var cp = "<?php echo $cp; ?>";
            var vp = "<?php echo $vp; ?>";
            var apsi = "<?php echo $apsi; ?>";
            var vpg = "<?php echo $vpg; ?>";
            var vpsi = "<?php echo $vpsi; ?>";
            var vps = "<?php echo $vps; ?>";
            var aps = "<?php echo $aps; ?>";
            var cc = "<?php echo $cc; ?>";
            var ce = "<?php echo $ce; ?>";
            var ape = "<?php echo $ape; ?>";
            var rh = "<?php echo $rh; ?>";
            var tp = "<?php echo $tp; ?>";
            var iht = "<?php echo $iht; ?>";

            if (rh == '0') {
                document.getElementById("rh").style.display = "none";
                document.getElementById("atrh").style.display = "none";
            } else {
                document.getElementById("rh").style.display = "block";
                document.getElementById("atrh").style.display = "block";
            }


            if (apt == '0' && cpt == '0') {
                document.getElementById("pues").style.display = "none";
            } else {
                document.getElementById("pues").style.display = "block";
                if (apt == '1') {
                    document.getElementById("vpues").style.display = "block";
                } else {
                    document.getElementById("vpues").style.display = "none";
                }
                if (cpt == '1') {
                    document.getElementById("cpues").style.display = "block";
                } else {
                    document.getElementById("cpues").style.display = "none";
                }
            }
            //alert(a);

            if (aus == '0' && privi == '0') {
                document.getElementById("user").style.display = "none";
            } else {
                document.getElementById("user").style.display = "block";
                if (aus == '1') {
                    document.getElementById("av").style.display = "block";
                }
                if (privi == '1') {
                    document.getElementById("priv").style.display = "block";
                }
            }

            if (area == '0' && dis == '0' && cpres == '0' && vpres == '0' && apg == '0' && apsi == '0' && vpg == '0' && vpsi == '0' && vps == '0' && aps == '0' && cc == '0' && ce == '0' && ape == '0' && tp == '0') {
                document.getElementById("pst").style.display = "none";
            } else {
                document.getElementById("pst").style.display = "block";
                if (area == '1') {
                    document.getElementById("area").style.display = "block";
                }
                if (dis == '1') {
                    document.getElementById("dis").style.display = "block";
                }
                if (cpres == '1') {
                    document.getElementById("cpst").style.display = "block";
                }
                if (vpres == '1') {
                    document.getElementById("vpst").style.display = "block";
                }
                if (apg == '1') {
                    document.getElementById("apg").style.display = "block";
                }
                if (apsi == '1') {
                    document.getElementById("apsi").style.display = "block";
                }
                if (vpg == '1') {
                    document.getElementById("vpg").style.display = "block";
                }
                if (vpsi == '1') {
                    document.getElementById("vpsi").style.display = "block";
                }
                if (vps == '1') {
                    document.getElementById("vps").style.display = "block";
                }
                if (aps == '1') {
                    document.getElementById("aps").style.display = "block";
                }
                if (cc == '1') {
                    document.getElementById("cc").style.display = "block";
                }
                if (ce == '1') {
                    document.getElementById("ce").style.display = "block";
                }
                if (ape == '1') {
                    document.getElementById("ape").style.display = "block";
                }
                if (tp == '1') {
                    document.getElementById("tp").style.display = "block";
                }
                if (iht == '1') {
                    document.getElementById("iht").style.display = "block";
                }
            }

            if (cp == '0' && vp == '0') {
                document.getElementById("proy").style.display = "none";
            } else {
                document.getElementById("proy").style.display = "block";
                if (cp == '1') {
                    document.getElementById("cp").style.display = "block";
                }
                if (vp == '1') {
                    document.getElementById("vp").style.display = "block";
                }
            }

            if(puesto == 6){
                //document.getElementById['at'].src = "proyecto/proyecto.php?id=<?php echo $id; ?>";
                var loc = "proyecto/proyecto.php?id=<?php echo $id; ?>";
                $('#at').attr('src', loc);
            }else if(puesto == 1){
                var loc = "tareas/pres2.php?id=<?php echo $id; ?>";
                $('#at').attr('src', loc);
            }else if(puesto == 2){
                var loc = "tareas/supervisor.php?id=<?php echo $id; ?>";
                $('#at').attr('src', loc);
            }else if(puesto == 3){
                var loc = "tareas/super.php?id=<?php echo $id; ?>";
                $('#at').attr('src', loc);
            }else if(puesto == 7){
                var loc = "trabajadores/trabajador.php?id=<?php echo $id; ?>";
                $('#at').attr('src', loc);
            }

        });
    </script>
</head>

<body>
    <!-- head f-->
    <div class="topbar">
        <div class="container">
            <p><a href="cerrar-sesion.php"><i aria-hidden="true"></i> Salir - <?php echo $row2; ?></a></p>
        </div>
    </div>
    <!-- head main  -->
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="#"><img src="css/images/logo.png"></a></div>

            <!-- Black magic -->
            <div class="droppdown navbar-right">
                <button class="droppbtn">
                    <a href="notificaciones/notificacion.php?id=<?php echo $id; ?>" style="text-decoration:none ; color:inherit" target="workarea">Notificaciones</a>
                </button>
            </div>

            <!-- btn fix -->
            <div style="display:none;" id="rh" class="droppdown navbar-right">
                <button class="droppbtn">Recursos Humanos
                </button>
                <div class="droppdown-content">
                    <a style="display:none;" id="atrh" href="trabajadores/trabajador.php?id=<?php echo $id; ?>" target="workarea">Agregar Trabajadores</a>
                    <a style="display:block;" id="psrh" href="recursoshumanos/semanal.php" target="workarea">Presupuesto Semanal</a>
                    <a style="display:block;" id="vbrh" href="ver_archivos/ver.php?id=<?php echo $id; ?>" target="workarea">Visto Bueno</a>
                </div>
            </div>

            <div style="display:none;" id="proy" class="droppdown navbar-right">
                <button class="droppbtn">Proyecto
                </button>
                <div class="droppdown-content">
                    <a style="display:none;" id="cp" href="proyecto/proyecto.php?id=<?php echo $id; ?>" target="workarea">Crear</a>
                    <a style="display:none;" id="vp" href="proyecto/ver-proy.php" target="workarea">Ver</a>
                </div>
            </div>

            <div style="display:none;" id="pst" class="droppdown navbar-right">
                <button class="droppbtn">Presupuesto
                    <i></i>
                </button>
                <div class="droppdown-content">
                    <a style="display:none;" id="area" href="area/area.php" target="workarea">Área</a>
                    <a style="display:none;" id="dis" href="disciplina/disciplina.php" target="workarea">Disciplina</a>
                    <a style="display:none;" id="cc" href="categoria/categoria.php" target="workarea">Categoria</a>
                    <a style="display:none;" id="tp" href="tipo/tipo.php" target="workarea">Tipo de Presupuesto</a>
                    <a style="display:none;" id="cpst" href="presupuestos2/costos2.php?id=<?php echo $id; ?>" target="workarea">Crear Presupuesto</a>
                    <a style="display:none;" id="vpst" href="presupuestos/ver.php" target="workarea">Ver Presupuesto</a>
                    <a style="display:none;" id="apg" href="tareas/tareas2.php?id=<?php echo $id; ?>" target="workarea">Asignar Presupuesto a Gerentes</a>
                    <a style="display:none;" id="vpg" href="presupuestos/ver-pres.php?id=<?php echo $id; ?>" target="workarea">Ver Presupuestos Asignados a Gerentes</a>
                    <a style="display:none;" id="apsi" href="tareas/pres2.php?id=<?php echo $id; ?>" target="workarea">Asignar Presupuesto a Superintendentes</a>
                    <a style="display:none;" id="vpsi" href="presupuestos/pres_asig.php?id=<?php echo $id; ?>" target="workarea">Ver Presupuestos Asignados a Superintendentes</a>
                    <a style="display:none;" id="aps" href="tareas/supervisor.php?id=<?php echo $id; ?>" target="workarea">Asignar Presupuesto a Supervisor</a>
                    <a style="display:none;" id="vps" href="tareas/ver_t3.php?id=<?php echo $id; ?>" target="workarea">Ver Presupuesto Supervisor</a>
                    <a style="display:none;" id="ce" href="tareas/super.php?id=<?php echo $id; ?>" target="workarea">Crear Equipos</a>
                    <a style="display:none;" id="ape" href="tareas/plantilla.php?id=<?php echo $id; ?>" target="workarea">Asignar Planilla a Equipos</a>
                    <a style="display:none;" id="iht" href="tareas/cargar.php?id=<?php echo $id; ?>" target="workarea">Importar Hoja de Trabajo</a>


                </div>
            </div>
            <div style="display:none;" id="user" class="droppdown navbar-right">
                <button class="droppbtn">Usuarios
                    <i></i>
                </button>
                <div class="droppdown-content">
                    <a style="display:none;" id="av" href="usuarios2/altas.php" target="workarea">Agregar/Ver</a>
                    <a style="display:none;" id="priv" href="privilegios/privilegios.php" target="workarea">Privilegios</a>
                </div>
            </div>



            <div style="display:none;" id="pues" class="droppdown navbar-right">
                <button class="droppbtn">Puestos
                    <i></i>
                </button>
                <div class="droppdown-content" id="objTres">
                    <a style="display:none;" id="cpues" href="puestos/puestos.php" target="workarea">Crear</a>
                    <a style="display:none;" id="vpues" href="puestos/asignar.php" target="workarea">Asignar</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="divPrincipal">
        <iframe name="workarea" id = "at" frameborder="0" style="overflow: hidden; height: 80%;
        width: 100%; position: absolute; "></iframe>
    </div>
</body>

</html>
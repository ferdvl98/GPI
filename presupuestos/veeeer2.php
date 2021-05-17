<?php

  require 'conexion.php';

  $id = $_GET["id"];
  //$id = 6;
  $id_proy = $_POST["pro"];
  $ts = $_POST["status2"];
  $aux = "";


  if($id_proy !='s'){


      $consulta2 = "SELECT SUM(t2.`presupuesto`) as a FROM `tareas2` as t2 INNER JOIN tareas as ts on ts.id = t2.`id_tarea` INNER JOIN proyecto as py on
      py.id_proyecto =ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto WHERE
      py.id_proyecto = $id_proy and ps.id_tipo = $ts and t2.`id_cuenta` = $id";

    $resultado = mysqli_query($link, $consulta2);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["a"];
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }

    $consulta = $link->query("SELECT t2.id, py.nombre as proyecto, ps.nombre as pres, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, ps2.concepto,
      c.nombre as empleado, t2.presupuesto FROM `tareas2` as t2 INNER JOIN
      tareas as ts on ts.id= t2.`id_tarea` INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN
      pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area
      INNER JOIN disciplinas as d on d.id = ps2.id_disciplina INNER JOIN cuentas as c on c.id_user = t2.`id_cuenta` WHERE py.id_proyecto = $id_proy and t.id = $ts and t2.`id_cuenta` = $id");
    echo "<table border = '1px' align ='center'>
          <tr>
            <th>Proyecto</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Area</th>
            <th>Disciplina</th>
            <th>Concepto</th>
            <th>Responsable</th>
            <th>Presupuesto</th>
          </tr>

    ";

    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['proyecto']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['tipo']."</td>
        <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['pres']."</td>
        <td id ='area' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
        <td id ='disciplina' data-id_disciplina = '".$registro['id']."'>".$registro['disciplina']."</td>
        <td id ='concepto' data-id_concepto = '".$registro['id']."'>".$registro['concepto']."</td>
        <td id ='empleado' data-id_empleado = '".$registro['id']."'>".$registro['empleado']."</td>
        <td id ='presupuesto2' data-id_presupuesto2 = '".$registro['id']."'>".number_format($registro['presupuesto'])."</td>
      </tr>";

    }
  }




?>

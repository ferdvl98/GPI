<?php

  require "conexion.php";

  $id = $_GET["id"];

  //$tarea = $_POST["pres"];

  $consulta = $link->query("SELECT t3.id, py.nombre as proyecto, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area , d.nombre as dis, ps2.concepto, t3.presupuesto  as total FROM `tareas3` as t3 INNER JOIN
    tareas2 as t2 on t2.id = t3.`id_tarea` INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto
    INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t on t.id = ps.id_tipo
    INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina WHERE t3.`id_cuenta` = $id");

  echo "<table id = 'tabla' border = '1px' align ='center'>
      <thead>
        <tr>
          <th>Proyecto</th>
          <th>Presupuesto</th>
          <th>Tipo</th>
          <th>Area</th>
          <th>Disciplina</th>
          <th>Concepto</th>
          <th>Total</th>
        </tr>
      </thead>

  ";

  while ($registro = mysqli_fetch_array($consulta)) {

    echo "
   <tbody>
    <tr>
      <td id ='proyectovyt' data-id_proyectovyt = '".$registro['id']."'contenteditable>".$registro['proyecto']."</td>
      <td id ='tipovyt' data-id_tipo = '".$registro['id']."'>".$registro['presupuesto']."</td>
      <td id ='areavyt' data-id_area = '".$registro['id']."'>".$registro['tipo']."</td>
      <td id ='areavyt' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
      <td id ='disciplinavyt' data-id_disciplina = '".$registro['id']."'>".$registro['dis']."</td>
      <td id ='conceptovyt' data-id_conceptovyt = '".$registro['id']."'contenteditable>".$registro['concepto']."</td>
      <td id ='presupuestovyt' data-id_presupuesto2 = '".$registro['id']."'>".number_format($registro['total'])."</td>
    </tr>
    <tbody>";
  }



?>

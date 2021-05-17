<?php

$id = $_GET["id"];

require_once "conexion.php";

$consulta = $link->query("SELECT at.id, p.nombre as proyecto, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplinas, c.nombre as responsable,
  p2.concepto, at.presupuesto as total FROM `aux_tareas` as at INNER JOIN proyecto as p on p.id_proyecto = at.`id_proyecto` INNER JOIN presupuestos2 as p2 on
  p2.id = at.`id_pres` INNER JOIN pres as ps on ps.id = p2.id_presupuesto INNER join tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = p2.id_area
  INNER JOIN disciplinas as d on d.id = p2.id_disciplina INNER JOIN cuentas as c on c.id_user = at.`id_cuenta` where at.id_a =$id");

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
        <th> * </th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
    <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['proyecto']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['tipo']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['presupuesto']."</td>
    <td id ='area' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
    <td id ='disciplina' data-id_disciplina = '".$registro['id']."'>".$registro['disciplinas']."</td>
    <td id ='concepto' data-id_concepto = '".$registro['id']."'>".$registro['concepto']."</td>
    <td id ='empleado' data-id_empleado = '".$registro['id']."'>".$registro['responsable']."</td>
    <td id ='presupuesto2' data-id_presupuesto2 = '".$registro['id']."'contenteditable>".number_format($registro['total'])."</td>
    <td><button id ='eliminar' data-id= '".$registro['id']."'>Eliminar</button></td>
  </tr>";
}

 ?>

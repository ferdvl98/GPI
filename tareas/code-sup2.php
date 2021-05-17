<?php

$pres = $_POST["sup"];

//echo $sup;

require_once "conexion.php";

$consulta = $link->query("SELECT at3.`id`, py.nombre as proyecto, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as dis,
  ps2.concepto, at3.`presupuesto` as total , c.nombre as responsable FROM `tareas3` as at3 INNER JOIN tareas2 as t2 ON t2.id = at3.`id_tarea`
  INNER JOIN tareas as ts ON ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2
  ON ps2.id = ts.id_pres INNER JOIN pres as ps ON ps.id = ps2.id_presupuesto INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a
  on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina INNER JOIN cuentas as c on c.id_user = at3.`id_cuenta`
   WHERE at3.`id_cuenta` = $pres");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Proyecto</th>
        <th>Presupuesto</th>
        <th>Tipo</th>
        <th>Area</th>
        <th>Disciplina</th>
        <th>Concepto</th>
        <th>Supervisor</th>
        <th>Total</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
    <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['proyecto']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['presupuesto']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['tipo']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['area']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['dis']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['concepto']."</td>
    <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['responsable']."</td>
    <td id ='horas' data-id_horas = '".$registro['id']."'>".number_format($registro['total'])."</td>
  </tr>";
}

  $sql2 = "SELECT sum(`presupuesto`) as a FROM `tareas3` WHERE id_cuenta = $pres";
  $result = $link->query($sql2);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $num =  $row["a"];?>
      <div class="as">
        <p>
          <b>Total: </b>
          <b name="total"> <?php echo "", number_format($num); ?></b>
        </p>

      </div>
      <?php
    }
  }

?>

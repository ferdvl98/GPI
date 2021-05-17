<?php

$sup = $_GET["id"];
$pres = $_POST["pres"];
$a = count($pres);

//echo $sup;

require_once "conexion.php";

if ($a != 0) {
  foreach ($pres as $pres2) {
    $consulta = $link->query("SELECT e.id, py.nombre as proyecto, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as dis, ps2.concepto,
    concat_ws('',tr.nombre,' ', tr.Apellido_Paterno,' ',tr.Apellido_Materno) as trabajador, e.inicio, e.fin FROM `equipos` as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id INNER JOIN tareas3 as t3 on t3.id = pe.`id_pres` INNER JOIN tareas2 as t2
    ON t2.id = t3.id_tarea INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres
    INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina
    INNER JOIN trabajador as tr on tr.id = e.`id_trabajador` where t3.id_cuenta = $sup and t3.id_tarea = $pres2");

    /*echo "<table border = '1px' align ='center'>
          <tr>
            <th>Proyecto</th>
            <th>Presupuesto</th>
            <th>Tipo</th>
            <th>Área</th>
            <th>Disciplina</th>
            <th>Concepto</th>
            <th>Jefe de Equipo</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Reporte</th>
          </tr>
  
    ";
*/
echo "<table border = '1px' align ='center'>
          <tr>
            <th>Proyecto</th>
            <th>Presupuesto</th>
            <th>Tipo</th>
            <th>Área</th>
            <th>Disciplina</th>
            <th>Concepto</th>
            <th>Jefe de Equipo</th>
            <th>Inicio</th>
            <th>Fin</th>
          </tr>
  
    ";
    while ($registro = mysqli_fetch_array($consulta)) {

      /*echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '" . $registro['id'] . "'>" . $registro['proyecto'] . "</td>
        <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
        <td id ='inicio' data-id_inicio = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
        <td id ='fin' data-id_fin = '" . $registro['id'] . "'>" . $registro['area'] . "</td>
        <td id ='concepto' data-id_concepto = '" . $registro['id'] . "'>" . $registro['dis'] . "</td>
        <td id ='empleado' data-id_empleado = '" . $registro['id'] . "'>" . $registro['concepto'] . "</td>
        <td id ='hh' data-id_hh = '" . $registro['id'] . "'>" . $registro['trabajador'] . "</td>
        <td id ='em-t' data-id_em-t = '" . $registro['id'] . "'>" . $registro['inicio'] . "</td>
        <td id ='em' data-id_em = '" . $registro['id'] . "'>" . $registro['fin'] . "</td>
        <td><button id ='eliminar' data-id= '" . $registro['id'] . "'>Descargar</button></td>
      </tr>";*/
      echo "
      <tr>
        <td id ='proyecto' data-id_proyecto = '" . $registro['id'] . "'>" . $registro['proyecto'] . "</td>
        <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
        <td id ='inicio' data-id_inicio = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
        <td id ='fin' data-id_fin = '" . $registro['id'] . "'>" . $registro['area'] . "</td>
        <td id ='concepto' data-id_concepto = '" . $registro['id'] . "'>" . $registro['dis'] . "</td>
        <td id ='empleado' data-id_empleado = '" . $registro['id'] . "'>" . $registro['concepto'] . "</td>
        <td id ='hh' data-id_hh = '" . $registro['id'] . "'>" . $registro['trabajador'] . "</td>
        <td id ='em-t' data-id_em-t = '" . $registro['id'] . "'>" . $registro['inicio'] . "</td>
        <td id ='em' data-id_em = '" . $registro['id'] . "'>" . $registro['fin'] . "</td>
      </tr>";
    }
  }
}

<?php

require "conexion.php";

$gs = filter_input(INPUT_POST, 'gs');
$proy = filter_input(INPUT_POST, 'proy');
$pt = filter_input(INPUT_POST, 'pt');

if ($proy != 's') {
  if ($pt == 'trs') {
    if ($gs == 'g') {
      $sql = "SELECT DISTINCT  c.id_user, c.nombre FROM `cuentas` as c INNER JOIN tareas as t on t.id_cuenta = c.id_user INNER JOIN 
       proyecto as py on py.id_proyecto = t.id_proyecto where py.id_proyecto = $proy";
      $query = mysqli_query($link, $sql);
      $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
      mysqli_close($link);
?>
      <option value="s">- Seleccione -</option>
      <?php foreach ($filas as $op) : //creamos las opciones a partir de los datos obtenidos 
      ?>
        <option value="<?= $op['id_user'] ?>"><?= $op['nombre'] ?></option>
      <?php endforeach; ?>
    <?php
    } else if ($gs == 'si') {
      $sql = "SELECT DISTINCT  c.id_user, c.nombre FROM `tareas2` as t2 INNER JOIN cuentas as c on c.id_user = t2.id_cuenta INNER JOIN tareas as ts on 
       t2.id_tarea = ts.id INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto where py.id_proyecto = $proy";
      $query = mysqli_query($link, $sql);
      $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
      mysqli_close($link);
    ?>
      <option value="s">- Seleccione -</option>
      <?php foreach ($filas as $op) : //creamos las opciones a partir de los datos obtenidos 
      ?>
        <option value="<?= $op['id_user'] ?>"><?= $op['nombre'] ?></option>
      <?php endforeach; ?>
    <?php
    } else if ($gs == 'su') {
      $sql = "SELECT DISTINCT  c.id_user, c.nombre FROM `tareas3` as t3 INNER JOIN cuentas as c on c.id_user = t3.`id_cuenta` INNER JOIN tareas2 as 
     t2 on t3.`id_tarea` = t2.id INNER JOIN tareas as t on t2.id_tarea = t.id INNER JOIN proyecto as py on py.id_proyecto = t.id_proyecto 
     WHERE py.id_proyecto = $proy";
      $query = mysqli_query($link, $sql);
      $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
      mysqli_close($link);
    ?>
      <option value="s">- Seleccione -</option>
      <?php foreach ($filas as $op) : //creamos las opciones a partir de los datos obtenidos 
      ?>
        <option value="<?= $op['id_user'] ?>"><?= $op['nombre'] ?></option>
      <?php endforeach; ?>
    <?php

    } else if ($gs == 'eq') {
      $sql = "SELECT DISTINCT e.id as a, concat_ws('', tr.nombre, ' ', tr.Apellido_Paterno, ' ',tr.Apellido_Materno) as persona FROM `equipos` 
      as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id INNER JOIN tareas3 as t3 on t3.id = pe.`id_pres` INNER JOIN tareas2 as t2 
      on t2.id = t3.id_tarea INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto =
       ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto 
       INNER JOIN tipo as t ON t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = 
       ps2.id_disciplina INNER JOIN trabajador as tr ON tr.id = e.`id_trabajador` where py.id_proyecto = $proy";
      $query = mysqli_query($link, $sql);
      $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
      mysqli_close($link);
    ?>
      <option value="s">- Seleccione -</option>
      <?php foreach ($filas as $op) : //creamos las opciones a partir de los datos obtenidos 
      ?>
        <option value="<?= $op['a'] ?>"><?= $op['persona'] ?></option>
      <?php endforeach; ?>
<?php

    }
  }
}

?>
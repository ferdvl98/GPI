<?php

  require_once "conexion.php";

  $id_pres = filter_input(INPUT_POST, 'id_pres'); //id del presupuesto
  $id_proy = filter_input(INPUT_POST, 'id_proy'); //id del proyecto
  $tipo = filter_input(INPUT_POST, 't_pres'); //tipo de presupuesto
  $id_area = filter_input(INPUT_POST, 'id_area'); //tipo del area

//  if($tipo == "VyT"){
    $sql = "SELECT DISTINCT d.id, d.nombre FROM aux_proyecto as ap INNER JOIN proyecto as py ON py.id_proyecto = ap.id_proyecto
    INNER JOIN pres as ps ON ap.id_presupuesto = ps.id INNER JOIN presupuestos2 as p2 ON p2.id_presupuesto = ps.id
    INNER JOIN disciplinas as d ON p2.`id_disciplina` = d.id WHERE py.id_proyecto = $id_proy and ps.id_tipo = $tipo and ps.id = $id_pres and p2.id_area = $id_area order by d.id";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
    <?php endforeach; ?>

<?php

/*}else if($tipo == "CO"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_co as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.co = ay.id_co WHERE p.id_proyecto = $id_proy and ay.id_co = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "seguros"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_seg as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.seg = ay.id_seg WHERE p.id_proyecto = $id_proy and ay.id_seg = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "instalaciones"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_ins as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.ins = ay.id_ins WHERE p.id_proyecto = $id_proy and ay.id_ins = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "equipos"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_eq as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.eq = ay.id_eq WHERE p.id_proyecto = $id_proy and ay.id_eq = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "admin"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_admin as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.admin = ay.id_admin WHERE p.id_proyecto = $id_proy and ay.id_admin = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "fya"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_fya as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.fya = ay.id_fya WHERE p.id_proyecto = $id_proy and ay.id_fya = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}else if($tipo == "hyc"){
  //echo "string";
  $sql = "SELECT d.nombre, d.id FROM `disciplinas` as d INNER JOIN aux_hyc as ay ON ay.id_dis = d.id INNER JOIN presupuestos as p on p.hyc = ay.id_hyc WHERE p.id_proyecto = $id_proy and ay.id_hyc = $id_pres and ay.id_area = $id_area GROUP BY d.nombre";
  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

}*/


?>

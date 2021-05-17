<?php
  require_once "conexion.php";

  $tipo = filter_input(INPUT_POST, 'tipo');
  $id_p = filter_input(INPUT_POST, 'name');
  echo "tipo: $tipo, pres: $id_p";

  //if($tipo == "VyT"){
    $sql = "SELECT ps.nombre, ps.presupuesto, ps.id FROM pres as ps INNER JOIN aux_proyecto as ap ON ap.id_presupuesto = ps.id INNER JOIN
    proyecto as py ON py.id_proyecto = ap.id_proyecto WHERE py.id_proyecto = $id_p and ps.id_tipo = $tipo ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id'] ?>"><?= $op['nombre']. ' - $'.number_format($op['presupuesto'])?></option>
    <?php endforeach; ?>

<?php
  /*}else if($tipo == "CO"){
    $sql = "SELECT v.nombre, v.total, v.id_co from co as v INNER JOIN presupuestos as p ON v.id_co = p.co WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_co'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo == "seguros"){
    $sql = "SELECT v.nombre, v.total, v.id_seg from seguros as v INNER JOIN presupuestos as p ON v.id_seg = p.seg WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_seg'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo == "instalaciones"){
    $sql = "SELECT v.nombre, v.total, v.id_ins from instalaciones as v INNER JOIN presupuestos as p ON v.id_ins = p.ins WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_ins'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo == "equipos"){
    $sql = "SELECT v.nombre, v.total, v.id_eq from equipos as v INNER JOIN presupuestos as p ON v.id_eq = p.eq WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_eq'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo == "admin"){
    $sql = "SELECT v.nombre, v.total, v.id_admin from admin as v INNER JOIN presupuestos as p ON v.id_admin = p.admin WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_admin'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo =="fya"){
    $sql = "SELECT v.nombre, v.total, v.id_fya from fya as v INNER JOIN presupuestos as p ON v.id_fya = p.fya WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_fya'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
  }else if($tipo =="hyc"){
    $sql = "SELECT v.nombre, v.total, v.id_hyc from hyc as v INNER JOIN presupuestos as p ON v.id_hyc = p.hyc WHERE p.id_proyecto = $id_p ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <option value="s">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id_hyc'] ?>"><?= $op['nombre']. ' - $'.number_format($op['total'])?></option>
    <?php endforeach; ?>
<?php
}*/

?>

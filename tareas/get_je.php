<?php

  require_once "conexion.php";

  $pres = filter_input(INPUT_POST, 'pres');
  $supe = filter_input(INPUT_POST, 'supe');


  $sql = "SELECT DISTINCT t.id, concat_ws(' ', t.nombre, t.Apellido_Paterno, t.Apellido_Materno) as nombre FROM trabajador as t INNER JOIN aux_tareas3_2 as a ON a.id_je = t.id
          WHERE a.id_tarea = $pres and a.id_res = $supe";

  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

?>

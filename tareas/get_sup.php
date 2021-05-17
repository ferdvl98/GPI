<?php

  require_once "conexion.php";

  $id = $_GET["id"];

  $a = filter_input(INPUT_POST, 'a');
  //echo "$a";


  $sql = "SELECT h.id_super, c.nombre FROM `horas2` as h INNER JOIN cuentas as c ON c.id_user = h.`id_super` WHERE `id_pres` = $a";

  $query = mysqli_query($link, $sql);
  $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_close($link);
?>
  <option value="s">- Seleccione -</option>
  <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
  <option value="<?= $op['id_super'] ?>"><?= $op['nombre']?></option>
  <?php endforeach; ?>

<?php

?>

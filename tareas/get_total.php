<?php
  require_once "conexion.php";

  $tipo = filter_input(INPUT_POST, 'tipo');
  $proyecto = filter_input(INPUT_POST, 'proyecto');
  $pres = filter_input(INPUT_POST, 'pres');

  //echo $tipo, " ", $proyecto, " ", $pres;

  if($tipo == "VyT"){
    $sql = "SELECT  v.total from vyt as v INNER JOIN presupuestos as p ON v.id_vyt = p.vyt WHERE p.id_proyecto = $proyecto ";
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_close($link);
?>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
      <input id="total" value="<?= number_format($op['total']) ?>">
    <?php endforeach; ?>
<?php
  }

?>

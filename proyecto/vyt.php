<?php

require_once "conexion.php";

$tipo = $_POST["tipo"];
$nombre = "";

$sql = "SELECT nombre FROM tipo where id = $tipo";
$result = $link->query($sql);
if($tipo != 's'){
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $nombre =  $row["nombre"];
    }
  }

  ?>
  <label for="">Seleccione Presupuesto</label>
  <select class="caja" name ="vty" id="sel">
    <option value="s" selected>- Seleccione -</option>
      <?php
        $query = $link -> query ("SELECT id, nombre FROM `pres` WHERE id_tipo = $tipo");
        while ($valores = mysqli_fetch_array($query)) {
          echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
        }
      ?>
    </select>

  <?php


}


?>

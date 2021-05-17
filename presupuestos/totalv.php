<?php

  require_once "conexion.php";

  $consulta = "SELECT SUM(ig) as total FROM `aux_aux`";
  $resultado = mysqli_query($link, $consulta);
  if($resultado){
    while ($row = $resultado->fetch_array()) {
      $total = $row["total"];
      ?>
      <div class="as">
        <p>
          <b>Total: </b>
          <b name="total"> <?php echo "$ ", number_format($total); ?></b>
        </p>

      </div>
      <?php
      // code...
    }
  }

?>

<?php

  require_once "conexion.php";
   $id = $_GET["id"];
   $tipo = $_POST["tipo"];
   $nombre = "";



  $consulta = "SELECT SUM(ig) as total FROM `aux_presupuestos2` where tipo = $tipo and a = $id";
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

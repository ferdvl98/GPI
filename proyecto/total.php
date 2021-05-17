<?php

  require_once "conexion.php";

  $id = $_GET["id"];

  $consulta = "SELECT SUM(p.presupuesto) as total FROM pres as p INNER JOIN `aux_pres2` as ap ON p.id = ap.`id_presupuesto` WHERE a = $id";
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

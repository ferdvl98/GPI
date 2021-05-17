<?php

  require_once "conexion.php";
  
  $id_p = filter_input(INPUT_POST, 'id_proy');
  
  if($id_p != "s"){
    $consulta = "SELECT presupuesto FROM tareas WHERE id =$id_p";
    $resultado = mysqli_query($link, $consulta);
    if($resultado){
      while ($row = $resultado->fetch_array()) {
        $total = $row["presupuesto"];
        //echo $total;
        ?>
        <div class="as">
          <p>
            <b>Total: </b>
            <b name="total"> <?php echo "$ ", number_format($total); ?></b>
          </p>

        </div>
        <?php
      }
    }
  }
  
 ?>
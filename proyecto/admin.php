<?php

require_once "conexion.php";
?>
<label for="">Seleccione Presupuesto</label>
<select class="caja" name ="vty">
    <?php
      $query = $link -> query ("SELECT * FROM `admin`");
      while ($valores = mysqli_fetch_array($query)) {
        echo '<option value="'.$valores[id_admin].'">'.$valores[nombre].'</option>';
      }
    ?>
  </select>
<?php

?>

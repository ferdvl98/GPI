<?php
  require_once "conexion.php";
  $pre = $_POST["pre"];
  $uno = $_POST["uno"];
  $proy = "";

  $sql = "SELECT `id_proyecto` FROM `proyecto` WHERE `nombre`='$uno'";
  $result = $link->query($sql);
  if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
       $proy = $row["id_proyecto"];
     }
  }

  if($pre == "Viajes y Traslados"){
    //echo $proy;
?>
    <label for="nombre">Seleccione Presupuesto</label>
    <select class="caja" name ="presupuestos" id="hola">
    <option value="s" selected>Seleccione</option>
    <?php

      $query = $link -> query ("SELECT vt.id_vyt, vt.nombre, vt.total FROM `vyt` as vt INNER JOIN presupuestos as p on vt.id_vyt = p.vyt where p.id_proyecto = $proy");
      while ($valores = mysqli_fetch_array($query)) {
        echo '<option value="'.$valores[id_vyt].'">'.$valores[nombre].' - $'.$valores[total].'</option>';
      }
    ?>
    </select>
<?php
  }else if($pre == "Costos Operativo"){
    ?>
        <label for="nombre">Seleccione Presupuesto</label>
        <select class="caja" name ="presupuestos" id="hola">
        <option value="s" selected>Seleccione</option>
        <?php

          $query = $link -> query ("SELECT vt.id_co, vt.nombre, vt.total FROM `co` as vt INNER JOIN presupuestos as p on vt.id_co = p.co where p.id_proyecto = $proy");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id_co].'">'.$valores[nombre].' - $'.$valores[total].'</option>';
          }
        ?>
        </select>
    <?php

  }else if($pre == "Instalaciones"){
    ?>
        <label for="nombre">Seleccione Presupuesto</label>
        <select class="caja" name ="presupuestos" id="hola">
        <option value="s" selected>Seleccione</option>
        <?php

          $query = $link -> query ("SELECT vt.id_ins, vt.nombre, vt.total FROM `instalaciones` as vt INNER JOIN presupuestos as p on vt.id_ins = p.ins where p.id_proyecto = $proy");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id_ins].'">'.$valores[nombre].' - $'.$valores[total].'</option>';
          }
        ?>
        </select>
    <?php
}else if($pre == "Equipos, Epp, Herramientas, Consumibles,  Controles y pruebas"){
  ?>
      <label for="nombre">Seleccione Presupuesto</label>
      <select class="caja" name ="presupuestos" id="hola">
      <option value="s" selected>Seleccione</option>
      <?php

        $query = $link -> query ("SELECT vt.id_eq, vt.nombre, vt.total FROM `equipos` as vt INNER JOIN presupuestos as p on vt.id_eq = p.eq where p.id_proyecto = $proy");
        while ($valores = mysqli_fetch_array($query)) {
          echo '<option value="'.$valores[id_eq].'">'.$valores[nombre].' - $'.$valores[total].'</option>';
        }
      ?>
      </select>
  <?php
}else if($pre == "Administracion de proyecto"){
  ?>
      <label for="nombre">Seleccione Presupuesto</label>
      <select class="caja" name ="presupuestos" id="hola">
      <option value="s" selected>Seleccione</option>
      <?php

        $query = $link -> query ("SELECT vt.id_admin, vt.nombre, vt.total FROM `admin` as vt INNER JOIN presupuestos as p on vt.id_admin = p.admin where p.id_proyecto = $proy");
        while ($valores = mysqli_fetch_array($query)) {
          echo '<option value="'.$valores[id_admin].'">'.$valores[nombre].' - $'.$valores[total].'</option>';
        }
      ?>
      </select>
  <?php
}

 ?>

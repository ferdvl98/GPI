<?php

require_once "conexion.php";
$id = $_POST["pro"];
//echo $id;
$ac = $_POST["accion"];
$pres = $_POST["status2"];
$tar = $_POST["statuss"];
$a = $_POST["a"];
$tipo = "";

if ($id != 's') {
  if ($ac == 'pres') {
    if ($pres != 's') {
      $consulta = "SELECT SUM(ps.presupuesto) as total FROM `pres` as ps INNER JOIN aux_proyecto as ap on ap.id_presupuesto = ps.id INNER JOIN
          proyecto as py on py.id_proyecto = ap.id_proyecto WHERE ps.id_tipo = $pres and py.id_proyecto = $id";
      $resultado = mysqli_query($link, $consulta);
      if ($resultado) {
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
        }
      }

      $consulta = $link->query("SELECT py.id_proyecto, py.nombre as proyecto, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area,
               d.nombre as dis, ps2.concepto, ps2.unidad, ps2.cantidad, ps2.iu, ps2.ig FROM `aux_proyecto` as ap INNER JOIN
               proyecto as py on py.id_proyecto = ap.`id_proyecto`
              INNER JOIN pres as ps on ps.id = ap.`id_presupuesto` INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN presupuestos2
              as ps2 on ps2.id_presupuesto = ps.id INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas
              as d on d.id = ps2.id_disciplina where py.id_proyecto = $id and t.id = $pres order by ps.id");
      echo "<table class = 'table2' border = '1px' align ='center' >
                    <tr>
                        <th>Tipo</th>
                        <th>Presupuesto</th>
                        <th>Área</th>
                        <th>Disciplina</th>
                        <th>Concepto</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>iu</th>
                        <th>ig</th>
                    </tr>

              ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
                <tr>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['tipo'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['presupuesto'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['area'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['dis'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['concepto'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . $registro['unidad'] . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . number_format($registro['cantidad']) . "</td>
                    <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id_proyecto'] . "'>" . number_format($registro['iu']) . "</td>
                    <td  width= 25% style=text-align:right id ='disciplina' data-id_disciplina = '" . $registro['id_proyecto'] . "'>" . number_format($registro['ig']) . "</td>
                </tr>";
      }
    } else {
      $consulta = "SELECT presupuesto FROM `proyecto` where id_proyecto = $id";
      $resultado = mysqli_query($link, $consulta);
      if ($resultado) {
        while ($row = $resultado->fetch_array()) {
          $total = $row["presupuesto"];
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
      $consulta = $link->query("SELECT ps.id, t.nombre as tipo, ps.nombre as presupuesto, ps.presupuesto as total FROM pres as ps INNER JOIN 
              aux_proyecto as ap ON ps.id = ap.id_presupuesto INNER JOIN proyecto as py ON py.id_proyecto = ap.id_proyecto INNER JOIN tipo as 
              t on t.id = ps.id_tipo WHERE py.id_proyecto = $id");
      echo "<table class = 'table2' border = '1px' align ='center' >
                <tr>
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th>Presupuesto</th>
                </tr>

                ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
                  <tr>
                      <td width= 50% style=text-align:left id ='concepto' data-id_concepto = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
                      <td  width= 25% style=text-align:left id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
                      <td  width= 25% style=text-align:right id ='disciplina' data-id_disciplina = '" . $registro['id'] . "'>" . "$" . number_format($registro['total']) . "</td>
                  </tr>";
      }
    }
  } else if ($ac == 'trs') {
    if ($tar == 'g') {
      if ($a != 's') {
        $consulta = $link->query("SELECT ts.id, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, ps2.concepto, 
            ts.`presupuesto` as total FROM `tareas` as ts INNER JOIN proyecto as py on py.id_proyecto = ts.`id_proyecto` INNER JOIN presupuestos2 as ps2 
            on ps2.id = ts.`id_pres` INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN 
            area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id =ps2.id_disciplina WHERE ts.`id_cuenta` = $a and 
            py.id_proyecto = $id");

        echo "<table border = '1px' align ='center'>
                    <tr>
                      <th>Presupuesto</th>
                      <th>Tipo</th>
                      <th>Area</th>
                      <th>Disciplina</th>
                      <th>Concepto</th>
                      <th>Presupuesto</th>
                      <th>*</th>
                    </tr>

              ";
              

        while ($registro = mysqli_fetch_array($consulta)) {

          echo "
                <tr>
                  <td id ='proyecto' data-id_proyecto = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
                  <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
                  <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['area'] . "</td>
                  <td id ='disciplina' data-id_disciplina = '" . $registro['id'] . "'>" . $registro['disciplina'] . "</td>
                  <td id ='concepto' data-id_concepto = '" . $registro['id'] . "'>" . $registro['concepto'] . "</td>
                  <td id ='presupuesto2' data-id_presupuesto2 = '" . $registro['id'] . "'>" . number_format($registro['total']) . "</td>
                  <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
                </tr>";
        }

        $consulta = "SELECT SUM(t.`presupuesto`) as a FROM `tareas` as t where t.id_proyecto = $id and t.id_cuenta = $a";
        $resultado = mysqli_query($link, $consulta);
        if ($resultado) {
          while ($row = $resultado->fetch_array()) {
            $total = $row["a"];
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
    } else if ($tar == 'si') {
      if ($a != 's') {
        $consulta = $link->query("SELECT t2.`id`, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, 
        ps2.concepto, t2.`presupuesto` as total FROM `tareas2` as t2 INNER JOIN tareas as ts on ts.id = t2.`id_tarea` INNER JOIN proyecto as py on 
        py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto 
        INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = 
        ps2.id_disciplina WHERE py.id_proyecto = $id and t2.`id_cuenta` = $a");

        echo "<table border = '1px' align ='center'>
                    <tr>
                      <th>Presupuesto</th>
                      <th>Tipo</th>
                      <th>Area</th>
                      <th>Disciplina</th>
                      <th>Concepto</th>
                      <th>Presupuesto</th>
                      <th>*</th>
                    </tr>

              ";

        while ($registro = mysqli_fetch_array($consulta)) {

          echo "
                <tr>
                  <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
                  <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
                  <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['area'] . "</td>
                  <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['disciplina'] . "</td>
                  <td id ='disciplina' data-id_disciplina = '" . $registro['id'] . "'>" . $registro['concepto'] . "</td>
                  <td id ='presupuesto2' data-id_presupuesto2 = '" . $registro['id'] . "'>" . number_format($registro['total']) . "</td>
                  <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
                </tr>";
        }

        $consulta = "SELECT SUM(t2.presupuesto) as a FROM `tareas2` as t2 INNER JOIN tareas as t on t2.`id_tarea` = t.id INNER JOIN 
              proyecto as py on py.id_proyecto = t.id_proyecto WHERE py.id_proyecto = $id and t2.`id_cuenta` = $a";
        $resultado = mysqli_query($link, $consulta);
        if ($resultado) {
          while ($row = $resultado->fetch_array()) {
            $total = $row["a"];
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
    } else if ($tar == 'su') {
      $consulta = $link->query("SELECT t3.id, ps.nombre as presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, 
      pst2.concepto, t3.presupuesto as total FROM `tareas3` as t3 INNER JOIN tareas2 as t2 on t2.id = t3.`id_tarea` INNER JOIN tareas as ts on 
      t2.id_tarea = ts.id INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto INNER JOIN presupuestos2 as pst2 on pst2.id = ts.id_pres 
      INNER JOIN pres as ps on ps.id = pst2.id_presupuesto INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a on a.id = pst2.id_area 
      INNER JOIN disciplinas as d on d.id = pst2.id_disciplina WHERE py.id_proyecto = $id AND t3.`id_cuenta` = $a");

      echo "<table border = '1px' align ='center'>
      <tr>
        <th>Presupuesto</th>
        <th>Tipo</th>
        <th>Area</th>
        <th>Disciplina</th>
        <th>Concepto</th>
        <th>Presupuesto</th>
        <th>*</th>
      </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
      <tr>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['presupuesto'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['tipo'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['area'] . "</td>
      <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['disciplina'] . "</td>
      <td id ='disciplina' data-id_disciplina = '" . $registro['id'] . "'>" . $registro['concepto'] . "</td>
      <td id ='presupuesto2' data-id_presupuesto2 = '" . $registro['id'] . "'>" . number_format($registro['total']) . "</td>
      <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
      </tr>";
      }

      $sql2 = "SELECT SUM(t3.`presupuesto`) as a FROM `tareas3` as t3 INNER JOIN tareas2 as t2 on t2.id = t3.`id_tarea` INNER JOIN tareas as ts on 
     ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto = ts.id_proyecto WHERE py.id_proyecto = $id and t3.`id_cuenta` = $a";
      $result = $link->query($sql2);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $num =  $row["a"]; ?>
          <div class="as">
            <p>
              <b>Total: </b>
              <b name="total"> <?php echo "$", number_format($num); ?></b>
            </p>

          </div>
    <?php
        }
      }
    }else if ($tar == 'eq') {
      $consulta = $link->query("SELECT p.id, concat_ws(' ', t.nombre, ' ', t.Apellido_Paterno, ' ', t.Apellido_Materno) as persona, c.nombre, p.hh, p.hh_real FROM 
      `planilla` as p INNER JOIN trabajador as t on t.id = p.`id_trabajador` INNER JOIN categoria as c on c.id = p.`id_categoria` INNER JOIN equipos as e on 
      e.id = p.`id_equipo` WHERE e.id = $a");

      echo "<table border = '1px' align ='center'>
      <tr>
        <th>Trabajador</th>
        <th>Categoría</th>
        <th>HH</th>
        <th>HH Real</th>
        <th>*</th>
      </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
      <tr>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['persona'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['nombre'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['hh'] . "</td>
      <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['hh_real'] . "</td>
      <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
      </tr>";
      }

      $consulta = $link->query("SELECT `id`, `em`, `hh`, `hh_real` FROM `equipo_m` WHERE `id_equipo` = $a");

      echo "<table border = '1px' align ='center'>
      <tr>
        <th>Equipo Mayor</th>
        <th>HH</th>
        <th>HH Real</th>
        <th>*</th>
      </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
      <tr>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['em'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['hh'] . "</td>
      <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['hh_real'] . "</td>
      <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
      </tr>";
      }

      $consulta = $link->query("SELECT `id`, `tarea`, `hh`, `hh_real` FROM `tareas4` WHERE `id_equipo` = $a");

      echo "<table border = '1px' align ='center'>
      <tr>
        <th>Tareas</th>
        <th>HH</th>
        <th>HH Real</th>
        <th>*</th>
      </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
      <tr>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['tarea'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['hh'] . "</td>
      <td id ='area' data-id_area = '" . $registro['id'] . "'>" . $registro['hh_real'] . "</td>
      <td><button id ='eliminar' data-id= '".$registro['id']."'>Quitar</button></td>
      </tr>";
      }

      $consulta = $link->query("SELECT `id`, `ad`, `accion` FROM `analisis` WHERE `id_equipo` = $a");

      echo "<table border = '1px' align ='center'>
      <tr>
        <th>Análisis de Desempeño</th>
        <th>Acciones</th>
      </tr>

      ";

      while ($registro = mysqli_fetch_array($consulta)) {

        echo "
      <tr>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['ad'] . "</td>
      <td id ='tipo' data-id_tipo = '" . $registro['id'] . "'>" . $registro['accion'] . "</td>
      </tr>";
      }

    }

    
  } else {
    ?>
    <div class="">
      <p>
        <b name="total"> <?php echo "¿Qué desea ver?"; ?></b>
      </p>

    </div>
  <?php
  }
} else {
  ?>
  <div class="">
    <p>
      <b name="total"> <?php echo "Debe seleccionar un proyecto"; ?></b>
    </p>

  </div>
<?php
}


?>
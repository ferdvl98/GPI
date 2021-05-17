<?php

    $user = $_POST["user"];

    require_once "conexion.php";

    if($user != 's'){

        $id_per = "";
        $sql = "SELECT id_persona FROM as_puesto where id = $user";
        $result = $link->query($sql);


        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $id_per =  $row["id_persona"];
          }
        }

        $consulta = $link->query("SELECT t2.`id`, py.nombre as proyecto, ps.nombre as nombre, t.nombre as tipo, a.nombre as area, d.nombre as disciplina,
           ps2.concepto, c.nombre as responsable, t2.`presupuesto`
        FROM `tareas2` as t2 INNER JOIN tareas as ts ON ts.id = t2.`id_tarea` INNER JOIN presupuestos2 as ps2 ON ps2.id = ts.id_pres
        INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN proyecto as py ON py.id_proyecto = ts.id_proyecto
        INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN area as a ON a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina
        INNER JOIN cuentas as c ON c.id_user = t2.`id_cuenta`");

        echo "<table border = '1px' align ='center'>
              <tr>
                <th>Proyecto</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Area</th>
                <th>Disciplina</th>
                <th>Concepto</th>
                <th>Responsable</th>
                <th>Presupuesto</th>
              </tr>

        ";

        while ($registro = mysqli_fetch_array($consulta)) {

          echo "
          <tr>
            <td id ='proyecto' data-id_proyecto = '".$registro['id']."'>".$registro['proyecto']."</td>
            <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['tipo']."</td>
            <td id ='tipo' data-id_tipo = '".$registro['id']."'>".$registro['nombre']."</td>
            <td id ='area' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
            <td id ='disciplina' data-id_disciplina = '".$registro['id']."'>".$registro['disciplina']."</td>
            <td id ='concepto' data-id_concepto = '".$registro['id']."'>".$registro['concepto']."</td>
            <td id ='empleado' data-id_empleado = '".$registro['id']."'>".$registro['responsable']."</td>
            <td id ='presupuesto' data-id_presupuesto = '".$registro['id']."'>".number_format($registro['presupuesto'])."</td>
          </tr>";
        }

    }

?>

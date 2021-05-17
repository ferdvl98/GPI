<?php

  require 'conexion.php';

  $tipo = $_POST["tipo"];
  $an = $_POST["an"];
  
  if($an == 'no'){
    $consulta = $link->query("SELECT ps.id, ps.nombre as nombre, ps.presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, pst2.concepto, pst2.unidad, pst2.cantidad, pst2.iu, 
    pst2.ig from pres as ps INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN presupuestos2 as pst2 on ps.id = pst2.id_presupuesto INNER JOIN area as a on 
    pst2.id_area = a.id INNER JOIN disciplinas as d on d.id = pst2.id_disciplina where t.id = $tipo and not EXISTS (SELECT * FROM aux_proyecto as ap WHERE
    ap.id_presupuesto = ps.id)");

  }else{
    $consulta = $link->query("SELECT ps.id, ps.nombre as nombre, ps.presupuesto, t.nombre as tipo, a.nombre as area, d.nombre as disciplina, pst2.concepto, pst2.unidad, pst2.cantidad, pst2.iu, 
    pst2.ig from pres as ps INNER JOIN tipo as t on t.id = ps.id_tipo INNER JOIN presupuestos2 as pst2 on ps.id = pst2.id_presupuesto INNER JOIN area as a on 
    pst2.id_area = a.id INNER JOIN disciplinas as d on d.id = pst2.id_disciplina where t.id = $tipo and EXISTS (SELECT * FROM aux_proyecto as ap WHERE
    ap.id_presupuesto = ps.id)");
  }
  //echo "$tipo";
  //if($tipo == "VyT"){
    

    echo "<table id = 'tabla' border = '1px' align ='center'>
        <thead>
          <tr>
            <th>Presupuesto</th>
            <th>Total</th>
            <th>Tipo</th>
            <th>Area</th>
            <th>Disciplina</th>
            <th>Concepto</th>
            <th>Unidad</th>
            <th>Cantidad</th>
            <th>Importe Unitario</th>
            <th>Importe General</th>
          </tr>
        </thead>

    ";

    while ($registro = mysqli_fetch_array($consulta)) {

      echo "
     <tbody>
      <tr>
        <td id ='proyectovyt' data-id_proyectovyt = '".$registro['id']."'>".$registro['nombre']."</td>
        <td id ='tipovyt' data-id_tipo = '".$registro['id']."'>".number_format($registro['presupuesto'])."</td>
        <td id ='areavyt' data-id_area = '".$registro['id']."'>".$registro['tipo']."</td>
        <td id ='areavyt' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
        <td id ='disciplinavyt' data-id_disciplina = '".$registro['id']."'>".$registro['disciplina']."</td>
        <td id ='conceptovyt' data-id_conceptovyt = '".$registro['id']."'>".$registro['concepto']."</td>
        <td id ='empleadovyt' data-id_empleadovyt = '".$registro['id']."'>".$registro['unidad']."</td>
        <td id ='puestovyt' data-id_puestovyt = '".$registro['id']."'>".number_format($registro['cantidad'])."</td>
        <td id ='tareavyt' data-id_tareavyt = '".$registro['id']."'>".number_format($registro['iu'])."</td>
        <td id ='presupuestovyt' data-id_presupuesto2 = '".$registro['id']."'>".number_format($registro['ig'])."</td>
      </tr>
      <tbody>";
    }
?>

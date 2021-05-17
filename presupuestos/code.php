<?php

require_once "conexion.php";

$dec = 2;

$consulta = $link->query("SELECT a.id, ar.nombre as area, dis.nombre as disciplina, a.`concepto`, a.`unidad`, a.`cantidad`, a.`iu`, a.`ig` FROM `aux_aux` as a INNER JOIN area as ar ON a.`id_area` = ar.id INNER JOIN disciplinas as dis ON a.`id_dis` = dis.id ");

echo "<table border = '1px' align ='center'>
      <tr>
        <th>Area</th>
        <th>Disciplina</th>
        <th>Concepto</th>
        <th>Unidad</th>
        <th>Cantidad</th>
        <th>Importe Unitario</th>
        <th>Importe general</th>
        <th>Costo</th>
      </tr>

";

while ($registro = mysqli_fetch_array($consulta)) {

  echo "
  <tr>
    <td id ='area' data-id_area = '".$registro['id']."'>".$registro['area']."</td>
    <td id ='disciplina' data-id_disciplina = '".$registro['id']."'>".$registro['disciplina']."</td>
    <td id ='concepto' data-id_concepto = '".$registro['id']."'contenteditable>".$registro['concepto']."</td>
    <td id ='unidad' data-id_unidad = '".$registro['id']."'contenteditable>".$registro['unidad']."</td>
    <td id ='cantidad' data-id_cantidad = '".$registro['id']."'contenteditable>".number_format($registro['cantidad'])."</td>
    <td id ='iu' data-id_iu = '".$registro['id']."'contenteditable>".number_format($registro['iu'])."</td>
    <td id ='ig' data-id_ig = '".$registro['id']."'>".number_format($registro['ig'])."</td>
    <td><button typw='button' id ='eliminar' data-id= '".$registro['id']."'>Eliminar</button></td>
  </tr>";
}

 ?>

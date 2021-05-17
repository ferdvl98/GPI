<?php

  require_once "conexion.php";

  $pres = $_POST["pres"];
  $id = $_GET["id"];
  $nombre = "";

  $sql = "SELECT nombre FROM tipo where id = $pres";
  $result = $link->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
    }
  }

  $consulta = $link->query("SELECT ap.id, a.nombre as area, d.nombre as disciplina, ap.concepto, ap.unidad, ap.cantidad, ap.iu, ap.ig
    FROM `aux_presupuestos2` as ap INNER JOIN area as a ON a.id = ap.`id_area` INNER JOIN disciplinas as d on d.id = ap.`id_disciplina`
    WHERE ap.a = $id and ap.tipo = $pres");

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

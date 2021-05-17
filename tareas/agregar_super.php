<?php
echo "sii";
require_once "conexion.php";

$id = $_GET["id"];

$pres = $_POST["pres"];
/*foreach ($pres as $pres2){
  echo $pres2;
}*/
//$arrayRecibido=json_decode($_POST["pres"], true );
//echo $arrayRecibido;
$long =  count($pres);
$je = $_POST["je"];
$inicio = $_POST["inicio"];
$fin = $_POST["fin"];
$num = $sql = "";
$total = 0;

if (empty($inicio) || empty($fin)) {
  echo "Debe seleccionar un periodo";
} else {
  if ($inicio > $fin) {
    echo "Seleccione un periodo valido";
  } else {
    foreach ($pres as $pres2) {
      //echo $pres2;
      $sql = "SELECT count(e.id) as a FROM `equipos` as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id WHERE pe.id_pres = $pres2";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {  
        //echo "aja";
        while ($row = $result->fetch_assoc()) {
          $total = $row["a"];
        }
        if ($total < 4) {
          //echo "  -aja2-";
          $sql = "SELECT *  FROM `equipos` WHERE id_trabajador = $je";
          $result = $link->query($sql);
          if ($result->num_rows > 0) {
            //echo "--aja3--";
            //Descomentar la linea de abajo
            //echo "El trabajador ya ha sido asignado como jefe de equipo, intente con otro";

            //Comentar de aquí
            $sql = "SELECT id FROM equipos where id_trabajador = $je and inicio = '$inicio' and fin = '$fin'";
              $result = $link->query($sql);
              $id5 = "";
              if ($result->num_rows > 0) {
                
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $id5 = $row["id"];
                }
              }

              echo $sql = "INSERT INTO pres_eq (id_pres, id_equipo)
            VALUES ($pres2, $id5)";
            if ($link->query($sql) === TRUE) {
              echo "Presupuesto agregado a Equipo";
            }
            //Hasta aquí
          } else {
            $sql = "INSERT INTO equipos (id_trabajador, inicio, fin)
            VALUES ($je, '$inicio', '$fin')";

            if ($link->query($sql) === TRUE) {
              $sql = "SELECT id FROM equipos where id_trabajador = $je and inicio = '$inicio' and fin = '$fin'";
              $result = $link->query($sql);
              $id5 = "";
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $id5 = $row["id"];
                }
              }

              $sql = "INSERT INTO pres_eq (id_pres, id_equipo)
            VALUES ($pres2, $id5)";
            if ($link->query($sql) === TRUE) {
              echo "Equipo Creado";
            }

              //echo "Equipo Creado";
            } else {
              echo "Error: " . $sql . "<br>" . $link->error;
            }
          }
        } else {
          echo "No puede Asignar más equipos al presupuesto seleccionado";
        }
        //echo "El Supervisor ya tiene equipos agregados, intente con otro";
      }
    }
  }
}

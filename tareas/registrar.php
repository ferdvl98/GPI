<?php

  require 'conexion.php';

  $id = $_GET["id"];
  //echo $id;
  $id_proy = $_POST["proy"];
  $tipo = $_POST["tipos"];
  $id_pres = $_POST["pres"];
  $id_area = $_POST["area"];
  $id_disc = $_POST["disc"];
  $concepto = $_POST["concepto"];
  $id_empl = $_POST["empl"];
  $total = $_POST["total"];
  $concepto2 = $name = $tipo2 = "";
  $nombre = $total2 = "";
  if($id_proy == 's'){
    echo "¡No ha selecionado ningún proyecto!";
  }else{
    if($tipo == 's'){
      echo "¡No ha selecionado el tipo de presupuesto!";
    }else{
      if($id_pres == 's'){
        echo "¡No ha selecionado ningún presupuesto!";
      }else{
        if($id_area == 's'){
          echo "¡No ha selecionado ningún area!";
        }else{
          if($id_disc == 's'){
            echo "¡No ha selecionado ninguna disciplina!";
          }else{
            if($concepto == 's'){
              echo "¡No ha selecionado ningún concepto!";
            }else{
              if($id_empl == 's'){
                echo "¡No ha selecionado a ningún empleado!";
              }else{
                  if(empty(trim($total))){
                    echo "¡Debe asignar un presupuesto!";
                  }else{
                    //if($tipo=='VyT'){
                      //$tipo2 = "Viajes y Traslados";

                      //echo "$id_proy $concepto";

                    $sql = "SELECT total FROM `aux_concepto` where `id_proyecto` = $id_proy and `id_pres` = $concepto ";
                    //echo "pry: ".$id_proy.", tipo: ".$tipo2.", id_pres: ".$id_pres.", area: ".$id_area.", disc: ".$id_disc.", concepto: ".$name.", a: ".$concepto;
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $total2 = $row["total"];
                          }
                        }
                        $total = floatval($total);
                        //echo "total: ".$total;
                        $total2 = floatval($total2);
                        //echo "total2: ".$total2;



                        if($total > $total2){
                            echo  "La cantidad que intenta asignar excede el presupuesto disponible";
                        }else{

                            $total3 = $total2 - $total;

                            if($consulta = $link->query("UPDATE `aux_concepto` SET  total = $total3 where `id_proyecto` = $id_proy  and `id_pres` = $concepto")){
                            }else {
                              echo "Error al actulaizar el total";
                            }

                            $total3 = floatval($total3);
                            $proyecto = $a = $d ="";



                    if($consulta = $link->query("INSERT INTO `aux_tareas`(`id_proyecto`, `id_pres`, `id_cuenta`, `presupuesto`, `id_a`) VALUES ($id_proy, $concepto, $id_empl, $total, $id)")){
                        echo "Presupuesto asignado";



                        $date = date("Y") . "-" . date("m") . "-" . date("d");
                        //echo $asunto;

                        /*if($consulta = $link->query("INSERT INTO `aux_noti` ( `id_user`, `fecha`, `notifico`, `asunto`, `status`) VALUES ($id_per, '$date', $id, '$asunto', 'A')")){
                        }else {
                          echo "Error al crear notificacion";
                        }*/
                    }else {
                      echo "Error al asignar presupuesto";
                    }

                        }



                  }
              }
            }
          }
        }
      }
    }
  }

?>

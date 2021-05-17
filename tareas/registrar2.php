<?php

    require 'conexion.php';

    $id = $_GET["id"];
    //echo $id;

    $id_proy = $_POST["proy"];
    $id_empl = $_POST["empl"];
    $total = $_POST["total"];
    $pres = $nombre = $id_per="";
    $total2 = 0;

    if($id_proy == 's'){
        echo "¡No ha selecionado ningún presupuesto!";
    }else{
        if($id_empl == 's'){
            echo "¡No ha selecionado a ningún responsable!";
        }else{
                if(empty(trim($total))){
                    echo "¡Debe asignar un presupuesto!";
                }else{
                    $sql = "SELECT presupuesto FROM  `aux_concepto2` where id_tarea = $id_proy";
                    $result = $link->query($sql);

                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        $pres=  $row["presupuesto"];
                      }
                    }

                    $pres = floatval($pres);
                    $total = floatval($total);

                    if($total > $pres){
                        echo "El presupuesto que intenta asignar supera al discponible";
                    }else{

                        $sql = "SELECT id_persona FROM  `as_puesto` where id = $id_empl";
                        $result = $link->query($sql);

                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $id_per=  $row["id_persona"];
                          }
                        }
                        //echo "id proy: ".$id_proy.", id_per:  ".$id_per.", nombre:  ".$nombre.", total:  ".$total.", id: ".$id;

                        if($consulta = $link->query("INSERT INTO `aux_tareas2`(`id_tarea`, `id_cuenta`,`presupuesto`, id_a) VALUES ($id_proy, $id_per, $total, $id)")){
                          echo "Presupuesto asignado";
                          $total2 = $pres-$total;

                          if($consulta = $link->query("UPDATE `aux_concepto2` SET `presupuesto`=$total2 WHERE id_tarea = $id_proy")){


                            }else {
                              echo "Error al actualizar presupuesto";
                            }

                        }else {
                          echo "Error al asignar presupuesto";
                        }

                    }




                }


        }
    }

?>

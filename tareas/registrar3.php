<?php

    require 'conexion.php';
    
    $id = $_GET["id"];
    echo $id;
    $identificacion = $_POST["nss"];
    $categoria = $_POST["categroria"];
    $presupuestoH = $_POST["presh"];
    $Tarea = $_POST["tarea"];
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
                        echo "El presupuesto que intenta asignar supera al disponible";
                    }else{
                        $sql = "SELECT p.nombre, t.tipo, t.id_pres, a.nombre as area, d.nombre as dis, t.concepto FROM tareas as t INNER JOIN proyecto as p ON p.id_proyecto = t.id_proyecto INNER JOIN area as a ON a.id = t.id_area INNER JOIN disciplinas as d ON d.id = t.id_disc where t.id = $id_proy";
                        $result = $link->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $nombre = $row["nombre"]." - ".$row["tipo"]." - ".$row["area"]." - ".$row["dis"]." - ".$row["concepto"];
                          }
                        }
                        
                        $nombre = $nombre.": ".$total;
                        //echo "id empleado: ".$id_empl;
                        
                        $sql = "SELECT id_persona FROM  `as_puesto` where id = $id_empl";
                        $result = $link->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $id_per=  $row["id_persona"];
                          }
                        }
                        //echo "id proy: ".$id_proy.", id_per:  ".$id_per.", nombre:  ".$nombre.", total:  ".$total.", id: ".$id;
                        
                        if($consulta = $link->query("INSERT INTO `aux_tareas2`(`id_tarea`, `id_cuenta`, `tarea`, `presupuesto`, id_a) VALUES ($id_proy, $id_per, '$nombre', $total, $id)")){
                          echo "Presupuesto asignado";
                          $total2 = $pres-$total;
                          
                          if($consulta = $link->query("UPDATE `aux_concepto2` SET `presupuesto`=$total2 WHERE id_tarea = $id_proy")){
                          
                          
                            }else {
                              echo "Error al actualizar presupuesto";
                            }
                             $date = date("Y") . "-" . date("m") . "-" . date("d");
                            
                             if($consulta = $link->query("INSERT INTO `aux_noti`( `id_user`, `fecha`, `notifico`, `asunto`, `status`) VALUES ($id_per,'$date',$id,'$nombre','A')")){
                          
                          
                            }else {
                              echo "Error al crear notificaciones";
                            }
                          
                        }else {
                          echo "Error al asignar presupuesto";
                        }
                        
                    }
                    
                    
                    
                      
                }
                      

        }
    }
  
?>
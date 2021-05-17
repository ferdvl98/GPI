<?php
require "conexion.php";

$id = $_POST["id"];
$pt = $_POST["pt"];

if ($pt == 'g') {
    $sql = "DELETE FROM `analisis` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
    t2.id = t3.id_tarea INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

    if ($link->query($sql) === TRUE) {
        //echo "Record deleted successfully";

        $sql = "DELETE FROM `equipo_m` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
        t2.id = t3.id_tarea INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

        if ($link->query($sql) === TRUE) {
            //echo "Record deleted successfully 2";

            $sql = "DELETE FROM `tareas4` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
            t2.id = t3.id_tarea INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

            if ($link->query($sql) === TRUE) {
                //echo "Record deleted successfully 3";

                $sql = "DELETE FROM `planilla` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
                t2.id = t3.id_tarea INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

                if ($link->query($sql) === TRUE) {
                    //echo "Record deleted successfully 4";

                    $sql = "DELETE FROM `equipos` WHERE `id` in ( SELECT t3.`id` from tareas3 as t3 INNER JOIN tareas2 as t2 on t2.id = t3.id_tarea INNER JOIN 
                    tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

                    if ($link->query($sql) === TRUE) {
                        //echo "Record deleted successfully 5";

                        $sql = "DELETE FROM `aux_concepto3` WHERE `id_tarea` in ( SELECT t2.`id` from tareas2 as t2 INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

                        if ($link->query($sql) === TRUE) {
                            //echo "Record deleted successfully 5";
                            $sql = "DELETE FROM `tareas3` WHERE `id_tarea` in ( SELECT t2.`id` from tareas2 as t2 INNER JOIN tareas as t on t.id = t2.id_tarea WHERE t.id = $id)";

                            if ($link->query($sql) === TRUE) {
                                //echo "Record deleted successfully 5";
                                $sql = "DELETE FROM `aux_concepto2` WHERE `id_tarea` = $id";

                                if ($link->query($sql) === TRUE) {
                                    //echo "Record deleted successfully 5";

                                    $sql = "DELETE FROM `tareas2` WHERE `id_tarea` = $id";

                                    if ($link->query($sql) === TRUE) {
                                        //echo "Record deleted successfully 5";
                                        $sql = "DELETE FROM `aux_concepto` WHERE `id_pres` = (SELECT id_pres FROM tareas where id = $id)";

                                        if ($link->query($sql) === TRUE) {
                                            //echo "Record deleted successfully 5";
                                            $sql = "DELETE FROM `tareas` WHERE id = $id";

                                            if ($link->query($sql) === TRUE) {
                                                echo "Presupuesto liberado";
                                            } else {
                                                echo "Error al eliminar presupuesto de Gerentes" . $link->error;
                                            }
                                        } else {
                                            echo "Error al eliminar presupuesto de aux_concepto:" . $link->error;
                                        }
                                    } else {
                                        echo "Error al eliminar presupuesto de Superintendentes:" . $link->error;
                                    }
                                } else {
                                    echo "Error al eliminar presupuesto de aux_concepto2:" . $link->error;
                                }
                            } else {
                                echo "Error al eliminar presupuesto de Supervisores: " . $link->error;
                            }
                        } else {
                            echo "Error al eliminar presupuesto de aux_concepto3: " . $link->error;
                        }
                    } else {
                        echo "Error al eliminar equipos: " . $link->error;
                    }
                } else {
                    echo "Error al eliminar planilla: " . $link->error;
                }
            } else {
                echo "Error al eliminar tareas: " . $link->error;
            }
        } else {
            echo "Error al eliminar equipo mayor: " . $link->error;
        }
    } else {
        echo "Error al eliminar el análisis: " . $link->error;
    }
}else if ($pt == 'si') {
    $sql = "DELETE FROM `analisis` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
    t2.id = t3.id_tarea  WHERE t2.id = $id)";

    if ($link->query($sql) === TRUE) {
        //echo "Record deleted successfully";

        $sql = "DELETE FROM `equipo_m` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
        t2.id = t3.id_tarea WHERE t2.id = $id)";

        if ($link->query($sql) === TRUE) {
            //echo "Record deleted successfully 2";

            $sql = "DELETE FROM `tareas4` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
            t2.id = t3.id_tarea WHERE t2.id = $id)";

            if ($link->query($sql) === TRUE) {
                //echo "Record deleted successfully 3";

                $sql = "DELETE FROM `planilla` WHERE `id_equipo` in ( SELECT e.id from equipos as e INNER JOIN tareas3 as t3 on t3.id = e.id INNER JOIN tareas2 as t2 on 
                t2.id = t3.id_tarea WHERE t2.id = $id)";

                if ($link->query($sql) === TRUE) {
                    //echo "Record deleted successfully 4";

                    $sql = "DELETE FROM `equipos` WHERE `id` in ( SELECT t3.`id` from tareas3 as t3 INNER JOIN tareas2 as t2 on t2.id = t3.id_tarea WHERE t2.id = $id)";

                    if ($link->query($sql) === TRUE) {
                        //echo "Record deleted successfully 5";

                        $sql = "DELETE FROM `aux_concepto3` WHERE `id_tarea` in ( SELECT t2.`id` from tareas2 as t2 WHERE t2.id = $id)";

                        if ($link->query($sql) === TRUE) {
                            //echo "Record deleted successfully 5";
                            $sql = "DELETE FROM `tareas3` WHERE `id_tarea` in ( SELECT t2.`id` from tareas2 as t2 WHERE t2.id = $id)";

                            if ($link->query($sql) === TRUE) {
                                //echo "Record deleted successfully 5";
                                $sql = "DELETE FROM `aux_concepto2` WHERE `id_tarea` in (SELECT id_tarea FROM tareas2 where id = $id)";

                                if ($link->query($sql) === TRUE) {
                                    //echo "Record deleted successfully 5";

                                    $sql = "DELETE FROM `tareas2` WHERE `id` = $id";

                                    if ($link->query($sql) === TRUE) {
                                        echo "Presupuesto liberado";
                                        //echo "Record deleted successfully 5";
                                    } else {
                                        echo "Error al eliminar presupuesto de Superintendentes:" . $link->error;
                                    }
                                } else {
                                    echo "Error al eliminar presupuesto de aux_concepto2:" . $link->error;
                                }
                            } else {
                                echo "Error al eliminar presupuesto de Supervisores: " . $link->error;
                            }
                        } else {
                            echo "Error al eliminar presupuesto de aux_concepto3: " . $link->error;
                        }
                    } else {
                        echo "Error al eliminar equipos: " . $link->error;
                    }
                } else {
                    echo "Error al eliminar planilla: " . $link->error;
                }
            } else {
                echo "Error al eliminar tareas: " . $link->error;
            }
        } else {
            echo "Error al eliminar equipo mayor: " . $link->error;
        }
    } else {
        echo "Error al eliminar el análisis: " . $link->error;
    }
}else if ($pt == 'su') {
    $sql = "DELETE FROM `analisis` WHERE `id_equipo` in ( SELECT id from equipos  WHERE id = $id)";

    if ($link->query($sql) === TRUE) {
        //echo "Record deleted successfully";

        $sql = "DELETE FROM `equipo_m` WHERE `id_equipo` in ( SELECT id from equipos WHERE id = $id)";

        if ($link->query($sql) === TRUE) {
            //echo "Record deleted successfully 2";

            $sql = "DELETE FROM `tareas4` WHERE `id_equipo` in ( SELECT id from equipos WHERE id = $id)";

            if ($link->query($sql) === TRUE) {
                //echo "Record deleted successfully 3";

                $sql = "DELETE FROM `planilla` WHERE `id_equipo` in ( SELECT id from equipos WHERE id = $id)";

                if ($link->query($sql) === TRUE) {
                    //echo "Record deleted successfully 4";

                    $sql = "DELETE FROM `equipos` WHERE `id` = $id";

                    if ($link->query($sql) === TRUE) {
                        //echo "Record deleted successfully 5";

                        $sql = "DELETE FROM `aux_concepto3` WHERE `id_tarea` in (select id_tarea from tareas3 where id=$id)";

                        if ($link->query($sql) === TRUE) {
                            //echo "Record deleted successfully 5";
                            $sql = "DELETE FROM `tareas3` where id = $id";

                            if ($link->query($sql) === TRUE) {
                                //echo "Record deleted successfully 5";
                                echo "Presupuesto liberado";
                            } else {
                                echo "Error al eliminar presupuesto de Supervisores: " . $link->error;
                            }
                        } else {
                            echo "Error al eliminar presupuesto de aux_concepto3: " . $link->error;
                        }
                    } else {
                        echo "Error al eliminar equipos: " . $link->error;
                    }
                } else {
                    echo "Error al eliminar planilla: " . $link->error;
                }
            } else {
                echo "Error al eliminar tareas: " . $link->error;
            }
        } else {
            echo "Error al eliminar equipo mayor: " . $link->error;
        }
    } else {
        echo "Error al eliminar el análisis: " . $link->error;
    }
}


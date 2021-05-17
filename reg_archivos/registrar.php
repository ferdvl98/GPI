<?php


class Gestor
{
    public function agregarRegistroArchivo($datos)
    {
        require "conexion.php";
        $sql = "INSERT INTO archivos (`id_super`, 
                                    `id_jefe`, 
                                    `ruta`, 
                                    `fecha`) 
                VALUES (?,?,?,?)";
        $query = $link->prepare($sql);
        $query->bind_param("iisss",$datos['id_super'],
                                    $datos['id_jefe'],
                                    $datos['ruta'],
                                    $datos['fecha']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
}

<?php

    require_once "conexion.php";
    
    $id = $_POST["id"];

    $super = $_GET["ids"];

    $guardar = "";
    $principal = "SELECT vv FROM archivos Where id = $id";
    $respuesta = mysqli_query($link, $principal);
    if (mysqli_num_rows($respuesta) > 0) {
        while($row = mysqli_fetch_assoc($respuesta)) {
            $guardar=$row["vv"];
        }
    }else{
        echo "0 results";
    }

    if($guardar=='checked'){
        $a = "";
        $consulta = "SELECT id_super FROM archivos Where id = $id";
        $result = mysqli_query($link, $consulta);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $a=$row["id_super"];
            }
        }else{
            echo "0 results";
        }

        $date = date("Y") . "-" . date("m") . "-" . date("d");
        $consulta1 = "INSERT INTO notificaciones (id_user, fecha, notifico, asunto, status)  
                        VALUES ($a,'$date',$super,'ARCHIVO DENEGADO','A')";
        if (mysqli_query($link, $consulta1)) {
            echo "ARCHIVO RECHAZADO";
        } else {
            echo "Error: " . $consulta1 . "<br>" . mysqli_error($link);
        }
        
        $sql = "UPDATE archivos SET vv='' WHERE id=$id";
        if (mysqli_query($link, $sql)){
            echo " Y USUARIO NOTIFICADO";
        }else{
            echo "Error updating record: " . mysqli_error($link);
        }

    }else{
        $a = "";
        $consulta = "SELECT id_super FROM archivos Where id = $id";
        $result = mysqli_query($link, $consulta);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $a=$row["id_super"];
            }
        }else{
            echo "0 results";
        }


        $date = date("Y") . "-" . date("m") . "-" . date("d");
        $consulta1 = "INSERT INTO notificaciones (id_user, fecha, notifico, asunto, status)  
                        VALUES ($a,'$date',$super,'ARCHIVO ACEPTADO','A')";
        if (mysqli_query($link, $consulta1)) {
            echo "ARCHIVO ACEPTADO Y";
        } else {
            echo "Error: " . $consulta1 . "<br>" . mysqli_error($link);
        }
        
        $sql = "UPDATE archivos SET vv='checked' WHERE id=$id";

        if (mysqli_query($link, $sql)){
            echo " USUARIO NOTIFICADO";
        }else{
            echo "Error updating record: " . mysqli_error($link);
        }

    }


    


?>
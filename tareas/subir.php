<?php
    require "conexion.php";
    $valor = $_POST["caja_valor"];
    $id = $_POST["caja_valor2"];
    //echo $valor;
    //echo $valor;

    $uploadfile = $_FILES['uploadfile']['tmp_name'];
    if(!empty($uploadfile)){

        require '../librerias/PHPExcel.php';
        require_once '../librerias/PHPExcel/IOFactory.php';

        $objExcel = PHPExcel_IOFactory::load($uploadfile);

        $objExcel ->setActiveSheetIndex(0);

        $numRows = $objExcel->setActiveSheetIndex(0)->getHighestRow();

        //Horas de cada trabajador

        $statemen2 = $link->prepare("SELECT COUNT(*) as a FROM `planilla` WHERE id_equipo = $valor");
        $statemen2->execute();
        $result2 = $statemen2->get_result();
        while ($row = $result2->fetch_array()) $tareas[] = $row;
        $num = 8;
        $statemen = $link->prepare("SELECT id_trabajador as a FROM `planilla` WHERE id_equipo = $valor");
        $statemen->execute();
        $result = $statemen->get_result();
        $num2 = 0;
        while ($row = $result->fetch_array()) $trs[] = $row;
        for($i=0; $i<$tareas[0]['a']; $i++){
            $num2 = $num2 +1;
            $v = $trs[$i]['a'];
            $nombre = $objExcel->getActiveSheet()->getCell('L'.($i+$num))->getCalculatedValue();
            if(empty($nombre)){
                $nombre = "0";
            }
            $sql = "UPDATE planilla SET hh_real=$nombre WHERE id_trabajador=$v";

            if ($link->query($sql) === TRUE) {
                //echo "Record updated successfully";
            }else{
                ?>
                <script type="text/javascript">
                    var id = "<?php echo $id; ?>";
                    alert("Hoja de Trabajo Incorrecta");
                    window.location ="../tareas/cargar.php?id="+id;
                </script>
                <?php
                echo "error 1". $link->error;
            }
            
        }
        $num = $num +$num2 +3;

        //Horas Tareas
        $statemen2 = $link->prepare("SELECT COUNT(*) as a FROM `tareas4` WHERE id_equipo = $valor");
        $statemen2->execute();
        $result2 = $statemen2->get_result();
        while ($row = $result2->fetch_array()) $tareas4[] = $row;
        $statemen = $link->prepare("SELECT id as a FROM `tareas4` WHERE id_equipo = $valor");
        $statemen->execute();
        $result = $statemen->get_result();
        while ($row = $result->fetch_array()) $trs2[] = $row;
        $num2 = 0;
        for($i=0; $i<$tareas4[0]['a']; $i++){
            $num2 = $num2 +1;
            $v = $trs2[$i]['a'];
            $nombre = $objExcel->getActiveSheet()->getCell('L'.($i+$num))->getCalculatedValue();
            if(empty($nombre)){
                $nombre = "0";
            }
            $sql = "UPDATE tareas4 SET hh_real=$nombre WHERE id=$v";

            if ($link->query($sql) === TRUE) {
                //echo "Record updated successfully";
            }else{
                echo "error 2". $link->error;
                ?>
                <script type="text/javascript">
                    var id = "<?php echo $id; ?>";
                    alert("Hoja de Trabajo Incorrecta");
                    window.location ="../tareas/cargar.php?id="+id;
                </script>
                <?php
            }
            
        }
        $num = $num +$num2 +3;

        //Horas Equipo Mayor
        
        $statemen2 = $link->prepare("SELECT COUNT(*) as a FROM `equipo_m` WHERE id_equipo = $valor");
        $statemen2->execute();
        $result2 = $statemen2->get_result();
        while ($row = $result2->fetch_array()) $em[] = $row;

        $statemen = $link->prepare("SELECT id as a FROM `equipo_m` WHERE id_equipo = $valor");
        $statemen->execute();
        $result = $statemen->get_result();
        while ($row = $result->fetch_array()) $em2[] = $row;
        for($i=0; $i<$em[0]['a']; $i++){
            echo $v = $em2[$i]['a'];
            $nombre = $objExcel->getActiveSheet()->getCell('L'.($i+$num))->getCalculatedValue();
            if(empty($nombre)){
                $nombre = "0";
            }
            $sql2 = "UPDATE equipo_m SET hh_real=$nombre WHERE id=$v";

            if ($link->query($sql2) === TRUE) {
                //echo "Record updated successfully";
            }else{
                echo "error 3". $link->error;
                ?>
                <script type="text/javascript">
                    var id = "<?php echo $id; ?>";
                    alert("Hoja de Trabajo Incorrecta");
                    window.location ="../tareas/cargar.php?id="+id;
                </script>
                <?php
            }
        }
        ?>
        <script type="text/javascript">
            var id = "<?php echo $id; ?>";
            alert("Hoja de Trabajo importada con exito");
            window.location ="../tareas/cargar.php?id="+id;
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            var id = "<?php echo $id; ?>";
            alert("Debe seleccionar una Hoja de Trabajo");
            window.location ="../tareas/cargar.php?id="+id;
        </script>
        <?php
    }
?>


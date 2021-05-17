<?php 
require_once("connect.php");

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Nuevo código -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Código viejo -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="jquery-3.0.0.min.js"></script>
    <script type="text/javascript">
        
      $(document).ready(function(){

        /**NUEEVA ACTUALIZACIÓN */
        $("#enviar").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "nss.php",
                method: "POST",
                data: datos,
                success: function(data){
                  alert(data);
                }
              });
          });

          /**FIN NUEVA ACT */

        function obtener_datos(){
            $.ajax({
              url: "code.php",
              method: "POST",
              success: function(data){
                $("#result").html(data)
              }
            })
          }


          obtener_datos();

          $("#enviar").click(function(){
              var datos = $("#formulario").serialize();
              $.ajax({
                url: "registrar-costo.php",
                method: "POST",
                data: datos,
                success: function(data){
                  obtener_datos();
                  alert(data);
                }
              });

          });

          function actualizar_datos(id, texto, columna){
            $.ajax({
              url: "actualizar-costo.php",
              method: "POST",
              data: {id: id, texto:texto, columna:columna},
              success: function(data){
                obtener_datos();
                alert(data);
              }
            });
            }

          $(document).on("blur", "#nombre", function(){
            var id = $(this).data("id_puesto");
            var nombre = $(this).text();
            actualizar_datos(id, nombre, "nombre");
          });

          $(document).on("blur", "#iu", function(){
            var id = $(this).data("id_costo");
            var nombre = $(this).text();
            nombre = nombre.replace(/,/g, "");
            actualizar_datos(id, nombre, "Costo");
          });



        $(document).on("click", "#eliminar", function(){
          if(confirm("¿Esta seguro de realizar el cambio?")){
          var id =$(this).data("id");
          $.ajax({
            url: "eliminar-trabajador.php",
            method: "POST",
            data: {id:id},
            success: function(data){
              obtener_datos();
              alert(data);
            }
          })

        };
      })

      });

    </script>
    
    <script type="text/javascript">
      function cargarHojaExcel()
      {
        if(document.frmcargararchivo.excel.value=="")
        {
          alert("Suba un archivo");
          document.frmcargararchivo.excel.focus();
          return false;
        }		

        document.frmcargararchivo.action = "procesar.php" ;
        document.frmcargararchivo.submit();
        
      }
      //obtener_datos();
    </script>
    
    <title>TRABAJADOR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos-us.css">
    
  </head>

 <!--NUEVOS--> 
  <body>
    <fieldset>
      <legend>Pago trabajador</legend>
      <form class="formulario2" id="formulario" method="POST">
        <div class="contenedor2">
          
          <left>
            
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; Periodo: </label>
            <input type="text" placeholder="Fecha" size="30" name="fecha" id="dis" required=""/>
            <!--
            <input type="date" placeholder="Fecha" size="40" name="fecha" id="dis" step="1" min="2021-01-01" max="2021-12-31" value="<?php echo date("Y-m-d");?>">
            -->
            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; Número de Seguro Social: </label>
            <input type="text" placeholder="Escriba el NSS" size="20" name="codigo" id="dis" required=""/>
            <br><br>
            <label for="nombre"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Nombre del Trabajador: </label>
            <input type="text" placeholder="Nombre del Trabajador" size="30" name="empleado" id="dis" required=""/>

            <label for="nombre"> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; Pago de horas $</label>
            <input type="number" name = "iu" value = "0" min = "0" max = "1000000" step = "1" size="10" />
            
            <br><br>
            <center>
              <button type="button" id="enviar" class="button"> Registrar </button>
            </center>
          </left>
         
        </div>
      </form>
    </fieldset>
    
    
    <fieldset>
      <legend>Cargar datos de excel</legend>
      <div id = "container">
        <section>
          <form name="importa" method="post" action="" enctype="multipart/form-data" >
            <div class="col-xs-4">
              <div class="form-group">
                <input type="file" class="filestyle" data-buttonText="Seleccione archivo" name="uploadfile">
              </div>
            </div>
            <div class="col-xs-2">
              <input class="button" type='submit' name='enviar'  value="Subir"  />
            </div>
            <input type="hidden" value="upload" name="action" />
            <input type="hidden" value="usuarios" name="mod">
            <input type="hidden" value="masiva" name="acc">
          </form>
	      </section>
      </div>
    </fieldset>


    <fieldset>
      <legend>Trabajadores</legend>
      <div id = "container">


        <div id="result"></div>
      </div>
    </fieldset>
    
    <script>
        
    </script>

  </body>
</html>


<?php
extract($_POST);
if (isset($_POST['action'])){
  $action=$_POST['action'];
}

if (isset($action)== "upload"){
  //cargamos el fichero
  //$archivo = $_FILES['excel']['name'];
  //$tipo = $_FILES['excel']['type'];
  //$destino = "cop_".$archivo;//Le agregamos un prefijo para identificarlo el archivo cargado
  $uploadfile = $_FILES['uploadfile']['tmp_name'];
  if(!empty($uploadfile)){
    require '../librerias/PHPExcel.php';
    require_once '../librerias/PHPExcel/IOFactory.php';

    $objExcel = PHPExcel_IOFactory::load($uploadfile);

    $objExcel ->setActiveSheetIndex(0);

    //$numRows = $objExcel->setActiveSheetIndex(0)->getHighestRow();
    $columnas = $objExcel->setActiveSheetIndex(0)->getHighestColumn();
    $filas = $objExcel->setActiveSheetIndex(0)->getHighestRow();

    for ($i=2;$i<=$filas;$i++){
      $_DATOS_EXCEL[$i]['fecha'] = $objExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
			$_DATOS_EXCEL[$i]['NSS'] = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$_DATOS_EXCEL[$i]['Nombre']= $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
			$_DATOS_EXCEL[$i]['Costo']= $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
			$_DATOS_EXCEL[$i]['activo'] = 1;
    }
    $errores=0;

    foreach($_DATOS_EXCEL as $campo => $valor){
      $sql = "INSERT INTO pagos  (fecha,NSS,Nombre,Costo,activo)  VALUES ('";
      foreach ($valor as $campo2 => $valor2){
        $campo2 == "activo" ? $sql.= $valor2."');" : $sql.= $valor2."','";
      }

      $result = mysqli_query($con, $sql);
    }
    echo "<hr> <div class='col-xs-12'>
      <div class='form-group'>";
    
    echo "</div>
      </div>  ";

      //unlink($destino);
  }else{
    echo "Primero debes cargar el archivo con extencion EXCEL";
  }
}

?>

<?php

if (isset($filas)){
  $columnas = $objExcel->setActiveSheetIndex(0)->getHighestColumn();
}
if (isset($filas)){
  $filas = $objExcel->setActiveSheetIndex(0)->getHighestRow();
}
  
?>


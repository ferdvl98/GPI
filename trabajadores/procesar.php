<?php

	//include("conexion.php");
	require_once "conexion.php";

	if (substr($_FILES['excel']['name'],-3)=="csv")
	{
		$fecha		= date("Y-m-d");
		$carpeta 	= "tmp_excel/";
		$excel  	= $fecha."-".$_FILES['excel']['name'];

		move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
		
		$row = 1;

		$fp = fopen ("$carpeta$excel","r");

		//fgetcsv. obtiene los valores que estan en el csv y los extrae.

		while ($data = fgetcsv ($fp, 1000, ","))
		{
			//si la linea es igual a 1 no guardamos por que serian los titulos de la hoja del excel.
			if ($row!=1)
			{

				$num = count($data);
				$consulta = $link->query("INSERT INTO trabajador (Fecha_de_Movimiento,NSS,Nombre,Apellido_Paterno,Apellido_Materno,Movimiento) 
						   VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','Alta')");
			}

			$row++;

		}

		fclose ($fp);

		echo "<div>La importacion de archivo subio satisfactoriamente</div >";
		
		exit;

	}
	//"<a href='trabajador.php' class='subir'>Regresar a Inicio</a>";
?>
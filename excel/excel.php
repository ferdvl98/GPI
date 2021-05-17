<?php
$a = $_GET["id"];
$id = $_GET["a"];

header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=Hoja de Trabajo.xls');
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Transfer-Encoding: binary ");

require '../librerias/PHPExcel.php';
require 'conexion.php';

$excel = new phpexcel();

$excel->getProperties()->setCreator('Fernando')->setLastModifiedBy('Fernando')->setTitle('Hoja de Trabajo');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setTitle('Hoja de Trabajo');

$statemen2 = $link->prepare("SELECT concat_ws(' ', t.nombre, t.Apellido_Paterno, t.Apellido_Materno) as nombre FROM `equipos` as e INNER JOIN 
trabajador as t on t.id = e.`id_trabajador` WHERE e.`id`=$a");
$statemen2->execute();
$result2 = $statemen2->get_result();

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    )
);
$styleBOLD = array(
    'font' => array(
        'bold' => true
    )
);

while ($row = $result2->fetch_array()) $nombre[] = $row;
$pagina->mergeCells("A" . (1) . ":D" . (1));
$pagina->getStyle('A1')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('fff2cc');
//D3D3D3

for ($i = 0; $i < count($nombre); $i++) {
    $pagina->setCellValue('A' . ($i + 1), $nombre[$i]['nombre']);
}
$pagina->getStyle("A" . (1) . ":D" . (1))->applyFromArray($styleArray);
$pagina->getStyle("A" . (1) . ":D" . (1))->applyFromArray($styleBOLD);
$statemen = $link->prepare("SELECT * FROM cuentas");

$statemen->execute();

$result = $statemen->get_result();

$style = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    )
);

$style2 = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
    )
);

while ($row = $result->fetch_array()) $cuentas[] = $row;
$pagina->mergeCells("A" . (2) . ":K" . (2));
$pagina->getStyle("A" . (2) . ":K" . (2))->applyFromArray($style);
$pagina->setCellValue('A' . (2), 'HOJA DE TRABAJO');
$pagina->getStyle("A" . (2) . ":K" . (2))->applyFromArray($styleArray);
$pagina->getStyle("A" . (2) . ":D" . (2))->applyFromArray($styleBOLD);
$pagina->getStyle('A2')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('D3D3D3');

$pagina->mergeCells("A" . (3) . ":I" . (3));
$statemen9 = $link->prepare("SELECT e.id, concat_ws('',py.nombre,' - ', ps.nombre, ' - ',t.nombre,' - ', a.nombre,' - ', d.nombre,' - ', ps2.concepto,': ', tr.nombre, 
' ', tr.Apellido_Paterno, ' ',tr.Apellido_Materno) as a FROM `equipos` as e INNER JOIN pres_eq as pe on pe.id_equipo = e.id INNER JOIN tareas3 as t3 on t3.id = 
pe.`id_pres` INNER JOIN tareas2 as t2 on t2.id = t3.id_tarea INNER JOIN tareas as ts on ts.id = t2.id_tarea INNER JOIN proyecto as py on py.id_proyecto =
 ts.id_proyecto INNER JOIN presupuestos2 as ps2 on ps2.id = ts.id_pres INNER JOIN pres as ps on ps.id = ps2.id_presupuesto INNER JOIN tipo as t ON t.id = 
 ps.id_tipo INNER JOIN area as a on a.id = ps2.id_area INNER JOIN disciplinas as d on d.id = ps2.id_disciplina INNER JOIN trabajador as tr ON tr.id = e.`id_trabajador` 
 where t3.id_cuenta = $id");
$statemen9->execute();
$result9 = $statemen9->get_result();

while ($row = $result9->fetch_array()) $liga[] = $row;
for ($i = 0; $i < count($liga); $i++) {
$pagina->setCellValue('A' . (3), $liga[$i]['a']);
}
$pagina->getStyle("A" . (3) . ":I" . (3))->applyFromArray($styleArray);
$pagina->getStyle("A" . (3) . ":D" . (3))->applyFromArray($styleBOLD);
$pagina->getStyle('A3')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('e3eeda');
$pagina->mergeCells("J" . (3) . ":K" . (3));
$pagina->setCellValue('J' . (3), 'JEFE DE EQUIPO');
$pagina->getStyle("J" . (3) . ":K" . (3))->applyFromArray($styleArray);
$pagina->getStyle("J" . (3) . ":K" . (3))->applyFromArray($styleBOLD);
$pagina->getStyle('J3')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('D3D3D3');
$pagina->mergeCells("J" . (4) . ":K" . (4));
$pagina->setCellValue('J' . (4), 'PERIODO');
$pagina->getStyle("J" . (4) . ":K" . (4))->applyFromArray($styleArray);
$pagina->getStyle("J" . (4) . ":J" . (4))->applyFromArray($styleBOLD);
$pagina->mergeCells("L" . (4) . ":O" . (4));
$pagina->getStyle("L" . (4) . ":O" . (4))->applyFromArray($styleArray);
$pagina->getStyle("L" . (4) . ":O" . (4))->applyFromArray($styleBOLD);
$pagina->getStyle('J4')
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('D3D3D3');

$pagina->mergeCells("L" . (3) . ":O" . (3));
$pagina->setCellValue('L' . (3), $nombre[0]['nombre']);
$pagina->getStyle("L" . (3) . ":O" . (3))->applyFromArray($styleArray);
$pagina->getStyle("L" . (3) . ":O" . (3))->applyFromArray($styleBOLD);

$statemen2 = $link->prepare("SELECT concat_ws(' ',inicio, ' - ', fin) as periodo FROM `equipos` WHERE `id` =$a");
$statemen2->execute();
$result2 = $statemen2->get_result();

while ($row = $result2->fetch_array()) $nombre[] = $row;
$pagina->setCellValue('L4', $nombre[$i]['periodo']);
$pagina->mergeCells("J" . (6) . ":M" . (6));
$pagina->getStyle("J" . (6) . ":M" . (6))->applyFromArray($style);
$pagina->getStyle("J" . (6) . ":M" . (6))->applyFromArray($styleArray);
$pagina->getStyle("J" . (6) . ":M" . (6))->applyFromArray($styleBOLD);
$pagina->setCellValue('J' . (6), 'HH');
$num = 7;
$pagina->mergeCells("L" . ($num) . ":M" . ($num));
$pagina->getStyle("L" . ($num) . ":M" . ($num))->applyFromArray($style);
$pagina->setCellValue('L' . ($num), 'REAL');

$pagina->mergeCells("J" . ($num) . ":K" . ($num));
$pagina->getStyle("J" . ($num) . ":K" . ($num))->applyFromArray($style);
$pagina->setCellValue('J' . ($num), 'PREVISTAS');
$pagina->getStyle('J' . ($num))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('fee698');

$pagina->mergeCells("H" . ($num) . ":I" . ($num));
$pagina->getStyle("H" . ($num) . ":I" . ($num))->applyFromArray($style);
$pagina->setCellValue('H' . ($num), 'CATEGORÍA');

$pagina->mergeCells("F" . ($num) . ":G" . ($num));
$pagina->getStyle("F" . ($num) . ":G" . ($num))->applyFromArray($style);
$pagina->setCellValue('F' . ($num), 'IDENTIFICACIÓN');

$pagina->mergeCells("B" . ($num) . ":E" . ($num));
$pagina->getStyle("B" . ($num) . ":E" . ($num))->applyFromArray($style);
$pagina->setCellValue('B' . ($num), 'PLANTILLA');
$pagina->getStyle("B" . ($num) . ":M" . ($num))->applyFromArray($styleArray);
$pagina->getStyle("B" . ($num) . ":M" . ($num))->applyFromArray($styleBOLD);

$statemen2 = $link->prepare("SELECT concat_ws(' ',t.nombre,' ', t.Apellido_Paterno, ' ', t.Apellido_Materno) as nombre, t.nss, c.nombre as categoria, p.hh FROM 
`equipos` as e INNER JOIN planilla as p on e.id = p.id_equipo INNER JOIN trabajador as t on p.id_trabajador = t.id INNER JOIN categoria as c on c.id = p.id_categoria
WHERE e.`id` =$a");
$statemen2->execute();
$result2 = $statemen2->get_result();

$num = 8;
while ($row = $result2->fetch_array()) $trab[] = $row;
$num2 = $num;
for ($i = 0; $i < count($trab); $i++) {
    $num2 = $num2 + 1;
    $pagina->getStyle("B" . ($i + $num) . ":M" . ($i + $num))->applyFromArray($styleArray);
    $pagina->mergeCells("B" . ($i + $num) . ":E" . ($i + $num));
    $pagina->setCellValue('B' . ($i + $num), $trab[$i]['nombre']);
    $pagina->mergeCells("F" . ($i + $num) . ":G" . ($i + $num));
    $pagina->getStyle("F" . ($i + $num) . ":G" . ($i + $num))->applyFromArray($style);
    $pagina->setCellValue('F' . ($i + $num), $trab[$i]['nss']);
    $pagina->mergeCells("H" . ($i + $num) . ":I" . ($i + $num));
    $pagina->getStyle("H" . ($i + $num) . ":I" . ($i + $num))->applyFromArray($style);
    $pagina->setCellValue('H' . ($i + $num), $trab[$i]['categoria']);
    $pagina->mergeCells("J" . ($i + $num) . ":K" . ($i + $num));
    $pagina->getStyle("J" . ($i + $num) . ":K" . ($i + $num))->applyFromArray($style);
    $pagina->setCellValue('J' . ($i + $num), $trab[$i]['hh']);
    $pagina->mergeCells("L" . ($i + $num) . ":M" . ($i + $num));
    $pagina->getStyle("L" . ($i + $num) . ":M" . ($i + $num))->applyFromArray($style);
}
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleBOLD);
$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$pagina->getStyle("B" . ($num2) . ":I" . ($num2))->applyFromArray($style2);
$pagina->setCellValue('B' . ($num2), 'TOTAL PLANTILLA');

$statemen2 = $link->prepare("SELECT SUM(p.`hh`) as hh FROM `planilla` as p INNER JOIN equipos as e on e.id = p.`id_equipo` WHERE e.id  =$a");
$statemen2->execute();
$result2 = $statemen2->get_result();

$pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
$pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
while ($row = $result2->fetch_array()) $hh[] = $row;
$pagina->setCellValue("J" . ($num2), $hh[0]['hh']);
$pagina->getStyle('J' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('f4b185');
$pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
$pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
$pagina->setCellValue('L' . ($num2), '0');
$pagina->getStyle('L' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('f4b185');

$num2 = $num2 + 2;

$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$pagina->getStyle("B" . ($num2) . ":I" . ($num2))->applyFromArray($style);
$pagina->setCellValue('B' . ($num2), 'TAREAS');

$pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
$pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
$pagina->setCellValue('L' . ($num2), 'REAL');

$pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
$pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
$pagina->setCellValue('J' . ($num2), 'PRESUPUESTO');
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleArray);
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleBOLD);
$pagina->getStyle('J' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('fee698');

$statemen2 = $link->prepare("SELECT t.`tarea`, t.`hh` FROM `tareas4` as t INNER JOIN equipos as e ON e.id = t.`id_equipo` WHERE e.id =$a");
$statemen2->execute();
$result2 = $statemen2->get_result();
while ($row = $result2->fetch_array()) $tareas[] = $row;
for ($i = 0; $i < count($tareas); $i++) {
    $num2 = $num2 + 1;
    $pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleArray);
    $pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
    $pagina->setCellValue('B' . ($num2), $tareas[$i]['tarea']);
    $pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
    $pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
    $pagina->setCellValue('J' . ($num2), $tareas[$i]['hh']);
    $pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
    $pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
    $pagina->setCellValue('L' . ($num2), '');
}
$num2 = $num2 + 1;
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleBOLD);


$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$pagina->getStyle("B" . ($num2) . ":I" . ($num2))->applyFromArray($style2);
$pagina->setCellValue('B' . ($num2), 'TOTAL TAREAS');

$statemen3 = $link->prepare("SELECT SUM( t.`hh`) as hh2 FROM `tareas4` as t INNER JOIN equipos as e ON e.id = t.`id_equipo` WHERE e.id =$a");
$statemen3->execute();
$result3 = $statemen3->get_result();

$pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
$pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
while ($row = $result3->fetch_array()) $hhs[] = $row;
$pagina->setCellValue("J" . ($num2), $hhs[0]['hh2']);
$pagina->getStyle('J' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('f4b185');

$pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
$pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
$pagina->setCellValue('L' . ($num2), '0');
$pagina->getStyle('L' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('f4b185');

$num2 = $num2 + 2;

$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$pagina->getStyle("B" . ($num2) . ":I" . ($num2))->applyFromArray($style);
$pagina->setCellValue('B' . ($num2), 'EQUIPO MAYOR');

$pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
$pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
$pagina->setCellValue('L' . ($num2), 'REAL');

$pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
$pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
$pagina->setCellValue('J' . ($num2), 'PRESUPUESTO');
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleArray);
$pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleBOLD);
$pagina->getStyle('J' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('fee698');

$statemen2 = $link->prepare("SELECT em.`em`, em.`hh` as hor FROM `equipo_m` as em INNER JOIN equipos as e on e.id = em.`id_equipo` WHERE e.id = $a");
$statemen2->execute();
$result2 = $statemen2->get_result();
while ($row = $result2->fetch_array()) $eqma[] = $row;
for ($i = 0; $i < count($eqma); $i++) {
    $num2 = $num2 + 1;
    $pagina->getStyle("B" . ($num2) . ":M" . ($num2))->applyFromArray($styleArray);
    $pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
    $pagina->setCellValue('B' . ($num2), $eqma[$i]['em']);
    $pagina->mergeCells("J" . ($num2) . ":K" . ($num2));
    $pagina->getStyle("J" . ($num2) . ":K" . ($num2))->applyFromArray($style);
    $pagina->setCellValue('J' . ($num2), $eqma[$i]['hor']);
    $pagina->mergeCells("L" . ($num2) . ":M" . ($num2));
    $pagina->getStyle("L" . ($num2) . ":M" . ($num2))->applyFromArray($style);
    $pagina->setCellValue('L' . ($num2), '');
}


$num2 = $num2 + 2;
$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$statemen2 = $link->prepare("SELECT ad FROM `analisis` WHERE id_equipo = $a");
$statemen2->execute();
$result2 = $statemen2->get_result();

$pagina->setCellValue('B' . ($num2), 'ANÁLISIS DEL DESEMPEÑO ');
$pagina->getStyle('B' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('d8e1f3');

$num2 = $num2 + 1;

$pagina->mergeCells("B" . ($num2) . ":O" . ($num2 + 2));
$pagina->getStyle("B" . ($num2) . ":O" . ($num2 + 2))->applyFromArray($styleArray);
$pagina->getStyle("B" . ($num2) . ":O" . ($num2))->applyFromArray($styleBOLD);
while ($row = $result2->fetch_array()) $ad[] = $row;
for ($i = 0; $i < count($ad); $i++) {
    $pagina->setCellValue('B' . ($num2), $ad[$i]['ad']);
}

$num2 = $num2 + 4;
$pagina->mergeCells("B" . ($num2) . ":I" . ($num2));
$pagina->setCellValue('B' . ($num2), 'ACCIONES ');
$pagina->getStyle('B' . ($num2))
    ->getFill()
    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
    ->getStartColor()
    ->setRGB('d8e1f3');
$num2 = $num2 + 1;

$pagina->mergeCells("B" . ($num2) . ":O" . ($num2 + 2));
$pagina->getStyle("B" . ($num2) . ":O" . ($num2 + 2))->applyFromArray($styleArray);
$pagina->getStyle("B" . ($num2) . ":O" . ($num2))->applyFromArray($styleBOLD);

$statemen2 = $link->prepare("SELECT accion FROM `analisis` WHERE id_equipo = $a");
$statemen2->execute();
$result2 = $statemen2->get_result();
while ($row = $result2->fetch_array()) $acc[] = $row;
for ($i = 0; $i < count($ad); $i++) {
    $pagina->setCellValue('B' . ($num2), $acc[$i]['accion']);
}


$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

$objWriter->save('php://output');

<?php
//============================================================+
// File name   : example_004.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 004 for TCPDF class
//               Cell stretching
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Cell stretching
 * @author Nicola Asuni
 * @since 2008-03-04
 */

/*DECLARACION DE VARIABLES */
$acta = "EPSI ABCD123";
$hora = "14:20";
$dia = "22";
$mes = "agosto";
$año = "2020";
$virtual = "virtualmente";
$nombramiento = "54621";
$secretario = "Ing. Luis Efraín Aballí de León Régil";
$carrera = "Mecánico";
$estudiante = "Jose Ricardo Merida Lopez";
$carne = "2600300000000";
$registro = "201331207";
$nota = "75";
$examinador1 = "Ing. Mario Enrique Lopez Perez";
$examinador2 = "Ing. Juan Carlos Ola Ruiz";
$temas = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc id tortor nisi. Donec sed arcu dolor. Donec vehicula quam vitae augue elementum accumsan. Donec interdum varius vestibulum. Proin dolor ante, scelerisque id rhoncus egestas, feugiat eget mi. ";
$resultado = "APROBADO";
$hora_final = "19";
$minutos_final = "20";

//Variables utilizando POST
/*
$acta = $_POST['acta'];
$hora = $_POST['hora'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$año = $_POST['año'];
$virtual = $_POST['virtual'];
$nombramiento = $_POST['nombramiento'];
$secretario = $_POST['secretario'];
$carrera = $_POST['carrera'];
$estudiante = $_POST['estudiante'];
$registro = $_POST['registro'];
$carne = $_POST['carne'];
$nota = $_POST['nota'];
$examinador1 = $_POST['examinador1'];
$examinador2 = $_POST['examinador2'];
$temas = $_POST['temas'];
$resultado = $_POST['resultado'];
$hora_final = $_POST['hora_final'];
$minutos_final = $_POST['minutos_final'];

*/

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_min/tcpdf.php');

//Hoja tamaño oficio
$width = 216;
$height = 330;
$tamaño = array($width, $height);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $tamaño, true, 'UTF-8', false);

//Margenes y variables globales
$mi = 40; //Margen izquierdo
$md = 22; //Margen derecho
$ms = 50; //Margen superior
$inte = 7.2; //Interlineado
$u = 'U';

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ivan Esteban/Christian López');
$pdf->SetTitle('Documento CUNOC');
$pdf->SetSubject('TCPDF Tutorial');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(0, 0, 0, 0);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 14);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')


$cuerpo = '<div style="LINE-HEIGHT:28px;">En la ciudad de Quetzaltenango, siendo las
'.$hora.' horas del día
'.$dia.' de '.$mes.' del año '.$año.',
reunidos '.$virtual.' de la División de Ciencias de la Ingeniería del Centro Universitario de Occidente de la Universidad de San
Carlos de Guatemala, los miembros del Tribunal Examinador en pleno, según nombramiento No. '.$nombramiento.',
Secretario '.$secretario.'
Examinadores: a) '.$examinador1.' y
b) '.$examinador2.'
con el objeto de practicar el Examen Técnico Profesional previo a optar el título de Ingeniero '.$carrera.'
en el grado académico de Licenciado, del estudiante:
'.$estudiante.' carné No.
'.$carne.' y Registro Académico No.
'.$registro.', habiéndose procedido de la manera siguiente:
<b style="text-decoration: underline;">PRIMERO:</b>
Se efectuó el Examen Técnico Profesional en el que se evaluaron los siguentes temas:
'.$temas.'
<b style="text-decoration: underline;">SEGUNDO:</b>
Despues de haberse realizado el exámen técnico profesional, los miembros del tribunal examinador procedieron
a calificar al estudiante obteniendo el mismo, una nota de '.$nota.',
en escala de 0 a 100 puntos, por consiguiente el resultado es de: '.$resultado.',
según normativo vigente.
<b style="text-decoration: underline;">TERCERO:</b>
No habiendo mas que hacer constar se da por terminada la presente en el mismo lugar y fecha, firmando la presente el tribunal
examinador, siendo las '.$hora_final.' horas con '.$minutos_final.' minutos. DAMOS FE</div>';

$pdf->SetFont('helvetica', '', 13);

$pdf->Cell($mi, 30, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, $inte, 'ACTA NUMERO: '.$acta, 0, 1, 'R', 0, '', 0);

$pdf->writeHTMLCell(216-$mi-$md, 120, $mi, 53, $cuerpo, 0, 1, 0, true, 'J', true);

$pdf->writeHTMLCell(50, 5, $mi, 260, '', 'B', 1, 0, true, 'J', true);
$pdf->writeHTMLCell(50, 5, $mi+102, 260, '', 'B', 1, 0, true, 'J', true);

$pdf->writeHTMLCell(50, 5, $mi, 266, 'EXAMINADOR', '', 1, 0, true, 'C', true);
$pdf->writeHTMLCell(50, 5, $mi+102, 266, 'EXAMINADOR', '', 1, 0, true, 'C', true);

$pdf->writeHTMLCell(60, 5, $mi+47, 290, '', 'B', 1, 0, true, 'J', true);
$pdf->writeHTMLCell(60, 5, $mi+47, 297, 'SECRETARIO', 0, 1, 0, true, 'C', true);


// Image example with resizing
$pdf->Image('img/perfil.png', 40, 8, 32, 41, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);




// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('acta_etp_par.pdf', 'I');

?>

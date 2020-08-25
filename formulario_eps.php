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
$trans = "EPSI ABCD123";
$fecha = "22 de septiembre de 2020";
$destinatario = "Ing. Luis Efraín Aballí de León Régil";
$puesto = "Ingeniero Mecánico";
$carrera = "Ingeniería Mecánica";
$acta = "XXXX-2020";
$fecha_acta = "20 de agosto de 2020";
$hora_acta = "18:30";
$coordinador = "MSc Luis Efraín Aballí de León Régil";
$trabajo_graduacion = "Guía Teórico Práctica del Método de Elementos Finitos";
$estudiante = "José Ricardo Mérida López";
$carne = "2600300000901";
$registro = "201331207";
$asesor = "Ing. Mario Enrique Lopez Perez";
$revisor = "Ing. Juan Carlos Ola Ruiz";
$carrera_simple = "Civil";
$supervisor = mb_strtoupper("Ing. Alvaro Humberto Flores Aguilar");
$nota = "98";
$nota_letras = mb_strtoupper("Noventa y ocho");
$hora_final_acta = "19 horas con veinte minutos";


//Variables utilizando POST
/*
$trans = $_POST['trans'];
$fecha = $_POST['fecha'];
$destinatario = $_POST['destinatario'];
$puesto = $_POST['puesto'];
$carrera = $_POST['carrera'];
$acta = $_POST['acta'];
$fecha_acta = $_POST['fecha_acta'];
$hora_acta = $_POST['hora_acta'];
$coordinador = $_POST['coordinador'];
$virtual = $_POST['virtual'];
$trabajo_graduacion = $_POST['$trabajo_graduacion'];
$estudiante = $_POST['estudiante'];
$carne = $_POST['carne'];
$registro = $_POST['registro'];
$asesor = $_POST['asesor'];
$revisor = $_POST['revisor'];
$carrera_simple = $_POST['carrera_simple'];
$supervisor = $_POST['supervisor'];
$nota = $_POST['nota'];
$nota_letras = $_POST['nota_letras'];
$hora_final_acta = $_POST['hora_final_acta'];

*/

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_min/tcpdf.php');

//Hoja tamaño oficio
$width = 216;
$height = 280;
$oficio = array($width, $height);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $oficio, true, 'UTF-8', false);

//Margenes y variables globales
$mi = 30; //Margen izquierdo
$md = 30; //Margen derecho
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
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

//--------------------------Encabezado--------------------------
$parte1 = $trans.'<br/>
Quetzaltenango, '
.$fecha;

$parte2 = $destinatario.'<br/>
Ingeniero Mecánico <br/>
Coordinador de '.$carrera.'<br/>
Centro Universitario de Occidente<br/>
Edificio';

$cuerpo = 'Para su conocimiento y efectos: transcribo el Acta No.
<b>'.$acta.'</b>
del libro para Actas Varias del Departamento del Ejercicio Profesional Supervisado (E.P.S.) de la División de Ciencias de la Ingeniería,
que textualmente dice: "Acta No.
<b>'.$acta.'</b>
Quetzaltenango.
'.$fecha_acta.'
siendo las
'.$hora_acta.', el Coordinador del Ejercicio Profesional Supervisado
'.$coordinador.' constituido en el departamento de Ejercicio Profesional Supervisado de las Carreras de Ingeniería
en el Edificio de la División de Ciencias de la Ingeniería del Centro Universitario de Occidente, para hacer constar lo siguiente:
<b>PRIMERO: </b> Se tiene a la vista el Informe final del Ejercicio Profesional Supervisado titulado  <br/>
<b>'.$trabajo_graduacion.'</b>,
presentado por el estudiante
<b>'.$estudiante.'</b>
quien se identifica con carné universitario
<b>'.$carne.'</b>
y número de registro académico
<b>'.$registro.'</b>
, estudiante de la carrera de
'.$carrera.'
<b>SEGUNDO: </b> Se procede a la revisión de: A) El informe final del Ejercicio Profesional Supervisado. B) Verificación de los Dictámenes
satisfactorios del asesor:
'.$asesor.'
y del revisor
'.$revisor.'
, C) Dictamend del Supervisor del Ejercicio Profesional Supervisado de
'.$carrera_simple.' '.$supervisor.'
<b>TERCERO: </b> Después de revisar los documentos anteriores se procede a dar por: APROBADO el Ejercicio Profesional Supervisado con una
nota promedio de
<b>'.$nota.'
('.$nota_letras.')</b>
puntos en una escala de 1 a 100. CUARTO: No habiendo más que hacer constar, se da por terminada la presente en el mismo lugar y fecha, siendo las
<b>'.$hora_final_acta.'.</b>
Siendo leídos por los presentes damos fe.  FIRMAS ILEGIBLES”';

$pdf->SetFont('helvetica', '', 10);
$pdf->writeHTMLCell(186-$mi, 30, $mi, 35, $parte1, 0, 0, 0, true, 'R', true);

$pdf->writeHTMLCell(100, 40, $mi, 50, $parte2, 0, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(216-$mi-$md, 40, $mi, 80, $cuerpo, 0, 1, 0, true, 'J', true);



// Image example with resizing
$pdf->Image('img/logo_simple.png', 30, 12, 17, 17, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);


$pdf->Cell($mi, 5, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, 0, 'Sin ningún otro particular me suscribo de Usted, atentamente: ', 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi, 5, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, 0, '"ID Y ENSEÑAD A TODOS"', 0, 1, 'C', 0, '', 0);

$pdf->Cell($mi, 20, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, 0, $coordinador, 0, 1, 'C', 0, '', 0);


$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, 0, 'Coordinador del Departamento de EPS de la', 0, 1, 'C', 0, '', 0);


$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, 0, 'División de Ciencias de la Ingeniería', 0, 1, 'C', 0, '', 0);


$pdf->SetFont('helvetica', '', 7);
$pdf->Cell($mi, 10, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(0, 0, 'c.c./estudiante', 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(0, 0, 'LEADR/rem', 0, 1, 'L', 0, '', 0);



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('cierre.pdf', 'I');

?>

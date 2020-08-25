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
$hora = "16:30";
$dia = "05";
$mes = "Agosto";
$year = "2020";
$salon = "Julio Pineda";
$director = "Msc. Victor Cajas";
$coordinador = "Ing. Nery Gramajo";
$asesor = "Ing. Sebastián Charchalaj";
$revisor = "Ing. Erick Granados";
//$padrinos = "En la ciencia la única verdad sagrada es que no hay verdades sagradas.";
//$padrinos = "Crecemos en una sociedad basada en la ciencia y la tecnología y en la que nadie sabe nada de estos temasitos. Esta mezcla combustible de ignorancia y poder tarde o temprano, va a terminar explotando en nuestras caras.";
$padrinos = "La ciencia no es perfecta, con frecuencia se utiliza mal, no es más que una herramienta, pero es la mejor herramienta que tenemos: se corrige a sí misma";
$estudiante = "Victoriano Alejandro Rodriguez Martinez";
$carne = "2600300200901";
$registro = "201331208";
$titulo = "Licenciatura en Ingeniería Civil";
$grado = "Licenciatura";
$acta = "GIC-012020";
$fecha_acta = "05-06-2019";
$carrera = "Ingeniería Civil";
$trabajo_graduacion = "Dentro de un milenio nuestra época se recordará como el tiempo en que nos alejamos por primera vez de la Tierra y la contemplamos desde más allá del último de los planetas, como un punto azul pálido casi perdido en un inmenso mar de estrellas.";

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_min/tcpdf.php');

//Hoja tamaño oficio
$width = 216;
$height = 330;
$oficio = array($width, $height);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $oficio, true, 'UTF-8', false);

//Margenes y variables globales
$mi = 34; //Margen izquierdo
$inte = 7.7; //Interlineado

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ivan Esteban');
$pdf->SetTitle('Documento CUNOC');
$pdf->SetSubject('TCPDF Tutorial');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(0, 0, 0);
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
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

//Encbezado
$pdf->SetFont('times', '', 10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0, 63-$inte, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco de 5
//Línea 1
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(77, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(38, $inte, $hora, 0, 1, 'C', 0, '', 0);
//Línea 2
$pdf->Cell($mi, $inte-0.3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(38, $inte-0.3, $dia, 0, 0, 'C', 0, '', 0);
$pdf->Cell(7, $inte-0.3, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(48, $inte-0.3, $mes, 0, 0, 'C', 0, '', 0);
$pdf->Cell(19, $inte-0.3, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(23, $inte-0.3, $year, 0, 1, 'C', 0, '', 0);
//Línea 3
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(38, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(95, $inte, $salon, 0, 1, 'L', 0, '', );
//Línea 4
$pdf->Cell($mi, $inte-0.6, '', 0, 1, 'C', 0, '', 0); //Margen izquierdo de línea

//Profesionales
//Línea 5
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(66, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(104, $inte, $director, 0, 1, 'L', 0, '', 0);
//Línea 6
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(75, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(95, $inte, $coordinador, 0, 1, 'L', 0, '', 0);
//Línea 7
$pdf->Cell($mi, $inte-0.2, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(88, $inte-0.2, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(82, $inte-0.2, $asesor, 0, 1, 'L', 0, '', 0);
//Línea 8
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(72, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(98, $inte, $revisor, 0, 1, 'L', 0, '', 0);

//Padrinos
//Línea 9
$pdf->Cell($mi, $inte-0.3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(19, $inte-0.2, '', 0, 0, 'C', 0, '', 0);
if (strlen($padrinos) < 100) {
  $pdf->Cell(151, $inte-0.2, $padrinos, 0, 1, 'C', 0, '', 0);
  //Línea 10
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
  //Línea 11
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
}
elseif (strlen($padrinos) < 220) {
  $parte1 = substr($padrinos,0,110);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($padrinos,0,$pos_espacio1);
  $parte2 = substr($padrinos, $pos_espacio1, strlen($padrinos)-strlen($parte1));
  $pdf->Cell(151, $inte-0.3, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 10
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if(strlen($parte2)>=115){
    $pdf->Cell(170, $inte, $parte2, 0, 1, 'L', 0, '', 4);
  }
  else{
    $pdf->Cell(170, $inte, $parte2, 0, 1, 'L', 0, '', 0);
  }
  //Línea 11
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
}
else{
  $parte1 = substr($padrinos,0,110);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($padrinos,0,$pos_espacio1);
  $parte2 = substr($padrinos,$pos_espacio1, 110);
  $sub_cadena = substr($padrinos, $pos_espacio1, strlen($padrinos)-strlen($parte1));
  $pos_espacio2 = strrpos($parte2,' ');
  $parte2 = substr($parte2, 0, $pos_espacio2);
  $parte3 = substr($sub_cadena, $pos_espacio2, strlen($sub_cadena)-strlen($parte2));
  $pdf->Cell(151, $inte-0.3, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 10
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, $parte2, 0, 1, 'L', 0, '', 4);
  //Línea 11
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if(strlen($parte3)>=115){
    $pdf->Cell(170, $inte, $parte3, 0, 1, 'L', 0, '', 4);
  }
  else{
    $pdf->Cell(170, $inte, $parte3, 0, 1, 'L', 0, '', 0);
  }
}

//Estudiante
//Línea 12
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(110, $inte, '', 0, 0, 'C', 0, '', 0);
if(strlen($estudiante)<41){
  $pdf->Cell(61, $inte-0.2, $estudiante, 0, 1, 'L', 0, '', 0);
  //Línea 13
  $pdf->Cell($mi, $inte-0.3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(98, $inte-0.3, '', 0, 0, '', 0, '', 4);
}
else{
  $parte1 = substr($estudiante,0,40);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($estudiante,0,$pos_espacio1);
  $parte2 = substr($estudiante, $pos_espacio1, strlen($estudiante)-strlen($parte1));
  $pdf->Cell(61, $inte-0.2, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 13
  $pdf->Cell($mi, $inte-0.3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if(strlen($parte2)>45){
    $pdf->Cell(98, $inte-0.3, $parte2, 0, 0, 'L', 0, '', 4);
  }
  else{
    $pdf->Cell(98, $inte-0.3, $parte2, 0, 0, 'L', 0, '', 0);
  }
}
$pdf->Cell(22, $inte-0.3, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(51, $inte-0.3, $carne, 0, 1, 'L', 0, '', 0);
//Línea 14
$pdf->Cell($mi, $inte-0.3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(45, $inte-0.3, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(48, $inte-0.3, $registro, 0, 0, 'L', 0, '', 0);
$pdf->Cell(51, $inte-0.3, '', 0, 0, 'C', 0, '', 0);
if (strlen($titulo)>20) {
  $parte1 = substr($titulo,0,25);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($titulo,0,$pos_espacio1);
  $parte2 = substr($titulo, $pos_espacio1, strlen($titulo)-strlen($parte1));
  $pdf->Cell(28, $inte-0.3, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 15
  $pdf->Cell($mi, $inte-0.2, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(126, $inte-0.2, $parte2, 0, 1, 'L', 0, '', 0);
}
else{
  $pdf->Cell(28, $inte-0.3, $titulo, 0, 1, 'C', 0, '', 4);
  //Línea 15
  $pdf->Cell($mi, $inte-0.2, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(126, $inte-0.2, '', 0, 1, 'C', 0, '', 4);
}
//Línea 16
$pdf->Cell($mi+1, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(54, $inte, $grado, 0, 0, 'L', 0, '', 0);
$pdf->Cell(71, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(47, $inte, $acta, 0, 1, 'L', 0, '', 0);
//Línea 17
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(17, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(46, $inte, $fecha_acta, 0, 0, 'L', 0, '', 0);
$pdf->Cell(30, $inte, '', 0, 0, 'C', 0, '', 0);
$pdf->Cell(78, $inte, $carrera, 0, 1, 'L', 0, '', 0);
//Línea 18
$pdf->Cell($mi, $inte, '', 0, 1, 'C', 0, '', 0); //Margen izquierdo de línea
//Línea 19
$pdf->Cell($mi, $inte, '', 0, 1, 'C', 0, '', 0); //Margen izquierdo de línea
//Línea 20
$pdf->Cell($mi, $inte-0.2, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(65.5, $inte-0.2, '', 0, 0, 'C', 0, '', 0);

if (strlen($trabajo_graduacion) < 70) {
  $pdf->Cell(104.5, $inte-0.2, $trabajo_graduacion, 0, 1, 'C', 0, '', 4);
  //Línea 21
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
}
elseif (strlen($trabajo_graduacion) < 200) {
  $parte1 = substr($trabajo_graduacion,0,70);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($trabajo_graduacion,0,$pos_espacio1);
  $parte2 = substr($trabajo_graduacion, $pos_espacio1, strlen($trabajo_graduacion)-strlen($parte1));
  $pdf->Cell(104.5, $inte-0.2, $parte1, 0, 1, 'C', 0, '', 4);
  if(strlen($parte2)>=115){
    //Línea 21
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(170, $inte, $parte2, 0, 1, 'C', 0, '', 4);
  }
  else{
    //Línea 21
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(170, $inte, $parte2, 0, 1, 'L', 0, '', 0);
  }
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, '', 0, 1, 'C', 0, '', 4);
}
else{
  $parte1 = substr($trabajo_graduacion,0,70);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($trabajo_graduacion,0,$pos_espacio1);
  $parte2 = substr($trabajo_graduacion,$pos_espacio1, 115);
  $sub_cadena = substr($trabajo_graduacion, $pos_espacio1, strlen($trabajo_graduacion)-strlen($parte1));
  $pos_espacio2 = strrpos($parte2,' ');
  $parte2 = substr($parte2, 0, $pos_espacio2);
  $parte3 = substr($sub_cadena, $pos_espacio2, strlen($sub_cadena)-strlen($parte2));
  $pdf->Cell(104.5, $inte-0.2, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 21
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(170, $inte, $parte2, 0, 1, 'C', 0, '', 4);
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if(strlen($parte3)>=115){
    $pdf->Cell(170, $inte, $parte3, 0, 1, 'C', 0, '', 4);
  }
  else{
    $pdf->Cell(170, $inte, $parte3, 0, 1, 'L', 0, '', 0);
  }
}
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('constancia.pdf', 'I');

?>

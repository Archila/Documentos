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
$mes = "Septiembre";
$year = "2020";
$salon = "Julio Pineda";
$presidente = "Msc. Victor Cajas";
$secretario = "Ing. Nery Gramajo";
$vocal1 = "Ing. Sebastián Charchalaj1";
$vocal2 = "Ing. Sebastián Charchalaj2";
$vocal3 = "Ing. Sebastián Charchalaj3";
$padrinos = "La ciencia no es perfecta, con frecuencia se utiliza mal, no es más que una herramientas";
$estudiante = "Victoriano Alejandro Rodriguez Martinez";
$carne = "2600300200901";
$registro = "201331208";
$titulo = "Ingeniería Civil";
$grado = "Licenciatura";
$acta = "GIC-012020";
$fecha_acta = "05-06-2019";
$carrera = "Ingeniería Civil";
$trabajo_graduacion = "Dentro de un milenio nuestra época se recordará hola mundo hola mundo hola";

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_min/tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-50);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

//Hoja tamaño oficio
$width = 216;
$height = 342;
$oficio = array($width, $height);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $oficio, true, 'UTF-8', false);

//Margenes y variables globales
$mi = 36; //Margen izquierdo
$md = 15; //Margen derecho
$ms = 50; //Margen superior
$inte = 7.2; //Interlineado
$u = 'U'; //Subrayado

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
$pdf->SetFont('times', '', 10.5);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

//--------------------------Encbezado--------------------------
$pdf->SetFont('times', '', 11.5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0, $ms, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco de 5
//Línea 1
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(78, $inte, 'En la ciudad de Quetzaltenango siendo las', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(33, $inte, '     '.$hora.'     ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(105-$mi-$md-30, $inte, 'horas del', 0, 0, 'C', 0, '', 4);
$pdf->Cell(1, $inte, '', 0, 0, 'C', 0, '', 3);
$pdf->Cell(26, 36, 'FOTO', 1, 0, 'C', 0, '', 3);
$pdf->Cell(1, $inte, '', 0, 1, 'C', 0, '', 3);
//Línea 2
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(30, $inte, '           '.$dia.'           ', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(8, $inte, 'de', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(54, $inte, '               '.$mes.'               ', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(15, $inte, 'del año', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(109-$mi-$md-30, $inte, '      '.$year.'      ', 0, 1, 'C', 0, '', 4);
//Línea 3
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(36, $inte, 'reunidos en el Salón', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(86, $inte, '          '.$salon.'          ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(94-$mi-$md-30, $inte, 'del', 0, 1, 'C', 0, '', 4);
//Línea 4
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(120, $inte, 'Centro Universitario de Occidente, los profesionales que presiden el Acto:', 0, 1, 'C', 0, '', 4);

//--------------------------Profesionales--------------------------
$pdf->Cell(0, $inte*0.7, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
//Línea 5
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(30, $inte, 'PRESIDENTE:', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(186-$mi-$md, $inte, ' '.$presidente.'                                            ', 0, 1, 'L', 0, '', 4);
//Línea 6
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(30, $inte, 'SECRETARIO:', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(186-$mi-$md, $inte, ' '.$secretario.'                                             ', 0, 1, 'L', 0, '', 4);
//Línea 7
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(20, $inte, 'VOCAL I:', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(196-$mi-$md, $inte, ' '.$vocal1.'                                                 ', 0, 1, 'L', 0, '', 4);
//Línea 8
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(22, $inte, 'VOCAL II:', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(194-$mi-$md, $inte, ' '.$vocal2.'                                                 ', 0, 1, 'L', 0, '', 4);
//Línea 9
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(24, $inte, 'VOCAL III:', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(192-$mi-$md, $inte, ' '.$vocal2.'                                    ', 0, 1, 'L', 0, '', 4);

//--------------------------Padrinos--------------------------
//Línea 10
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(22, $inte, 'Padrinos:', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', $u, 11.5);
if (strlen($padrinos) < 80) {
  $pdf->Cell(194-$mi-$md, $inte, $padrinos, 0, 1, 'C', 0, '', 0);
  //Línea 11
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(216-$mi-$md, $inte, '', 0, 1, 'C', 0, '', 4);
}
else {
  $parte1 = substr($padrinos,0,80);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($padrinos,0,$pos_espacio1);
  $parte2 = substr($padrinos, $pos_espacio1, strlen($padrinos)-strlen($parte1));
  $pdf->Cell(194-$mi-$md, $inte, $parte1, 0, 1, 'C', 0, '', 4);
  //Línea 12
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if(strlen($parte2)>=115){
    $pdf->Cell(216-$mi-$md, $inte, $parte2, 0, 1, 'L', 0, '', 4);
  }
  elseif(strlen($parte2)>80){
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'         ', 0, 1, 'L', 0, '', 4);
  }
  elseif(strlen($parte2)>40){
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                    ', 0, 1, 'L', 0, '', 4);
  }
  else {
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                                                  ', 0, 1, 'L', 0, '', 4);
  }
}
//Línea 13
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(40, $inte, 'Para realizar el acto de ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(73, $inte, 'JURAMENTACIÓN E INVESTIDURA', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(7, $inte, ' de: ', 0, 1, 'L', 0, '', 0);

//--------------------------Estudiante--------------------------
//Línea 14
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', $u, 11.5);
if (strlen($estudiante)>90) {
  $pdf->Cell(216-$mi-$md, $inte, $estudiante, 0, 1, 'C', 0, '', 4);
}
elseif(strlen($estudiante)>70){
  $pdf->Cell(216-$mi-$md, $inte, $estudiante.'             ', 0, 1, 'L', 0, '', 4);
}
elseif(strlen($estudiante)>50){
  $pdf->Cell(216-$mi-$md, $inte, $estudiante.'                                        ', 0, 1, 'L', 0, '', 4);
}
else{
  $pdf->Cell(216-$mi-$md, $inte, $estudiante.'                                                                        ', 0, 1, 'L', 0, '', 4);
}

//Línea 15
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(20, $inte, 'Carnet No. ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(50, $inte, ' '.$carne.'                 ', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(48, $inte, 'y Registro Académico No. ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(98-$mi-$md, $inte, ' '.$registro.'                   ', 0, 1, 'L', 0, '', 4);

//Línea 16
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(12, $inte, 'con el', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(33, $inte, 'Título Profesional', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(7, $inte, ' de: ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
if (strlen($titulo)<40) {
  $pdf->Cell(164-$mi-$md, $inte, ' '.$titulo.'                                      ', 0, 1, 'L', 0, '', 4);
  //Línea 17
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(65, $inte, '                        ', 0, 0, 'L', 0, '', 4);
}
elseif (strlen($titulo)<50) {
  $pdf->Cell(164-$mi-$md, $inte, $titulo.'                  ', 0, 1, 'L', 0, '', 4);
  //Línea 17
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(65, $inte, '               ', 0, 0, 'L', 0, '', 4);
}
elseif (strlen($titulo)<60) {
  $pdf->Cell(164-$mi-$md, $inte, $titulo, 0, 1, 'L', 0, '', 4);
  //Línea 17
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(65, $inte, '         ', 0, 0, 'L', 0, '', 4);
}
else {
  $parte1 = substr($titulo,0,60);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($titulo,0,$pos_espacio1);
  $parte2 = substr($titulo, $pos_espacio1, strlen($titulo)-strlen($parte1));
  $pdf->Cell(164-$mi-$md, $inte, $parte1, 0, 1, 'L', 0, '', 4);

  //Línea 17
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  if (strlen($parte2)<15) {
    $pdf->Cell(65, $inte, $parte2.'                             ', 0, 0, 'L', 0, '', 4);
  }
  elseif (strlen($parte2)<25) {
    $pdf->Cell(65, $inte, $parte2.'                 ', 0, 0, 'L', 0, '', 4);
  }
  else{
    $pdf->Cell(65, $inte, $parte2, 0, 0, 'L', 0, '', 4);
  }
}
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(10, $inte, 'en el ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(36, $inte, 'Grado Académico:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(105-$mi-$md, $inte, ' '.$grado.'                  ', 0, 1, 'L', 0, '', 4);

//Línea 18
$pdf->SetFont('times', '', 11.5);
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(25, $inte, 'con base en el', 0, 0, 'C', 0, '', 0);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(45, $inte, 'Acta de Graduación No.', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(40, $inte, ' '.$acta.'                   ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(18, $inte, 'de fecha', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
$pdf->Cell(88-$mi-$md, $inte, ' '.$fecha_acta.'               ', 0, 1, 'C', 0, '', 4);

//Línea 19
$pdf->SetFont('times', '', 11.5);
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(216-$mi-$md, $inte, 'El presidente declaró iniciado el Acto Protocolario de Juramentación e Investidura y solicitó al (a la)', 0, 1, 'C', 0, '', 4);

//Línea 20
$pdf->SetFont('times', '', 11.5);
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(137, $inte, 'sustentante dar lectura a la dedicatoria, introducción, conclusiones y recomendaciones de su ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(79-$mi-$md, $inte, 'TRABAJO DE', 0, 1, 'C', 0, '', 4);


//Línea 21
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(30, $inte, 'GRADUACIÓN', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(16, $inte, 'titulado:', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', $u, 11.5);
if(strlen($trabajo_graduacion)<45){
  $pdf->SetFont('times', $u, 11.5);
  $pdf->Cell(170-$mi-$md, $inte, ' '.$trabajo_graduacion.'                                ', 0, 1, 'C', 0, '', 4);
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(216-$mi-$md, $inte, '                                 ', 0, 1, 'L', 0, '', 4);
}
elseif(strlen($trabajo_graduacion)<60){
  $pdf->SetFont('times', $u, 11.5);
  $pdf->Cell(170-$mi-$md, $inte, ' '.$trabajo_graduacion.'                     ', 0, 1, 'C', 0, '', 4);
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(216-$mi-$md, $inte, '                        ', 0, 1, 'L', 0, '', 4);
}
elseif(strlen($trabajo_graduacion)<75){
  $pdf->SetFont('times', $u, 11.5);
  $pdf->Cell(170-$mi-$md, $inte, ' '.$trabajo_graduacion, 0, 1, 'C', 0, '', 4);
  //Línea 22
  $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
  $pdf->Cell(216-$mi-$md, $inte, '                        ', 0, 1, 'L', 0, '', 4);
}
else{
  $parte1 = substr($trabajo_graduacion,0,72);
  $pos_espacio1 = strrpos($parte1,' ');
  $parte1 = substr($trabajo_graduacion,0,$pos_espacio1);
  $parte2 = substr($trabajo_graduacion, $pos_espacio1, strlen($trabajo_graduacion)-strlen($parte1));
  $pdf->SetFont('times', $u, 11.5);
  $pdf->Cell(170-$mi-$md, $inte, ' '.$parte1, 0, 1, 'C', 0, '', 4);
  if(strlen($parte2)<20){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                                                                                      ', 0, 1, 'C', 0, '', 4);
  }
  elseif(strlen($parte2)<35){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                                                                    ', 0, 1, 'C', 0, '', 4);
  }
  elseif(strlen($parte2)<50){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                                               ', 0, 1, 'C', 0, '', 4);
  }
  elseif(strlen($parte2)<65){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                                            ', 0, 1, 'C', 0, '', 4);
  }
  elseif(strlen($parte2)<80){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                            ', 0, 1, 'C', 0, '', 4);
  }
  elseif(strlen($parte2)<90){
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2.'                    ', 0, 1, 'C', 0, '', 4);
  }
  else{
    //Línea 22
    $pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
    $pdf->Cell(216-$mi-$md, $inte, $parte2, 0, 1, 'C', 0, '', 4);
  }
}

//Línea 23
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(48, $inte, 'A continuación procedió a la', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(50, $inte, 'Juramentación e Investidura', 0, 0, 'L', 0, '', 4);
$pdf->SetFont('times', '', 11.5);
$pdf->Cell(115-$mi-$md, $inte, 'profesional universitaria correspondiente.', 0, 0, 'L', 0, '', 4);

//Línea 24
$pdf->Cell($mi, $inte*1.5, '', 0, 1, 'C', 0, '', 0); //Salto de línea

//Línea 25
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'B', 11.5);
$pdf->Cell(30, $inte, 'DAMOS FE:', 0, 1, 'L', 0, '', 0);


//--------------------------FIRMAS--------------------------
//Línea 26
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(216-$mi-$md, $inte, '                                                         ', 0, 1, 'C', 0, '', 0);
//Línea 27
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(216-$mi-$md, $inte*0.9, 'Profesional juramentado', 0, 1, 'C', 0, '', 0,false,'T','T');

//Línea 28
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(72, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(20, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(72, $inte, '        ', 0, 0, 'C', 0, '', 4);

//Línea 29
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(72, $inte, 'Presidente', 0, 0, 'C', 0, '', 0,false,'T','T');
$pdf->Cell(20, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->Cell(72, $inte, 'Secretario', 0, 1, 'C', 0, '', 0,false,'T','T');

//Línea 30
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(48, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(10, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(48, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(10, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(48, $inte, '        ', 0, 0, 'C', 0, '', 4);

//Línea 30
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(48, $inte, 'Vocal I', 0, 0, 'C', 0, '', 0,false,'T','T');
$pdf->Cell(10, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->Cell(48, $inte, 'Vocal II', 0, 0, 'C', 0, '', 0,false,'T','T');
$pdf->Cell(10, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->Cell(48, $inte, 'Vocal II', 0, 1, 'C', 0, '', 0,false,'T','T');

//Línea 31
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(60, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(44, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->SetFont('times', 'U', 10.5);
$pdf->Cell(60, $inte, '        ', 0, 0, 'C', 0, '', 4);

//Línea 32
$pdf->Cell(0, $inte, '', 0, 1, 'C', 0, '', 0); //Salto de línea
$pdf->Cell($mi, $inte, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->SetFont('times', '', 10.5);
$pdf->Cell(60, $inte, 'Padrino', 0, 0, 'C', 0, '', 0,false,'T','T');
$pdf->Cell(44, $inte, '        ', 0, 0, 'C', 0, '', 4);
$pdf->Cell(60, $inte, 'Padrino', 0, 1, 'C', 0, '', 0,false,'T','T');

//--------------------------Footer--------------------------
//Línea 33
$pdf->SetFont('times', 'B', 7);
$pdf->Cell($mi, 3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(38, 3, 'ORIGINAL: Dirección Académica ', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', '', 7);
$pdf->Cell(80, 3, '(Archivo Oficial de Graduados del Centro Universitario de Occidente)', 0, 1, 'L', 0, '', 0);

//Línea 34
$pdf->SetFont('times', 'B', 7);
$pdf->Cell($mi, 3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(68, 3, 'DUPLICADO: Archivo Dirección de División', 0, 1, 'L', 0, '', 0);

//Línea 35
$pdf->SetFont('times', 'B', 7);
$pdf->Cell($mi, 3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(28, 3, 'TRIPLICADO: Tesorería', 0, 0, 'L', 0, '', 0);
$pdf->SetFont('times', '', 7);
$pdf->Cell(80, 3, '(Para adjuntar a la Boleta de Pago de Honorarios)', 0, 1, 'L', 0, '', 0);

//Línea 36
$pdf->SetFont('times', '', 7);
$pdf->Cell($mi, 3, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(68, 3, 'SERIE A', 0, 1, 'L', 0, '', 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('constancia.pdf', 'I');

?>

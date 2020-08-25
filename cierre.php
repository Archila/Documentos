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
$estudiante="JOSÉ CARLOS SANDOVAL FLORES";
$dictamen = "Dic. Ing. Industrial No. 12-2020";
$fecha = "23 de junio de 2020";
$carne="2631 93438 0901";
$registro="201431445";
$carrera="INGENIERIA INDUSTRIAL";
$curso="MATEMÁTICA APLICADA 1";
$fecha_curso="15/01/2020";
$nota="95";
$creditos_obtenidos="262";
$creditos_necesarios="250";
$coordinador="INGA. CORALIA ANGÉLICA VLEÁSQUEZ COTÍ";
$director = "MBA: VÍCTOR CAROL HERNÁNDEZ ";
$expediente = "Exp. No. 26-2020";

//Variables utilizando POST
/*
$estudiante = mb_strtoupper($_POST['estudiante']);
$dictamen = $_POST['dictamen'];
$fecha = $_POST['fecha'];
$carne = $_POST['carne'];
$registro = $_POST['registro'];
$carrera = $_POST['carrera'];
$curso = $_POST['curso'];
$fecha_curso = $_POST['fecha_curso'];
$nota = $_POST['nota'];
$creditos_obtenidos = $_POST['creditos_obtenidos'];
$creditos_necesarios = $_POST['creditos_necesarios'];
$coordinador = mb_strtoupper($_POST['coordinador']);
$director = mb_strtoupper($_POST['director']);
$expediente = $_POST['expediente'];
*/

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
$height = 280;
$oficio = array($width, $height);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $oficio, true, 'UTF-8', false);

//Margenes y variables globales
$mi = 20; //Margen izquierdo
$md = 20; //Margen derecho
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
$pdf->SetFont('times', '', 10.5);

// add a page
$pdf->AddPage();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

//--------------------------Encabezado--------------------------
$datos_u = 'División Ciencias de la Ingeniería <br/>
Centro Universitario de Occidente <br/>
Quetzaltenango <br/>
Telefax: 78730000 Ext, 2255';

$superior = $dictamen.'<br/>
Quetzaltenango <br/>'
.$fecha;

$encabezado = 'Señores: <br/>
Comisión Académica <br/>
Centor Universitario de Occidente <br/>
Edificio';

$pdf->SetFont('helvetica', 'B', 7.5);
$pdf->writeHTMLCell(45, 30, 18, 36, $datos_u, 0, 0, 0, true, 'C', true);

$pdf->SetFont('helvetica', 'B', 11);
$pdf->writeHTMLCell(60, 40, 108, 25, $superior, 0, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 40, $mi, 60, $encabezado, 0, 0, 0, true, 'L', true);

$pdf->writeHTMLCell(80, 40, $mi, 85, 'Estimados Señores:', 0, 0, 0, true, 'L', true);


// Image example with resizing
$pdf->Image('img/logo.png', 8, 15, 55, 20, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont('times', 'B', 8);

$parte1 = 'Por este medio me permito informar a ustedes, que se ha recibido expediente completo de el (la) estudiante
<b>'.$estudiante.',</b>
Carné No.
<b>'.$carne.'</b>
y Registro Académico No.
<b>'.$registro.'</b>
quien solicita <b>CIERRE DE CURRÍCULO DE LA CARRERA DE '.$carrera.'</b>';

$parte2 = 'Dicho expediente ha sido revisado por esta Coordinación de acuerdo a los datos de la
Oficina de Registro y Control Académico del Centro Universitario de Occidente, de la Universidad de
San Carlos de Guatemala, encontrándose que reúne los requisitos exigidos para tal efecto, por lo que se
<b>EMITE DICTAMEN FAVORABLE,</b>
A lo solicitado por el alumno mencionado.';

$parte3 = 'Último curso aprobado
<b>'.$curso.'</b>
en fecha
<b>'.$fecha_curso.'</b>
Con una nota de
<b>'.$nota.'</b>
puntos de promoción, sumando un total de
<b>'.$creditos_obtenidos.'/'.$creditos_necesarios.' créditos.</b>';

$parte4 = $coordinador.'<br/>
COORDINADORA '.$carrera;

$pdf->SetFont('helvetica', '', 11);
$pdf->writeHTMLCell(216-$mi-$md, 30, 20, 95, $parte1, 0, 1, 0, true, 'J', true);

$pdf->writeHTMLCell(216-$mi-$md, 30, 20, 120, $parte2, 0, 1, 0, true, 'J', true);

$pdf->writeHTMLCell(216-$mi-$md, 15, 20, 145, $parte3, 0, 1, 0, true, 'J', true);

$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(110, 0, 'Sin otro particular, me es grato suscribirme, atentamente', 0, 1, 'L', 0, '', 0);

$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell($mi, 12, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(108, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(90, 0, '"ID Y ENSEÑAD A TODOS"', 0, 0, 'L', 0, '', 0);

$pdf->SetFont('helvetica', 'B', 10);
$pdf->writeHTMLCell(106, 15, 108, 190, $parte4, 0, 1, 0, true, 'L', true);

$pdf->SetFont('helvetica', 'B', 11);
$pdf->Cell($mi, 5, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(90, 0, 'Vo. Bo.:', 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi+15, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(200-$mi-$md, 0, $director, 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi+27, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(90, 0, 'DIRECTOR DIVISIÓN', 0, 1, 'L', 0, '', 0);
$pdf->Cell($mi+27, 0, '', 0, 0, 'C', 0, '', 0); //Margen izquierdo de línea
$pdf->Cell(90, 0, 'CIENCIAS DE LA INGENIERÍA', 0, 1, 'L', 0, '', 0);

$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($mi, 5, '', 0, 1, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(0, 0, 'c.c. Archivo', 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(0, 0, 'CAVC/VCHM/cvrs', 0, 1, 'L', 0, '', 0);

$pdf->Cell($mi, 0, '', 0, 0, 'C', 0, '', 0); //Espacio en blanco
$pdf->Cell(0, 0, $expediente, 0, 1, 'L', 0, '', 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('cierre.pdf', 'I');

?>

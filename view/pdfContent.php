<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 12:43 PM
 */
require_once "util/fpdf.php";
require_once "util/font/helvetica.php";


$pdf = new FPDF();
$pdf->SetTitle("My Selection of Modules");
//var_dump(get_class_methods($pdf));
$pdf->AddPage();
$pdf->SetFont("helvetica","",20);
$pdf->Cell(0,10,"My Modules",1,1,"C");
/*$pdf->Cell(0,10,,1,1,"C");*/
foreach ($this->allmods as $row):
    $pdf->Cell(0,10,$row,0,1,"L");
endforeach;

$pdf->Output();
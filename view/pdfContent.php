<?php
/**
 * Created by PhpStorm.
 * User: $Ali_Habbabeh
 * Date: 12/20/2017
 * Time: 12:43 PM
 */
require_once "util/fpdf.php";



$pdf = new FPDF();
//var_dump(get_class_methods($pdf));
$pdf->AddPage();
$pdf->SetFont("Helvetica","B","20");
$pdf->Cell(0,10,"My Modules");
$pdf->Output();
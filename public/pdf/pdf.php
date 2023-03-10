<?php
require('../pdfexport/fpdf.php');
include '../function.php';
$get = $_GET['op'];


$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(200, 10, 'STRUK', 0, 0, 'C');

$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(75, 7, 'MENU', 1, 0, 'C');
$pdf->Cell(50, 7, 'HARGA @', 1, 0, 'C');
$pdf->Cell(25, 7, 'JUMLAH', 1, 0, 'C');
$pdf->Cell(25, 7, 'TOTAL', 1, 0, 'C');


$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);

$nomor = 1;
foreach ($_SESSION['cart'] as $cart => $val) {
    $subtotal = $val['harga'] * $val['jumlah'];
    $pdf->Cell(10,8, $nomor++ ,1,0);
    $pdf->Cell(75,8, $val['menu'],1,0);
    $pdf->Cell(50,8, $val['harga'],1,0,'C');  
    $pdf->Cell(25,8, $val['jumlah'],1,0,'C');
    $pdf->Cell(25,8, $subtotal,1,1,'C');
}
@$total += $subtotal;

$pdf->Cell(10,0,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(160,8, "Totalnya adalah ",1,0,'C');
$pdf->Cell(25,8, $total,1,1,'C');
$pdf->Output();
?>
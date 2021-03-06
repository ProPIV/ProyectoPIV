<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Cell(190,25,'',1,1,'C',true);
    $this->Image('Logo.png',75,15,63);
    $this->Ln(15);

    $this->SetFont('Arial','B',18);
    $this->SetTextColor(77,111,209);
    $this->Cell(60);
    // T�tulo
    $this->Cell(15,10,'Reportes de Ciudades',0,'C',0);
    // Salto de l�nea
    $this->Ln(20);


    $this->SetFont('Arial','B',14);





    $this->Cell(65,10,'Id Ciudad',1,0,'C',0);
    $this->Cell(65,10,'Nombre Ciudad',1,0,'C',0);
    $this->Cell(65,10,'Id Ciudad',1,1,'C',0);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,('Paginas ').$this->PageNo().'/{nb}',0,0,'C');
}


}





require 'ConexionReportes.php';
$consulta = "SELECT * FROM ciudad";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row =$resultado->fetch_assoc()){
    $pdf->Cell(65,10,$row['id_ciudad'],1,0,'C',0);
    $pdf->Cell(65,10,$row['nombre_ciudad'],1,0,'C',0);
    $pdf->Cell(65,10,$row['id_ciudad'],1,1,'C',0);
}

$pdf->Output();
?>

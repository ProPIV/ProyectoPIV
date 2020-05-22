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
    $this->Cell(30,10,'Reporte de Sucursales',0,'C',0);
    // Salto de l�nea
    $this->Ln(20);


    $this->Cell(50,10,'Id Sede',1,0,'C',0);
    $this->Cell(80,10,'Nombre Sede',1,0,'C',0);
    $this->Cell(50,10,'Id Municipio',1,1,'C',0);


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
$consulta = "SELECT * FROM sede";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


while($row =$resultado->fetch_assoc()){
    $pdf->Cell(50,10,$row['id_sede'],1,0,'C',0);
    $pdf->Cell(80,10,$row['nombre_sede'],1,0,'C',0);
    $pdf->Cell(50,10,$row['id_municipio'],1,1,'C',0);

}

$pdf->Output();
?>

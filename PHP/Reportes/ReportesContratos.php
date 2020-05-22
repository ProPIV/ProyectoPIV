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
    $this->Cell(30,10,'Reporte de Contratos',0,'C',0);
    // Salto de l�nea
    $this->Ln(20);


    $this->Cell(27,10,'Contrato',1,0,'C',0);
    $this->Cell(32,10,'Empleado',1,0,'C',0);
    $this->Cell(37,10,'Fecha Inicio',1,0,'C',0);
    $this->Cell(33,10,'Fecha Fin',1,0,'C',0);
    $this->Cell(37,10,'Tipo Contra',1,0,'C',0);
    $this->Cell(32,10,'Proveedor',1,1,'C',0);


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
$consulta = "SELECT * FROM contrato";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


while($row =$resultado->fetch_assoc()){
    $pdf->Cell(27,10,$row['id_contrato'],1,0,'C',0);
    $pdf->Cell(32,10,$row['id_empleado'],1,0,'C',0);
    $pdf->Cell(37,10,$row['fecha_ini'],1,0,'C',0);
    $pdf->Cell(33,10,$row['fecha_fin'],1,0,'C',0);
    $pdf->Cell(37,10,$row['id_tipo_contrato'],1,0,'C',0);
    $pdf->Cell(32,10,$row['id_proveedor'],1,1,'C',0);

}

$pdf->Output();
?>

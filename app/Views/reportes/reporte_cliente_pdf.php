<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,10,'REPORTE CLIENTES',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    //encabezado de la tabla
    $this->SetFillColor(255,217,102);
    $this->Cell(10, 10, 'ID', 1, 0, 'C', 1);
    $this->Cell(25, 10, 'DNI', 1, 0, 'C', 1);
    $this->Cell(25, 10, 'Nombre', 1, 0, 'C', 1);
    $this->Cell(50, 10, 'Apellidos', 1, 0, 'C', 1);
    $this->Cell(30, 10, 'Telefono', 1, 0, 'C', 1);
    $this->Cell(50, 10, 'Email', 1, 1, 'C', 1);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

//traer los datos de la bd
require 'cn.php';
$consulta = "SELECT idCliente, dni, nombre, CONCAT(apellidoPaterno, '  ', apellidoMaterno) AS apellidos, telefono, email FROM cliente";
$resultado = $mysqli->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,utf8_decode('Imprimiendo línea número ').$i,0,1);

while($row = $resultado->fetch_assoc())
{
    $pdf->Cell(10, 10, $row['idCliente'], 1, 0,'C', 0);
    $pdf->Cell(25, 10, $row['dni'], 1, 0,'C', 0);
    $pdf->Cell(25, 10, $row['nombre'], 1, 0,'C', 0);
    $pdf->Cell(50, 10, $row['apellidos'], 1, 0,'C', 0);
    $pdf->Cell(30, 10, $row['telefono'], 1, 0,'C', 0);
    $pdf->Cell(50, 10, $row['email'], 1, 1,'C', 0);
}

$pdf->Output();
?>
<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFillColor(200,200,200);
        $this->Image('logoHotel.png',35,15,50); //logito bello
        $this->SetFont('Arial','B',14);
        $this->Ln(10);
        $this->Cell(95);
        //forma sencilla
        $this->RoundedRect(105,20, 90, 30, 2, '1234', 'FD');
        $this->MultiCell(90,10,'R.U.C. Nro. 12345678912
BOLETA DE VENTA ELECTRONICA
B003-52',0,'C',false);
        /*$this->Ln(3.4); //ajustada de la altura inicial del cuadro
        $this->Cell(95); //acomoda el cuado a la derecha  -  1
        $this->Cell(90,5,'','LTR',0,'C',true); //primer encuadre
        $this->Ln(5.2); //salto de linea  -  2
        $this->Cell(95);// 1
        $this->Cell(90,10,'R.U.C. Nro. 12345678912','LR',0,'C',true);
        $this->Ln(10.1);// 2
        $this->Cell(95);// 1
        $this->Cell(90,10,'BOLETA DE VENTA ELECTRONICA','LR',0,'C',true);
        $this->Ln(10.1);// 2
        $this->Cell(95);// 1
        $this->Cell(90,10,'B003-52','LR',0,'C',true);
        $this->Ln(10);// 2
        $this->Cell(95);// 1
        $this->Cell(90,5,'','LBR',0,'C',true);*/
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','',10);
        // Número de página
        $this->Cell(190);
        $this->Cell(-20,10,$this->PageNo().'/{nb}',0,0,'C');
    }
}

//traer los datos de la bd
require 'cn.php';
$consulta = "SELECT nombre, apellidoPaterno, dni FROM cliente WHERE nombre = 'Jorge'";
$resultado = $mysqli->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//cuadros iniciales con los datos de la empresa y del cliente
$row = $resultado->fetch_assoc();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(95,10,'HOTEL MONTEREAL',0,0,'',0);
$pdf->SetFillColor(192);
$pdf->RoundedRect(105,60, 92, 20, 2, '1234', 'D'); // POS x , POS y , ancho , alto , radio del borde , numero de las esquinas , FD para color Default = D
$pdf->Cell(25,10,utf8_decode('  Señor(a): '),'',0,'',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(12,10,$row['nombre'],'',0,'',0);
$pdf->Cell(55,10,$row['apellidoPaterno'],'',0,'',0);
$pdf->Ln(10.2);
$pdf->Cell(95,10,'Telefono: 945758412',0,0,'',0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,10,'  DNI:','',0,'',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(67,10,$row['dni'],'',0,'',0);
$pdf->Ln(20);

$consulta2 = "SELECT idReserva, idHab, fechaIni, fechaFin, Precio FROM detalle_reserva where idDetalle = 12345";
$resultado2 = $mysqli->query($consulta2);

$row = $resultado2->fetch_assoc();

//encabezado de la tabla
$pdf->RoundedRect(10,90.25,187,41.5, 2, '1234', 'D');
$pdf->SetFillColor(125,205,255);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,10,'ID','B',0,'C',0);
$pdf->Cell(35,10,'ID Habitacion','B',0,'C',0);
$pdf->Cell(35,10,'Fecha de Inicio','B',0,'',0);
$pdf->Cell(80,10,'Fecha de Fin','B',0,'',0);
$pdf->Cell(22,10,'Precio','B',0,'',0);
$pdf->Ln(10.2);
$pdf->SetFont('Arial','',11);
$pdf->Cell(15,10,$row['idReserva'],'',0,'',1);
$pdf->Cell(35,10,$row['idHab'],'',0,'C',1);
$pdf->Cell(35,10,$row['fechaIni'],'',0,'',1);
$pdf->Cell(80,10,$row['fechaFin'],'',0,'',1);
$pdf->Cell(22,10,$row['Precio'],'',0,'',1);
$pdf->Ln(10.2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(145,7,'SUB. TOTAL','',0,'R',0);
$pdf->Cell(20,7,'S/','',0,'C',0);
$pdf->Cell(22,7,$row['Precio']*(82/100),'',0,'',0);
$pdf->Ln(7);
$pdf->Cell(145,7,'I.G.V.','',0,'R',0);
$pdf->Cell(20,7,'S/','',0,'C',0);
$pdf->Cell(22,7,$row['Precio']*(18/100),'',0,'',0);
$pdf->Ln(7);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(145,7,'TOTAL','',0,'R',0);
$pdf->Cell(20,7,'S/','',0,'C',0);
$pdf->Cell(22,7,$row['Precio'],'',0,'',0);

$pdf->Ln(20);
$pdf->RoundedRect(10,145,187,15, 2, '1234', 'D');
$pdf->Cell(187,15,'OBSERVACIONES:',0,'');

$pdf->Output();
?>
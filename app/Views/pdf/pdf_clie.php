<?php

require('../FPDF/fpdf.php');



class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Image('Imagenes/logoHotel.png',15,5,25); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->Image('Imagenes/logoHotel.png',165,5,25); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->setXY(61,15);
        $this->Cell(88,8,'REPORTE DE CLIENTES',0,1,'C',0);
        // $this->Image('Imagenes/logoHotel.png',150,10,35); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->Ln(6);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','B',10);
        // Número de página
        $this->Cell(190,10,'Todos los derechos reservados a Hotel Montereal',0,0,'C',0);
        $this->Cell(-20,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
    }

    // Creación del objeto de la clase heredada
    $pdf = new PDF();//hacemos una instancia de la clase
    $pdf->AliasNbPages();
    $pdf->AddPage();//añade l apagina / en blanco
    $pdf->SetMargins(10,10,10);
    $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
    $pdf->SetX(15);
    $pdf->SetFont('Helvetica','B',15);
    $pdf->Cell(7,8,'N','B',0,'C',0);
    $pdf->Cell(30,8,'DNI','B',0,'C',0);
    $pdf->Cell(70,8,utf8_decode('Nombre completo'),'B',0,'C',0);
    $pdf->Cell(20,8,utf8_decode('Teléfono'),'B',0,'C',0);
    
    $pdf->Cell(60,8,utf8_decode('Correo'),'B',1,'C',0);

    $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
    $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb

    $pdf->SetFont('Arial','',11);
    foreach($cliente as $clientes):     
        
        $pdf->Ln(0.6);
        $pdf->setX(15);
        $pdf->Cell(7,8,$clientes['idCliente'],'B',0,'C',0);
        $pdf->Cell(30,8,$clientes['dni'],'B',0,'C',0);
        $pdf->Cell(70,8,utf8_decode($clientes['nombre']." ".$clientes['apellidoPaterno']." ".$clientes['apellidoMaterno']),'B',0,'C',0);
        $pdf->Cell(20,8,utf8_decode($clientes['telefono']),'B',0,'C',0);        
        $pdf->Cell(60,8,utf8_decode($clientes['email']),'B',1,'C',0);

    endforeach;

    // cell(ancho, largo, contenido,borde?, salto de linea?)

    $pdf->Output();
?>
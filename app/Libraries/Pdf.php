<?php 
namespace App\Libraries;
use FPDF;
class PDF extends FPDF
{
    protected $nombreReporte;
    function __construct($nombre) {
        parent::__construct();
        $this->nombreReporte=$nombre;
    }
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Arial','B',20);
        $this->Image('Imagenes/logoHotel.png',15,5,25); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->Image('Imagenes/logoHotel.png',165,5,25); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->setXY(61,15);
        $this->Cell(88,8,utf8_decode($this->nombreReporte),0,1,'C',0);
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

?>
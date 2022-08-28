<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;
use App\Models\ClientesModel;
use App\Libraries\Pdf;

class ReportesController extends Controller{

    public function reporteDiario(){
        return view('reportes/reporte_diario');
    }

    public function gananciaD(){
        $fechaActual=file_get_contents("php://input");
        $reporte=new ReservasModel();
        $fecha=date("Y-m-d",strtotime($fechaActual."- 5 days"));
        $fechas=[];
        $reporteT=[];
        while($fecha<$fechaActual){
            $fecha=date("Y-m-d",strtotime($fecha."+ 1 days")); 
            $ganancia=$reporte->gananciaDia($fecha);
            array_push($reporteT,['fecha' => $fecha, 'ganancia' => $ganancia['Total']]);
            
        }
        echo json_encode($reporteT);
    }
    
    public function listaReporteDia(){
        $dato=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteDia($dato);
        echo json_encode($lista);
    }

    //Reporte de Clientes
    public function reporteCliente(){
        return view('reportes/reporte_cliente');
    }
    

    public function reservasMes(){
        $mesActual=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $fechaLimite=date("Y-m",strtotime($mesActual->mes."- 5 month"));
        $reporteT=[];
        while($fechaLimite<$mesActual->mes){
            $fechaLimite=date("Y-m",strtotime($fechaLimite."+ 1 month")); 
            $cantidad=$reporte->cantidadReservasMes($fechaLimite);
            array_push($reporteT,['mes' => $fechaLimite, 'cantidad' => $cantidad['Total']]);
            
        }
        echo json_encode($reporteT);
    }
    
    public function listaReporteMes(){
        $dato=json_decode(file_get_contents("php://input"));
        // $dato->mes=($dato->mes<10)?'0'.$dato->mes:$dato->mes;
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMes($dato);
        echo json_encode($lista);

    }

    
    public function resumenCliente(){
        $fechaActual = date("Y-m");
        $cliente=new ClientesModel();
        $datos=$cliente->datosGenerales($fechaActual);
        echo json_encode($datos);
    }


    /*reporte de mes */
    public function reporteMes(){
        return view('reportes/reporte_mes');
    }

    public function gananciaM(){
        $mesActual=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $fechaLimite=date("Y-m",strtotime($mesActual->mes."- 5 month"));
        $reporteT=[];
        while($fechaLimite<$mesActual->mes){
            $fechaLimite=date("Y-m",strtotime($fechaLimite."+ 1 month")); 
            $ganancia=$reporte->gananciaMes($fechaLimite);
            array_push($reporteT,['mes' => $fechaLimite, 'ganancia' => $ganancia['Total']]);
            
        }
        echo json_encode($reporteT);
    }
    public function listaReporteMesFull(){
        $dato=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMesF($dato);
        echo json_encode($lista);
    }
    /*----------------*/


    /* Reporte Habitacion*/
    public function reporteHabitacion(){
        return view('reportes/reporte_habitacion');
    }


    public function PDF_cliente(){
        $datoB=$_GET['dato'];
        $fecha=$_GET['fecha'];
        $dato=(Object)(['dato' => $datoB,'mes' =>$fecha]);
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMes($dato);
        // echo json_encode($lista);
    

        // Creación del objeto de la clase heredada
        $pdf = new PDF("Reporte de Clientes");
        $pdf->AliasNbPages();
        $pdf->AddPage();//añade l apagina / en blanco
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
        $pdf->SetX(15);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(7,8,utf8_decode('Id'),'B',0,'C',0);
        $pdf->Cell(20,8,utf8_decode('Dni'),'B',0,'C',0);
        $pdf->Cell(70,8,utf8_decode('Nombre completo'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Fecha'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Gasto total'),'B',0,'C',0);
        $pdf->Cell(20,8,utf8_decode('Reservas'),'B',1,'C',0);

        $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
        $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb
     
        $pdf->SetFont('Arial','',11.5);


        foreach($lista as $listas){
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,utf8_decode($listas['idCliente']),'B',0,'C',0);
            $pdf->Cell(20,8,utf8_decode($listas['dni']),'B',0,'C',0);
            $pdf->Cell(70,8,utf8_decode($listas['nombreC']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['fecha']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['gastoT']),'B',0,'C',0);
            $pdf->Cell(20,8,utf8_decode($listas['cantidad']),'B',1,'C',0);
        }

        

        $espacio='                                                                                                      ';
    
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha evaluada: '.$fecha));
        

        $fechaComoEntero = strtotime($fecha);
        $mes = date("m", $fechaComoEntero);

        switch($mes)
        {case '01':$mes_letra = 'Enero'; break; case '02': $mes_letra = 'Febrero';  break; case '03': $mes_letra = 'Marzo';
            break; case '04': $mes_letra = 'Abril'; break; case '05': $mes_letra = 'Mayo'; break; case '06': $mes_letra = 'Junio';
            break; case '07': $mes_letra = 'Julio'; break; case '08': $mes_letra = 'Agosto'; break; case '09':$mes_letra = 'Septiembre';
            break; case '10': $mes_letra = 'Octubre'; break; case '11': $mes_letra = 'Noviembre'; break; case '12':$mes_letra = 'Diciembre';
            break; }
        
        // $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
       
        setlocale(LC_TIME, "spanish"); 

        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Mes evaluado: '.$mes_letra));
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha de hoy: '));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.strftime("%A, %d de %B de %Y")));
        

        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();     
    }

    public function PDF_mes(){
        
        $datoB=$_GET['dato'];
        $fecha=$_GET['fecha'];
        $dato=(Object)(['dato' => $datoB,'mes' =>$fecha]);
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMesF($dato);
        // echo json_encode($lista);
    

        // Creación del objeto de la clase heredada
        $pdf = new PDF("Reporte del mes");
        $pdf->AliasNbPages();
        $pdf->AddPage();//añade l apagina / en blanco
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
        $pdf->SetX(15);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(7,8,utf8_decode('Id'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Dni'),'B',0,'C',0);
        $pdf->Cell(70,8,utf8_decode('Cliente'),'B',0,'C',0);
        $pdf->Cell(40,8,utf8_decode('Fecha'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Total'),'B',1,'C',0);

        $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
        $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb
     
        $pdf->SetFont('Arial','',11.5);

        $aux = 0;

        foreach($lista as $listas){
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,utf8_decode($listas['idReserva']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['dni']),'B',0,'C',0);
            $pdf->Cell(70,8,utf8_decode($listas['nombreC']),'B',0,'C',0);
            $pdf->Cell(40,8,utf8_decode($listas['fecha']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode('S/.'.$listas['precioT']),'B',1,'C',0);   
            $aux = $aux + $listas['precioT'];         
        }

        $pdf->SetX(15);
        $pdf->SetFont('Arial','',11.5);
        $pdf->Cell(11,8,utf8_decode('Total'),'B',0,'C',1);
        $pdf->Cell(30,8,'','B',0,'C',1);
        $pdf->Cell(70,8,'','B',0,'C',1);
        $pdf->Cell(36,8,'','B',0,'C',1);
        $pdf->Cell(30,8,'S/.'.$aux.'.00','B',1,'C',1);

        $espacio='                                                                                                      ';
        
        $pdf->Ln(10);
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha evaluada: '.$fecha));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Suma total de montos: '.'S/.'.$aux));

        $fechaComoEntero = strtotime($fecha);
        $mes = date("m", $fechaComoEntero);

        switch($mes)
        {case '01':$mes_letra = 'Enero'; break; case '02': $mes_letra = 'Febrero';  break; case '03': $mes_letra = 'Marzo';
            break; case '04': $mes_letra = 'Abril'; break; case '05': $mes_letra = 'Mayo'; break; case '06': $mes_letra = 'Junio';
            break; case '07': $mes_letra = 'Julio'; break; case '08': $mes_letra = 'Agosto'; break; case '09':$mes_letra = 'Septiembre';
            break; case '10': $mes_letra = 'Octubre'; break; case '11': $mes_letra = 'Noviembre'; break; case '12':$mes_letra = 'Diciembre';
            break; }

        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Mes evaluado: '.$mes_letra));

        setlocale(LC_TIME, "spanish"); 
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha de hoy: '));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.strftime("%A, %d de %B de %Y")));



        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();     
    }


    public function PDF_dia(){
        
        $datoB=$_GET['dato'];
        $fecha=$_GET['fecha'];
        $dato=(Object)(['dato' => $datoB,'fecha' =>$fecha]);
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteDia($dato);
        // echo json_encode($lista);
        
    

        // Creación del objeto de la clase heredada
        $pdf = new PDF("Reporte del Día");
        $pdf->AliasNbPages();
        $pdf->AddPage();//añade l apagina / en blanco
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
        $pdf->SetX(15);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(7,8,utf8_decode('Id'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Dni'),'B',0,'C',0);
        $pdf->Cell(70,8,utf8_decode('Cliente'),'B',0,'C',0);
        $pdf->Cell(40,8,utf8_decode('Fecha'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Total'),'B',1,'C',0);

        $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
        $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb
     
        $pdf->SetFont('Arial','',11.5);

        $aux = 0;
        foreach($lista as $listas){
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,utf8_decode($listas['idReserva']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['dni']),'B',0,'C',0);
            $pdf->Cell(70,8,utf8_decode($listas['nombreC']),'B',0,'C',0);
            $pdf->Cell(40,8,utf8_decode($listas['fecha']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode('S/.'.$listas['precioT']),'B',1,'C',0);
            $aux = $aux + $listas['precioT'];
        }
        $pdf->SetX(15);
        $pdf->SetFont('Arial','',11.5);
        $pdf->Cell(11,8,utf8_decode('Total'),'B',0,'C',1);
        $pdf->Cell(30,8,'','B',0,'C',1);
        $pdf->Cell(70,8,'','B',0,'C',1);
        $pdf->Cell(36,8,'','B',0,'C',1);
        $pdf->Cell(30,8,'S/.'.$aux.'.00','B',1,'C',1);

        $espacio='                                                                                                      ';
        
        $pdf->Ln(10);
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha evaluada: '.$fecha));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Suma total de montos: '.'S/.'.$aux));


        setlocale(LC_TIME, "spanish"); 
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha de hoy: '));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.strftime("%A, %d de %B de %Y")));

        
        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();     
    }

    public function PDF_hab(){
        $datoB=$_GET['dato'];
        $fecha=$_GET['fecha'];
        $dato=(Object)(['dato' => $datoB,'mes' =>$fecha]);
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMesHabitacion($dato);
        // echo json_encode($lista);
        
    

        // Creación del objeto de la clase heredada
        $pdf = new PDF("Reporte de Habitaciones");
        $pdf->AliasNbPages();
        $pdf->AddPage();//añade l apagina / en blanco
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
        $pdf->SetX(15);
        $pdf->SetFont('Helvetica','B',12);
        $pdf->Cell(7,8,utf8_decode('Id'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Habitación'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Tipo'),'B',0,'C',0);
        $pdf->Cell(40,8,utf8_decode('Fecha'),'B',0,'C',0);
        $pdf->Cell(30,8,utf8_decode('Cant. Reservas'),'B',0,'C',0);
        $pdf->Cell(40,8,utf8_decode('Monto Total'),'B',1,'C',0);

        $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
        $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb
     
        $pdf->SetFont('Arial','',11.5);

        $aux = 0;
        foreach($lista as $listas){
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,utf8_decode($listas['idHab']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['numero']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['tipo']),'B',0,'C',0);
            $pdf->Cell(40,8,utf8_decode($listas['fecha']),'B',0,'C',0);
            $pdf->Cell(30,8,utf8_decode($listas['cantidad']),'B',0,'C',0);
            $pdf->Cell(40,8,utf8_decode('S/.'.$listas['Total']),'B',1,'C',0);
            $aux = $aux + $listas['Total'];
        }
        $pdf->SetX(15);
        $pdf->SetFont('Arial','',11.5);
        $pdf->Cell(11,8,utf8_decode('Total'),'B',0,'C',1);
        $pdf->Cell(30,8,'','B',0,'C',1);
        $pdf->Cell(70,8,'','B',0,'C',1);
        $pdf->Cell(36,8,'','B',0,'C',1);
        $pdf->Cell(30,8,'S/.'.$aux.'.00','B',1,'C',1);

        $espacio='                                                                                                      ';
        
        $pdf->Ln(10);
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha evaluada: '.$fecha));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Suma total de montos: '.'S/.'.$aux));


        setlocale(LC_TIME, "spanish"); 
        $pdf->Ln(8);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.'Fecha de hoy: '));
        $pdf->Ln(6);
        $pdf->SetX(15);
        $pdf->Write(5,utf8_decode($espacio.strftime("%A, %d de %B de %Y")));

        
        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();  
    }
    public function gananciaTipoHab(){
        $mes=file_get_contents("php://input");
        $reporte=new ReservasModel();
        $reporteT=$reporte->gananciaMesHab($mes);
        echo json_encode($reporteT);
    }
    public function listaReporteMesHabitacion(){
        $dato=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMesHabitacion($dato);
        echo json_encode($lista);
    }

    public function listarDetalleHab(){
        $data=json_decode(file_get_contents("php://input"));
        $reserva=new ReservasModel();
        $lista=$reserva->mostrarReservasHab($data);
        echo json_encode($lista);
    }
    
    public function imprimirReporteCliente(){
        $datoB=$_GET['dato'];
        $fecha=$_GET['fecha'];
        $dato=(Object)(['dato' => $datoB,'mes' =>$fecha]);
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMes($dato);
        echo json_encode($lista);
    }

}
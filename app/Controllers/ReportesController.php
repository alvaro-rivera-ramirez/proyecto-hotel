<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;
use App\Models\ClientesModel;
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

    public function reservasMes(){
        $mesActual=json_decode(file_get_contents("php://input"));
        // $mes=($mesActual->mes<10)?'0'.$mesActual->mes:$mesActual->mes;
        // $fechaReporte=$mesActual->anio.'-'.$mes;

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
    
    public function listaReporteDia(){
        $dato=json_decode(file_get_contents("php://input"));
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteDia($dato);
        echo json_encode($lista);
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
    public function reporteCliente(){
        return view('reportes/reporte_cliente');
    }
    
    public function reporteHabitacion(){
        return view('reportes/reporte_habitacion');
    }

    public function gananciaM(){
        $fechaActual=file_get_contents("php://input");
        $reporte=new ReservasModel();
        $fecha=date("Y-m",strtotime($fechaActual));
        $fechas=[];
        $reporteT=[];
        while($fecha<$fechaActual){
            $fecha=date("Y-m",strtotime($fecha)); 
            $ganancia=$reporte->gananciaMes($fecha);
            array_push($reporteT,['fecha' => $fecha, 'ganancia' => $ganancia['Total']]);
            
        }
        echo json_encode($reporteT);
    }

    public function gananciaMHabitacion(){
        $fechaActual=file_get_contents("php://input");
        $reporte=new ReservasModel();
        $fecha=date("Y-m",strtotime($fechaActual));
        $fechas=[];
        $reporteT=[];
        while($fecha<$fechaActual){
            $fecha=date("Y-m",strtotime($fecha)); 
            $ganancia=$reporte->gananciaMesHab($fecha);
            array_push($reporteT,['fecha' => $fecha, 'ganancia' => $ganancia['Total']]);
            
        }
        echo json_encode($reporteT);
    }

    public function listaReporteMesHabitacion(){
        $dato=json_decode(file_get_contents("php://input"));
        // $dato->mes=($dato->mes<10)?'0'.$dato->mes:$dato->mes;
        $reporte=new ReservasModel();
        $lista=$reporte->mostrarReporteMesHabitacion($dato);
        echo json_encode($lista);
    }
}
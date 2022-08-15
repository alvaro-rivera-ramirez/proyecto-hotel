<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;
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
        $mes=($mesActual->mes<10)?'0'.$mesActual->mes:$mesActual->mes;
        $fechaReporte=$mesActual->anio.'-'.$mes;

        $reporte=new ReservasModel();
        $fechaLimite=date("Y-m",strtotime($fechaReporte."- 5 month"));
        $reporteT=[];
        while($fechaLimite<$fechaReporte){
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
    public function reporteMes(){
        return view('reportes/reporte_mes');
    }
    
    public function reporteCliente(){
        return view('reportes/reporte_cliente');
    }
    
    public function reporteHabitacion(){
        return view('reportes/reporte_habitacion');
    }

}
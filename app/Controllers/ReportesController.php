<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class ReportesController extends Controller{

    public function reporteDiario(){
        
        return view('reportes/reporte_diario');
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
<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HabitacionModel;
class Inicio extends Controller{
    public function index(){
        $Hab=new HabitacionModel();
        $datosHab['habitacion']=$Hab->innerJoinTipoHab();
        $datosHab['estado']=$Hab->countEstadoHab();
        //print_r($datosHab);
        return view('home',$datosHab);
    }

    public function salir(){
        $session=session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
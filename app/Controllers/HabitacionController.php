<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HabitacionModel;
class HabitacionController extends Controller{
    public function index(){
        $habitacion=new HabitacionModel();
        $datosHab['habitacion']=$habitacion->getAll();
        return view("habitaciones/registro_hab",$datosHab);
    }
}
<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoHabModel;

class TipoHabController extends Controller{
    public function index(){
        $tipo=new TipoHabModel();
        $datosTip['tipo']=$tipo->getTipoHab();
        return view("tipoHabitaciones/registro_tipo_hab",$datosTip);
    }
}
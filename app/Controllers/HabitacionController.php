<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HabitacionModel;
class HabitacionController extends Controller{
    public function index(){
    
       // $datosHab['habitacion']=$habitacion->getAll();

       $pager = service('pager');
       $model = new HabitacionModel();

       $data = [
           'habitacion' => $model->join('tipo_habitacion', 'tipo_habitacion.idTipo = habitacion.idTipoHab')
           ->join('estado_hab', 'estado_hab.idEstado = habitacion.idEstado')
           ->orderBy('idHab','ASC')->paginate(10, 'group1'),
           'pager' => $model->pager
       ];
       
       //var_dump($model->join('tipo_habitacion', 'tipo_habitacion.idTipo = habitacion.idTipoHab')->join('estado_hab', 'estado_hab.idEstado = habitacion.idEstado')->paginate(10, 'group1'));

       return view("habitaciones/registro_hab",$data);
    }
}
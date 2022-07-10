<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoHabModel;

class TipoHabController extends Controller{
    public function index(){
        //$tipo=new TipoHabModel();
        //$datosTip['tipo']=$tipo->getTipoHab();

        $pager = service('pager');

        $model = new TipoHabModel();

        $data = [
            'tipo' => $model->paginate(3, 'group1'),
            'pager' => $model->pager
        ];
            
        return view("tipoHabitaciones/registro_tipo_hab",$data);
    }
}
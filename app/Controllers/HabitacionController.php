<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HabitacionModel;
use App\Models\TipoHabModel;
class HabitacionController extends Controller{
    public function index(){
        $habitacion=new HabitacionModel();
        $datosHab['habitacion']=$habitacion->getAll();
        return view("habitaciones/registro_hab",$datosHab);
    }

    public function crear(){
        $tipoHab=new TipoHabModel();
        $datos['tipo']=$tipoHab->getTipo();
        return view('habitaciones/new_hab',$datos);
    }

    public function editar(){
        return view('habitaciones/update_hab');
    }

    public function guardar(){

        $validation = service('validation');
        $validation->setRules([ 
            'num_hab' => 'required|is_unique[habitacion.numero]|numeric|min_length[3]|max_length[4]',
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.tipo]'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return redirect()->to(base_url('nueva_habitacion'))->withInput()->with('errors',$validation->getErrors());
        }
    }
}
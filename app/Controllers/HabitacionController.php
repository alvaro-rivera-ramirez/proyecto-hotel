<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HabitacionModel;
use App\Models\TipoHabModel;
use App\Models\UsuariosModel;
class HabitacionController extends Controller{
    public function index(){
    
       // $datosHab['habitacion']=$habitacion->getAll();

       $pager = service('pager');
       $model = new HabitacionModel();

       $data = [
           'habitacion' => $model->join('tipo_habitacion', 'tipo_habitacion.idTipo = habitacion.idTipo')
           ->join('estado_hab', 'estado_hab.idEstado = habitacion.idEstado')
           ->orderBy('idHab','ASC')->paginate(8, 'group1'),
           'pager' => $model->pager
       ];
       
       //var_dump($model->join('tipo_habitacion', 'tipo_habitacion.idTipo = habitacion.idTipoHab')->join('estado_hab', 'estado_hab.idEstado = habitacion.idEstado')->paginate(10, 'group1'));

       return view("habitaciones/registro_hab",$data);
    }

    public function crear(){
        $tipoHab=new TipoHabModel();
        $datos['tipo']=$tipoHab->getTipo();
        return view('habitaciones/new_hab',$datos);
    }

    public function editar($id=null){

        $tipoHab=new TipoHabModel();
        $hab=new HabitacionModel();
        
        $datos['tipo']=$tipoHab->getTipo();
        $datos['hab']=$hab->where('idHab',$id)->first();
        return view('habitaciones/update_hab',$datos);
    }

    public function guardar(){

        $validation = service('validation');
        $validation->setRules([ 
            'num_hab' => 'required|is_unique[habitacion.numero]|numeric|min_length[3]|max_length[4]',
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return redirect()->to(base_url('nueva_habitacion'))->withInput()->with('errors',$validation->getErrors());
        }

        $data=[
            'numero' => $this->request->getPost('num_hab'),
            'idTipo' => $this->request->getPost('tipo_hab'),
            'idEstado' => 1
        ];

        $habitacion=new HabitacionModel();

        $habitacion->insert($data);

        return redirect()->to(base_url('nueva_habitacion'));

    }


    public function actualizar(){
        $hab_id=$this->request->getPost('id_hab');
        $admin_id=session('id');

        $usuario=new UsuariosModel();

        $admin=$usuario->obtenerDatos($admin_id);

        $validation = service('validation');
        $validation->setRules([ 
            'num_hab' => 'required|is_unique[habitacion.numero,habitacion.idHab,'.$hab_id.']|numeric|min_length[3]|max_length[4]',
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]',
            'admin_usuario' => 'required|alpha_numeric',
            'admin_clave' => 'required|min_length[5]|max_length[8]' 
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->to(base_url('editar_habitacion/'.$hab_id))->withInput()->with('errors',$validation->getErrors());
        }

        $admin_usuario=$this->request->getPost('admin_usuario');
        $admin_pass=$this->request->getPost('admin_clave');
        if($admin['username']!=$admin_usuario || !PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            return redirect()->to(base_url('editar_habitacion/'.$hab_id))->withInput()->with('msg','Usuario y/o Password Incorrectos'); 
        }

        $numero=$this->request->getPost('num_hab');
        $tipo_hab=$this->request->getPost('tipo_hab');
    }
    public function borrar($id=null){
        $hab=new HabitacionModel();
        $hab->where('idHab',$id)->delete($id);
        return redirect()->route('lista-habitaciones');
    }
}
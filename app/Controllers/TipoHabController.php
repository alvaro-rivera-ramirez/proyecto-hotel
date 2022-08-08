<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoHabModel;
use App\Models\UsuariosModel;

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

    public function crear(){
        return view('tipoHabitaciones/new_tipo_hab');
    }

    public function guardar(){

        $validation = service('validation');
        $validation->setRules([ 
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]',
            'precio_tipohab' => 'required|is_unique[tipo_habitacion.precio]|numeric|min_length[1]|max_length[4]',
            'descripcion_hab' => 'required|alpha_space'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return redirect()->to(base_url('nuevo_tipohab'))->withInput()->with('errors',$validation->getErrors());
        }

        $tipo=$this->request->getPost('tipo_hab');
        $precio=$this->request->getPost('precio_tipohab');
        $descripcion=$this->request->getPost('descripcion_hab');
        $data=[
            'tipo' => $tipo,
            'precio' => $precio,
            'descripcion' => $descripcion
        ];

        $tipo_habitacion=new TipoHabModel();
        $tipo_habitacion->insert($data);
        echo json_encode(['respuesta' => true,'mensaje' =>'Se ha añadido el tipo de habitación correctamente']);
    }


    public function editar($idTipo=null){

        $tipoHab=new TipoHabModel();
        $datos['tipoHab']=$tipoHab->where('idTipo',$idTipo)->first();
        return view('tipoHabitaciones/update_tipo_hab',$datos);
    }

    public function actualizar(){
        $tipohab_id=$this->request->getPost('tipohab_id');
        $admin_id=session('id');

        $usuario=new UsuariosModel();

        $admin=$usuario->obtenerDatos($admin_id);

        $validation = service('validation');
        $validation->setRules([ 
            //'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]',
            'precio_tipohab' => 'required|is_unique[tipo_habitacion.precio]|numeric|min_length[1]|max_length[4]',
            'descripcion_hab' => 'required|alpha_space',
            'admin_usuario' => 'required|alpha_numeric',
            'admin_clave' => 'required|min_length[5]|max_length[8]' 
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->to(base_url('editar_tipohab/'.$tipohab_id))->withInput()->with('errors',$validation->getErrors());
        }

        $admin_usuario=$this->request->getPost('admin_usuario');
        $admin_pass=$this->request->getPost('admin_clave');
        if($admin['username']!=$admin_usuario || !PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            return redirect()->to(base_url('editar_tipohab/'.$tipohab_id))->withInput()->with('msg','Usuario y/o Password Incorrectos'); 
        }

        //$tipo=$this->request->getPost('tipo_hab');
        $precio=$this->request->getPost('precio_tipohab');
        $descripcion=$this->request->getPost('descripcion_hab');

        $data=[
            //'tipo' => $tipo,
            'precio' => $precio,
            'descripcion' => $descripcion
        ];

        $tipoHab=new TipoHabModel();
        $tipoHab->update($tipohab_id,$data);
        echo json_encode(['respuesta' => true,'mensaje' =>'Se ha actualizado el tipo de habitación correctamente']);
    }

    public function borrar($idTipo=null){
        $tipoHab=new TipoHabModel();
        $tipoHab->where('idTipo',$idTipo)->delete($idTipo);
        echo json_encode(['respuesta' => true]);
    }

}
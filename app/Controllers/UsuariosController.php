<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class UsuariosController extends Controller{
    public function index(){
        $usuario=new UsuariosModel();
        $datosUsuario['usuario']=$usuario->getUsuarios();
        return view('usuarios/registro_usuarios',$datosUsuario);
    }

    public function editar(){
        return view('usuarios/update_usuarios');
    }

    public function crear(){
        return view('usuarios/new_usuarios');
    }

    public function guardar(){
        $validation = service('validation');
        $validation->setRules([
            'user_dni' => 'required|numeric|max_length[8]',
            'user_nombre' => 'required|alpha_space',
            'user_apellido' => 'required|alpha_space',
            'user_telefono' => 'required|alpha_numeric',
            'user_usuario' =>  'required|alpha_numeric|is_unique[usuarios.username]',
            'user_email' => 'required|valid_email|is_unique[usuarios.email]',
            'user_clave_1' => 'required|matches[user_clave_2]',
            'user_privilegio' => 'required|is_not_unique[roles.idRol]'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return redirect()->to(base_url('nuevo_usuario'))->withInput()->with('errors',$validation->getErrors());
        }

        $password=PASSWORD_HASH($this->request->getPost('user_clave_1'),PASSWORD_DEFAULT);
        $username=$this->request->getPost('user_usuario');
        $dni=$this->request->getPost('user_dni');
        $nombre=$this->request->getPost('user_nombre');
        $apellidos=explode(" ",$this->request->getPost('user_apellido'));
        $telefono=$this->request->getPost('user_telefono');
        $email=$this->request->getPost('user_email');
        $idRol=$this->request->getPost('user_privilegio');
        $data=[
            'username' => $username,
            'pass' => $password,
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidos[0],
            'apellidoMaterno' => $apellidos[1],
            'telefono' => $telefono,
            'email' => $email,
            'idRol' => $idRol,
            'created_at' => date('Y-m-d H:i:s') 
        ];
        $usuario=new UsuariosModel();
        $usuario->insert($data);

        return redirect()->to(base_url('nuevo_usuario'));
    }

    public function configurarPerfil(){
        return view('configuracion/perfil');
    }

    public function configurarPassword(){
        return view('configuracion/cambiarPassword');
    }
}
<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
class Login extends BaseController
{
    public function index()
    {
        if(!session('usuario')){
            return view('login-view');
        }else{
            return redirect()->to(base_url('/inicio'));
        }
    }

    public function login(){
        $usuario=$this->request->getPost('usuario');
        $password=$this->request->getPost('password');
        //$usuario=$_POST['usuario'];
        //$password=$_POST['password'];
        /*instancia al modelo usuario */
        $Usuario=new UsuariosModel();
        $datosUsuario=$Usuario->obtenerUsuario(['username' => $usuario]);

        if(count($datosUsuario)>0 && password_verify($password,$datosUsuario[0]['pass'])){

            $data=[
                "usuario" => $datosUsuario[0]['username'],
                "nombre" => $datosUsuario[0]['nombre'],
                "rol" =>$datosUsuario[0]['cargo']
            ];
            $session= session();
            $session->set($data);
            
            return redirect()->to(base_url('inicio'));
            //echo json_encode(array('success'=> 1));  
        }else{
            //echo json_encode(array('success'=> 0));
            return redirect()->to(base_url('/'));
        }
    }

    
}

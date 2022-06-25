<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
class Login extends BaseController
{
    public function index()
    {
        return view('login-view');
    }

    public function login(){
        $usuario=$this->request->getPost('usuario');
        $password=$this->request->getPost('password');
    
        /*LLAMA AL MODELO USUARIO */
        $Usuario=new UsuariosModel();
        $datosUsuario=$Usuario->obtenerUsuario(['username' => $usuario]);

        if(count($datosUsuario)>0 && password_verify($password,$datosUsuario[0]['pass'])){
            /*if($datosUsuario[0]['idRol']==1){
                $rol="Administrador";
            }else{
                $rol="Usuario";
            }*/
            $data=[
                "usuario" => $datosUsuario[0]['username'],
                "nombre" => $datosUsuario[0]['nombre'],
                "rol" =>$datosUsuario[0]['cargo']
            ];
            $session= session();
            $session->set($data);
            return redirect()->to(base_url('/inicio'));
        }else{
            return redirect()->to(base_url('/'));
        }
    }

    
}

<?php

namespace App\Controllers;
use App\Models\UsuariosModel;
class Login extends BaseController
{
    public function index()
    {

        $mensaje = session('mensaje');

        if(!session('usuario')){
            return view('login-view');
            
        }else{
            return redirect()->to(base_url('/inicio'));
        }
    }

    public function login(){
        $usuario=$this->request->getPost('usuario');
        $password=$this->request->getPost('password');

        /*instancia al modelo usuario */
        $Usuario=new UsuariosModel();
        $datosUsuario=$Usuario->obtenerUsuario(['username' => $usuario]);

        if(count($datosUsuario)>0 && password_verify($password,$datosUsuario[0]['pass'])){

            $data=[
                "id" => $datosUsuario[0]['id'],
                "usuario" => $datosUsuario[0]['username'],
                "nombre" => $datosUsuario[0]['nombre'],
                "rol" =>$datosUsuario[0]['cargo']
            ];

            $session= session();
            $session->set($data);

            echo json_encode(['respuesta' => true,'mensaje' =>'Inicio de sesión exitoso']);
            // $cont = 1;
            // echo json_encode(['logeo' => $cont]);
            // $cont = $cont + 1;
        }else{
            if($usuario=="" || $password =="")
                echo json_encode(['respuesta' => true,'mensaje' =>'Complete todos los campos por favor']);
            else
                echo json_encode(['respuesta' => false,'mensaje' =>'Ocurrió un fallo, el usuario o contraseña ingresada no es válida']);
        }
    }

    
}
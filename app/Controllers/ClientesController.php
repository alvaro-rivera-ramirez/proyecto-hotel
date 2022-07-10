<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\RegistrarClientesModel;

class ClientesController extends Controller{
    public function index(){
        $cliente=new ClientesModel();
        $datosCli['cliente']=$cliente->getClientes();
        return view("clientes/registro-cliente",$datosCli);
    }

    public function crear_cli(){
        return view('clientes/registrar_cliente');
    }
    
    public function registrar(){
        $validation = service('validation');
        $validation->setRules([
            'cli_dni_reg' => 'required|numeric|max_length[8]',
            'cli_nombre_reg' => 'required|alpha_space',
            'cli_apellidop_reg' => 'required|alpha_space',
            'cli_apellidom_reg' => 'required|alpha_numeric',
            'cli_telefono_reg' =>  'required|alpha_numeric',
            'cli_email_reg' => 'required|valid_email|is_unique[cliente.email]',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return redirect()->to(base_url('nuevo_cliente'))->withInput()->with('errors',$validation->getErrors());
        }

        $dni=$this->request->getPost('cli_dni_reg');
        $nombre=$this->request->getPost('cli_nombre_reg');
        $apellidoPaterno=$this->request->getPost('cli_apellidop_reg');
        $apellidoMaterno=$this->request->getPost('cli_apellidom_reg');
        $telefono=$this->request->getPost('cli_telefono_reg');
        $email=$this->request->getPost('cli_email_reg');
        $data=[
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'telefono' => $telefono,
            'email' => $email,
        ];
        $cliente=new ClientesModel();
        $cliente->insert($data);

        return redirect()->to(base_url('nuevo_cliente'));
    }
}


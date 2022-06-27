<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;

class ClientesController extends Controller{
    public function index(){
        $cliente=new ClientesModel();
        $datosCli['cliente']=$cliente->getClientes();
        return view("clientes/registro-cliente",$datosCli);
    }

    public function registrar_cliente(){

        return view('clientes/registrar_cliente');
    }
}
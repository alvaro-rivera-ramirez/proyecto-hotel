<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;

class ClientesController extends Controller{
    public function index(){
        //$cliente=new ClientesModel();
        //$datosCli['cliente']=$cliente->getClientes();

        $pager = service('pager');
        $model = new ClientesModel();

        $data = [
            'cliente' => $model->paginate(1, 'group1'),
            'pager' => $model->pager
        ];

        return view("clientes/registro-cliente",$data);
    }

    public function registrar_cliente(){

        return view('clientes/registrar_cliente');
    }
}
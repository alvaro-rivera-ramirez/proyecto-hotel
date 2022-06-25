<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class ClientesController extends Controller{
    public function index(){
        return view('clientes/registro-cliente');
    }
}
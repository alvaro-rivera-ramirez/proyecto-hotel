<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
class UsuariosController extends Controller{
    public function index(){
        return view('usuarios/registro_usuarios');
    }

    public function actualizar(){
        return view('usuarios/update_usuarios');
    }
}
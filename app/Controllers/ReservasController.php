<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModels;

class ReservasController extends Controller{
    public function index(){
        return view('reservas/registro_reservas');
    }

    public function reservar(){
        return view('reservas/reservar_hab');
    }
}
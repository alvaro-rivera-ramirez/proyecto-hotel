<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;

class ReservasController extends Controller{
    public function index(){

        $pager = service('pager');
        $model = new ReservasModel();

        $data = [
            'reserva' => $model->join('cliente', 'cliente.idCliente = reserva.idCliente')
            ->join('usuarios', 'usuarios.id = reserva.idUser')
            ->orderBy('idReserva','DESC')->paginate(10, 'group1'),
            'pager' => $model->pager
        ];

        return view('reservas/registro_reservas',$data);
    }

    public function reservar(){
        return view('reservas/reservar_hab');
    }
}
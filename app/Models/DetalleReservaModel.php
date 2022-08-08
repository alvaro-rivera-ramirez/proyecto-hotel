<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetalleReservaModel extends Model{
    protected $table      = 'detalle_reserva';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idDetalle';
    protected $allowedFields=['idReserva','idHab','fechaIni','fechaFin','dias','precio'];
}
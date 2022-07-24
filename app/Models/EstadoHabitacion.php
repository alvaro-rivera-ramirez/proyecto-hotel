<?php 
namespace App\Models;

use CodeIgniter\Model;

class EstadoHabitacion extends Model{
    protected $table      = 'estado_hab';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idEstado';
    protected $allowedFields=['estado'];
}
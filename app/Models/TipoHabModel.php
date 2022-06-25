<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipoHabModel extends Model{
    protected $table      = 'tipo_habitacion';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    
    public function getTipoHab(){
        $user=$this->db->table($this->table);
        return $user->get()->getResultArray();
    }
}
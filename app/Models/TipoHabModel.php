<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipoHabModel extends Model{
    protected $table      = 'tipo_habitacion';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    
    public function getTipoHab(){
        $query=$this->db->table($this->table);
        return $query->get()->getResultArray();
    }

    public function getTipo(){
        $query=$this->db->query("SELECT idTipo, tipo FROM tipo_habitacion");
        return $query->getResult();
    }
}
<?php 
namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model{
    protected $table      = 'habitacion';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    public function getHabitaciones(){
        $user=$this->db->table($this->table);
        return $user->get()->getResultArray();
    }

    public function innerJoinTipoHab()
    {
        $builder = $this->db->table("habitacion as hab");
        $builder->select('hab.*, tipoHab.tipo as tipo_hab');
        $builder->join('tipo_habitacion as tipoHab', 'hab.idTipoHab = tipoHab.idTipo');
        $builder->orderBy('idHab','ASC');
        $data = $builder->get()->getResultArray();
        return $data;
    }

    public function getAll(){
        $builder = $this->db->table("habitacion as hab");
        $builder->select('hab.*, estado_hab.estado, tipoHab.*');
        $builder->join('estado_hab', 'hab.idEstado = estado_hab.idEstado');
        $builder->join('tipo_habitacion as tipoHab', 'hab.idTipoHab = tipoHab.idTipo');
        $builder->orderBy('idHab','ASC');
        $data = $builder->get()->getResultArray();
        return $data;
    }
}
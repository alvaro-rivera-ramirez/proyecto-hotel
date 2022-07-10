<?php 
namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model{
    protected $table      = 'habitacion';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['numero','idTipoHab','idEstado'];

    public function getHabitaciones(){
        $user=$this->db->table($this->table);
        return $user->get()->getResultArray();
    }

    public function innerJoinTipoHab()
    {
        $con = $this->db->table("habitacion as hab");
        $con->select('hab.*, tipoHab.tipo as tipo_hab');
        $con->join('tipo_habitacion as tipoHab', 'hab.idTipoHab = tipoHab.idTipo');
        $con->orderBy('idHab','ASC');
        $data = $con->get()->getResultArray();
        return $data;
    }

    public function countEstadoHab(){
        $con=$this->db->table("habitacion as h");
        $con->select('e.idEstado,e.estado, count(h.idEstado) as cantidad');
        $con->join('estado_hab e','h.idEstado=e.idEstado','right');
        $con->groupBy('e.estado')->orderBy('e.idEstado','ASC');
        $data = $con->get()->getResultArray();
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
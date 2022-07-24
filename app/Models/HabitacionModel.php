<?php 
namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model{
    protected $table      = 'habitacion';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idHab';
    protected $useTimestamps= true;
    protected $useSoftDeletes = true;
    protected $dateFormat= 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $allowedFields=['numero','idTipo','idEstado'];

    public function getAll(){
        $user=$this->db->table($this->table);
        return $user->get()->getResultArray();
    }

    public function innerJoinTipoHab()
    {
        $query=$this->db->table('habitacion as h');
        $query->select('h.*, tipoHab.tipo');
        $query->join('tipo_habitacion as tipoHab', 'h.idTipo= tipoHab.idTipo');
        $query->where('h.deleted_at IS NULL');
        $query->orderBy('h.idHab','ASC');
        return $query->get()->getResultArray();
    }

    public function countEstadoHab(){
        $con=$this->db->table("habitacion as h");
        $con->select('e.idEstado,e.estado, count(h.idEstado) as cantidad');
        $con->join('estado_hab e','h.idEstado=e.idEstado','right');
        $con->where('h.deleted_at IS NULL');
        $con->groupBy('e.estado')->orderBy('e.idEstado','ASC');
        return $con->get()->getResultArray();
    }

    public function getHabitaciones(){
        $query=$this->db->query('SELECT idHab,numero,idTipo FROM habitacion WHERE deleted_at IS NULL AND idEstado=1');
        return $query->getResultArray();
    }

    public function getTipos(){
        $query=$this->db->query('SELECT idTipo,tipo,precio FROM tipo_habitacion WHERE deleted_at IS NULL');
        return $query->getResultArray();
    }
}
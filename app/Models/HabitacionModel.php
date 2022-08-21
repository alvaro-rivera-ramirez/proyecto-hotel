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

    public function getHab($dato=null){
        $hab=$this->db->table('habitacion as h');
        $hab->join('tipo_habitacion as th', 'th.idTipo = h.idTipo');
        $hab->join('estado_hab eh', 'eh.idEstado = h.idEstado');
        $hab->where("h.deleted_at IS NULL");
        if(!empty($dato)){   
            $hab->like('h.numero', $dato);
            $hab->orLike('th.tipo',$dato);
        }
        return $hab->get()->getResultArray();
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
        $con=$this->db->query('SELECT e.*,count(h.idHab) as cantidad FROM estado_hab e LEFT JOIN (SELECT hab.* FROM habitacion hab WHERE hab.deleted_at IS NULL)as h ON e.idEstado=h.idEstado GROUP BY e.idEstado ORDER BY e.idEstado');
        return $con->getResultArray();
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

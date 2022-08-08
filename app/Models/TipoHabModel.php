<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipoHabModel extends Model{
    protected $table      = 'tipo_habitacion';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idTipo';
    protected $useTimestamps= true;
    protected $useSoftDeletes = true;
    protected $dateFormat= 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $allowedFields=['tipo','precio','descripcion'];

    public function getTipoHab(){
        $query=$this->db->table($this->table);
        return $query->get()->getResultArray();
    }

    public function getTipo(){
        $query=$this->db->query("SELECT idTipo, tipo,precio FROM tipo_habitacion");
        return $query->getResultArray();
    }

    public function obtenerDatos($idTipo){
        $tipohab=$this->db->table('tipo_habitacion as t');
        $tipohab->select('t.*');
        $tipohab->where('t.idTipo',$idTipo);
        return $tipohab->get()->getRowArray();
    }

    public function obtener_precio($id,$dias){
        $query=$this->db->table('tipo_habitacion');
        $precioU=$query->select('precio')->where('idTipo',$id)->get()->getRow();
        $precio=$dias*$precioU->precio;
        return $precio;
    }
}
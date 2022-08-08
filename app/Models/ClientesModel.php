<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{
    protected $table      = 'cliente';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idCliente';
    protected $useTimestamps= true;
    protected $useSoftDeletes = true;
    protected $dateFormat= 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $allowedFields=['dni','nombre','apellidoPaterno','apellidoMaterno','telefono','email'];
    
    public function obtenerCliente($data){
        $cliente=$this->db->table('cliente as c');
        $cliente->select('c.dni, c.nombre');
        $cliente->where($data);
        return $cliente->get()->getResultArray();
    }
    
    public function getClientes(){
        $consulta=$this->db->query("SELECT * FROM cliente WHERE deleted_at IS NULL");
        return $consulta->getResultArray();
    }

    public function obtenerDatos($idCliente){
        $cliente=$this->db->table('cliente as c');
        $cliente->select('c.*');
        $cliente->where('c.idCliente',$idCliente);
        return $cliente->get()->getRowArray();
    }

    public function buscarCliente($dni){
        $cliente=$this->db->table('cliente as c');
        $cliente->select('c.*');
        $cliente->where('dni',$dni);
        return $cliente->get()->getRowArray();
    }
}
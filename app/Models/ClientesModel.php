<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{
    protected $table      = 'cliente';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idCliente';
    protected $allowedFields=['dni','nombre','apellidoPaterno','apellidoMaterno','telefono','email'];
    public function obtenerCliente($data){
        $cliente=$this->db->table('cliente as c');
        $cliente->select('c.dni, c.nombre');
        $cliente->where($data);
        return $cliente->get()->getResultArray();
    }
    
    public function getClientes(){
        $consulta=$this->db->table($this->table);
        return $consulta->get()->getResultArray();
    }

    public function buscar($query)
    {
        $this->db->like('dni', $query);
        $this->db->get('cliente');

        if($query->num_rows()>0){
            return $query;
        }else{
            return false;
        }
    }

}
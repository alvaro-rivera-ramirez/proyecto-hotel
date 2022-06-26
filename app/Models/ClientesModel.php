<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{
    protected $table      = 'cliente';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    public function getClientes(){
        $user=$this->db->table($this->table);
        return $user->get()->getResultArray();
    }

}
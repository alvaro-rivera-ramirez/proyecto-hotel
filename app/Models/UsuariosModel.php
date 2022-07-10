<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['username','pass','dni','nombre','apellidoPaterno','apellidoMaterno','telefono','email','idRol','created_at'];
    public function obtenerUsuario($data){
        $user=$this->db->table('usuarios as u');
        $user->select('u.username, u.pass, u.nombre, roles.cargo');
        $user->join('roles', 'u.idRol = roles.idRol');
        $user->where($data);
        return $user->get()->getResultArray();
    }

    public function getUsuarios(){
        $consulta=$this->db->query("SELECT * FROM usuarios");
        return $consulta->getResultArray();
    }

}
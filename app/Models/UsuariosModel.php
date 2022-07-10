<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields=['username','pass','dni','nombre','apellidoPaterno','apellidoMaterno','telefono','email','idRol','created_at','updated_at'];
    public function obtenerUsuario($data){
        $user=$this->db->table('usuarios as u');
        $user->select('u.id,u.username, u.pass, u.nombre, roles.cargo');
        $user->join('roles', 'u.idRol = roles.idRol');
        $user->where($data);
        return $user->get()->getResultArray();
    }

    public function obtenerDatos($id){
        $user=$this->db->table('usuarios as u');
        $user->select('u.*, r.cargo');
        $user->join('roles as r', 'u.idRol = r.idRol');
        $user->where('u.id',$id);
        return $user->get()->getRowArray();
    }
    public function getUsuarios(){
        $consulta=$this->db->query("SELECT * FROM usuarios");
        return $consulta->getResultArray();
    }

}
<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model{
    protected $table      = 'usuarios';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $useTimestamps= true;
    protected $useSoftDeletes = true;
    protected $dateFormat= 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $allowedFields=['username','pass','dni','nombre','apellidoPaterno','apellidoMaterno','telefono','email','idRol','activo'];
    //obtener usuarios por nombre de usuario
    public function obtenerUsuario($data){
        $user=$this->db->table('usuarios as u');
        $user->select('u.id,u.username, u.pass, u.nombre,u.activo, roles.cargo');
        $user->join('roles', 'u.idRol = roles.idRol');
        $user->where($data);
        return $user->get()->getResultArray();
    }
    //obtener usuario por el id
    public function obtenerDatos($id){
        $user=$this->db->table('usuarios as u');
        $user->select('u.*, r.cargo');
        $user->join('roles as r', 'u.idRol = r.idRol');
        $user->where('u.id',$id);
        return $user->get()->getRowArray();
    }

    //obtener todos los usuarios o buscar por dni o nombre
    public function getUsuarios($dato=null){
        if(!empty($dato)){
            $user=$this->db->table('usuarios as u');
            $user->select("u.id,u.dni,concat(u.nombre,' ',u.apellidoPaterno,' ',if(u.apellidoMaterno IS NULL,'',u.apellidoMaterno)) as nombreC,u.telefono,u.email,u.username,u.activo");
            $user->where("u.deleted_at IS NULL");
            $user->havingLike('u.dni', $dato);
            $user->orHavingLike('nombreC',$dato);
            return $user->get()->getResultArray();
        }else{
            $user=$this->db->table('usuarios as u');
            $user->select("u.id,u.dni,concat(u.nombre,' ',u.apellidoPaterno,' ',if(u.apellidoMaterno IS NULL,'',u.apellidoMaterno)) as nombreC,u.telefono,u.email,u.username,u.activo");
            $user->where("u.deleted_at IS NULL");
            return $user->get()->getResultArray();
        }
    }

}
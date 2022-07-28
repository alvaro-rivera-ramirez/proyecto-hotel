<?php 
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;
class ReservasModel extends Model{
    protected $table      = 'reserva';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idReserva';
    protected $allowedFields=['idCliente','idUser'];
    protected $useTimestamps= true;
    protected $useSoftDeletes = true;
    protected $dateFormat= 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function agregar_detalle($id_r,$id_hab,$fechaI,$fechaF,$dias,$precio){
        /*$fechaInicio=$fechaI->format('Y-m-d');
        $fechaFin=$fechaF->format('Y-m-d');*/
        $pQuery = $this->db->prepare(static function ($db) {
            $sql = 'INSERT INTO detalle_reserva (idReserva,idHab,fechaIni,fechaFin,dias,precio) VALUES (?,?,?,?,?,?)';
        
            return (new Query($db))->setQuery($sql);
        });

        $pQuery->execute($id_r,$id_hab,$fechaI,$fechaF,$dias,$precio);
    }

    public function mostrarReserva(){
        $query=$this->db->query('SELECT r.idReserva,r.idCliente,r.idUser,DATE_FORMAT(r.created_at, "%Y-%m-%d") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",c.apellidoMaterno) as nombreC,u.nombre as nombreU, SUM(dt.precio) as precioT FROM reserva r,cliente c,usuarios u,detalle_reserva dt WHERE 
        r.idCliente=c.idCliente AND r.idUser=u.id AND r.idReserva=dt.idReserva AND r.deleted_at IS NULL
        GROUP BY r.idReserva  ORDER BY r.idReserva DESC');

        return $query->getResultArray();
    }

    public function mostrarDetalle($id=null){
        $sql='SELECT dt.*,h.numero,t.tipo,t.precio as precioD FROM detalle_reserva dt,habitacion h,tipo_habitacion t WHERE dt.idHab=h.idHab AND h.idTipo=t.idTipo AND idReserva=? ';
        $query=$this->db->query($sql, $id);
        return $query->getResultArray();
    }
}
<?php 
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;
class ReservasModel extends Model{
    protected $table      = 'reserva';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'idReserva';
    protected $allowedFields=['idCliente','idUser','idEstadoR','idEstadoP'];
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
        $query=$this->db->query('SELECT r.idReserva,r.idCliente,r.idUser,DATE_FORMAT(r.created_at, "%Y-%m-%d") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC,u.nombre as nombreU, SUM(dt.precio) as precioT,
        er.*,ep.* FROM reserva r,cliente c,usuarios u,detalle_reserva dt,estado_reserva er,estado_pago ep WHERE 
        r.idCliente=c.idCliente AND r.idUser=u.id AND r.idReserva=dt.idReserva AND r.idEstadoR=er.idEstadoR AND r.idEstadoP=ep.idEstadoP AND r.deleted_at IS NULL
        GROUP BY r.idReserva  ORDER BY r.idReserva DESC');

        return $query->getResultArray();
    }

    //Buscar Reserva por dni y nombre
    public function mostrarBusqueda($dato){
        $pQuery = $this->db->prepare(static function ($db) {
            $sql = "SELECT r.idReserva,r.idCliente,r.idUser,DATE_FORMAT(r.created_at, '%Y-%m-%d') as fecha,c.dni,concat(c.nombre,' ',c.apellidoPaterno,' ',if(c.apellidoMaterno IS NULL,'',c.apellidoMaterno)) as nombreC,u.nombre as nombreU, SUM(dt.precio) as precioT,er.*,ep.* FROM reserva r,cliente c,usuarios u,detalle_reserva dt, estado_reserva er,estado_pago ep WHERE 
            r.idCliente=c.idCliente AND r.idUser=u.id AND r.idReserva=dt.idReserva AND r.idEstadoR=er.idEstadoR AND r.idEstadoP=ep.idEstadoP AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING nombreC like ? OR c.dni like ? ORDER BY r.idReserva DESC";
        
            return (new Query($db))->setQuery($sql);
        });
        $datoB = "%$dato%";
        return $pQuery->execute($datoB,$datoB)->getResultArray();
    }

    //Mostrar reserva por id cliente y fecha
    public function obtenerReservas($dato=null){
        $pQuery = $this->db->prepare(static function ($db) {
            $sql = "SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, '%Y-%m') as fecha,u.nombre as nombreU, SUM(dt.precio) as precioT FROM reserva r,detalle_reserva dt,usuarios u WHERE 
            r.idReserva=dt.idReserva AND r.idUser=u.id AND r.deleted_at IS NULL AND r.idCliente=? AND r.idEstadoR=3 GROUP BY r.idReserva HAVING fecha=? ORDER BY r.idReserva DESC";
        
            return (new Query($db))->setQuery($sql);
        });
        //$datoB = "$dato->fecha";
        return $pQuery->execute($dato->id,$dato->fecha)->getResultArray();
    }
    //Buscar Reserva por id
    public function busquedaReserva($dato){
        $pQuery = $this->db->prepare(static function ($db) {
            $sql = "SELECT r.idReserva,r.idCliente,r.idUser,DATE_FORMAT(r.created_at, '%Y-%m-%d') as fecha,c.dni,concat(c.nombre,' ',c.apellidoPaterno,' ',if(c.apellidoMaterno IS NULL,'',c.apellidoMaterno)) as nombreC,u.nombre as nombreU, SUM(dt.precio) as precioT,er.*,ep.* FROM reserva r,cliente c,usuarios u,detalle_reserva dt, estado_reserva er,estado_pago ep WHERE 
            r.idCliente=c.idCliente AND r.idUser=u.id AND r.idReserva=dt.idReserva AND r.idEstadoR=er.idEstadoR AND r.idEstadoP=ep.idEstadoP AND r.deleted_at IS NULL AND r.idReserva=? GROUP BY r.idReserva ORDER BY r.idReserva DESC";
        
            return (new Query($db))->setQuery($sql);
        });
        return $pQuery->execute($dato)->getRowArray();
    }

    //Buscar detalle de reserva por id
    public function mostrarDetalle($id=null){
        $sql='SELECT dt.*,h.numero,t.idTipo,t.tipo,t.precio as precioD FROM detalle_reserva dt,habitacion h,tipo_habitacion t WHERE dt.idHab=h.idHab AND h.idTipo=t.idTipo AND idReserva=? ';
        $query=$this->db->query($sql, $id);
        return $query->getResultArray();
    }
    
    //Buscar Reserva por idHabitacion y fecha mes
    public function mostrarReservasHab($dato=null){
        $pQuery = $this->db->prepare(static function ($db) {
            $sql = "SELECT r.*,dt.*,h.numero,DATE_FORMAT(r.created_at, '%Y-%m-%d') as fecha FROM reserva r,detalle_reserva dt,habitacion h WHERE r.idReserva=dt.idReserva AND dt.idHab=h.idHab AND r.idEstadoR=3 AND dt.idHab=? AND DATE_FORMAT(r.created_at, '%Y-%m')=? AND r.deleted_at IS NULL";
        
            return (new Query($db))->setQuery($sql);
        });
        return $pQuery->execute($dato->id,$dato->fecha)->getResultArray();
    }
    public function gananciaDia($fecha=null){
        $sql='SELECT ifnull(sum(dt.precio),0) as Total FROM reserva r INNER JOIN detalle_reserva dt ON r.idReserva=dt.idReserva WHERE DATE_FORMAT(r.created_at, "%Y-%m-%d")=? AND r.deleted_at IS NULL AND r.idEstadoR=3';
        
        $query=$this->db->query($sql, $fecha);
        return $query->getRowArray();
    }

    public function cantidadReservasMes($fecha=null){
        $sql='SELECT ifnull(count(*),0) as Total FROM reserva r WHERE DATE_FORMAT(r.created_at, "%Y-%m")=? AND r.deleted_at IS NULL AND r.idEstadoR=3';
        
        $query=$this->db->query($sql, $fecha);
        return $query->getRowArray();
    }
    public function mostrarReporteDia($dato=null){
        if(empty($dato->dato)){
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m-%d") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC, SUM(dt.precio) as precioT FROM reserva r,cliente c, detalle_reserva dt WHERE r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=? ORDER BY r.idReserva DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            return $pQuery->execute($dato->fecha)->getResultArray();
        }else{
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m-%d") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC, SUM(dt.precio) as precioT FROM reserva r,cliente c,detalle_reserva dt WHERE r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=? AND nombreC like ? OR c.dni like ? ORDER BY r.idReserva DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            $datoB = "%$dato->dato%";
            return $pQuery->execute($dato->fecha,$datoB,$datoB)->getResultArray();
        }
    }

    public function mostrarReporteMes($dato=null){
        if(empty($dato->dato)){
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT c.idCliente,c.dni,r.nombreC, r.fecha,SUM(r.costoT) as gastoT,COUNT(c.idCliente) as cantidad FROM cliente c,(SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC,SUM(dt.precio) as costoT FROM reserva r,cliente c,detalle_reserva dt WHERE 
                r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=?) as r WHERE c.idCliente=r.idCliente GROUP BY c.idCliente ORDER BY cantidad DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            return $pQuery->execute($dato->mes)->getResultArray();
        }else{
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT c.idCliente,c.dni,r.nombreC, r.fecha,SUM(r.costoT) as gastoT,COUNT(c.idCliente) as cantidad FROM cliente c,(SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC,SUM(dt.precio) as costoT FROM reserva r,cliente c,detalle_reserva dt WHERE 
                r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=?) as r WHERE c.idCliente=r.idCliente GROUP BY c.idCliente HAVING nombreC like ? OR c.dni like ? ORDER BY cantidad DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            $datoB = "%$dato->dato%";
            return $pQuery->execute($dato->mes,$datoB,$datoB)->getResultArray();
        }
    }


    /* MES */
    public function gananciaMes($fecha=null){
        $sql='SELECT ifnull(sum(dt.precio),0) as Total FROM reserva r INNER JOIN detalle_reserva dt ON r.idReserva=dt.idReserva WHERE DATE_FORMAT(r.created_at, "%Y-%m")=? AND r.deleted_at IS NULL';     
        $query=$this->db->query($sql, $fecha);
        return $query->getRowArray();
    }

    public function gananciaMesHab($fecha=null){
        $sql='SELECT th.idTipo,th.tipo, ifnull(sum(r.Total),0) as ganancia FROM tipo_habitacion th LEFT JOIN (SELECT dt.idHab,h.idTipo, ifnull(sum(dt.precio),0) as Total FROM reserva r,detalle_reserva dt,habitacion h WHERE r.idReserva=dt.idReserva AND h.idHab=dt.idHab AND DATE_FORMAT(r.created_at, "%Y-%m")=? AND r.deleted_at IS NULL AND r.idEstadoR=3 GROUP BY dt.idHab) as r ON th.idTipo=r.idTipo GROUP BY th.tipo ORDER BY ganancia DESC';
        $query=$this->db->query($sql, $fecha);
        return $query->getResultArray();
    }

    public function mostrarReporteMesHabitacion($dato=null){
        if(empty($dato->dato)){
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT dt.idHab,h.numero,h.idTipo,th.tipo, DATE_FORMAT(r.created_at, "%Y-%m") as fecha, ifnull(sum(dt.precio),0) as Total,COUNT(dt.idHab) as cantidad FROM reserva r,detalle_reserva dt,habitacion h,tipo_habitacion th WHERE r.idReserva=dt.idReserva AND h.idHab=dt.idHab AND h.idTipo=th.idTipo AND DATE_FORMAT(r.created_at, "%Y-%m")=? AND r.deleted_at IS NULL AND r.idEstadoR=3 GROUP BY h.idHab ORDER BY cantidad DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            return $pQuery->execute($dato->mes)->getResultArray();
        }else{
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT dt.idHab,h.numero,h.idTipo,th.tipo, DATE_FORMAT(r.created_at, "%Y-%m") as fecha, ifnull(sum(dt.precio),0) as Total,COUNT(dt.idHab) as cantidad FROM reserva r,detalle_reserva dt,habitacion h,tipo_habitacion th WHERE r.idReserva=dt.idReserva AND h.idHab=dt.idHab AND h.idTipo=th.idTipo AND DATE_FORMAT(r.created_at, "%Y-%m")=? AND r.deleted_at IS NULL AND r.idEstadoR=3 AND (h.numero like ? OR th.tipo like ?) GROUP BY h.idHab ORDER BY cantidad DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            $datoB = "%$dato->dato%";
            return $pQuery->execute($dato->mes,$datoB,$datoB)->getResultArray();
        }
    }
    
 public function mostrarReporteMesF($dato=null){
        if(empty($dato->dato)){
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m") as fecha,DATE_FORMAT(r.created_at, "%Y-%m-%d") as fechas ,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC, SUM(dt.precio) as precioT FROM reserva r,cliente c, detalle_reserva dt WHERE r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=? ORDER BY r.idReserva DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            return $pQuery->execute($dato->mes)->getResultArray();
        }else{
            $pQuery = $this->db->prepare(static function ($db) {
                $sql = 'SELECT r.idReserva,r.idCliente,c.dni,r.nombreC, r.fecha,r.precioT,r.fechas FROM cliente c,(SELECT r.idReserva,r.idCliente,DATE_FORMAT(r.created_at, "%Y-%m") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",if(c.apellidoMaterno IS NULL,"",c.apellidoMaterno)) as nombreC, SUM(dt.precio) as precioT, DATE_FORMAT(r.created_at, "%Y-%m-%d") as fechas FROM reserva r,cliente c,detalle_reserva dt WHERE r.idCliente=c.idCliente AND r.idReserva=dt.idReserva AND r.idEstadoR=3 AND r.deleted_at IS NULL GROUP BY r.idReserva HAVING fecha=? ) as r WHERE c.idCliente=r.idCliente GROUP BY r.idReserva HAVING nombreC like ? or c.dni like ? ORDER BY r.idReserva DESC';
            
                return (new Query($db))->setQuery($sql);
            });
            $datoB = "%$dato->dato%";
            return $pQuery->execute($dato->mes,$datoB,$datoB)->getResultArray();
        }
    }

}
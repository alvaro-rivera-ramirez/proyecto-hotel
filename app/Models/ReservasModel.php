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

}
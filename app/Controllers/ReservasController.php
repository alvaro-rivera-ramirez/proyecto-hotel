<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;
use App\Models\HabitacionModel;
use App\Models\TipoHabModel;

class ReservasController extends Controller{
    public function index(){

        /*$pager = service('pager');
        $model = new ReservasModel();

        $data = [
            'reserva' => $model->select('reserva.idReserva,reserva.idCliente,reserva.idUser,DATE_FORMAT(reserva.created_at, "%Y-%m-%d") as fecha,c.dni,concat(c.nombre," ",c.apellidoPaterno," ",c.apellidoMaterno) as nombreC,u.nombre as nombreU')->join('cliente as c', 'c.idCliente = reserva.idCliente')
            ->join('usuarios as u', 'u.id = reserva.idUser')
            ->orderBy('idReserva','DESC')->paginate(10, 'group1'),
            'pager' => $model->pager
        ];*/

        return view('reservas/registro_reservas');
    }

    public function reservar(){
        $habitacion=new HabitacionModel();
        $datos['habitaciones']=$habitacion->getHabitaciones();
        $datos['tipos']=$habitacion->getTipos();
        return view('reservas/reservar_hab',$datos);
    }

    public function guardar(){
        $idCliente= $_POST['idCliente'];
        $cant=$_POST['cant'];
        $tipo = $_POST['tipo'];
        $hab = $_POST['hab'];
        $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        //print_r($fechaI);
        if(!empty($idCliente)){
            //validamos si existe un campo vacio
            if($this->validar_campo($tipo) && $this->validar_campo($hab) && $this->validar_campo($fechaI) && $this->validar_campo($fechaF)) {
                $datoReserva=[
                    'idCliente' => $idCliente,
                    'idUser' => session("id")
                ];   
                $reserva=new ReservasModel();
                $reserva->insert($datoReserva);
                $id_reserva=$reserva->insertID();
                $detalleR=new ReservasModel();
                $habitacion=new HabitacionModel();
                $tipoHab=new TipoHabModel();
                for($i=0;$i<$cant;$i++){
                    $fecha1 = date_create_from_format('Y-m-d', $fechaI[$i]);
                    $fecha2 = date_create_from_format('Y-m-d', $fechaF[$i]);
                    $dias= $fecha2->diff($fecha1)->format('%d');
                    $precio=$tipoHab->obtener_precio($tipo[$i],$dias);
                    $detalleR->agregar_detalle($id_reserva,$hab[$i],$fechaI[$i],$fechaF[$i],$dias,$precio);
                    $habitacion->update($hab[$i],['idEstado' =>3]);
                }
                echo json_encode(['respuesta' => true,'mensaje' =>'Se registro la(s) reserva(s) correctamente']);
            }else{
                echo json_encode(['respuesta' => false,'mensaje' =>'No se pudo realizar la reserva']);
            }
            //echo json_encode(['respuesta' => true,'mensaje' =>'Se registro la reserva correctamente']);

        }else{
            echo json_encode(['respuesta' => false,'mensaje' =>'No se pudo realizar la reserva']);
        }
    }

    public function validar_campo($arreglo){
        foreach($arreglo as $valor){
            if(empty($valor)){
                return false;
            }
        }
        return true;
    }

    public function listar(){
        $dato=file_get_contents("php://input");
        $reserva=new ReservasModel();

        if(!empty($dato)){
            $datosR=$reserva->mostrarBusqueda($dato);
        }else{
            $datosR=$reserva->mostrarReserva();
        }
        echo json_encode($datosR);
    }

    public function listar_detalle(){
        $dataJSON=file_get_contents("php://input");
        
        $data=json_decode($dataJSON);

        $reserva=new ReservasModel();
        $datosR=$reserva->mostrarDetalle($data->id);

        if($data->action=="listar"){
            foreach($datosR as $datos){
                echo "<tr class='text-center'> <td>".$datos['idReserva']."</td> <td>".$datos['tipo']."</td> <td>".$datos['numero']."</td> <td>".$datos['fechaIni']."</td> <td>".$datos['fechaFin']."</td><td>".$datos['dias']."</td> <td>".$datos['precioD']."</td> <td>".$datos['precio']."</td> </tr>"; 
            }
        }else{
            echo json_encode($datosR);
        }
        //$idReserva=$_POST['']
        /*echo $data->action;
        print_r($datosR);*/
    }

    public function getHabTipo(){
        /*$dataJSON=file_get_contents("php://input");

        $data=json_decode($dataJSON);*/
        $habitacion=new HabitacionModel();
        $habitaciones=$habitacion->getHabitaciones();
        $tipos=$habitacion->getTipos();
        return json_encode(['hab' => $habitaciones, 'tipos' => $tipos]);
        /*$datos['habitaciones']=$habitacion->getHabitaciones();
        $datos['tipos']=$habitacion->getTipos();
        print_r($datos); */
    }
}
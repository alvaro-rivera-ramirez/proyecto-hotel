<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReservasModel;
use App\Models\DetalleReservaModel;
use App\Models\HabitacionModel;
use App\Models\UsuariosModel;
use App\Models\TipoHabModel;
use App\Libraries\ReservaPdf;

class ReservasController extends Controller{
    public function index(){

        return view('reservas/registro_reservas');
    }

    public function reservar(){
        $habitacion=new HabitacionModel();
        $datos['habitaciones']=$habitacion->getHabitaciones();
        $datos['tipos']=$habitacion->getTipos();
        return view('reservas/reservar_hab',$datos);
    }

    public function guardar(){
        
        $validation = service('validation');
            $validation->setRules(
                [ //validación
                    'idCliente' => 'required|is_not_unique[cliente.idCliente]',
                    'cant' => 'required',
                    'estadoR' => 'required|is_not_unique[estado_reserva.idEstadoR]',
                    'estadoP' => 'required|is_not_unique[estado_pago.idEstadoP]',
                    'hab.*' => 'required|is_not_unique[habitacion.idHab]',
                    'tipo.*' => 'required|is_not_unique[tipo_habitacion.idTipo]',
                    'fechaI.*' => 'required',
                    'fechaF.*' => 'required',
                ]);
            if(!$validation->withRequest($this->request)->run()){
                    //dd($validation->getErrors());
                return json_encode(['respuesta' => false,'errors' => $validation->getErrors(),'mensaje' =>'No se pudo realizar la reserva, verifique que los campos sean correctos']);
            }
        
        $idCliente= $_POST['idCliente'];
        $cant=$_POST['cant'];
        $tipo = $_POST['tipo'];
        $hab = $_POST['hab'];
        $fechaI = $_POST['fechaI'];
        $fechaF = $_POST['fechaF'];
        $idEstadoR=$_POST['estadoR'];
        $idEstadoP=$_POST['estadoP'];

        $datoReserva=[
            'idCliente' => $idCliente,
            'idUser' => session("id"),
            'idEstadoR' => $idEstadoR,
            'idEstadoP' => $idEstadoP,
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
            $fechaActual = date('Y-m-d', time());
            if($fechaActual<$fechaI[$i]){
                $habitacion->update($hab[$i],['idEstado' =>2]);
            }else{
                $habitacion->update($hab[$i],['idEstado' =>3]);
            }
        }
        echo json_encode(['respuesta' => true,'mensaje' =>'Se registro la(s) reserva(s) correctamente']);
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

    public function listar_reservas(){
        $data=json_decode(file_get_contents("php://input"));
        $reserva=new ReservasModel();
        $datosR=$reserva->obtenerReservas($data);
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
    }

    public function getHabTipo(){
        $habitacion=new HabitacionModel();
        $habitaciones=$habitacion->getHabitaciones();
        $tipos=$habitacion->getTipos();
        return json_encode(['hab' => $habitaciones, 'tipos' => $tipos]);

    }

    public function actualizar(){
        if($_POST){
            $validation = service('validation');
            $validation->setRules(
                [ //validación
                    'idCliente' => [
                        'label'  => 'idCliente',
                        'rules' => 'required|is_not_unique[cliente.idCliente]'
                    ],
                    'idReserva' => [
                        'rules' => 'required|is_not_unique[reserva.idReserva]',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                    'idEstadoR' => [
                        'rules' => 'required|is_not_unique[estado_reserva.idEstadoR]',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                    'idEstadoP' => [
                        'rules' => 'required|is_not_unique[estado_pago.idEstadoP]',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                    'hab.*' => [
                        'rules' => 'required|is_not_unique[habitacion.idHab]'
                    ],
                    'tipo.*' => [
                        'rules' => 'required|is_not_unique[tipo_habitacion.idTipo]',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                    'fechaI.*' => [
                        'rules' => 'required',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                    'fechaF.*' => [
                        'rules' => 'required',
                        'errors' =>[
                            'required' => 'Complete este campo',
                        ],
                    ],
                ]);
            if(!$validation->withRequest($this->request)->run()){
                    //dd($validation->getErrors());
                return json_encode(['resp' => false,'errors' => $validation->getErrors()]);
            }
            $idReserva=$_POST['idReserva'];
            $idEstadoR=$_POST['idEstadoR'];
            $idEstadoP=$_POST['idEstadoP'];
            $idCliente= $_POST['idCliente'];
            $idDetalle= $_POST['idDetalle'];
            $tipo = $_POST['tipo'];
            $hab = $_POST['hab'];
            $fechaI = $_POST['fechaI'];
            $fechaF = $_POST['fechaF'];

            $detalleR=new DetalleReservaModel();
            $tipoHab=new TipoHabModel();
            for($i=0;$i<count($idDetalle);$i++){
                $fecha1 = date_create_from_format('Y-m-d', $fechaI[$i]);
                $fecha2 = date_create_from_format('Y-m-d', $fechaF[$i]);
                $dias= $fecha2->diff($fecha1)->format('%d');
                $precio=$tipoHab->obtener_precio($tipo[$i],$dias);
                $datos=[
                    'idReserva' => $idReserva,
                    'idHab' => $hab[$i],
                    'fechaIni' => $fechaI[$i],
                    'fechaFin' => $fechaF[$i],
                    'dias' => $dias,
                    'precio' => $precio
                ];
                $detalleR->update($idDetalle[$i],$datos);
                //$habitacion->update($hab[$i],['idEstado' =>3]);
            }
            $reserva=new ReservasModel();
            $reserva->update($idReserva, ['idCliente' => $idCliente,'idEstadoR' => $idEstadoR,'idEstadoP' => $idEstadoP]);
            return json_encode(['resp' => true]);
        }else{
            //Estado de reserva
            $dataJSON=file_get_contents("php://input");
        
            $datosR=json_decode($dataJSON);
            $reserva= new ReservasModel();
            $reserva->update($datosR->idReserva, ['idEstadoR' => $datosR->idEstadoR]);

            return json_encode(['resp' => true]);
        }
    }

    public function borrar(){
        $reserva=new ReservasModel();
        $id=file_get_contents("php://input");
        $dato=$reserva->where('idReserva',$id)->first();        
        if($dato['idEstadoR']==3 || $dato['idEstadoR']==2){
            return json_encode(['respuesta' => false]); 
        }
        $reserva->where('idReserva',$id)->delete($id);        
        return json_encode(['respuesta' => true]);
    }

    public function imprimir(){
        
    }
    public function imprimir_boleta($id){
        $reserva=new ReservasModel();
        $boleta=$reserva->busquedaReserva($id);

        $detalle=$reserva->mostrarDetalle($id);
        //echo json_encode($boleta);

        // Creación del objeto de la clase heredada
        $pdf = new ReservaPdf();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        //cuadros iniciales con los datos de la empresa y del cliente
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(95,10,'HOTEL MONTEREAL',0,0,'',0);
        $pdf->SetFillColor(192);
        $pdf->RoundedRect(105,60, 92, 20, 2, '1234', 'D'); // POS x , POS y , ancho , alto , radio del borde , numero de las esquinas , FD para color Default = D
        $pdf->Cell(25,10,utf8_decode('  Señor(a): '),'',0,'',0);
        $pdf->SetFont('Arial','',12);
        // $pdf->Cell(12,10,$row['nombre'],'',0,'',0);
        $pdf->Cell(55,10,$boleta['nombreC'],'',0,'',0);
        $pdf->Ln(10.2);
        $pdf->Cell(95,10,'Telefono: 945758412',0,0,'',0);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(25,10,'  DNI:','',0,'',0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(67,10,$boleta['dni'],'',0,'',0);
        $pdf->Ln(20);
        //encabezado de la tabla
        $pdf->RoundedRect(10,90.25,187,50, 2, '1234', 'D');
        $pdf->SetFillColor(125,205,255);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(15,10,'ID','B',0,'C',0);
        $pdf->Cell(35,10,'Habitacion','B',0,'C',0);
        $pdf->Cell(35,10,'Fecha de Inicio','B',0,'',0);
        $pdf->Cell(40,10,'Fecha de Fin','B',0,'',0);
        $pdf->Cell(40,10,'Precio/N','B',0,'',0);
        $pdf->Cell(22,10,'Precio','B',0,'',0);
        $pdf->Ln(10.2);
        
        foreach($detalle as $detalles){
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(15,10,$detalles['idDetalle'],'',0,'C',1);
            $pdf->Cell(35,10,$detalles['numero'],'',0,'C',1);
            $pdf->Cell(35,10,$detalles['fechaIni'],'',0,'C',1);
            $pdf->Cell(40,10,$detalles['fechaFin'],'',0,'',1);
            $pdf->Cell(40,10,$detalles['precioD'],'',0,'',1);
            $pdf->Cell(22,10,$detalles['precio'],'',0,'',1);
            $pdf->Ln(10.2);
        }
        
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(145,7,'SUB. TOTAL','',0,'R',0);
        $pdf->Cell(20,7,'S/','',0,'C',0);
        $pdf->Cell(22,7,$boleta['precioT']*(82/100),'',0,'',0);
        $pdf->Ln(7);
        $pdf->Cell(145,7,'I.G.V.','',0,'R',0);
        $pdf->Cell(20,7,'S/','',0,'C',0);
        $pdf->Cell(22,7,$boleta['precioT']*(18/100),'',0,'',0);
        $pdf->Ln(7);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(145,7,'TOTAL','',0,'R',0);
        $pdf->Cell(20,7,'S/','',0,'C',0);
        $pdf->Cell(22,7,$boleta['precioT'],'',0,'',0);
        
        $pdf->Ln(20);
        $pdf->RoundedRect(10,145,187,20, 2, '1234', 'D');
        $pdf->Cell(187,15,'OBSERVACIONES:',0,'');
        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();
    }
}
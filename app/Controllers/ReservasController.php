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
                    return json_encode(['respuesta' => false,'errors' => $validation->getErrors()]);
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
    public function imprimir_boleta($id){
        $pdf=new ReservaPdf("Boleta Electrónica");

//         //Contenido
//         //hacemos una instancia de la clase
//         //$pdf->Cell(7,8,$id,'B',0,'C',0);
//         $pdf->SetFont('Arial','B',16);
// // Move to 8 cm to the right
// $pdf->Cell(80);
// // Texto centrado en una celda con cuadro 20*10 mm y salto de línea
// $pdf->Cell(20,10,$id,1,1,'C');
//         $this->response->setHeader('Content-Type','application/pdf');
//         $pdf->Output();
$usuario=new UsuariosModel();
$data=$usuario->getUsuarios();
//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
$pdf->SetX(15);
$pdf->SetFont('Helvetica','B',15);
$pdf->Cell(7,8,'N','B',0,'C',0);
$pdf->Cell(30,8,'DNI','B',0,'C',0);
$pdf->Cell(70,8,utf8_decode('Nombre completo'),'B',0,'C',0);
$pdf->Cell(20,8,utf8_decode('Teléfono'),'B',0,'C',0);

$pdf->Cell(60,8,utf8_decode('Correo'),'B',1,'C',0);

$pdf->SetFillColor(241, 240, 238);//color de fondo rgb
$pdf->SetDrawColor(61, 61, 61);//color de linea  rgb

$pdf->SetFont('Arial','',11);
foreach($data as $usuarios){        
    $pdf->Ln(0.6);
    $pdf->setX(15);
    $pdf->Cell(7,8,$id,'B',0,'C',0);
    $pdf->Cell(30,8,$usuarios['dni'],'B',0,'C',0);
    $pdf->Cell(70,8,utf8_decode($usuarios['nombre']." ".$usuarios['apellidoPaterno']." ".$usuarios  ['apellidoMaterno']),'B',0,'C',0);
    $pdf->Cell(20,8,utf8_decode($usuarios['telefono']),'B',0,'C',0);        
    $pdf->Cell(60,8,utf8_decode($usuarios['email']),'B',1,'C',0);
}
$this->response->setHeader('Content-Type','application/pdf');
$pdf->Output();

    }
}
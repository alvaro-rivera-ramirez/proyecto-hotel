<?php 
namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\HabitacionModel;
use App\Models\TipoHabModel;
use App\Models\UsuariosModel;
use App\Models\EstadoHabitacion;
use App\Libraries\Pdf;

class HabitacionController extends Controller{

    public function index(){
       return view("habitaciones/registro_hab");
    }

    public function listar(){
        $dato=file_get_contents("php://input");
        $hab=new HabitacionModel();
        $lista=$hab->getHab($dato);
        echo json_encode($lista);
    }
    public function crear(){
        $tipoHab=new TipoHabModel();
        $datos['tipo']=$tipoHab->getTipo();
        return view('habitaciones/new_hab',$datos);
    }

    public function editar($id=null){

        $tipoHab=new TipoHabModel();
        $hab=new HabitacionModel();
        $estado=new EstadoHabitacion();
        $datos['tipo']=$tipoHab->getTipo();
        $datos['hab']=$hab->where('idHab',$id)->first();
        $datos['estado']=$estado->findAll();
        return view('habitaciones/update_hab',$datos);
    }

    public function guardar(){

        $validation = service('validation');
        $validation->setRules([ 
            'num_hab' => 'required|is_unique[habitacion.numero]|numeric|min_length[3]|max_length[4]',
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return json_encode(['respuesta' => false,'errors' => $validation->getErrors()]);
        }

        $data=[
            'numero' => $this->request->getPost('num_hab'),
            'idTipo' => $this->request->getPost('tipo_hab'),
            'idEstado' => 1
        ];

        $habitacion=new HabitacionModel();

        $habitacion->insert($data);

        echo json_encode(['respuesta' => true,'mensaje' =>'Se ha actualizado la habitación correctamente']);

    }


    public function actualizar(){
        $hab_id=$this->request->getPost('id_hab');
        $admin_id=session('id');

        $usuario=new UsuariosModel();

        $admin=$usuario->obtenerDatos($admin_id);

        $validation = service('validation');
        $validation->setRules([ 
            'num_hab' => 'required|is_unique[habitacion.numero,habitacion.idHab,'.$hab_id.']|numeric|min_length[3]|max_length[4]',
            'tipo_hab' => 'required|is_not_unique[tipo_habitacion.idTipo]',
            'estado_hab' => 'required|is_not_unique[estado_hab.idEstado]',
            'admin_usuario' => 'required|alpha_numeric',
            'admin_clave' => 'required|min_length[5]|max_length[8]' 
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return json_encode(['respuesta' => false,'errors' => $validation->getErrors()]);
        }

        $admin_usuario=$this->request->getPost('admin_usuario');
        $admin_pass=$this->request->getPost('admin_clave');
        if($admin['username']!=$admin_usuario || !PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            return json_encode(['respuesta' => false, 'errors' => ['datosAdmin' =>'Usuario y/o Password Incorrectos']]); 
        }

        $data=[
            'numero' => $this->request->getPost('num_hab'),
            'idTipo' => $this->request->getPost('tipo_hab'),
            'idEstado' => $this->request->getPost('estado_hab')
        ];

        $habitacion=new HabitacionModel();

        $habitacion->update($hab_id,$data);

        echo json_encode(['respuesta' => true,'mensaje' =>'Se ha actualizado la habitación correctamente']);


    }
    public function borrar($id=null){
        $hab=new HabitacionModel();
        $hab->where('idHab',$id)->delete($id);
        echo json_encode(['respuesta' => true]);
    }



    public function imprimir(){
    
        $model = new HabitacionModel();
        $data=$model->getHab();
        //var_dump($model->getAll());

        // Creación del objeto de la clase heredada
        $pdf = new PDF("Reporte de Habitaciones");
        $pdf->AliasNbPages();
        $pdf->AddPage();//añade l apagina / en blanco
        $pdf->SetMargins(10,10,10);
        $pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
        $pdf->SetX(15);
        $pdf->SetFont('Helvetica','B',15);
        $pdf->Cell(7,8,'N','B',0,'C',0);
        $pdf->Cell(33,8,utf8_decode('Número'),'B',0,'C',0);
        $pdf->Cell(20,8,'Tipo','B',0,'C',0);
        $pdf->Cell(20,8,'Precio','B',0,'C',0);
        $pdf->Cell(50,8,utf8_decode('Características'),'B',0,'C',0);
        $pdf->Cell(50,8,'Estado','B',1,'C',0);

        $pdf->SetFillColor(241, 240, 238);//color de fondo rgb
        $pdf->SetDrawColor(61, 61, 61);//color de linea  rgb

        $pdf->SetFont('Arial','',12);

        foreach($data as $habitaciones){
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,$habitaciones['idHab'],'B',0,'C',0);
            $pdf->Cell(33,8,$habitaciones['numero'],'B',0,'C',0);
            $pdf->Cell(20,8,$habitaciones['tipo'],'B',0,'C',0);
            $pdf->Cell(20,8,$habitaciones['precio'],'B',0,'C',0);
            $pdf->Cell(50,8,utf8_decode('TV con Cable'),'B',0,'C',0);
            $pdf->Cell(50,8,$habitaciones['estado'],'B',1,'C',0);
        }
        $this->response->setHeader('Content-Type','application/pdf');
    // cell(ancho, largo, contenido,borde?, salto de linea?)

        $pdf->Output();
     }

}
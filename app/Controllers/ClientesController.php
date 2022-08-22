<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\UsuariosModel;
use App\Libraries\Pdf;

class ClientesController extends Controller{
    public function index(){
        $cliente=new ClientesModel();
        $data['cliente']=$cliente->getClientes();

        return view("clientes/registro-cliente",$data);
    }

    public function listar(){
        $dato=file_get_contents("php://input");
        $cliente=new ClientesModel();
        $lista=$cliente->getClientes($dato);
        echo json_encode($lista);
    }
    public function crear_cli(){
        return view('clientes/registrar_cliente');
    }
    
    public function registrar(){
        $validation = service('validation');
        $validation->setRules([
            'cli_dni_reg' => 'required|numeric|min_length[8]|max_length[8]',
            'cli_nombre_reg' => 'required|alpha_space',
            'cli_apellidop_reg' => 'required|alpha_space',
            'cli_apellidom_reg' => 'permit_empty|alpha_numeric',
            'cli_telefono_reg' =>  'required|alpha_numeric',
            'cli_email_reg' => 'permit_empty|max_length[50]|valid_email',
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return json_encode(['respuesta' => false,'errors' => $validation->getErrors()]);
        }

        $dni=$this->request->getPost('cli_dni_reg');
        $nombre=$this->request->getPost('cli_nombre_reg');
        $apellidoPaterno=$this->request->getPost('cli_apellidop_reg');
        $apellidoMaterno=$this->request->getPost('cli_apellidom_reg');
        $telefono=$this->request->getPost('cli_telefono_reg');
        $email=$this->request->getPost('cli_email_reg');
        $data=[
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'telefono' => $telefono,
            'email' => $email,
        ];
        $cliente=new ClientesModel();
        $cliente->insert($data);
        return json_encode(['respuesta' => true,'mensaje' =>'Cliente registrado exitosamente']);
    }

    public function buscardni(){
        
        if($_POST){
            $validation = service('validation');
            $validation->setRules(
                [ //validación
                    'cli_dni' => [
                        'label' => 'cliente_dni',
                        'rules' => 'required|numeric|min_length[8]|max_length[8]',
                        'errors' => [
                            'required' => 'Complete este campo',
                            'numeric' => 'Complete este campo con números',
                            'min_length' => 'Debe tener {param} digitos',
                            'max_length' => 'Debe tener {param} digitos'
                        ],
                    ]

                ]);
            if(!$validation->withRequest($this->request)->run()){
                    //dd($validation->getErrors());
                return json_encode(['resp' => false,'errors' => $validation->getErrors()]);
            }
            $dni=$this->request->getPost('cli_dni');

        }else{
            $dni=file_get_contents("php://input");
        }

        $cliente=new ClientesModel();
        $data=$cliente->where('dni',$dni)->first();
        return json_encode(['resp' => true,'cliente' => $data]);
    }

    public function editar($idCliente=null){
        $cliente=new ClientesModel();
        $datos['cliente']=$cliente->obtenerDatos($idCliente);
        return view('clientes/update_cliente',$datos);
    }
    
        public function actualizarCli(){
        //id del cliente a editar
        $cliente_id=$this->request->getPost('cliente_id');
        $admin_id=session('id');
    
        $usuario=new UsuariosModel();
        $admin=$usuario->obtenerDatos($admin_id);
        
        //Validamos las entradas del formulario
        $validation = service('validation');
        $validation->setRules([
            'cliente_dni' => 'required|is_unique[cliente.dni,cliente.idCliente,'.$cliente_id.']|numeric|min_length[8]|max_length[8]',
            'cliente_nombre' => 'required|alpha_space',
            'cliente_apellidop' => 'permit_empty|alpha_space',
            'cliente_apellidom' => 'permit_empty|alpha_space',
            'cliente_telefono' =>  'required|alpha_numeric',
            'cliente_email' => 'permit_empty|max_length[50]|valid_email',
            'admin_usuario' => 'required|alpha_numeric',
            'admin_clave' => 'required|min_length[5]|max_length[8]'
        ],[
            'cliente_dni' =>[
                'is_unique' =>'El dni ya esta registrado'
            ]
        ]);
    
        if(!$validation->withRequest($this->request)->run()){
            return json_encode(['respuesta' => false,'errors' => $validation->getErrors()]);
        }
    
        $admin_usuario=$this->request->getPost('admin_usuario');
        $admin_pass=$this->request->getPost('admin_clave');
        if($admin['username']!=$admin_usuario || !PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            return json_encode(['respuesta' => false, 'errors' => ['datosAdmin' =>'Usuario y/o Password Incorrectos']]);
        }
    
        $dni=$this->request->getPost('cliente_dni');
        $nombre=$this->request->getPost('cliente_nombre');
        $apellidoPaterno=$this->request->getPost('cliente_apellidop');
        $apellidoMaterno=$this->request->getPost('cliente_apellidom');
        $telefono=$this->request->getPost('cliente_telefono');
        $email=$this->request->getPost('cliente_email');
           $data=[
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidoPaterno,
            'apellidoMaterno' => $apellidoMaterno,
            'telefono' => $telefono,
            'email' => $email
        ];
        $cliente=new ClientesModel();
        $cliente->update($cliente_id,$data);
    
        echo json_encode(['respuesta' => true]);
        //return redirect()->route('lista-clientes');
        }
    
        public function borrar($idCliente=null){
            $cliente=new ClientesModel();
            $cliente->where('idCliente',$idCliente)->delete($idCliente);        
            echo json_encode(['respuesta' => true]);
        }
    

    public function imprimir(){
        $cliente=new ClientesModel();
        $data=$cliente->getClientes();
    
        // Creación del objeto de la clase heredada
        $pdf = new PDF("Lista de Clientes");
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
        foreach($data as $clientes){   
        
            $pdf->Ln(0.6);
            $pdf->setX(15);
            $pdf->Cell(7,8,$clientes['idCliente'],'B',0,'C',0);
            $pdf->Cell(30,8,$clientes['dni'],'B',0,'C',0);
            $pdf->Cell(70,8,utf8_decode($clientes['nombreC']),'B',0,'C',0);
            $pdf->Cell(20,8,utf8_decode($clientes['telefono']),'B',0,'C',0);        
            $pdf->Cell(60,8,utf8_decode($clientes['email']),'B',1,'C',0);

        }

        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();
            
    }

}


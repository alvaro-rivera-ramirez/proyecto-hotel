<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;
use App\Libraries\Pdf;

class UsuariosController extends Controller{
    public function index(){
        return view('usuarios/registro_usuarios');
    }

    public function listar(){
        $dato=file_get_contents("php://input");
        $usuario=new UsuariosModel();
        $lista=$usuario->getUsuarios($dato);
        echo json_encode($lista);
    }
    public function crear(){
        return view('usuarios/new_usuarios');
    }
    
    public function editar($id=null){
        $usuario=new UsuariosModel();
        $datos['usuario']=$usuario->obtenerDatos($id);
        return view('usuarios/update_usuarios',$datos);
    }

    public function guardar(){
        $validation = service('validation');
        $validation->setRules([
            'user_dni' => 'required|numeric|max_length[8]',
            'user_nombre' => 'required|alpha_space',
            'user_apellido' => 'required|alpha_space',
            'user_telefono' => 'required|alpha_numeric',
            'user_usuario' =>  'required|alpha_numeric|is_unique[usuarios.username]',
            'user_email' => 'required|valid_email|is_unique[usuarios.email]',
            'user_clave_1' => 'required|matches[user_clave_2]|min_length[5]|max_length[8]',
            'user_clave_2' => 'required|matches[user_clave_1]|min_length[5]|max_length[8]',
            'user_privilegio' => 'required|is_not_unique[roles.idRol]'
        ],
        [
            'user_usuario' =>[
                'is_unique' => 'El nombre de usuario ya existe'
            ],
            'user_clave_1' => [
                'matches' => 'Las contraseñas no coinciden'
            ],
            'user_clave_2' => [
                'matches' => 'Las contraseñas no coinciden'
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return json_encode(['respuesta' => false, 'errors' => $validation->getErrors()]);
        }

        $password=PASSWORD_HASH($this->request->getPost('user_clave_1'),PASSWORD_DEFAULT);
        $username=$this->request->getPost('user_usuario');
        $dni=$this->request->getPost('user_dni');
        $nombre=$this->request->getPost('user_nombre');
        $apellidos=explode(" ",$this->request->getPost('user_apellido'));
        if(!(count($apellidos)>1)){
            $apellidos[1]="";
        }
        $telefono=$this->request->getPost('user_telefono');
        $email=$this->request->getPost('user_email');
        $idRol=$this->request->getPost('user_privilegio');
        $data=[
            'username' => $username,
            'pass' => $password,
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidos[0],
            'apellidoMaterno' => $apellidos[1],
            'telefono' => $telefono,
            'email' => $email,
            'idRol' => $idRol,
            'activo' => 1
        ];
        $usuario=new UsuariosModel();
        $usuario->insert($data);

        return json_encode(['respuesta' => true]);
    }

    public function actualizar(){
        //id del usuario a editar
        $user_id=$this->request->getPost('user_id');

        $admin_id=session('id');

        $usuario=new UsuariosModel();

        $admin=$usuario->obtenerDatos($admin_id);
        //Validamos las entradas del formulario
        $validation = service('validation');
        $validation->setRules([
            'user_dni' => 'required|numeric|is_unique[usuarios.dni,usuarios.id,'.$user_id.']|max_length[8]',
            'user_nombre' => 'required|alpha_space',
            'user_apellido' => 'required|alpha_space',
            'user_telefono' => 'required|numeric|min_length[9]|max_length[12]',
            'user_usuario' =>  'required|alpha_numeric|is_unique[usuarios.username,usuarios.id,'.$user_id.']',
            'user_email' => 'required|valid_email|is_unique[usuarios.email,usuarios.id,'.$user_id.']',
            'user_clave_1' => 'permit_empty|matches[user_clave_2]|min_length[5]|max_length[8]',
            'user_clave_2' => 'permit_empty|matches[user_clave_1]|min_length[5]|max_length[8]',
            'user_activo' => 'required|is_not_unique[usuarios.activo]',
            'user_privilegio' => 'required|is_not_unique[roles.idRol]',
            'admin_usuario' =>  'required|alpha_numeric',
            'admin_clave' => 'required|min_length[5]|max_length[8]'
        ],
        [
            'user_usuario' =>[
                'is_unique' => 'El nombre de usuario ya existe'
            ],
            'user_clave_1' => [
                'matches' => 'Las contraseñas no coinciden'
            ],
            'user_clave_2' => [
                'matches' => 'Las contraseñas no coinciden'
            ]
        ]
        );

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return json_encode(['respuesta' => false, 'errors' => $validation->getErrors()]);
        }

        $admin_usuario=$this->request->getPost('admin_usuario');
        $admin_pass=$this->request->getPost('admin_clave');
        if($admin['username']!=$admin_usuario || !PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            return json_encode(['respuesta' => false, 'errors' => ['datosAdmin' =>'Usuario y/o Password Incorrectos']]); 
        }

        $username=$this->request->getPost('user_usuario');
        $dni=$this->request->getPost('user_dni');
        $nombre=$this->request->getPost('user_nombre');
        $apellidos=explode(" ",$this->request->getPost('user_apellido'));
        if(!(count($apellidos)>1)){
            $apellidos[1]="";
        }
        $telefono=$this->request->getPost('user_telefono');
        $email=$this->request->getPost('user_email');
        $idRol=$this->request->getPost('user_privilegio');
        $activo=$this->request->getPost('user_activo');
        $data=[
            'username' => $username,
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidos[0],
            'apellidoMaterno' => $apellidos[1],
            'telefono' => $telefono,
            'email' => $email,
            'idRol' => $idRol,
            'activo' => $activo
        ];

        if($this->request->getPost('user_clave_1')){
            $password=PASSWORD_HASH($this->request->getPost('user_clave_1'),PASSWORD_DEFAULT);
           $data+=['pass' => $password];
        }
        $usuario_up=new UsuariosModel();
        $usuario_up->update($user_id,$data);

        // return redirect()->route('lista_usuarios')->with('msg','1');
        return json_encode(['respuesta' => true]);
    }

    public function borrar($id=null){
        $usuario=new UsuariosModel();
        $usuario->update($id,['activo' => 0]);        
        $usuario->where('id',$id)->delete($id);        
        echo json_encode(['respuesta' => true]);
    }

    public function configurarPerfil(){
        $usuario=new UsuariosModel();
        $usser_id=session('id');

        $datos['usuario']=$usuario->obtenerDatos($usser_id);
        return view('configuracion/perfil',$datos);
    }

    public function editarPerfil(){
        //id del usuario a editar
        $user_id=$this->request->getPost('user_id');

        $admin_id=session('id');
        $usuario=new UsuariosModel();
        $admin=$usuario->obtenerDatos($admin_id);

        //Validamos las entradas del formulario
        $validation = service('validation');
        $validation->setRules([
            'per_nombre' => 'required|alpha_space',
            'per_apellido' => 'required|alpha_space',
            'per_telefono' => 'required|alpha_numeric|min_length[9]|max_length[11]',
            'per_username' =>  'required|alpha_numeric|is_unique[usuarios.username,usuarios.id,'.$user_id.']',
            'per_email' => 'required|valid_email|is_unique[usuarios.email,usuarios.id,'.$user_id.']'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return json_encode(['resp' => false,'errors' => $validation->getErrors()]);
        }

        $username=$this->request->getPost('per_username');
        $nombre=$this->request->getPost('per_nombre');
        $apellidos=explode(" ",$this->request->getPost('per_apellido'));
        if(!(count($apellidos)>1)){
            $apellidos[1]="";
        }
        $telefono=$this->request->getPost('per_telefono');
        $email=$this->request->getPost('per_email');
        $data=[
            'username' => $username,
            'nombre' => $nombre,
            'apellidoPaterno' => $apellidos[0],
            'apellidoMaterno' => $apellidos[1],
            'telefono' => $telefono,
            'email' => $email
        ];

        //Actualizamos la variable de sesion nombre
        $_SESSION['nombre']= $nombre;
        $usuario_up=new UsuariosModel();
        $usuario_up->update($user_id,$data);

        return json_encode(['respuesta' => true]);
    }

    public function configurarPassword(){
        return view('configuracion/cambiarPassword');
    }
    public function editarPassword(){
        
        //Validamos las entradas del formulario
        $validation = service('validation');
        $validation->setRules([
            'user_clave_1' => 'trim|permit_empty|matches[user_clave_2]|min_length[5]|max_length[8]',
            'admin_clave' => 'trim|required|min_length[5]|max_length[8]'
        ]);

        if(!$validation->withRequest($this->request)->run()){
            //dd($validation->getErrors());
            return json_encode(['resp' => false,'errors' => $validation->getErrors()]);
        }
        
        $admin_id=session('id');
        $usuario=new UsuariosModel();
        $admin=$usuario->obtenerDatos($admin_id);
        $admin_pass=$this->request->getPost('admin_clave');

        $password=PASSWORD_HASH($this->request->getPost('user_clave_1'),PASSWORD_DEFAULT);
        $data=['pass' => $password];

        if(!PASSWORD_VERIFY($admin_pass,$admin['pass'])){
            echo json_encode(['respuesta' => false]);
        }else{
            $usuario_up=new UsuariosModel();
            $usuario_up->update($admin_id,$data);
            echo json_encode(['respuesta' => true]);
        }
        
    }

    public function recuperarPassword(){
        return view('configuracion/recuperarPassword');
    }


    public function imprimir(){
        $usuario=new UsuariosModel();
        $data=$usuario->getUsuarios();
        $pdf = new Pdf("Lista de Usuarios");
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
            $pdf->Cell(7,8,$usuarios['id'],'B',0,'C',0);
            $pdf->Cell(30,8,$usuarios['dni'],'B',0,'C',0);
            $pdf->Cell(70,8,utf8_decode($usuarios['nombreC']),'B',0,'C',0);
            $pdf->Cell(20,8,utf8_decode($usuarios['telefono']),'B',0,'C',0);        
            $pdf->Cell(60,8,utf8_decode($usuarios['email']),'B',1,'C',0);
        }
        $this->response->setHeader('Content-Type','application/pdf');
        $pdf->Output();
    }



    

}
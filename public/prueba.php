<?php

    $conex = mysqli_connect("localhost","root","","hotel"); 
    
    $usuario = $_POST['usuario'];
    $contra = $_POST['password'];
    $consulta = "SELECT * FROM usuarios WHERE username='$usuario' and pass='$contra'";

    
    $resultado = mysqli_query($conex,$consulta);

    $filas=mysqli_num_rows($resultado);
    

    if($filas > 0){

        // session_start();
        $_SESSION['usuario'] = $usuario;
        
        echo json_encode('correcto');
    }
    else{
         echo json_encode('incorrecto');
    }

    // if($usuario === '' || $pass===''){
    //     echo json_encode('llena todo');
    // }else{
    //     echo json_encode('Correcto');
    // }

    mysqli_free_result($resultado);
    mysqli_close($conex);
?>
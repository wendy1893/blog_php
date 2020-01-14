<?php
session_start();

if(isset($_POST)){
    
    // Recoger los valores del formulario de registro
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
    //Array de errores
    $errores = array();
    
    //Validar los datos antes de guardalos en la base de datos
    //Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    //Validar apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
       $errores['apellidos'] = "Los apellidos no son válido";
    }
        
    //Validar el email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es válido";
    }
    
    
    //Validar la contraseña
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacía";
    }
    
    $guardar_usuario = false;
    
    if(count($errores) == 0){
        $guardar_usuario = true;
        //INSERTAR USUARIO EN LA TABLA DE USUARIOS DE LA BBDD
    }else{
        $_SESSION['errores'] = $errores;
        header('Location: index.php');
    }
    
    
}
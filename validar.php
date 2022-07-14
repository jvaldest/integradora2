<?php
error_reporting(E_ALL); //// Notificar todos los errores de PHP (ver el registro de cambios)
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set("error_log", "php-error.log"); //Donde se van a guardar los errores
$rut = $_POST['username'];
$password = $_POST['password'];
session_start();
/*
session_start() crea una sesión o reanuda la actual basada en un 
identificador de sesión pasado mediante una petición GET o POST, 
o pasado mediante una cookie.
*/
$_SESSION['username']=$rut;
include_once('model/conexion.php');

$sentencia = $bd->prepare('SELECT * FROM usuarios WHERE rut= ?;');
$sentencia->execute([$rut]);
$resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

$rol;


if(is_array($resultado)){
    
    if (!password_verify($password, $resultado['password'])){
       
    
            if($resultado['id_roles'] == 1){
           
             $rol = 1;
             error_log($rol);
            }else{
             $rol = 2;
             error_log($rol);
            }
             
            error_log("estoy aqui".$rol);
            if($rol == 1){
             $_SESSION['id_admin'] = $resultado['id_roles'];
                $_SESSION['nombre_admin'] = $resultado['nombre'];
              
                header('Location: /jota/view/admin/template/header.php');
            }else{
             $_SESSION['id_cliente'] = $resultado['id_roles'];
             $_SESSION['nombre_cliente'] = $resultado['nombre'];
                header('Location: /jota/view/admin/cliente/inicio.php');
            }
             
    }else{
     
         header('Location: login.php?mensaje=error');
        exit(); //Sale del IF 
    }
    }else{
        header('Location: login.php?mensaje=error');
        exit(); //Sale del IF 
    
    
   
}
   


?>
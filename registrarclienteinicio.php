<?php
 if(empty($_POST["nombre"]) || empty($_POST["rut"]) || empty($_POST["password"])){
    header('Location: index.php?mensaje=falta');
    exit(); //Sale del IF
 }

 include_once('model/conexion.php');
 $nombre = $_POST['nombre'];
 $rut = $_POST['rut'];
 $password_simple = $_POST['password'];
 $password = password_hash($password_simple,PASSWORD_DEFAULT);
 $plan = $_POST['plan'];

 if($plan == 1){
   $visitas = 10;
 }elseif($plan == 2){
   $visitas = 20;
 }elseif($plan == 3){
   $visitas = 50;
 }

 $sentencia_email = $bd->prepare("select id_usuario from usuarios WHERE rut = ? limit 1");
$sentencia_email->execute([$rut]);
$usuario = $sentencia_email->rowCount();
if($usuario != null ){
  header('Location: index.php?mensaje=error');
  exit(); //Sale del IF 
}else{

 $sentencia = $bd->prepare('INSERT INTO usuarios(nombre,password,vistas,id_roles,id_planes,rut) values (?,?,?,?,?,?)');
 $resultado = $sentencia->execute([$nombre,$password,$visitas,2,$plan,$rut]);

 if($resultado == true){
    header('Location: index.php?mensaje=registrado');
 }else{
    header('Location: index.php?mensaje=error');
    exit(); //Sale del IF 
 }
 }
?>
<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
session_start();
$_SESSION['db']='usuarios';
require_once('db.php');
$consulta="SELECT * FROM `usuarios` WHERE user='$user' and pass='$pass'";
$resultado=mysqli_query($conn,$consulta);
$fila=mysqli_num_rows($resultado);
if (!$fila) {
    ?>
    <?php
    include("index.html");
    ?>

    <h1 class="bad">ERROR DE INGRESO</h1>
   
    <?php
}else{
    header("location:home_cliente.php");
}

mysqli_close($conn);
?>

	

	
	








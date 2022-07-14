
<?php 
/*En mi caso la contraseña de mi base de datos es root
ustedes deben colocar la de ustedes, es muy comun que en
XAMP sea en blanco
*/
$contrasena = "Jota1988*";
$usuario = "root";
$nombre_bd = "db";

try {
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>
<?php
//Inicio la sesión
session_start();
$autenti = isset($_SESSION["autentificado"]) ? $_SESSION["autentificado"]:NULL;
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($autenti != 10) {
	//si no existe, envio a la página de autentificacion
	session_destroy();
	header("Location: ../index.php");
	exit();
}
	
?>
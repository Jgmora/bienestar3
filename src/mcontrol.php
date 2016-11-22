<?php
include ("../controlador/conexion.php");
session_start();
$usrForm = $_POST["username"];
$pswForm = $_POST["password"];
insper($usrForm, $pswForm);
	
function insper($usrForm, $pswForm){	
	$c = "SELECT * FROM aprendiz WHERE ndocapre='".$usrForm."' AND pass ='".$pswForm."'";
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data=$conexionBD->ejeCon($c,0);
	
	$countR = count($data);
	if ($countR == 1){
		$_SESSION["user"] = $data[0]['nomapre']." ".$data[0]['apeapre'];
		$_SESSION["idUser"] = $data[0]['ndocapre'];
		$_SESSION["documento"] = isset($data[0]['ndocapre']) ? $data[0]['ndocapre']:NULL;
		$_SESSION["perfil"] = isset($data[0]['idper']) ? $data[0]['idper']:NULL;
		$_SESSION["autentificado"]= 10;
		echo "<script type='text/javascript'>window.location='../home.php';</script>";
	}else{
		echo "<script type='text/javascript'>window.location='../index.php?errorusuario=si';</script>";
	}
}
?>
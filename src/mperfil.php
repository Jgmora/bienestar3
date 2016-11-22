<link rel="stylesheet" href="css/style.css" type="text/css" />
<?php
include ("controlador/conexion.php");
class mperfil{
	var $arr;
	function mperfil(){}
	
	function insper($nomper){
		$sql = "INSERT INTO perfil (nomper) VALUES ('".$nomper."');";
		$this->cons($sql);
	}
	function delper($idper){
		$sql = "DELETE FROM perfil WHERE idper='".$idper."';";
		$this->cons($sql);
	}
	function updper($idper, $nomper){
		$sql = "UPDATE perfil SET nomper='".$nomper."' WHERE idper='".$idper."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selper(){
		$sql = "SELECT idper, nomper FROM perfil;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selper1($idper){
		$sql = "SELECT idper, nomper FROM perfil WHERE idper='".$idper."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>
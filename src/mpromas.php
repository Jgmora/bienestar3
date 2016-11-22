<?php
include ("controlador/conexion.php");
class mpromas{
	var $arr;
	
	function mpromas(){}
	function inspro($codpro, $nompro, $verpro){
		$sql = "insert into programa (codpro, nompro, verpro) values ('".$codpro."','".$nompro."','".$verpro."');";
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selpro($codpro){
		$sql = "SELECT count(codpro) as cp FROM programa WHERE codpro='".$codpro."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>
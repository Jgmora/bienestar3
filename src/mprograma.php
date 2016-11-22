<?php
include ("/controlador/conexion.php");
class mprograma{
	var $arr;
	function mprograma(){}
	function inspro( $codpro , $nompro , $verpro ){
		
		$sql = "INSERT INTO programa ( codpro , nompro, verpro ) values ('".$codpro."', '".$nompro."', '".$verpro."');";
		$this->cons($sql);
		
	}
	
	function delpro($codpro){
		$sql = "DELETE FROM programa WHERE codpro='".$codpro."';";
		$this->cons($sql);
	}
	
	function updpro($codpro , $nompro , $verpro){
		$sql = "UPDATE programa SET codpro='".$codpro."', nompro='".$nompro."', verpro='".$verpro."' WHERE codpro='".$codpro."';";
		$this->cons($sql);
		
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selpro(){
		$sql = "SELECT codpro, nompro, verpro FROM programa";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	
	function selpro1($codpro){
		$sql = "SELECT codpro, nompro, verpro FROM programa WHERE codpro='".$codpro."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selpro2($filtro,$rvalini,$rvalfin){
	$sql = "SELECT codpro, nompro, verpro FROM programa";
	if($filtro)
			$sql.= " WHERE codpro LIKE '%".$filtro."%'";
	$sql.= " ORDER BY codpro LIMIT ".$rvalini.", ".$rvalfin;
	$conexionBD = new conexion();
	$conexionBD->conectarBD();
	$data = $conexionBD->ejeCon($sql,0);
	return $data;
	}

}
?>
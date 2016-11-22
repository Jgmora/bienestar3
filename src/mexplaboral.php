<?php
include ("controlador/conexion.php");
class mexplaboral{
	var $arr;
	function mexplaboral(){}
	
	function insexp($ndocapre,$nomempre,$cargo,$direccion,$telefono,$ingreso,$retiro,$motivo){
		$sql = "INSERT INTO explaboral(ndocapre,nomempre,cargo,direccion,telefono, ingreso, retiro, motivo) VALUES ('".$ndocapre."','".$nomempre."', '".$cargo."','".$direccion."','".$telefono."','".$ingreso."','".$retiro."','".$motivo."');";
		$this->cons($sql);
	}

	function delexp($codexplaboral){
		$sql = "DELETE FROM explaboral WHERE codexplaboral='".$codexplaboral."';";
		$this->cons($sql);
	}

	function updexp($codexplaboral, $ndocapre, $nomempre, $cargo, $direccion, $telefono, $ingreso, $retiro, $motivo){
		$sql = "UPDATE explaboral SET  ndocapre='".$ndocapre."', nomempre='".$nomempre."', cargo='".$cargo."', direccion='".$direccion."', telefono='".$telefono."', ingreso='".$ingreso."', retiro='".$retiro."', motivo='".$motivo."'  WHERE codexplaboral='".$codexplaboral."';";
		$this->cons($sql);
	}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selexp(){
		$sql = "SELECT explaboral.codexplaboral, explaboral.nomempre, explaboral.cargo, explaboral.direccion, explaboral.telefono,  explaboral.ingreso, explaboral.retiro, explaboral.motivo, aprendiz.nomapre as aprendiz FROM explaboral, aprendiz WHERE explaboral.ndocapre = aprendiz.ndocapre;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selexp1($codexplaboral){
		$sql = "SELECT codexplaboral, ndocapre, nomempre, cargo, direccion, telefono, ingreso, retiro, motivo FROM explaboral WHERE codexplaboral='".$codexplaboral."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selapren(){
		$sql = "SELECT ndocapre, nomapre FROM aprendiz;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>
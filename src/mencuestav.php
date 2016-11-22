<?php
include ("controlador/conexion.php");
class mencuestav{
	var $arr;
	function mencuestav(){}
	function insenc( $fecinienc, $fecfinenc){
        $sql = "INSERT INTO encuesta ( fecinienc, fecfinenc) values ('".$fecinienc."', '".$fecfinenc."');";
        $this->cons($sql);
    }

    function delenc($noenc){
    	$sql = "DELETE FROM encuesta where noenc='".$noenc."';";
    	$this->cons($sql);
    }

    function updenc($noenc, $fecinienc, $fecfinenc){
        $sql = "UPDATE encuesta SET  fecinienc='".$fecinienc."', fecfinenc='".$fecfinenc."' WHERE noenc='".$noenc."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selenc(){
		$sql= "SELECT nombre,noenc, fecinienc, fecfinenc,nombre FROM encuesta";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selenc1($noenc){
        $sql = "SELECT  noenc, fecinienc, fecfinenc FROM encuesta WHERE noenc = '".$noenc."';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
		function selpre(){
		$sql = "SELECT codpre,despre,tppre,canrespre,noenc FROM pregunta;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selpre3(){
		$sql = "SELECT codres,res,codpre FROM respuesta;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>
<?php
include ("/controlador/conexion.php");
class mregistrov{
	var $arr;
	function mencuesta(){}
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
		$sql= "SELECT noenc, fecinienc, fecfinenc FROM encuesta WHERE fecfinenc > DATE(NOW())";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selenc1(){
       $sql= "SELECT noenc, fecinienc, fecfinenc FROM encuesta WHERE fecfinenc < DATE(NOW())";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
}
?>
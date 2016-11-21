<?php
include_once("controlador/conexion.php");
class mencuesta{
	var $arr;
	function mencuesta(){}
	function insenc( $fecinienc, $fecfinenc,$nombre){
        $sql = "INSERT INTO encuesta ( fecinienc, fecfinenc,nombre) values ('".$fecinienc."', '".$fecfinenc."','$nombre');";
        $this->cons($sql);
    }

    function delenc($noenc){
    	$sql = "DELETE FROM encuesta where noenc='".$noenc."';";
    	$this->cons($sql);
    }

    function updenc($noenc, $fecinienc, $fecfinenc,$nombre){
        $sql = "UPDATE encuesta SET  fecinienc='".$fecinienc."', fecfinenc='".$fecfinenc."', nombre='$nombre' WHERE noenc='".$noenc."';";
        $this->cons($sql);
    } 

    function updest($noenc, $est){
        $sql = "UPDATE encuesta SET  Estado='".$est."' WHERE noenc='".$noenc."';";
        $this->cons($sql);
    } 

    function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function selenc(){
		$sql= "SELECT * FROM encuesta";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function selenc1($noenc){
        $sql = "SELECT  noenc, fecinienc, fecfinenc,nombre FROM encuesta WHERE noenc = '".$noenc."';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;

	}
}
?>
<?php
include ("controlador/conexion.php");

class mcontra{
	
	function mcontra(){}
	
	function selcon($nodoc){	
		$c = "SELECT CONCAT(nomapre,' ',apeapre) AS nomcom, emaapre, pass FROM aprendiz WHERE ndocapre='".$nodoc."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data=$conexionBD->ejeCon($c,0);
		return $data;
	}
}
?>
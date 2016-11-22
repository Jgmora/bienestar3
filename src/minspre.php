<?php
include_once("../controlador/conexion.php");
class minspre{
    function minspre(){
        
    }
    function insres($cod_pregunta,$respuesta){
		$sql = "insert into respuesta (codres,res,codpre) values ('','$respuesta','$cod_pregunta')";
                //echo $sql;
		$this->cons($sql);
		
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	
	}
}
?>

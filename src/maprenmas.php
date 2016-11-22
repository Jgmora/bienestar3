<?php
include ("controlador/conexion.php");
class maprenmas{
	var $arr;
	

	function maprenmas(){}
	function insapre($ndocapre, $tdocapre, $nomapre, $apeapre, 
		$telapre, $genapre, $nlmiapre,$dirapre, $emaapre,$fenaapre, 
		$nfic, $llamaapre, $teleapre,$pass, $idper){
		$sql = "INSERT INTO aprendiz (ndocapre, tdocapre, nomapre, apeapre, 
		telapre, genapre, nlmiapre, estcapre, dirapre, emaapre, codubi, fenaapre,  
		nfic, llamaapre, teleapre,pass, idper) values ('".$ndocapre."','".$tdocapre."','".$nomapre."',
		'".$apeapre."','".$telapre."','".$genapre."','".$nlmiapre."','6','".$dirapre."'
		,'".$emaapre."','97001','".$fenaapre."','".$nfic."','".$llamaapre."'
		,'".$teleapre."','".$pass."','".$idper."');";
		//echo $sql;
		$this->cons($sql);
	}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	function selapre($ndocapre){
		$sql = "SELECT count(ndocapre) as ca FROM aprendiz WHERE ndocapre='".$ndocapre."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selval($nomval){
		$sql = "SELECT codval, nomval FROM valor WHERE nomval='".$nomval."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}	
	
}
?>
<?php
include ("controlador/conexion.php");
class mfichamas{
	var $arr;
	
	function mfichamas(){}
	function insfic( $nfic , $finific , $ffinfic , $jorfic , $ofefic ,$codpro , $modfic){		
		$sql = "INSERT INTO ficha (nfic , finific , ffinfic , jorfic , ofefic , codpro , modfic) values ('".$nfic."', '".$finific."', '".$ffinfic."', '".$jorfic."', '".$ofefic."','".$codpro."', '".$modfic."');";
		$this->cons($sql);
		
			}
	
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selfic($nfic){
		$sql = "SELECT count(nfic) as cf FROM ficha WHERE nfic='".$nfic."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selval($njf){
		$sql = "SELECT codval, nomval FROM valor WHERE nomval='".$njf."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
}
?>
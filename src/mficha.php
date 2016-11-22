<?php
include ("/controlador/conexion.php");
class mficha{
	var $arr;
	function mficha(){}
	
	function insfic( $nfic , $finific , $ffinfic , $jorfic , $ofefic ,$codpro , $modfic){
		
		$sql = "INSERT INTO ficha (nfic , finific , ffinfic , jorfic , ofefic , codpro , modfic) values ('".$nfic."', '".$finific."', '".$ffinfic."', '".$jorfic."', '".$ofefic."','".$codpro."', '".$modfic."');";
		$this->cons($sql);
		
		
	}
	
	function delfic($nfic){
		$sql = "DELETE FROM ficha WHERE nfic='".$nfic."'";
		$this->cons($sql);
	}
	
	
	function updfic($nfic , $finific , $ffinfic , $jorfic , $ofefic ,$codpro , $modfic ){
		$sql = "UPDATE ficha SET nfic='".$nfic."', finific='".$finific."', ffinfic='".$ffinfic."', jorfic='".$jorfic."', ofefic='".$ofefic."', codpro='".$codpro."', modfic='".$modfic."' WHERE nfic='".$nfic."';";
		$this->cons($sql);
		
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	
	}
	function selfic($filtro,$rvalini,$rvalfin){
		$sql = "SELECT ficha.nfic , ficha.finific , ficha.ffinfic , ficha.jorfic , ficha.ofefic , ficha.codpro, programa.nompro , ficha.modfic FROM ficha INNER JOIN programa ON ficha.codpro = programa.codpro";
		if($filtro)
			$sql.= " WHERE ficha.nfic LIKE '%".$filtro."%'";
		$sql .= " ORDER BY ficha.nfic LIMIT ".$rvalini.", ".$rvalfin;
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
		function selfic2(){
		$sql = "SELECT codpro, nompro FROM programa;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function selfic3(){
		$sql = "SELECT ficha.jorfic, 
		val1.nomval as jf, ficha.ofefic, 
		val2.nomval as of, ficha.modfic,
		val3.nomval as mf 
		FROM ficha INNER JOIN valor as val1 
		ON ficha.jorfic=val1.codval 
		INNER JOIN valor as val2 
		ON ficha.ofefic=val2.codval
		INNER JOIN valor as val3 
		ON ficha.modfic=val3.codval";
		$ConDB = new conexion;
		$ConDB->conectarBD();
		$dato = $ConDB->ejeCon($sql,0);
		return $dato;
	}
	function selfic1($nfic){
		$sql = "SELECT nfic , finific , ffinfic , jorfic , ofefic , codpro , modfic FROM ficha WHERE nfic='".$nfic."'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpara($a){
		$sql = "SELECT codval, nomval, codpar FROM valor WHERE codpar='".$a."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	
}
?>
<?php
include ("controlador/conexion.php");
class mubicacion{
	var $arr;

	function mubicacion(){}

	function insubi($codubi,$nomubi,$depubi){
		$sql = "INSERT INTO ubicacion (codubi,nomubi,depubi) values 
		('".$codubi."', '".$nomubi."','".$depubi."');";
		$this->cons($sql);
	}
	function updubi($codubi,$nomubi,$depubi){
		$sql = "UPDATE ubicacion SET nomubi='".$nomubi."',depubi='".$depubi."' WHERE codubi='".$codubi."';";
		$this->cons($sql);
	}
	function delubi($codubi){
		$sql = "DELETE FROM ubicacion WHERE codubi='".$codubi."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1); // que es ejerco
	}
	function selubi($filtro,$rvalini,$rvalfin){
		$sql = "SELECT ubicacion.codubi, ubicacion.nomubi, vieubica.nomubi AS depart FROM ubicacion LEFT JOIN vieubica ON ubicacion.depubi=vieubica.codubi";
		if($filtro)
			$sql.= " WHERE ubicacion.nomubi LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY ubicacion.codubi LIMIT ".$rvalini.", ".$rvalfin;
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selubi1($codubi){
		$sql = "SELECT codubi, nomubi, depubi FROM ubicacion WHERE codubi='".$codubi."';";
		//echo $sql;
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function seldepto(){
		$sql = "SELECT codubi, nomubi FROM vieubica ORDER BY nomubi;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
}
?>
<?php
include ("controlador/conexion.php");


class mparametro{
	var $arr;
	function mparametro(){}
	
	function inspar($nompar,$delpara){
		$sql = "INSERT INTO parametro (nompar,parametro_fijo) VALUES ('".$nompar."','".$delpara."');";
		$this->cons($sql);
	}
	
	function insval($codval, $nomval, $codpar, $delvalor){
		$sql = "INSERT INTO valor ( codval , nomval, codpar, valor_fijo ) values ('".$codval."', '".$nomval."', '".$codpar."',
		'".$delvalor."');";
		$this->cons($sql);
	}
	function delpar($codpar){
		$sql = "DELETE FROM parametro WHERE codpar='".$codpar."';";
		$this->cons($sql);
	}
	
	function delval($codval){
		$sql = "DELETE FROM valor WHERE codval='".$codval."';";
		$this->cons($sql);
	}
	function updpar($codpar, $nompar){
		$sql = "UPDATE parametro SET nompar='".$nompar."' WHERE codpar='".$codpar."';";
		$this->cons($sql);
	}
	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}
	
	function selpar(){
		$sql = "SELECT codpar, nompar , parametro_fijo FROM parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selval(){
		$sql = "SELECT valor.codval, valor.nomval, valor.codpar, parametro.nompar FROM valor, parametro;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selpar1($codpar){
		$sql = "SELECT codpar, nompar FROM parametro WHERE codpar='".$codpar."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selval2($codval){
		$sql = "SELECT codval, nomval, codpar FROM valor WHERE codval='".$codval."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
		function selval1(){
		$sql = "SELECT valor.codval, valor.nomval,valor.valor_fijo, valor.codpar, parametro.nompar FROM valor, parametro WHERE valor.codpar= parametro.codpar;";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
		}
		function selpaji($filtro,$rvalini,$rvalfin){
		$sql = "SELECT parametro.nompar ,valor.codval, valor.nomval, valor.valor_fijo  FROM parametro LEFT JOIN valor ON parametro.codpar=valor.codpar";
		if($filtro)
			$sql.= " WHERE valor.codval LIKE '%".$filtro."%'";
		$sql .= "  ORDER BY valor.codval LIMIT ".$rvalini.", ".$rvalfin;
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}	
		
	function updval($codval, $nomval, $codpar){
		$sql = "UPDATE valor SET codval='".$codval."' , nomval='".$nomval."' , codpar='".$codpar."' WHERE codval='".$codval."';";
		$this->cons($sql);
	}
}
?>
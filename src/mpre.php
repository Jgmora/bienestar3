<?php

include_once("/controlador/conexion.php");

class mpre {

    var $arr;

    function mpre() {
        
    }

    function inspre($despre, $tppre, $canrespre, $noenc) {
        
        $sql = "INSERT INTO pregunta (despre,tppre,canrespre,noenc) values ('" . $despre . "' , '" . $tppre . "' , '" . $canrespre . "' , '" . $noenc . "');";
        $this->cons($sql);
        
        
    }

    function delpre($codpre,$tppre) {
        if($tppre==27 || $tppre==24 || $tppre==28 || $tppre==25 || $tppre==26){
            $query = "DELETE FROM respuesta WHERE codpre='" . $codpre . "';";
            $conexionBD = new conexion();
            $conexionBD->conectarBD();
            $conexionBD->ejeCon($query, 1);
        }
        $sql = "DELETE FROM pregunta WHERE codpre='" . $codpre . "';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $conexionBD->ejeCon($sql, 1);
    }

    function updpre($codpre, $despre, $tppre, $canrespre, $noenc) {
        $sql = "UPDATE pregunta ".
               "SET codpre='$codpre', ".
               "despre='$despre', ".
               "tppre='$tppre', ".
               "canrespre='$canrespre', ".
               "noenc='$noenc' ".
               "WHERE codpre='$codpre'; ";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 1);
        return $data;
    }

    function cons() {
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $conexionBD->ejeCon($c, 1);
    }

    function seltpre() {
        $sql = "SELECT codval, nomval, codpar  FROM valor WHERE valor.codpar='7';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    

    function selenc($noenc) {
        $sql = "SELECT noenc, fecinienc, fecfinenc,nombre FROM encuesta WHERE noenc='" . $noenc . "';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }

    function selpre($codenc) {
        $sql = "SELECT codpre,despre,tppre,canrespre,noenc FROM pregunta WHERE noenc='" . $codenc . "';";
        //echo $sql;
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
    function seleccionarPregunta($codigo) {
        $sql = "SELECT codpre,despre,tppre,canrespre,noenc FROM pregunta WHERE codpre='" . $codigo . "';";
        //echo $sql;
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }

    function selpre3() {
        $sql = "SELECT codres,res,codpre FROM respuesta;";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }

    function selpre1($codpre, $despre, $tppre, $canrespre, $noenc) {
        $sql = "SELECT despre,tppre,canrespre,noenc FROM pregunta WHERE codpre='" . $codpre . "';";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
	
	 function selpreg() {
        $sql = "SELECT codpre, despre FROM pregunta;";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }
	
	  function selprep($filtro,$rvalini,$rvalfin,$noenc){	
		$sql ="SELECT * FROM pregunta where noenc='".$noenc."'";
		if($filtro)
			$sql.= " WHERE pregunta.codpre LIKE '%".$filtro."%'";
		$sql .= " ORDER BY pregunta.codpre LIMIT ".$rvalini.", ".$rvalfin;
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

    function selres($codpre){
        $sql = "SELECT res from respuesta Where codpre= '".$codpre."';";
        $conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
    }

}

?>
<?php
include ("controlador/conexion.php");
class mestadi{
	var $arr;

	function mestadi(){}
	
	function selenc($encuesta)
	{	
		$sql ="SELECT nombre as nombre FROM encuesta WHERE nombre='".$encuesta."'";
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	
	function seltipopre($codpre)
	{	
		$sql ="SELECT tppre,despre FROM pregunta WHERE codpre='".$codpre."'";
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}
	function selecRespuestas($codpre){
		$sql="select ra.resrap as respuesta,
			(select count(resrap) from resapre where ra.resrap=resrap and codpre='$codpre') as cant,
			(select count(codpre) from resapre where codpre='$codpre' group by codpre) as total  
			from respuesta as r 
			inner join resapre as ra on r.codres=ra.codres 
			where r.codpre='$codpre'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		//var_dump($sql);
		return $data;
	}
	function selestadi($codpre,$codres,$resrap)
	{	
		$sql ="SELECT count(`nodcapre`)/(select count(*) from resapre where `codpre`='".$codpre."') as res FROM `resapre` WHERE `codpre`='".$codpre."' and `resrap`='".$resrap."';";
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		//var_dump($sql);
		return $data;
	}
	function selres($codpre)
	{	
		$sql ="SELECT codres, res FROM respuesta WHERE codpre='".$codpre."'";
		//echo "<br><br>".$sql."<br><br>";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

	function pregabi($encuesta, $codpre, $inicio, $registros){
		$sql = "
select aprendiz.ndocapre as documento, aprendiz.nomapre as nombre, aprendiz.apeapre as apellido, pregunta.despre as pregunta, resapre.resrap as respuesta, pregunta.codpre as codigopre, encuesta.noenc as numencuesta from aprendiz inner join ( pregunta inner join resapre on pregunta.codpre = resapre.codpre) on aprendiz.ndocapre = resapre.nodcapre 
inner join encuesta on encuesta.noenc = pregunta.noenc where encuesta.noenc ='".$encuesta."' and pregunta.codpre = '".		$codpre."' order by aprendiz.nomapre, aprendiz.apeapre limit $inicio, $registros ;"; 
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;		
	}
	
	
	function abitot($encuesta, $codpre){
		$sql = "Select * from aprendiz inner join ( pregunta inner join resapre on pregunta.codpre = resapre.codpre) on aprendiz.ndocapre = resapre.nodcapre 
inner join encuesta on encuesta.noenc = pregunta.noenc where pregunta.tppre = 13 and pregunta.noenc='".$encuesta."' and pregunta.codpre='".$codpre."';";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
	}

}
?>
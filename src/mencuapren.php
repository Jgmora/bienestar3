<?php
if(isset($_GET["pr"]) && !is_null($_GET["pr"])){
	include_once("../controlador/conexion.php");
}else{
	include_once("controlador/conexion.php");
}
class mencuapren{
	var $arr;
	function mencuapren(){}
		function selapre(){
			$sql = "SELECT a.ndocapre,a.nomapre,a.apeapre,a.nfic,f.nfic,p.nompro,e.noenc,en.nombre ";
			$sql .=" FROM aprendiz AS a INNER JOIN encxapr AS e  ON e.ndocapre= a.ndocapre  INNER JOIN";
			$sql .=" encuesta AS en ON e.noenc= en.noenc INNER JOIN  ficha AS f ON a.nfic= f.nfic INNER JOIN programa AS p ON f.codpro= p.codpro ORDER BY a.nomapre;";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
		}
		function seluse5(){
			$sql =" SELECT a.ndocapre,a.nomapre,a.apeapre,a.nfic,a.telapre,a.emaapre,a.dirapre,a.fenaapre,a.llamaapre,a.email,a.telefono, a.teleapre ,a.nlmiapre,a.fechadeinicio,p.nompro,";
			$sql .=" (SELECT nomval FROM valor WHERE a.genapre = codval) genero,";
			$sql .=" (SELECT nomval FROM valor WHERE f.jorfic = codval) jornada,";
			$sql .=" (SELECT nomval FROM valor WHERE a.sangre = codval) sangre,";
			$sql .=" (SELECT nomval FROM valor WHERE a.tdocapre = codval) nomval,";
			$sql .=" (SELECT nomval FROM valor WHERE a.estcapre = codval) civil,";
			$sql .=" (SELECT nomubi FROM ubicacion WHERE (select SUBSTRING(a.codubi,1,2)) = codubi) departamento,";
			$sql .=" (SELECT nomubi FROM ubicacion WHERE a.codubi = codubi) ciudad";
			$sql .=" FROM ";
			$sql .=" aprendiz AS a, programa AS p, ficha AS f WHERE a.nfic= f.nfic AND  f.codpro= p.codpro ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
		}
		function seluse1($noenc ){
			$sql =" SELECT a.ndocapre,a.nomapre,a.apeapre,a.nfic,a.telapre,a.emaapre,a.dirapre,a.fenaapre,a.llamaapre,a.email,a.telefono, a.teleapre ,a.nlmiapre,a.fechadeinicio,p.nompro,f.finific,f.ffinfic,";
			$sql .=" (SELECT nomval FROM valor WHERE a.genapre = codval) genero,";
			$sql .=" (SELECT nomval FROM valor WHERE f.jorfic = codval) jornada,";
			$sql .=" (SELECT nomval FROM valor WHERE a.sangre = codval) sangre,";
			$sql .=" (SELECT nomval FROM valor WHERE a.tdocapre = codval) nomval,";
			$sql .=" (SELECT nomval FROM valor WHERE a.estcapre = codval) civil,";
			$sql .=" (SELECT nomubi FROM ubicacion WHERE (select SUBSTRING(a.codubi,1,2)) = codubi) departamento,";
			$sql .=" (SELECT nomubi FROM ubicacion WHERE a.codubi = codubi) ciudad";
			$sql .=" FROM ";
			$sql .=" aprendiz AS a, programa AS p, ficha AS f , encxapr AS e ,encuesta AS en WHERE a.nfic= f.nfic &&  f.codpro= p.codpro && e.noenc= en.noenc && e.noenc='".$noenc."';";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
		}
		function seluse2($noenc ){
			$sql = " SELECT encxapr.noenc, encuesta.noenc, pregunta.despre,  pregunta.codpre ,aprendiz.ndocapre";
			$sql .=" FROM aprendiz, pregunta,encuesta,encxapr WHERE aprendiz.ndocapre=encxapr.ndocapre &&";
			$sql .=" encxapr.noenc=encuesta.noenc && encuesta.noenc=pregunta.noenc && encxapr.noenc='".$noenc."';";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
		}
		function seluse3(){
			$sql = " SELECT encxapr.noenc, encuesta.noenc, pregunta.despre,resapre.resrap, resapre.codpre,aprendiz.ndocapre";
			$sql .=" FROM aprendiz, resapre, pregunta,encuesta,encxapr WHERE aprendiz.ndocapre=encxapr.ndocapre &&";
			$sql .=" encxapr.noenc=encuesta.noenc && encuesta.noenc=pregunta.noenc && pregunta.codpre=resapre.codpre && resapre.nodcapre=aprendiz.ndocapre ";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($sql,0);
			return $data;
		}
	}	
?>
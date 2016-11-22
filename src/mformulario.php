<?php
include_once("controlador/conexion.php");
class Formulario{
    function Formulario(){}
    function getPreguntas($idEncuesta){
        $sql = "SELECT codpre,despre,tppre,canrespre,noenc FROM pregunta where noenc='$idEncuesta'";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql,0);
        return $data;
    }
    function getRespuestas($idPregunta){
        $sql = "SELECT codres,res,codpre FROM respuesta where codpre='$idPregunta'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
    }
    function getEncuesta($idEncuesta){
        $sql= "SELECT noenc, fecinienc, fecfinenc,nombre FROM encuesta where noenc='$idEncuesta'";
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$data = $conexionBD->ejeCon($sql,0);
		return $data;
    }
    function setRespuestas($idPregunta,$idRespuesta,$idAprendiz,$respuesta){
        $query="Insert into resapre (codpre,codres,nodcapre,resrap) values ('$idPregunta','$idRespuesta','$idAprendiz','$respuesta')";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($query,1);
         echo"<script type=\"text/javascript\">alert('Sus respuestas se guardaron exitosamente, Usted esta siendo redireccionado a la pagina principal'); window.location='home.php';</script>";
        }   
		function setEncApre($noenc, $ndocapre, $fecha){
			$query="INSERT INTO encxapr(noenc, ndocapre, fecha) VALUES ('$noenc','$ndocapre', '$fecha')";
			$conexionBD = new conexion();
			$conexionBD->conectarBD();
			$data = $conexionBD->ejeCon($query,1);
		}
    }

?>
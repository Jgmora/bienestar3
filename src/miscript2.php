<?php
include_once("..\controlador\conexion_sqlserver.php");

    $valor = $_REQUEST["valor"];
    $sql2 = "SELECT pregunta.codpre as codigo, pregunta.despre as pregunta,encuesta.noenc AS encues FROM pregunta INNER JOIN encuesta ON pregunta.noenc=encuesta.noenc WHERE encuesta.noenc=".$valor."";
	
	$conexionBD = new conexion_sqlserver();
	$conexionBD->conectarBD();
	$estados = $conexionBD->ejecutarConsulta($sql2,0);
	$result=array();
	$i=0;
	foreach($estados as $estado)
	{
		$result[$i]["value"]=$estado["codigo"];
		$result[$i]["nombre"]=$estado["pregunta"];
		$i++;
	}
		   
	$html='<select name="codpre" id="id_estado">';
	$html.='<option value="">SeleccionePREG</option>';
	foreach($result as $res)
	{
		$html.='<option value="'.$res["value"].'">'.$res["nombre"].'</option>';
		$nombre = $res["nombre"];
	}
	$html.='</select>';
	echo $html;
?>
<?php

include_once("modelo/mformulario.php");
$idEncuesta = isset($_GET["pr"]) ? $_GET["pr"] : NULL;
$idUser = isset($_SESSION["idUser"]) ? $_SESSION["idUser"] : NULL;
$user = isset($_SESSION["user"]) ? $_SESSION["user"] : NULL;
$objFormulario = new Formulario();
$encuesta = $objFormulario->getEncuesta($idEncuesta);
$preguntas = $objFormulario->getPreguntas($idEncuesta);
$i = 0;
foreach ($preguntas as $itemPregunta) {
    $datos[$i]["idPregunta"] = $itemPregunta["codpre"];
    $datos[$i]["pregunta"] = $itemPregunta["despre"];
    $datos[$i]["tipo"] = $itemPregunta["tppre"];
    $temp = array();


    $respuestas = $objFormulario->getRespuestas($itemPregunta["codpre"]);
    $j = 0;
    foreach ($respuestas as $itemRespuesta) {
        $temp[$j]["value"] = "";
        $temp[$j]["idRespuesta"] = $itemRespuesta["codres"];
        $html = "";
        if ($itemPregunta["tppre"] == 24) {//Verdadero Falso
            $html.='<option value="' . $itemRespuesta["res"] . '">' . $itemRespuesta["res"] . '</option>';
        }
        if ($itemPregunta["tppre"] == 25) { //RadioButtons
            $html.='<input type="radio" name="radio_' . $itemPregunta["codpre"] . '" value="' . $itemRespuesta["res"] . '">' . $itemRespuesta["res"] . '<br>';
        }
        if ($itemPregunta["tppre"] == 26) {//Checbox
            $html.='<input type="checkbox" name="check_' . $itemPregunta["codpre"] . '_' . $itemRespuesta["codres"] . '" value="' . $itemRespuesta["res"] . '">' . $itemRespuesta["res"] . '<br>';
        }
        if ($itemPregunta["tppre"] == 27) {//Experiencia Laboral
            $html.='<input type="text" name="'. $itemRespuesta["res"] . '_' . $itemPregunta["codpre"] . '_' . $itemRespuesta["codres"] . '" placeholder="'. $itemRespuesta["res"] . '" >&nbsp;&nbsp;&nbsp;';
        }
        if ($itemPregunta["tppre"] == 28) {//Abierta
            $html.='<input type="text"  style="width:680px; height=50px;" name="abierta_' . $itemPregunta["codpre"] . '">';
        }
        $temp[$j]["value"].=$html;
        $j++;
    }
    $datos[$i]["respuestas"] = $temp;
    $i++;
}
$save = isset($_POST["guardar"]) ? $_POST["guardar"] : NULL;
if (!is_null($save)) {
    foreach ($preguntas as $itemPregunta) {
        $idRespuesta=0;
        $value="";
        $respuestas = $objFormulario->getRespuestas($itemPregunta["codpre"]);
        foreach ($respuestas as $itemRespuesta) {
            $idRespuesta=$itemRespuesta["codres"];
            $nombreCampo="";
            if ($itemPregunta["tppre"] == 24){
                $nombreCampo="ddl_".$itemPregunta["codpre"];
                $value=isset($_POST[$nombreCampo]) ? $_POST[$nombreCampo] : NULL;
            }
            if ($itemPregunta["tppre"] == 25){
                $nombreCampo="radio_".$itemPregunta["codpre"];
                $value=isset($_POST[$nombreCampo]) ? $_POST[$nombreCampo] : NULL;
            }
            if ($itemPregunta["tppre"] == 26){
                $nombreCampo="check_".$itemPregunta["codpre"].'_'.$itemRespuesta["codres"];
                $t=isset($_POST[$nombreCampo]) ? $_POST[$nombreCampo] : NULL;
                $value.=!is_null($t)?$t.",":"";
            }
            if ($itemPregunta["tppre"] == 28){
                $nombreCampo="abierta_".$itemPregunta["codpre"];
                $value=isset($_POST[$nombreCampo]) ? $_POST[$nombreCampo] : NULL;
            }
            if ($itemPregunta["tppre"] == 27){
                $nombreCampo=$itemRespuesta["res"].'_'.$itemPregunta["codpre"].'_'.$itemRespuesta["codres"];
                $t=isset($_POST[$nombreCampo]) ? $_POST[$nombreCampo] : NULL;
                $value.=!is_null($t)?$t.",":"";
            }
        }
        $objFormulario->setRespuestas($itemPregunta["codpre"],$idRespuesta,$idUser,$value);
		
    }
	date_default_timezone_set('America/Bogota');
		$hoy = strftime("%Y-%m-%d %H:%M:%S");
		$objFormulario->setEncApre($idEncuesta, $idUser, $hoy);
      }
?>
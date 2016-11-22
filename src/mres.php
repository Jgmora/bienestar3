<?php

include ("controlador/conexion.php");

class mpregunta1 {

    var $arr;

    function mpregunta1() {
        
    }

    //controlador para pintar las casillas para las respuestas


    function inspre($despre, $tppre, $canrespre, $noenc) {
        $sql = "INSERT INTO pregunta(despre, tppre, canrespre, noenc) VALUES ('" . $despre . "', '" . $tppre . "', '" . $canrespre . "', '" . $noenc . "');";
        $this->cons($sql);
        $sql1 = "select codpre from pregunta order by codpre DESC limit 1";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql1, 0);
        if($tppre==27){
            $preguntas[]="Empresa";
            $preguntas[]="Cargo";
            $preguntas[]="Direccion";
            $preguntas[]="Telefono";
            $preguntas[]="Ingreso";
            $preguntas[]="Retiro";
            $preguntas[]="Motivo Retiro";
            foreach($preguntas as $pregunta){
                $query="INSERT INTO respuesta (codres,codpre,res) values ('','".$data[0]['codpre']."','$pregunta')";
                $this->cons($query);
            }
        }
        if($tppre==24){
            $preguntas[]="Si";
            $preguntas[]="No";
            foreach($preguntas as $pregunta){
                $query="INSERT INTO respuesta (codres,codpre,res) values ('','".$data[0]['codpre']."','$pregunta')";
                $this->cons($query);
            }
        }
        if($tppre==28){
            $preguntas[]="Abierta";
            foreach($preguntas as $pregunta){
                $query="INSERT INTO respuesta (codres,codpre,res) values ('','".$data[0]['codpre']."','$pregunta')";
                $this->cons($query);
            }
        }
    }
    function  eliminarRespuesta($id){
        $sql="delete from respuesta where codres='$id'";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $conexionBD->ejeCon($sql, 1);
    }
            function cons($c) {
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $conexionBD->ejeCon($c, 1);
    }

    function selpre($despre, $tppre, $canrespre, $noenc) {
        $sql = "SELECT MAX(codpre) AS id, despre, tppre,canrespre FROM pregunta AS p INNER JOIN valor AS v ON p.tppre = v.codval WHERE 
		p.despre='" . $despre . "' AND
		p.canrespre='" . $canrespre . "' AND
		p.noenc='" . $noenc . "' AND
		p.tppre='" . $tppre . "';";
        //echo "<br><br>".$sql."<br><br>";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }

    function selpre1($codpre) {
        $sql = "SELECT MAX(codpre) as id, despre, tppre, canrespre FROM pregunta WHERE codpre='" . $codpre . "'";
        $conexionBD = new conexion();
        $conexionBD->conectarBD();
        $data = $conexionBD->ejeCon($sql, 0);
        return $data;
    }

    function pintarTP($tp, $cant, $codpre, $noenc) {
        //echo "tp: ".$tp." Cant: ".$cant;
        if ($tp == 25)
            $this->selmuluni($cant, $codpre, $noenc);
        if ($tp == 24)
            $this->falver($codpre, 2, $noenc);
        if ($tp == 26)
            $this->selmulmul($cant, $codpre, $noenc);
        if ($tp == 27)
            $this->experiencia_laboral($cant, $codpre, $noenc);
        if ($tp == 28)
            $this->pregunta_abierta($cant, $codpre, $noenc);
    }

    function selmuluni($cant, $codpre, $noenc) {
        $html = "<form name='form2' action='controlador/cinspre.php' method='post' >";
        $html .= "<table >";
        $html .= "<input type='hidden' name='cant' value=" . $cant . " /><br>";
        $html .= "<input type='hidden' name='codpre' value=" . $codpre . " /><br>";
        $html .= "<input type='hidden' name='noenc' value=" . $noenc . " /><br>";
        for ($i = 0; $i < $cant; $i++) {
            $html .= "<tr>";
            $html .= "<td>";
            //$html .= "Respuesta No.".($i+1)."<br>";
            $html .= "</td>";
            $html .= "<td  align='right'>";
            //$html .= "<input type='radio' name='rad' value='".$i."' /> Correcto<br>";
            $html .= "</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td colspan='2'>";
            $html .= "<textarea name='res" . $i . "' cols='50' placeholder='Respuesta No." . ($i + 1) . "' required='required'></textarea><br><br>";
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "<input type='submit' value='Guardar' class='boton1'/>";
        $html .= "</form>";
        echo $html;
    }

    function selmulmul($cant, $codpre, $noenc) {
        $html = "<form name='form5' action='controlador/cinspre.php' method='post' >";
        $html .= "<table >";
        $html .= "<input type='hidden' name='cant' value=" . $cant . " /><br>";
        $html .= "<input type='hidden' name='codpre' value=" . $codpre . " /><br>";
        $html .= "<input type='hidden' name='noenc' value=" . $noenc . " /><br>";
        for ($i = 0; $i < $cant; $i++) {
            $html .= "<tr>";
            $html .= "<td>";
            //$html .= "Respuesta No.".($i+1)."<br>";
            $html .= "</td>";
            $html .= "<td  align='right'>";
            //$html .= "<input type='checkbox' name='chk".$i."' value='Correcto' /> Correcto<br>";
            $html .= "</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td colspan='2'>";
            $html .= "<textarea name='res" . $i . "' cols='50' placeholder='Respuesta No." . ($i + 1) . "' required='required'></textarea><br><br>";
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "<input type='submit' value='Guardar' class='boton1'/>";
        $html .= "</form>";
        echo $html;
    }

    function falver($codpre, $cant, $noenc) {
        $html = "<form name='form3' action='controlador/cinspre.php' method='post' >";
        $html .= "<input type='hidden' name='cant' value=" . $cant . " /><br>";
        $html .= "<input type='hidden' name='codpre' value=" . $codpre . " /><br>";
        $html .= "<input type='hidden' name='noenc' value=" . $noenc . " /><br>";
        for ($i = 0; $i < $cant; $i++) {
            $html .= "Respuesta No." . ($i + 1) . "<br><br>";
            /*$html .= "<select name='chk" . $i . "'>
				  <option value='V'>Verdadero</option>
				  <option value='F'>Falso</option>
				 </select><br>";*/
            $html .= "<textarea name='res" . $i . "' cols='50'></textarea><br><br>";
        }
        $html .= "<input type='submit' value='Guardar' class='boton1'/>";
        $html .= "</form>";
        echo $html;
    }

    function experiencia_laboral($cant, $codpre, $noenc) {
        $html = "<form name='form2' action='controlador/cinspre.php' method='post' >";
        $html .= "<table >";
        $html .= "<input type='hidden' name='cant' value=" . $cant . " /><br>";
        $html .= "<input type='hidden' name='codpre' value=" . $codpre . " /><br>";
        $html .= "<input type='hidden' name='noenc' value=" . $noenc . " /><br>";
        for ($i = 0; $i < $cant; $i++) {
            $html .= "<tr>";
            $html .= "<td>";
            //$html .= "Respuesta No.".($i+1)."<br>";
            $html .= "</td>";
            $html .= "<td  align='right'>";
            //$html .= "<input type='radio' name='rad' value='".$i."' /> Correcto<br>";
            $html .= "</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td colspan='2'>";
            $html .= "<textarea name='res" . $i . "' cols='50' placeholder='Respuesta No." . ($i + 1) . "' required='required'></textarea><br><br>";
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "<input type='submit' value='Guardar' class='boton1'/>";
        $html .= "</form>";
        echo $html;
    }

    function pregunta_abierta($cant, $codpre, $noenc) {
        $html = "<form name='form5' action='controlador/cinspre.php' method='post' >";
        $html .= "<table >";
        $html .= "<input type='hidden' name='cant' value=" . $cant . " /><br>";
        $html .= "<input type='hidden' name='codpre' value=" . $codpre . " /><br>";
        $html .= "<input type='hidden' name='noenc' value=" . $noenc . " /><br>";
        for ($i = 0; $i < $cant; $i++) {
            $html .= "<tr>";
            $html .= "<td>";
            //$html .= "Respuesta No.".($i+1)."<br>";
            $html .= "</td>";
            $html .= "<td  align='right'>";
            //$html .= "<input type='checkbox' name='chk".$i."' value='Correcto' /> Correcto<br>";
            $html .= "</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td colspan='2'>";
            $html .= "<textarea name='res" . $i . "' cols='50' placeholder='Respuesta No." . ($i + 1) . "'></textarea><br><br>";
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "<input type='submit' value='Guardar' class='boton1'/>";
        $html .= "</form>";
        echo $html;
    }

    /* function relacion($cant,$codpre){
      $html = "<form name='form3' action='controlador/cinspre.php' method='post' >";
      $html .= "<input type='hidden' name='cant' value=".$cant." /><br>";
      $html .= "<input type='hidden' name='codpre' value=".$codpre." /><br>";
      for ($i=0;$i<$cant;$i++){
      $html .= "Pregunta No.".($i+1)."";
      $html .= "Respuesta No.".($i+1)."<br><br>";
      $html .= "<textarea name='res".$i."' cols='30'></textarea>";
      $html .= "<textarea name='res1".$i."' cols='30'></textarea><br><br>";
      }
      $html .= "<input type='submit' value='Guardar' class='button'/>";
      $html .= "</form>";
      echo $html;
      } */
}

?>
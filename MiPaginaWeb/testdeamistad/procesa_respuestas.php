<?php

$cantidadPreguntas = $_POST['cantdadPreguntas'];
echo "Se realizaron $cantidadPreguntas preguntas.<br><br>";
$correctasTotales = 0;

for($i=1; $i<=$cantidadPreguntas; $i++){
    // entra a la pregunta
    $arrayCorrectas = $_POST["correctas$i"];
    $arrayCorrectas_depurado = array();

    //toma las respuestas correctas
    echo "En la pregunta $i las correctas son: <br>";
    foreach( $arrayCorrectas as $valor ){
        if ($valor != 0){
            echo "$valor. ";
            array_push($arrayCorrectas_depurado, $valor);
        }
    }; 
    echo "<br>";

    //compara las respuestas con las corectas
    $contador = 0;
    if(!empty($_POST["respuestas$i"])){
        $arrayRespuestas = $_POST["respuestas$i"];
        echo "se respondió con: <br>";
        foreach( $arrayRespuestas as $valor ){
            echo "$valor, ";
            foreach ($arrayCorrectas_depurado as $correcta) {
                if($valor == $correcta){
                    $contador++;
                }
            }
        }
        echo "<br>";
        echo "Hubieron $contador respuestas correctas.<br><br>";
        $correctasTotales += $contador;
    }else{
        echo "no se respondió esta pregunta<br><br>";
    }

    
}

echo "En total hubieron $correctasTotales respuestas correctas.";






?>
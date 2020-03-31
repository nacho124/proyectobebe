<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    $test = $_COOKIE['testamistad_cookie'];
    $cuestionario="";
    
    $pregunta = $_GET['strPregunta'];
    echo "Esta fue la pregunta: <br>";
    echo "- $pregunta<br />";
    
    $cuestionario = $cuestionario.$pregunta."::";
    echo $cuestionario."<br>";
    
    $array_respuestas = $_GET['respuesta'];
    //echo "Estas fueron tus respuestas: <br>";
    //$ruta_data = fopen("./$test/test_data.txt", "a");
    foreach ($array_respuestas as $respuesta){ 
        //echo "- $respuesta<br />";
        $cuestionario = $cuestionario.$respuesta.",,";
    }
    
    $cuestionario = rtrim($cuestionario,",,");
    $cuestionario = $cuestionario."::";
    echo $cuestionario."<br>";
    
    if(isset($_GET['correctas'])){
        $array_correctas = $_GET['correctas'];
        //echo "Estas son las correctas: <br>";
        
        foreach ($array_correctas as $correcta){ 
            //echo "Opcion: $correcta<br />";
            $cuestionario = $cuestionario.$correcta.",,";
        }
        
    } else{
        //echo "No hay respuestas correctas.";
    }
    $cuestionario = rtrim($cuestionario,",,");
    
    $cuestionario = $cuestionario."///";
    
    echo $cuestionario;
    
    $ruta_data = fopen("./$test/test_data.txt", "a");
    fwrite($ruta_data, $cuestionario);
    fclose($ruta_data);
    
    
    
    echo $_COOKIE['testamistad_cookie'];
    
    
    header("Location:" . "http://localhost:8080/MiPaginaWeb/testdeamistad/genera_pregunta.php");
    
    
    


    ?>    
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


    $contador_preguntas = $_COOKIE['testamistad_cookie_preguntas'] +1 ;
    setcookie("testamistad_cookie_preguntas",$contador_preguntas,time()+1800); 
    $test = $_COOKIE['testamistad_cookie'];
    $pregunta = $_GET['strPregunta'];

    require('datos_conexion.php');
    try{
        $base = new PDO("mysql:host=$direccion;dbname=$nombre_db",$usuario,$passwrd);
        echo ("conexion ok");

    } catch (Exeption $e) {
        die ( 'Error conectando a la BD: '. $e ->GetMessage());
    } finally{



        $sql = "insert into preguntas (numero, enunciado, test_id) values ($contador_preguntas, '$pregunta', $test)";
        $restultado = $base ->exec($sql);
        if($restultado === false){
            echo 'Error inserting preguntas data.';
            
        }else{
            echo "se insertaron los datos a preguntas<br>";
        }
        

        $sql = "select id from preguntas where numero= ? and test_id= ?";
        $resultado = $base ->prepare($sql);
        $resultado->execute(array($contador_preguntas, $test));
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        $id_pregunta = $registro['id'];
        
        $array_respuestas = $_GET['respuesta'];
        $contador_respuestas = 1;
        foreach ($array_respuestas as $respuesta){   
            echo "se insertará respuesta $contador_respuestas asociada a la pregunta id: $id_pregunta";
            
            $correcta=False;
            if(isset($_GET['correctas']) && in_array($contador_respuestas , $_GET['correctas'] )){
                $correcta=true;    
            }
                
            $sql = "insert into respuestas (numero, enunciado, correcta, pregunta_id) values ($contador_respuestas, '$respuesta', '$correcta' , $id_pregunta)";

            $restultado = $base ->exec($sql);
            if($restultado === false){
                echo 'Error inserting respuestas data.';
            }else{
                echo "se insertaron los datos a respuestas";
                $contador_respuestas += 1;
            }    
            
            
        }
        
        /*      
        foreach ($array_correctas as $correcta){ 
            echo "Opcion: $correcta<br />";
            $cuestionario = $cuestionario.$correcta.",,";
        }
            $sql = "insert into correctas (numero, enunciado, pregunta_id) values ($contador_preguntas, '$respuesta', $test)";
            $restultado = $base ->exec($sql);
            if($restultado === false){
                echo 'Error inserting data.';
                
            }else{
                echo "se insertaron los datos";
            }
    
    */
    
        $base=null;

    }
/*

    if(isset($_GET['correctas'])){
        $array_correctas = $_GET['correctas'];
        while(sizeof($array_correctas)<4){
            array_push($array_correctas, "0");
        }
        echo "Estas son las correctas: <br>";
    }  else{
        echo "No hay respuestas correctas.";
        $array_correctas = array("0","0","0","0");
    }
    foreach ($array_correctas as $correcta){ 
        echo "Opcion: $correcta<br />";
        $cuestionario = $cuestionario.$correcta.",,";
    }


*/

    /*
    echo "<br><br>";
    
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
        while(sizeof($array_correctas)<4){
            array_push($array_correctas, "0");
        }
        echo "Estas son las correctas: <br>";
    }  else{
        echo "No hay respuestas correctas.";
        $array_correctas = array("0","0","0","0");
    }
    foreach ($array_correctas as $correcta){ 
        echo "Opcion: $correcta<br />";
        $cuestionario = $cuestionario.$correcta.",,";
    }
    
    
    $cuestionario = rtrim($cuestionario,",,");
    
    $cuestionario = $cuestionario."///";
    
    echo $cuestionario;
    
    $ruta_data = fopen("./$test/test_data.txt", "a");
    fwrite($ruta_data, $cuestionario);
    fclose($ruta_data);
    
    
    
    echo $_COOKIE['testamistad_cookie'];
    
    */


    
    

    
    
    //header("Location:" . "http://localhost:8080/MiPaginaWeb/testdeamistad/genera_pregunta.php");
    
    
    

    ?>    
</body>
</html>


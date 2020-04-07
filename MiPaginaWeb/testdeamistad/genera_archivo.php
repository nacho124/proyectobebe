<?php

require('datos_conexion.php');
$nombreUsuario=$_GET["strNombre"];

try{
    $base = new PDO("mysql:host=$direccion;dbname=$nombre_db",$usuario,$passwrd);
    echo ("conexion ok. <br>");

} catch (Exeption $e) {
    die ( 'Error conectando a la BD: '. $e ->GetMessage());
} finally{
        
    $resultado=false;    
       
    while($resultado === false){
        $test = rand(100000, 999999);
        $sql = "insert into tests (id, nombre) values ($test, '$nombreUsuario')";
        $resultado = $base ->exec($sql);
        if ($resultado === false ){
            echo 'Error inserting data.';
        }else{
            echo "Se insertaron los datos.";
            setcookie("testamistad_cookie",$test,time()+1800);
            setcookie("testamistad_cookie_preguntas",0,time()+1800);
        }
    }
    $base=null;
}


/*
    $flag = false;
    while (!$flag){
        $test = rand(100000, 999999);    
        if(!is_dir("./$test")){
            mkdir("./$test");
            //echo "se ha creado el directorio '/$test' en '/testdeamistad'. <br>";
            setcookie("testamistad_cookie",$test,time()+1800);
            $flag=true;
        }    
    }
        
    
     $ruta = fopen("./$test/test_data.txt", "w");
     fwrite($ruta, $nombreUsuario."///");
     fclose($ruta);

*/
    
    header("Location:" . "genera_pregunta.php");
 
 
?>
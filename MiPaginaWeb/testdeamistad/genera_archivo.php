
    <?php
    $nombreUsuario=$_GET["strNombre"];
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
     
     $rutaIndex=fopen("./$test/index.php", "w");
     setcookie("testamistad_cookie_visitor",$test,time()+172800);
     fwrite($rutaIndex,'<!DOCTYPE html>
     <html lang="es">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <meta name="description" content="Que tan bien te conocen tus amigos? 
                                             Preguntales tu mismo y descubre 
                                             qué tan bien te conocen tus amgos 
                                             haciendo tu propio Test!">
         <title>¿Que tan bien me conoces?</title>
     </head>
     <body>
     </body>
     </html>');
     fclose($rutaIndex);
     
    
    header("Location:" . "http://localhost:8080/MiPaginaWeb/testdeamistad/genera_pregunta.php");
    ?>
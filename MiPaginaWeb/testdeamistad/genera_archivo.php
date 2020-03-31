
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
     fwrite($ruta, $nombreUsuario."\r\n");
     fclose($ruta);
     
     /*
     if(is_file("./$test/test_data.txt")){
        echo "se ha creado el archivo test_data.txt <br>";
        $rutaLectura = fopen("./$test/test_data.txt", "r");
        while(!feof($rutaLectura)){
            $linea = fgets($rutaLectura);
            echo "$linea <br>";
            
        }
        fclose(fopen("./$test/test_data.txt", "r"));
     }
     */


     $rutaIndex=fopen("./$test/index.html", "w");
     fclose($rutaIndex);
     
     /*
     if(is_file("./index.html")){
         echo "se ha creado el archivo index.html";
     }
     */
    
    
    header("Location:" . "http://localhost:8080/MiPaginaWeb/testdeamistad/genera_pregunta.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <!--- esta pagina genera el HTML del cuestionario --->
</head>
<body>

    <?php
    $html_text="";
    $test=974657;
    $path = fopen( "$test/test_data.txt" , "r" );
    $texto= fgets( $path );
    $texto = rtrim($texto,"///");
    //echo $texto."<br>";
    $texto_array = explode("///", $texto);
    
    //echo sizeof($texto_array)."<br>";
    //echo "Responde el cuestionario de ".$texto_array[0]."<br>";

    $html_text= '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Que tan bien te conocen tus amigos? 
                                            Preguntales tu mismo y descubre 
                                            qué tan bien te conocen tus amgos 
                                            haciendo tu propio Test!">
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <title>¿Que tan bien me conoces?</title>
        <script src="js/generador.js"></script>
    </head>
    <body>
        <table>
            <tr>';
    $html_text=$html_text.'<td><label for="tituloCuestionario">Responde el cuestionario de</label></td><td>'.$texto_array[0].'</td>
            </tr>';
    for($i=1; $i<sizeof($texto_array); $i++){
        $boquePregunta = $texto_array[$i];
        
        $boquePregunta_array = explode("::", $texto_array[$i]);
        
        //echo "La pregunta es: ".$boquePregunta_array[0]."<br>";
        $html_text=$html_text.'
        <tr>
            <td><label for="pregunta">La pregunta es:</label></td><td>'.$boquePregunta_array[0].'</td>
        </tr>';

        for($j=1; $j<sizeof($boquePregunta_array ); $j++){
            $seccion=$boquePregunta_array[$j];
            
            $desgloce = explode(",,", $seccion);
            if($j==1){
                //echo "Respuestas posibles: <br>";
                $html_text=$html_text.'
                <tr>
                <td><label for="respuestas">Respuestas posibles: </label></td><td></td>
                </tr>';
                for($k=0;$k<sizeof($desgloce);$k++){
                    $respuesta = $desgloce[$k];
                    //echo $respuesta."<br>";
                    $html_text=$html_text.'
                    <tr>
                    <td><label for="respuesta'.$k. '">' . " $respuesta ".'</label></td><td><input type="checkbox" name="correctas[]" id="color" value='.'"' .  ($k+1)  . '"'.'></td>
                    </tr>
                    ';
                }
            }else if($j==2){
                //echo "Las opciones correctas serian: <br>";
                //$html_text=$html_text.'<label for="correctas">Respuestas correctas: </label><br>';
                $html_text=$html_text.'<tr>';
                for($k=0;$k<sizeof($desgloce);$k++){
                    $item = $desgloce[$k];
                    //echo $item.". ";
                    if($item !==0){
                        $html_text=$html_text.'
                        <td visibility: hidden ><label for="correctas[]">'.$item.'</label><br></td>';
                    }
                }
                $html_text=$html_text.'
                </tr>';
                
            }
            
        }
        
    }
    
    $html_text = $html_text."
    </table>
    </body>
    </html>";
    
    echo $html_text;
    
    ?>


    
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method= GET name="formulario_cuestionario" action="procesa_pregunta.php" id="formHistoria">
        <table>    
            <tr>
                <td>
                    <label for="strPregunta">Escribe la pregunta:</label>
                    <input type="text" name="strPregunta" value="Cual fruta me gusta mas?"><br>
                </td>
                <td>
                    <label for="strCorrectas">Correcta:</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="strR1">Respuesta 1:</label>
                    <input type="text" name="respuesta[]" value="Bananas">
                </td>
                <td>
                    <input type="checkbox" name="correctas[]" id="color" value="1"><br> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="strR2">Respuesta 2:</label>
                    <input type="text" name="respuesta[]" value ="Manzanas">
                </td>
                <td>
                    <input type="checkbox" name="correctas[]" id="color" value="2"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="strR3">Respuesta 3:</label>
                    <input type="text" name="respuesta[]" value="Peras">
                </td>
                <td>
                    <input type="checkbox" name="correctas[]" id="color" value="3"><br>
                </td>
            </tr>
            <tr>
                <td> 
                    <label for="strR4">Respuesta 4:</label>
                    <input type="text" name="respuesta[]" value="Sandias">
                </td>
                <td> 
                    <input type="checkbox" name="correctas[]" id="color" value="4"><br>
                </td>
            </tr>
        </table>
        
        <button type="submit">Agregarla!</button>
    </form>
    
    <?php
       
       $test = $_COOKIE['testamistad_cookie'];
       echo "<a href='http://localhost:8080/MiPaginaWeb/testdeamistad/$test'>Ir al Test!</a>"
    ?>


    
</body>
</html>
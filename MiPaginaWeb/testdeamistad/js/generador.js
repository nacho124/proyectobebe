$().ready(inicializar)

function inicializar(){
    
    $("#divTest").html(` ${queryString}`);
    
}

let queryString = window.location.search;
let html_text="hola";
let content="///";
if (queryString != ""){
    console.log(queryString);
    codigo = queryString.substr(1);
    console.log(`se deberia mostrar el cuestionario en ${codigo}`);
    
    
    content = fetch(`${codigo}/test_data.txt`)
    .then(res => res.text())
    .then(content => { 
        content = content.slice(0, -3)
        console.log(content)
            //echo $texto."<br>";
            let texto_array = content.split("///");
            console.log(texto_array)
        /*    
            html_text= `
            <!DOCTYPE html>
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
            <tr>
            <td><label for="tituloCuestionario">Responde el cuestionario de</label></td><td>${texto_array[0]}</td>
            </tr>`;
        */
            html_text=`
            <table>
            <tr>
                <td><label for="tituloCuestionario">Responde el cuestionario de</label></td><td>${texto_array[0]}</td>
            </tr>`;

            
            for(i=1; i<texto_array.length; i++){
                let bloquePregunta = texto_array[i];
            
                let boquePregunta_array = bloquePregunta.split("::");
            
                //echo "La pregunta es: ".$boquePregunta_array[0]."<br>";
                html_text=html_text+`
                <tr>
                <td><label for="pregunta">La pregunta es:</label></td><td>${boquePregunta_array[0]}</td>
                </tr>`;
            
                for(j=1; j<boquePregunta_array.length; j++){
                    let seccion= boquePregunta_array[j];
                    console.log(seccion)
                    let desgloce = seccion.split(",,");
                    console.log(desgloce)
                    console.log(j)
                    if(j==1){
                        //echo "Respuestas posibles: <br>";
                        console.log("entro al desgloce de las respuestas")
                        html_text = html_text + `
                        <tr>
                        <td><label for="respuestas">Respuestas posibles: </label></td><td></td>
                        </tr>`;
                        for(k=0;k<desgloce.length;k++){
                            let respuesta = desgloce[k];
                            console.log("entro a enumerar las preguntas")
                            //echo $respuesta."<br>";
                        html_text = html_text+`
                        <tr>
                        <td><label for="respuesta${k}">${respuesta}</label></td><td><input type="checkbox" name="correctas${i}[]" id="color" value="${k+1}"></td>
                        </tr>
                        `;
                        }      
                }else if(j==2){
                    //echo "Las opciones correctas serian: <br>";
                    //$html_text=$html_text.'<label for="correctas">Respuestas correctas: </label><br>';
                    html_text =  html_text + `<tr>`;
                    for(k=0; k<desgloce.length;k++){
                        let item = desgloce[k];
                        //echo $item.". ";
                        if(item !==0){
                            html_text= html_text+`
                            <td visibility: hidden><label for="correctas[]">${item}</label><br></td>`;
                        }
                    }
                    html_text = html_text+`
                    </tr>`;
                
                }
            
            }
        
        }
    /*
        html_text = html_text+`
        </table>
        </body>
        </html>`;
    */
        html_text = html_text+`
        </table>`;
        console.log(html_text);
        $("#divTest").html(`${html_text}`);


    }) // fin de fetch!!! 
    console.log(html_text);
    
    
}else{
    console.log("no hay variable"); 
    
}




function Escribir(){
    let text = document.cookie;
    if(text== null){
        $("#divSalida").html("no hay cookie");
    }else{
        
        $("#divSalida").append(text);
    }
}


function getCookie() {
    var nombreCookie = "testdeamistad_cookie"
      var cookie = document.cookie;
    var ca = cookie.split('=');
    /*
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
    }
    */
    if (ca[0] == nombreCookie) { 
        return ca[1];
    }
    else{
        return "no hay cookie."
    }
  }

function PostearCuestionario(){
    $("#divTest").html(GenerarCuestionario);
}

function GenerarCuestionario(){
    let pregunta = "Pepito gusta comer mocos?";
    let respuesta1 = "solo en la casa";
    let respuesta2 = "en la parada del bus";
    let respuesta3 = "en el baño del shopping";
    let respuesta4 = "como adereso en la ensalada";

    let cuestionario  = `<table>
    <tr>
        <td>${pregunta}</td><td></td>
    </tr>
    <tr>
        <td>${respuesta1}</td><td><input type="checkbox" id="chk1" value="1"></td>
    </tr>
    <tr>
        <td>${respuesta2}</td><td><input type="checkbox" id="chk2" value="2"></td>
    </tr>
    <tr>
        <td>${respuesta3}</td><td><input type="checkbox" id="chk3" value="3"></td>
    </tr>
    <tr>
        <td>${respuesta4}</td><td><input type="checkbox" id="chk4" value="4"></td>
    </tr>
</table>`;

    return cuestionario;
}


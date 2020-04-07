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
            
            let texto_array = content.split("///");
            console.log(texto_array)
            html_text=`
            <form method= POST name="cuestionario" action="procesa_respuestas.php">
            <table>
            <tr>
                <td><label for="tituloCuestionario">Responde el cuestionario de</label></td><td>${texto_array[0]}</td>
            </tr>`;


            for(i=1; i<texto_array.length; i++){
                let bloquePregunta = texto_array[i];
            
                let boquePregunta_array = bloquePregunta.split("::");
    
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
                        
                        console.log("entro al desgloce de las respuestas")
                        html_text = html_text + `
                        <tr>
                        <td><label for="respuestas">Respuestas posibles: </label></td><td></td>
                        </tr>`;
                        for(k=0;k<desgloce.length;k++){
                            let respuesta = desgloce[k];
                            console.log("entro a enumerar las preguntas")
                           
                        html_text = html_text+`
                        <tr>
                        <td><label for="respuesta${k}">${respuesta}</label></td><td><input type="checkbox" name="respuestas${i}[]" id="color" value="${k+1}"></td>
                        </tr>
                        `;
                        }      
                }else if(j==2){
                   
                    html_text =  html_text + `<tr>`;
                    for(k=0; k<desgloce.length;k++){
                        let item = desgloce[k];
                        //echo $item.". ";
                        if(item !==0){
                            html_text= html_text+`
                            <td>
                            <input type="hidden" name="correctas${i}[]" value="${item}">
                            <br></td>`;
                        }
                    }
                    html_text = html_text+`
                    </tr>`;
                
                }
            
            }
        
        }

        html_text = html_text+`
            </table>
            <button type="submit">LISTO!</button> 
            <input type="hidden" name="cantdadPreguntas" value="${i-1}">
        <form>`;
        
        console.log(html_text);
        $("#divTest").html(`${html_text}`);


    }) // fin de fetch!!! 
    console.log(html_text);   
}else{
    console.log("no hay variable"); 
}

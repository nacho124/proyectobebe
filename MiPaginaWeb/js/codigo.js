$().ready(inicializar)

function inicializar(){
    $("#btnCrearHistoria").click(CrearHistoria);
}

function CrearHistoria(){
    let nombre = $("#strNombre").val();
    let home = $("#strHome").val();
    let food = $("#strFood").val();
    let superpoder = $("#strSuperpoder").val();
    let amor = $("#strAmor").val();

    let historia = `<p>En un pequeño lugar de ${home} vivia alguien que se llamaba ${nombre}.<br>
    Cuando un día se topó con un ${food} gigante que sin dudar se comió.<br>
    Este ${food} gigante le concedió el superpoder de ${superpoder} <br>
    y con ello pudo salvar al mundo del coronavirus COVID-19 y conquistar el corazon de ${amor}.<br>
    FIN.`;

    $("#divHistoria").html(historia);
}


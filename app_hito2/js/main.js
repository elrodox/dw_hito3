/**
 * Created by elrodox on 26/11/14.
 */
var formVisible = false;
$("a").click(function(e){
    e.preventDefault();
    $(".active").removeClass("active");
    $(this).parent().addClass("active");
    var link = $(this).attr("href");
    
    $.get(link, {ajax:1}, 
        function(resp, estado){
            $("#contenido").fadeOut(300, function(){
            $("#contenido").html(resp);
            $("#contenido").fadeIn(300);
        });
    });
    
});

var mostrarForm = function(titulo){
    formVisible=true;
    $("#columna-tabla").switchClass("col-xs-12","col-xs-8", 300, function(){
        $("#columna-form").addClass("col-xs-4");
        $("#columna-form").show(300, function(){
            $("h3#titulo-formulario").html(titulo);
        });
        
    });
}

$("body").on("click","#mostrar-form-editar-persona", function(){
    var tr = $(this).parent().parent();
    var nombrePersona = tr.find("td.nombre").html();
    var tituloForm = "Editando '"+nombrePersona+"'";
    var form = $("#formulario");
    if (!formVisible) mostrarForm(tituloForm);
    else $("h3#titulo-formulario").html(tituloForm);
    
    var valorID = tr.find(".id").html();
    form.find("input[name='id']").remove();
    var oldHtml = form.html();
    var inputID = "<input id='id' type='text' name='id' value='"+valorID+"' hidden>";
    var newHtml = inputID + oldHtml;
    form.html(newHtml);
    
    form.attr("action","actualizar");
    $("#nombreInput").val( nombrePersona );
    $("#apellidoInput").val( tr.find("td.apellido").html() );
    $("#emailInput").val( tr.find("td.email").html() );
    var filtro = "[value=" + tr.find("td.sexo").html()+"]";
    $("input.sexo").filter(filtro).prop('checked', true);
    
    
    
//     $("#estudianteInput").val( tr.find(".id") );
//     $("#nombreInput").val( tr.find(".id") );
//     $("#nombreInput").val( tr.find(".id") );
});
$("body").on("click", ".mostrar-form-nueva-persona", function(){
    if (!formVisible) mostrarForm("Nueva Persona");
    else $("h3#titulo-formulario").html("Nueva Persona");
    $("#formulario").attr("action","create");
    
});

$("body").on("click", ".cerrar-form", function(){
    formVisible=false;
    $("#columna-form").hide(300);
    $("#columna-form").removeClass("col-xs-4");
    $("#columna-tabla").switchClass("col-xs-8","col-xs-12", 300);
});

$("body").on("submit", "#formulario", function(e){
    e.preventDefault();
    e.stopPropagation();
    var data=$("#formulario").serialize();
    var action = $("#formulario").attr("action");
    console.log("data: "+data);
    $.post(
        "index.php?r=persona/"+action, //$(this).attr("action"),
        data, // data
        function(resp, estado){
            console.log(resp);
            if (action=="create") $("tbody.lista-personas").append(resp);
            else if (action=="actualizar"){
                $("#columna-tabla").html(resp);
            }
        }
    );
});

$("body").on("click", "#eliminar", function(){
    var tr = $(this).parent().parent();
    var valorID = tr.find("td.id").html();
    tr.fadeOut(300, function(){
        tr.remove();
    });
    $.get(
        $(this).attr("href"),
        {
            id: valorID
        }
    );
    
});

$("#boton").click(function(event){
    $.ajax({
        url:'http://sails.efexi.cl/user/',
        type:"GET",
        success:function(data) {
            $.post(
                "http://localhost/DW/hito3/app_hito2/persona/verRest",
                {personas: data},
                function(resp){
                    $("#columna-tabla").html(resp);
                }
            );
            console.log(data);
            $(".cargar").html(data);
        },
        error:function (xhr, ajaxOptions, thrownError){
            console.log("xhr: "+xhr);
            console.log("resp: "+xhr.responseText);
            $(".cargar").html(xhr.responseText);
        }
    });
});

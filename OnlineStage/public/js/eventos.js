$(document).ready(function(){    
    //boton para mostrar formulario añadir evento
    $("#add_event").click(function() {
        $('#esconder_form').removeAttr('hidden');
        $("#form_add_event").removeAttr('hidden');
    });
    //boton para esconder el formulario de añadir evento
    $("#esconder_form").click(function() {
        $("#form_add_event").attr('hidden',true);
        $('#esconder_form').attr('hidden',true);
    });

    //boton para mostrar formulario editar evento
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = thisId.substring(thisId.length - 1, thisId.length);
        $("#esconder_form_edit" + thisId).attr('hidden',false);
        $("#form_edit_evento"+ thisId).attr('hidden',false);
        $("#delete_evento"+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar evrnto
        $("#esconder_form_edit"+ thisId).click(function() {
            $("#edit_evento"+ thisId).attr('hidden',false);
            $("#form_edit_evento"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $("#delete_evento"+ thisId).attr('hidden',false);
        });
    });
});
$(document).ready(function(){
    //boton para mostrar formulario añadir tramo
    $("#add_tramo").click(function() {
        $('#esconder_form').removeAttr('hidden');
        $("#form_add_tramo").removeAttr('hidden');
    });
    //boton para esconder el formulario de añadir tramo
    $("#esconder_form").click(function() {
        $("#form_add_tramo").attr('hidden',true);
        $('#esconder_form').attr('hidden',true);
    });
    //boton para mostrar formulario editar tramo
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = thisId.substring(thisId.length - 1, thisId.length);
        $("#esconder_form_edit" + thisId).attr('hidden',false);
        $("#form_edit_tramo"+ thisId).attr('hidden',false);
        $("#delete_tramo"+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar tramo
        $("#esconder_form_edit"+ thisId).click(function() {
            $("#edit_tramo"+ thisId).attr('hidden',false);
            $("#form_edit_tramo"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $("#delete_tramo"+ thisId).attr('hidden',false);
        });
    });

    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');

    
});



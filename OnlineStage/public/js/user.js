$(document).ready(function(){
    //boton para editar datos de la cuenta
    $("#editar_cuenta").click(function() {
        $("#esconder_form").removeAttr('hidden');
        $("#update_cuenta").attr('hidden',false);
        $("#editar_cuenta").attr('hidden',true)
        $("#name_user").removeAttr('disabled');
        $("#email_user").removeAttr('disabled');
        $("#pass_user").removeAttr('hidden');
        $("#rpass_user").removeAttr('hidden');
    });
    //boton para esconder el formulario de edicion
    $("#esconder_form").click(function() {
        $("#esconder_form").attr('hidden',true);
        $("#update_cuenta").attr('hidden',true);
        $("#editar_cuenta").attr('hidden',false);
        $("#name_user").attr('disabled',true);
        $("#email_user").attr('disabled',true);
        $("#pass_user").attr('hidden',true);
        $("#rpass_user").attr('hidden',true);
    });
    //boton para mostrar form añadir coches
    $("#add_car").click(function() {
        $("#esconder_form_coche").removeAttr('hidden');
        $("#car_form").removeAttr('hidden');
        $("#add_car").attr('hidden',true);
    });
    //boton para esconder form añadir coches
    $("#esconder_form_coche").click(function() {
        $("#esconder_form_coche").attr('hidden',true);
        $("#car_form").attr('hidden',true);
        $("#add_car").attr('hidden',false);
    });
    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');



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
});

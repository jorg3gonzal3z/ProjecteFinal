function GetId(str){
    return str.split(':')[1];
}
$(document).ready(function(){

    //boton para mostrar formulario editar rally
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        $("#esconder_form_edit\\:" + thisId).attr('hidden',false);
        $("#form_edit_rally\\:"+ thisId).attr('hidden',false);
        $("#delete_rally\\:"+ thisId).attr('hidden',true);
        $('#rally\\:'+ thisId).attr('hidden',true);
        $('#ver_listado\\:'+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar evento
        $("#esconder_form_edit\\:"+ thisId).click(function() {
            $('#rally\\:'+ thisId).attr('hidden',false);
            $('#ver_listado\\:'+ thisId).attr('hidden',false);
            $("#edit_rally\\:"+ thisId).attr('hidden',false);
            $("#form_edit_rally\\:"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $("#delete_rally\\:"+ thisId).attr('hidden',false);
        });
    });

    //boton para mostrar listado de participantes
    $(".Participantes").click(function(){
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        $("#lista\\:"+ thisId).attr('hidden',false);
        $("#participantes\\:"+ thisId).attr('hidden',false);

        //boton para esconder el listado de participantes
        $("#participantes\\:"+ thisId).click(function() {
            $("#participantes\\:"+ thisId).attr('hidden',true);
            $("#lista\\:"+ thisId).attr('hidden',true);
            $("#listadoParticipantes\\:"+ thisId).attr('hidden',false);
        });
    });

    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');
    
});



function GetId(str){
    return str.split(':')[1];
}
$(document).ready(function(){

    // //boton para mostrar formulario editar evento
    // $(".editButton").click(function() {
    //     $(this).attr('hidden',true);
    //     var thisId = $(this).attr('id');
    //     thisId = GetId(thisId);
    //     $("#evento\\:"+ thisId).attr('hidden',true);
    //     $("#esconder_form_edit\\:" + thisId).attr('hidden',false);
    //     $("#form_edit_evento\\:"+ thisId).attr('hidden',false);
    //     $("#delete_evento\\:"+ thisId).attr('hidden',true);

    //     //boton para esconder el formulario de editar evento
    //     $("#esconder_form_edit\\:"+ thisId).click(function() {
    //         $("#edit_evento\\:"+ thisId).attr('hidden',false);
    //         $("#form_edit_evento\\:"+ thisId).attr('hidden',true);
    //         $(this).attr('hidden',true);
    //         $("#evento\\:"+ thisId).attr('hidden',false);
    //         $("#delete_evento\\:"+ thisId).attr('hidden',false);
    //     });
    // });

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
});
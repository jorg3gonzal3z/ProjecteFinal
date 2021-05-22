function GetId(str){
    return str.split(':')[1];
}
$(document).ready(function(){

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

    //SOLUCION BUG MODAL RARO
    $('.edit_btn').click(function(){
        var thisModal = $(this).attr('id');
        thisModal = GetId(thisModal);

        var thisCard = $(this).parents(".card-container");
        thisCard.css("backdrop-filter", "none");

        
        $("#modal"+thisModal).on("hidden.bs.modal", function () {
            thisCard.css("backdrop-filter", "blur( 15.0px )");

        });

    });
});
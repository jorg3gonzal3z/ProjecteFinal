function GetId(str){
    return str.split(':')[1];
}
$(document).ready(function(){
    //boton para mostrar formulario añadir tramo
    $("#add_tramo").click(function(){
        $('#container_animacion').fadeIn(800);
        $('#esconder_form').removeAttr('hidden');
        $("#form_add_tramo").removeAttr('hidden');
        $('#map').removeAttr('hidden');

        //boton para esconder el formulario de añadir tramo
        $("#esconder_form").click(function() {
            $('#container_animacion').fadeOut(800, function(){
                $("#form_add_tramo").attr('hidden',true);
                $('#esconder_form').attr('hidden',true);
                $('#map').attr('hidden',true);
            });
        });
    });
    
    //boton para mostrar formulario editar tramo
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        $('#tramo\\:'+ thisId).attr('hidden',true);
        $('#container_edit\\:'+ thisId).fadeIn(1000);
        $("#esconder_form_edit\\:" + thisId).attr('hidden',false);
        $("#form_edit_tramo\\:"+ thisId).attr('hidden',false);
        $("#delete_tramo\\:"+ thisId).attr('hidden',true);
        
        //se guarda el id del tramo y el id de la foto para eliminarlos posteriormente
        var imagenes_a_eliminar = [];
        $('*[class^="img_edit"]').click(function(){
            $(this).fadeOut(800);
            let id_foto = $(this).find("#foto_id").html();
            imagenes_a_eliminar.push(id_foto);
            $("#imagenes_a_eliminar\\:"+ thisId).val(imagenes_a_eliminar);
        });
    
        //boton para esconder el formulario de editar tramo
        $("#esconder_form_edit\\:"+ thisId).click(function() {
            $(this).attr('hidden',true);
            $('#container_edit\\:'+ thisId).fadeOut(800, function(){
                $("#edit_tramo\\:"+ thisId).attr('hidden',false);
                $("#form_edit_tramo\\:"+ thisId).attr('hidden',true);
                $("#delete_tramo\\:"+ thisId).attr('hidden',false);
                $('#tramo\\:'+ thisId).attr('hidden',false);
            });
        });
    });

    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');

    var totesAdresses = $('.mostraAdressa');

    totesAdresses.each(function(index, element){
        $( element ).html($( element ).text().replace(/[&]{2}/g,'<i class="fa fa-arrow-right" aria-hidden="true"></i>'));
    });
});




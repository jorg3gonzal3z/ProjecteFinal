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
    $("#edit_tramo").click(function() {
        $("#edit_tramo").attr('hidden',true);
        $('#esconder_form_edit').removeAttr('hidden');
        $("#form_edit_tramo").removeAttr('hidden');
        $("#delete_tramo").attr('hidden',true);
    });
    //boton para esconder el formulario de editar tramo
    $("#esconder_form_edit").click(function() {
        $("#edit_tramo").removeAttr('hidden');
        $("#form_edit_tramo").attr('hidden',true);
        $('#esconder_form_edit').attr('hidden',true);
        $("#delete_tramo").removeAttr('hidden');
    });
});
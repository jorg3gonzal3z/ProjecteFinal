function GetId(str){
    return str.split(':')[1];
}

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
        //al cambiar los datos del formulario comprueva si corresponde con las restricciones de la categoria y la autoselecciona
        
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
        thisId = GetId(thisId);
        $('#tramo\\:'+ thisId).attr('hidden',true);
        $("#esconder_form_edit\\:" + thisId).attr('hidden',false);
        $("#form_edit_tramo\\:"+ thisId).attr('hidden',false);
        $("#delete_tramo\\:"+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar tramo
        $("#esconder_form_edit\\:"+ thisId).click(function() {
            $("#edit_tramo\\:"+ thisId).attr('hidden',false);
            $("#form_edit_tramo\\:"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $('#tramo\\:'+ thisId).attr('hidden',false);
            $("#delete_tramo\\:"+ thisId).attr('hidden',false);
        });
    });

    //boton para mostrar formulario editar coche
    $(".editCarButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        $('#coche\\:'+ thisId).attr('hidden',true);
        $("#esconder_form_edit_coche\\:" + thisId).attr('hidden',false);
        $("#car_form_edit\\:"+ thisId).attr('hidden',false);
        $("#delete_coche\\:"+ thisId).attr('hidden',true);
        $('#coche_info\\:'+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar coche
        $("#esconder_form_edit_coche\\:"+ thisId).click(function() {
            $("#edit_coche\\:"+ thisId).attr('hidden',false);
            $("#car_form_edit\\:"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $('#coche\\:'+ thisId).attr('hidden',false);
            $("#delete_coche\\:"+ thisId).attr('hidden',false);
            $('#coche_info\\:'+ thisId).attr('hidden',false);
        });
    });

    //imagen vacia que abre el formulario de edicion del coche
    $('.add_image').click(function(){
        $(".editCarButton").attr('hidden',true);
        var thisId = $(this).parents("[id^=coche]").attr('id');
        console.log(thisId);
        thisId = GetId(thisId);
        $('#coche\\:'+ thisId).attr('hidden',true);
        $("#esconder_form_edit_coche\\:" + thisId).attr('hidden',false);
        $("#car_form_edit\\:"+ thisId).attr('hidden',false);
        $("#delete_coche\\:"+ thisId).attr('hidden',true);
        $('#coche_info\\:'+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar coche
        $("#esconder_form_edit_coche\\:"+ thisId).click(function() {
        $("#edit_coche\\:"+ thisId).attr('hidden',false);
        $("#car_form_edit\\:"+ thisId).attr('hidden',true);
        $(this).attr('hidden',true);
        $('#coche\\:'+ thisId).attr('hidden',false);
        $("#delete_coche\\:"+ thisId).attr('hidden',false);
        $('#coche_info\\:'+ thisId).attr('hidden',false);
        });

    });

    //boton para mostrar formulario editar evento
    $(".editButton").click(function() {
        $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        $("#evento\\:"+ thisId).attr('hidden',true);
        $("#esconder_form_edit\\:" + thisId).attr('hidden',false);
        $("#form_edit_evento\\:"+ thisId).attr('hidden',false);
        $("#delete_evento\\:"+ thisId).attr('hidden',true);

        //boton para esconder el formulario de editar evrnto
        $("#esconder_form_edit\\:"+ thisId).click(function() {
            $("#edit_evento\\:"+ thisId).attr('hidden',false);
            $("#form_edit_evento\\:"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $("#evento\\:"+ thisId).attr('hidden',false);
            $("#delete_evento\\:"+ thisId).attr('hidden',false);
        });
    });

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

    //boton para mostrar las caracteristicas de las categorias
    $('#ver_categorias').click(function(){
        $(this).attr('hidden',true);
        $('#categorias').attr('hidden',false);
        $('#caracteristicas_categorias').attr('hidden',false);
        $('#categorias').click(function(){
            $(this).attr('hidden',true);
            $('#ver_categorias').attr('hidden',false);
            $('#caracteristicas_categorias').attr('hidden',true);
        })
    });

    $('#car_form').change(function(e){

        var potencia = $('#potencia').val();
        var peso = $('#peso').val();
        var ano = $('#año').val();
        var tr = $('#tr').val();
        var cat = $('#cat').find(":selected").attr('name');
        var controlador_cat;
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var categorias_rallys = $.ajax({
            type: "GET",
            url: 'user/getCat',
            async: false,            
            success: function(data){
                
                data.forEach(function(value,index,array){
                   
                    if (cat == "Vehiculos-Historicos" && value.nomCategoria == "Vehiculos-Historicos"){
                        if (ano != "" && ano < value.any && (tr == "FWD" || tr == "RWD" ) ){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "RGT"  && value.nomCategoria == value.trenMotriu){
                        if (tr == "RWD" && peso > value.pesMin){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "Grupo-N"  && value.nomCategoria == "Grupo-N"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano < value.any && (tr == "FWD" || tr == "RWD" ) ){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "R1-Rally5" && value.nomCategoria == "R1-Rally5"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano >= value.any && tr == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "R2-R2T-Rally4" && value.nomCategoria == "R2-R2T-Rally4"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano >= value.any && tr == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "Rally3" && value.nomCategoria == "Rally3"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano >= value.any && tr == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "R5-Rally2" && value.nomCategoria == "R5-Rally2"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano >= value.any && tr == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }

                    if (cat == "WRC-Rally1" && value.nomCategoria == "WRC-Rally1"){
                        if (potencia <= value.potenciaMax && peso >= value.pesMin && ano >= value.any && tr == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat = false
                        }
                    }
                    
                })
            }
        })
        e.preventDefault();

        if(controlador_cat == false){
            $('#error_cat').attr('hidden',false);
            $('#error_cat').effect("shake", {times:3},900);
            $('#submit_car').prop('disabled', true);
        }else if(controlador_cat == true){
            $('#error_cat').attr('hidden',true);
            $('#submit_car').prop('disabled', false);
        }
        
        return false;
        
    });

});

function GetId(str){
    return str.split(':')[1];
}

$(document).ready(function(){
    
    
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

    // control de categoria al añadir el coche
    $('.car_form').change(function(e){

        var potencia = $('.potencia').val();
        var peso = $('.peso').val();
        var ano = $('.año').val();
        var tr = $('.tr').val();
        var cat = $('.cat').find(":selected").attr('name');
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

                    if (cat == "-- Selecciona una Categoria --"){
                        console.log("categoria incorrecta")
                        controlador_cat = false
                    }
                    
                })
            }
        })
        e.preventDefault();

        if(controlador_cat == false){
            $('.error_cat').attr('hidden',false);
            $('.error_cat').effect("shake", {times:1},900);
            $('.submit_car').prop('disabled', true);
        }else if(controlador_cat == true){
            $('.error_cat').attr('hidden',true);
            $('.submit_car').prop('disabled', false);
        }
        
        return false;
        
    });

    // control de categoria al editar el coche
    $('.edit_car_button').change(function(e){
        var thisId_edit = $(this).attr('id');
        thisId_edit = GetId(thisId_edit);
        var potencia_edit = $("#potencia_edit\\:"+ thisId_edit).val();
        var peso_edit = $("#peso_edit\\:"+ thisId_edit).val();
        var ano_edit = $("#año_edit\\:"+ thisId_edit).val();
        var tr_edit = $("#tr_edit\\:"+ thisId_edit).val();
        var cat_edit = $("#cat_edit\\:"+ thisId_edit).find(":selected").attr('name');
        var controlador_cat_edit;
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var controlador_cat_rally_edit = $.ajax({
            type: "GET",
            url: 'user/getCat',
            async: false,            
            success: function(data){
                
                data.forEach(function(value,index,array){
                   
                    if (cat_edit == "Vehiculos-Historicos" && value.nomCategoria == "Vehiculos-Historicos"){
                        if (ano_edit != "" && ano_edit < value.any && (tr_edit == "FWD" || tr_edit == "RWD" ) ){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "RGT"  && value.nomCategoria == value.trenMotriu){
                        if (tr_edit == "RWD" && peso_edit > value.pesMin){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "Grupo-N"  && value.nomCategoria == "Grupo-N"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit < value.any && (tr_edit == "FWD" || tr_edit== "RWD" ) ){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "R1-Rally5" && value.nomCategoria == "R1-Rally5"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit >= value.any && tr_edit == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "R2-R2T-Rally4" && value.nomCategoria == "R2-R2T-Rally4"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit >= value.any && tr_edit == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "Rally3" && value.nomCategoria == "Rally3"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit >= value.any && tr_edit == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "R5-Rally2" && value.nomCategoria == "R5-Rally2"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit >= value.any && tr_edit == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "WRC-Rally1" && value.nomCategoria == "WRC-Rally1"){
                        if (potencia_edit <= value.potenciaMax && peso_edit >= value.pesMin && ano_edit >= value.any && tr_edit == value.trenMotriu){
                            console.log("categoria correcta");
                            controlador_cat_edit = true
                        }else{
                            console.log("categoria incorrecta")
                            controlador_cat_edit = false
                        }
                    }

                    if (cat_edit == "-- Selecciona una Categoria --"){
                        console.log("categoria incorrecta")
                        controlador_cat_edit = false
                    }
                    
                })
            }
        })
        e.preventDefault();
        if(controlador_cat_edit == false){
            $("#error_cat_edit\\:"+ thisId_edit).attr('hidden',false);
            $("#error_cat_edit\\:"+ thisId_edit).effect("shake", {times:1},900);
            $("#error_cat_edit\\:"+ thisId_edit).prop('disabled', true);
            $("#submit_car_edit\\:"+ thisId_edit).prop('disabled', true);
        }else if(controlador_cat_edit == true){
            $("#error_cat_edit\\:"+ thisId_edit).attr('hidden',true);
            $("#submit_car_edit\\:"+ thisId_edit).prop('disabled', false);
        }
        
        return false;
        
    });


});

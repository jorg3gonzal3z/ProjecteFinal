function GetId(str){
    return str.split(':')[1];
}

var currentEdit;
var currentEditPicArray = [];

$(document).ready(function(){
    
    
    //imagenes del carrousel
    $('.carousel-inner').find('>:first-child').addClass('active');

    $('#v-pills-tabContent').find('>:first-child').addClass('active');

    //UPLOAD FILE + 5 IMAGE RESTRINCTION
    'use strict';

    ;( function ( document, window, index )
    {
        var inputs = document.querySelectorAll( '.inputfile' );
        Array.prototype.forEach.call( inputs, function( input )
        {
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;
    
            input.addEventListener( 'change', function( e )
            {
                if (parseInt($(this)[0].files.length)>6){
                    $(this).val(undefined);
                    swal('Oops...', '¡Solo puedes añadir 6 fotos!', 'error');

                }
                var fileName = '';
                if( this.files && this.files.length > 1 )
                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\\' ).pop();
    
                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                else
                    label.innerHTML = labelVal;
            });
    
            // Firefox bug fix
            input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
            input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
        });
    }( document, window, 0 ));
    
    
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

                    if (cat == "RGT"  && value.nomCategoria == "RGT"){
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

                    if (cat_edit == "RGT"  && value.nomCategoria == "RGT"){
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
            $("#error_cat_edit\\:"+ thisId_edit).prop('disabled', true);
            $("#submit_car_edit\\:"+ thisId_edit).prop('disabled', true);
        }else if(controlador_cat_edit == true){
            $("#error_cat_edit\\:"+ thisId_edit).attr('hidden',true);
            $("#submit_car_edit\\:"+ thisId_edit).prop('disabled', false);
        }
        
        return false;
        
    });

    //BOTON AÑADIR COCHE BLUR FIX
    $('.add_btn').click(function(){
        $(".car_card").css("backdrop-filter", "none");
        $("#modalAddCar").on("hidden.bs.modal", function () {
            $(".car_card").css("backdrop-filter", "blur( 15.0px )");
        });
        
    });


    //BOTON EDITAR COSAS BLUR FIX
    $('.edit_btn_modal').click(function(){
        var thisModal = $(this).attr('id');
        thisModal = GetId(thisModal);
        $(".card-container").css("backdrop-filter", "none");


        $("#modaltramo"+thisModal).on("hidden.bs.modal", function () {
            $(".card-container").css("backdrop-filter", "blur(15.0px)");
        });

        $("#modalrally"+thisModal).on("hidden.bs.modal", function () {
            $(".card-container").css("backdrop-filter", "blur(15.0px)");
        });

        $("#modalevent"+thisModal).on("hidden.bs.modal", function () {
            $(".card-container").css("backdrop-filter", "blur(15.0px)");
        });
        $("#modalcar"+thisModal).on("hidden.bs.modal", function () {
            $(".card-container").css("backdrop-filter", "blur(15.0px)");
        });
    });


    $(".edit-car-btn").click(function() {
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        currentEdit = thisId;
        currentEditPicArray = [];

        console.log(currentEdit);
        //saber cuantas fotos tiene un tramo
        //se guarda el id del tramo y el id de la foto para eliminarlos posteriormente
        $('*[class^="img_edit"]').unbind().click(function(){
            $(this).off();
            $(this).fadeOut(800);
            let id_foto = $(this).find("#foto_id").html();
            currentEditPicArray.push(id_foto);
            $("#imagenes_a_eliminar_car\\:"+thisId).val(currentEditPicArray);
            console.log(currentEditPicArray);


        });
    });

    $(".edit-rally-btn").click(function() {
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        currentEdit = thisId;
        currentEditPicArray = [];

        console.log(currentEdit);
        //saber cuantas fotos tiene un tramo
        //se guarda el id del tramo y el id de la foto para eliminarlos posteriormente
        $('*[class^="img_edit"]').unbind().click(function(){
            $(this).off();
            $(this).fadeOut(800);
            let id_foto = $(this).find("#foto_id").html();
            currentEditPicArray.push(id_foto);
            $("#imagenes_a_eliminar_rally\\:"+thisId).val(currentEditPicArray);
            console.log(currentEditPicArray);


        });
    });

    $(".edit-tramo-btn").click(function() {
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        currentEdit = thisId;
        currentEditPicArray = [];

        console.log(currentEdit);
        //saber cuantas fotos tiene un tramo
        //se guarda el id del tramo y el id de la foto para eliminarlos posteriormente
        $('*[class^="img_edit"]').unbind().click(function(){
            $(this).off();
            $(this).fadeOut(800);
            let id_foto = $(this).find("#foto_id").html();
            currentEditPicArray.push(id_foto);
            $("#imagenes_a_eliminar_tramo\\:"+thisId).val(currentEditPicArray);
            console.log(currentEditPicArray);


        });
    });

});

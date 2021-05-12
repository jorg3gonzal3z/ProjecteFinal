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

        //boton para esconder el formulario de editar coche
        $("#esconder_form_edit_coche\\:"+ thisId).click(function() {
            $("#edit_coche\\:"+ thisId).attr('hidden',false);
            $("#car_form_edit\\:"+ thisId).attr('hidden',true);
            $(this).attr('hidden',true);
            $('#coche\\:'+ thisId).attr('hidden',false);
            $("#delete_coche\\:"+ thisId).attr('hidden',false);
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
        var cat = $('#cat').val();

        // console.log(potencia,peso,ano,tr);

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
                // console.log(data);
                data.forEach(function(value,index,array){

                    console.log('///////comprovar categoria: '+value.nomCategoria+'///////')
                    //año
                    console.log('--Año--')
                    if (value.nomCategoria == 'Vehiculos-Historicos' && ano < value.any){
                        console.log('Es un vehiculo historico, cumple la condicion.')
                        if (cat == value.id){
                            console.log("Categoria seleccionada correctamente.")
                        }else{
                            console.log("Categoria mal seleccionada.")
                        }
                    }
                    // if (ano < value.any){
                    //     console.log(value.nomCategoria + ':es de un año superior, cat inorrecta')
                    // }else{
                    //     console.log(value.nomCategoria + ':el año esta correcto, cat correcta')
                    // }

                    //tren motriz
                    console.log('--Tren Motriz--')
                    if (tr != value.trenMotriu){
                        console.log(value.nomCategoria + ':es de un tr diferente, cat incorrecta')
                    }else{
                        console.log(value.nomCategoria + ':el tr es igual, cat correcta')
                    }
                    //potencia
                    console.log('--Potencia--')
                    if (potencia < value.potenciaMax){
                        console.log(value.nomCategoria + ':es de una potencia superior, cat correcta')
                    }else{
                        console.log(value.nomCategoria + ':es de una potencia inferior, cat incorrecta')
                    }
                    //peso
                    console.log('--Peso--')
                    if (peso > value.pesMin){
                        console.log(value.nomCategoria + ':es de un peso superior, cat incorrecta')
                    }else{
                        console.log(value.nomCategoria + ':es de una peso superior, cat correcta')
                    }

                })
            }
        })
        e.preventDefault();
        return false;
   
    });

});

function GetId(str){
    return str.split(':')[1];
}
var currentEdit;
var currentEditPicArray = [];
var isCurrentlyEditing = false;

$(document).ready(function(){
    
    //boton para mostrar formulario editar tramo
    $(".editButton").click(function() {
        if(isCurrentlyEditing){
            return {
                error: true,
                message: 'Nomes pots editar un tram a l\'hora noi'
              }
        }
        isCurrentlyEditing = true;
        // $(this).attr('hidden',true);
        var thisId = $(this).attr('id');
        thisId = GetId(thisId);
        currentEdit = thisId;
        currentEditPicArray = [];

        //saber cuantas fotos tiene un tramo
        //se guarda el id del tramo y el id de la foto para eliminarlos posteriormente
        $('*[class^="img_edit"]').unbind().click(function(){
            $(this).off();
            $(this).fadeOut(800);
            let id_foto = $(this).find("#foto_id").html();
            currentEditPicArray.push(id_foto);
            $("#imagenes_a_eliminar\\:"+thisId).val(currentEditPicArray);
            console.log(currentEditPicArray);
            console.log($("#imagenes_a_eliminar\\:"+thisId).val());
        });
    
        //boton para esconder el formulario de editar tramo
        $("#esconder_form_edit\\:"+ thisId).click(function() {
            isCurrentlyEditing = false;

            $(this).attr('hidden',true);
            $('#container_edit\\:'+ thisId).fadeOut(800, function(){
                $("#edit_tramo\\:"+ thisId).attr('hidden',false);
                $("#form_edit_tramo\\:"+ thisId).attr('hidden',true);
                $("#delete_tramo\\:"+ thisId).attr('hidden',false);
                $('#tramo\\:'+ thisId).attr('hidden',false);
            });
        });
    });

    //imagenes del carrousel bug fix
    $('.carousel-inner').find('>:first-child').addClass('active');

    //reemplaza las dos && guardadas en la bd por icono de flecha
    var totesAdresses = $('.mostraAdressa'); 
    totesAdresses.each(function(index, element){
        $( element ).html($( element ).text().replace(/[&]{2}/g,'<i class="fa fa-arrow-right" aria-hidden="true"></i>'));
    });

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

    $('.search-filter').on('keyup', function() {
        var input = $('.search-filter').val();
        var filter = input;

        if (filter.length == 0) { // show all if filter is empty
            $('a').each(function() {
                $(this).show(); // show links
            });
            return;
        } else {
        console.log(filter); //MP
            $('a').removeClass('collapsed');
            $('a').each(function() {
                $(this).hide(); // hide all links once search is begun
            });

            $('a:contains(' + filter + ')').each(function() {
                $(this).removeClass('collapsed'); // remove bootstrap 4 collapsed class designation
                $(this).show(); // show only matched links to search string?

            });
        }
    });
    

  
});


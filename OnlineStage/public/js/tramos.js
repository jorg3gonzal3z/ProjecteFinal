function GetId(str){
    return str.split(':')[1];
}
var currentEdit;
var currentEditPicArray = [];
var filterOn = false;
$(document).ready(function(){
    
    //boton para mostrar formulario editar tramo
    $(".editButton").click(function() {
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

    $('.add_btn').click(function(){
        $(".solo-blur").css("backdrop-filter", "none");
        $("#modalAfegir").on("hidden.bs.modal", function () {
            $(".solo-blur").css("backdrop-filter", "blur( 15.0px )");
        });
    });

    //BOTON EDITAR TRAMO BLUR FIX
    $('.editButton').click(function(){
        var thisModal = $(this).attr('id');
        thisModal = GetId(thisModal);

        var thisCard = $(this).parents(".card");
        thisCard.css("backdrop-filter", "none");

        
        $("#modal"+thisModal).on("hidden.bs.modal", function () {
            thisCard.css("backdrop-filter", "blur( 15.0px )");
        });
            console.log(thisModal);
    });

    

});


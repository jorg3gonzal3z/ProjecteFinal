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
                if (parseInt($(this)[0].files.length)>1){
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

});
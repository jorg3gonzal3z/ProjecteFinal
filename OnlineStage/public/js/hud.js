$(document).ready(function(){
    (function ($) {
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').click(function(){
        $('html, body').animate({scrollTop : 0},600);
        return false;
    });
    
    })(jQuery);

    // $('.carousel-inner').each(function() {

    //     var maxWidth = 500; // Max width for the image
    //     var maxHeight = 800;    // Max height for the image
    //     var ratio = 0;  // Used for aspect ratio
    //     var width = $(this).width();    // Current image width
    //     var height = $(this).height();  // Current image height
    
    //     // Check if the current width is larger than the max
    //     if(width > maxWidth){
    //         ratio = maxWidth / width;   // get ratio for scaling image
    //         $(this).css("width", maxWidth); // Set new width
            
    //         $(this).css("height", height * ratio);  // Scale height based on ratio
    //         height = height * ratio;    // Reset height to match scaled image
    //     }
    
    //     var width = $(this).width();    // Current image width
    //     var height = $(this).height();  // Current image height
    
    //     // Check if current height is larger than max
    //     if(height > maxHeight){
    //         ratio = maxHeight / height; // get ratio for scaling image
    //         $(this).css("height", maxHeight);   // Set new height
    //         $(this).css("width", width * ratio);    // Scale width based on ratio
    //         width = width * ratio;    // Reset width to match scaled image
    //     }
        
    // });
});
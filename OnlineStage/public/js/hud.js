$(window).load(function() {
    $('#loading').hide();
});
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


    if(getCookie("laravel_cookie_consent")){
        $(".cukis").remove();
    }else{
        $(".cukis").fadeIn();
    }
});

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
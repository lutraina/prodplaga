
jQuery("document").ready(function($){
    $('.logo-nav').hide();
    var nav = $('.nav-total');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 310) {
            nav.addClass("f-nav");
             $('.logo-nav').show();
        } else {
            nav.removeClass("f-nav");
             $('.logo-nav').hide();
        }
    });
 
});
jQuery("document").ready(function($){
    
    var title = $('.Title-PageAccueil');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 1080) {
            title.addClass("new-Title-PageAccueil");
        } else {
            title.removeClass("new-Title-PageAccueil");
        }
    });
 
});
jQuery(document).ready(function($){
    $('.lmhcustom-nav-toggle').on('click', function(){
        if($(this).children(':first-child').html() == "Show Menu"){
            $(this).children(':first-child').html("Hide Menu");
        }
        else{
            $(this).children(':first-child').html("Show Menu");
        
        }
    });
});

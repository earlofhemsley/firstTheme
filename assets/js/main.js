$('.lmhcustom-nav-toggle').on('click', function(){
    if($(this).children(':first-child').html() == "Show Menu"){
        $(this).children(':first-child').html("Hide Menu");
    }
    else{
        $(this).children(':first-child').html("Show Menu");
    
    }
});

$(document).ready(function(){
    var wrapper = $("#wrapper:hidden");
    if(wrapper != null){
        wrapper.delay(200).fadeIn();
    }
});

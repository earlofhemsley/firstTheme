var scrollTo = function(selector){
    $('html,body').animate(
        {scrollTop : $(selector).offset().top},
        '1000'    
    );
}

var resize = function(){
    var sections = document.getElementsByClassName("home-section");
    for(var i = 0; i<sections.length; i++){
        sections[i].style.height = window.innerHeight + "px";
    }
    if(window.innerHeight > 440){
        document.getElementById("home-leadbox").style.top = (0.25 * window.innerHeight) + "px";
    }
    else{
        document.getElementById("home-leadbox").style.top =  "10px";
    }
}



$(document).ready(function(){
    resize();
    var wrapper = $("#wrapper:hidden");
    if(wrapper != null){
        wrapper.delay(200).fadeIn();
    }

    $('.lmhcustom-nav-toggle').on('click', function(){
        if($(this).children(':first-child').html() == "Show Menu"){
            $(this).children(':first-child').html("Hide Menu");
        }
        else{
            $(this).children(':first-child').html("Show Menu");
        
        }
    });
    
    window.onresize = resize;


});

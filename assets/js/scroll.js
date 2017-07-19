$(document).ready(function(){
    $('a.scrollable').on('click',function(){
        var selector = $(this).data('destination');
        $('html,body').animate(
            {scrollTop : $(selector).offset().top},
            '1000'    
        );
    });
});

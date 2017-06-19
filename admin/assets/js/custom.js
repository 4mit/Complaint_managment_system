$('#listAll').click(function(){
    console.log('working...');
    var data = "fetchdata=t";
    $.ajax({
        url:'fetchdata.php',
        method:'POST',
        data:data,
        success:function(response){
            $('#renderTable').html(response).addClass('animated bounceInDown');
        },
        error:function(response){}
    });
});

(function ($) {
    "use strict";
    var mainApp = {
        main_fun: function () {
            $('#main-menu').metisMenu();
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });
           
}(jQuery));
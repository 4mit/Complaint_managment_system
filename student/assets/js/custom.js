
window.onload = function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }


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

         
            /*====================================
          MORRIS DONUT CHART
       ======================================*/
            Morris.Bar({
              element: 'bar-example',
              data: [
                { y: '2006', a: 100 },
                { y: '2007', a: 75},
                { y: '2008', a: 50},
                { y: '2009', a: 75},
                { y: '2010', a: 50},
                { y: '2011', a: 75},
                { y: '2012', a: 75},
                { y: '2013', a: 75},
                { y: '2014', a: 75},
                { y: '2015', a: 100}
              ],
              xkey: 'y',
              ykeys: ['a'],
              labels: ['Series A']
            });
            /*====================================
    MORRIS LINE CHART
 ======================================*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                }, {
                    y: '2007',
                    a: 75,
                    b: 65
                }, {
                    y: '2008',
                    a: 50,
                    b: 40
                }, {
                    y: '2009',
                    a: 75,
                    b: 65
                }, {
                    y: '2010',
                    a: 50,
                    b: 40
                }, {
                    y: '2011',
                    a: 75,
                    b: 65
                }, {
                    y: '2012',
                    a: 100,
                    b: 90
                }],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B'],
                hideHover: 'auto',
                resize: true
            });
           
     
        },

        initialization: function () {
           mainApp.main_fun();
        }
    }
    $(document).ready(function () {
        mainApp.main_fun();
    });
}(jQuery));

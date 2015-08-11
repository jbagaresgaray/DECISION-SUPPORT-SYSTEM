/*=============================================================
    Authour URI: www.binarycart.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function($) {
    "use strict";
    var mainApp = {

            main_fun: function() {
                /*====================================
                METIS MENU 
                ======================================*/
                $('#main-menu').metisMenu();

                /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
                $(window).bind("load resize", function() {
                    if ($(this).width() < 768) {
                        $('div.sidebar-collapse').addClass('collapse')
                    } else {
                        $('div.sidebar-collapse').removeClass('collapse')
                    }
                });

                /*====================================
            MORRIS BAR CHART
         ======================================*/
                Morris.Bar({
                    element: 'morris-bar-chart',
                    data: [{
                        y: 'Dian-ay',
                        a: 100
                    }, {
                        y: 'Magsaysay',
                        a: 75

                    }, {
                        y: 'Tamlang',
                        a: 50
                    }, {
                        y: 'Paitan',
                        a: 75
                    }, {
                        y: 'palasibog',
                        a: 50
                    }],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Child Number'],
                    hideHover: 'auto',
                    resize: true
                });

                Morris.Bar({
                    element: 'morris-bar-chart1',
                    data: [{
                        y: 'Dian-ay',
                        a: 100
                    }, {
                        y: 'Magsaysay',
                        a: 75

                    }, {
                        y: 'Tamlang',
                        a: 50
                    }, {
                        y: 'Paitan',
                        a: 75
                    }, {
                        y: 'palasibog',
                        a: 50
                    }],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Child Number'],
                    hideHover: 'auto',
                    resize: true
                });
                Morris.Bar({
                    element: 'morris-bar-chart2',
                    data: [{
                        y: '1',
                        a: 100
                    }, {
                        y: '2',
                        a: 75

                    }, {
                        y: '3',
                        a: 50
                    }, {
                        y: '4',
                        a: 75
                    }, {
                        y: '5',
                        a: 50
                    }],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Child Number'],
                    hideHover: 'auto',
                    resize: true
                });
                Morris.Bar({
                    element: 'morris-bar-chart3',
                    data: [{
                        y: 'Dian-ay',
                        a: 100
                    }, {
                        y: 'Magsaysay',
                        a: 75

                    }, {
                        y: 'Tamlang',
                        a: 50
                    }, {
                        y: 'Paitan',
                        a: 75
                    }, {
                        y: 'palasibog',
                        a: 50
                    }],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Child Number'],
                    hideHover: 'auto',
                    resize: true
                });

                /*====================================
          MORRIS DONUT CHART
       ======================================*/
                Morris.Donut({
                    element: 'morris-donut-chart',
                    data: [{
                        label: "Download Sales",
                        value: 12
                    }, {
                        label: "Total",
                        value: 30
                    }, {
                        label: "Mail-Order Sales",
                        value: 20
                    }],
                    resize: true
                });

                /*====================================
         MORRIS AREA CHART
      ======================================*/

                Morris.Area({
                    element: 'morris-area-chart',
                    data: [{
                        period: '2010 Q1',
                        iphone: 2666,
                        ipad: null,
                        itouch: 2647
                    }, {
                        period: '2010 Q2',
                        iphone: 2778,
                        ipad: 2294,
                        itouch: 2441
                    }, {
                        period: '2010 Q3',
                        iphone: 4912,
                        ipad: 1969,
                        itouch: 2501
                    }, {
                        period: '2010 Q4',
                        iphone: 3767,
                        ipad: 3597,
                        itouch: 5689
                    }, {
                        period: '2011 Q1',
                        iphone: 6810,
                        ipad: 1914,
                        itouch: 2293
                    }, {
                        period: '2011 Q2',
                        iphone: 5670,
                        ipad: 4293,
                        itouch: 1881
                    }, {
                        period: '2011 Q3',
                        iphone: 4820,
                        ipad: 3795,
                        itouch: 1588
                    }, {
                        period: '2011 Q4',
                        iphone: 15073,
                        ipad: 5967,
                        itouch: 5175
                    }, {
                        period: '2012 Q1',
                        iphone: 10687,
                        ipad: 4460,
                        itouch: 2028
                    }, {
                        period: '2012 Q2',
                        iphone: 8432,
                        ipad: 5713,
                        itouch: 1791
                    }],
                    xkey: 'period',
                    ykeys: ['iphone', 'ipad', 'itouch'],
                    labels: ['iPhone', 'iPad', 'iPod Touch'],
                    pointSize: 2,
                    hideHover: 'auto',
                    resize: true
                });
                // datepicker



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

            initialization: function() {
                mainApp.main_fun();

            }

        }
        // Initializing ///

    $(document).ready(function() {
        mainApp.main_fun();
    });

}(jQuery));

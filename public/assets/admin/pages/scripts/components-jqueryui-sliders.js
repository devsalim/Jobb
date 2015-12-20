
var ComponentsjQueryUISliders = function () {

    return {
        //main function to initiate the module
        init: function () {

                minSal = 0,
                maxSal = 0,
                minExp = 0,
                maxExp = 0;
                var saveExp = function (data) {
                    minExp = data.fromNumber;
                    maxExp = data.toNumber;
                };
                 var saveSal = function (data) {
                    minSal = data.fromNumber;
                    maxSal = data.toNumber;
                };
                var writeExp = function () {
                    $(".min-exp").val(minExp);
                    $(".max-exp").val(maxExp);
                };
                var writeSalary = function () {
                    $(".min-sal").val(minSal);
                    $(".max-sal").val(maxSal);
                };

                // onLoad: function (data) {
                //     saveSal(data);
                //     writeSalary();
                // },
                // onChange: saveSal,
                // onFinish: writeSalary,


            // basic
            $(".slider-basic").slider(); // basic sliders
             // vertical range sliders
            $("#slider-range").slider({
                isRTL: Metronic.isRTL(),
                range: true,
                values: [17, 67],
                slide: function (event, ui) {
                    $("#slider-range-amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            
            // snap inc
            $("#slider-snap-inc").slider({
                isRTL: Metronic.isRTL(),
                value: 100,
                min: 0,
                max: 1000,
                step: 100,
                slide: function (event, ui) {
                    $("#slider-snap-inc-amount").text("$" + ui.value);
                }
            });

            $("#slider-snap-inc-amount").text("$" + $("#slider-snap-inc").slider("value"));

            // range slider
            $("#slider-range").slider({
                isRTL: Metronic.isRTL(),
                range: true,
                min: 0,
                max: 50000,
                step: 500,
                values: [100, 5000],

                slide: function (event, ui) {
                    $("#slider-range-amount").text("Min-Sal Rs " + ui.values[0] + " - Max-Sal Rs " + ui.values[1]);
                }

            });

    //                    $( "#amount1" ).val( "THB " + ui.values[ 0 ] );
    //         $( "#amount2" ).val( "THB " + ui.values[ 1 ] );
    //         var price1 = ui.values[ 0 ];
    //         var price2 = ui.values[ 1 ];
    //         //alert(price1 + " " + price2); 
    //         $( "#price1" ).value = price1;
    //     }
    // });
    // $( "#amount1" ).val( "THB " + $( "#sliderranger" ).slider( "values", 0 ));
    // $( "#amount2" ).val( "THB " + $( "#sliderranger" ).slider( "values", 1 ));

            $("#slider-range-amount").text("Min-Sal Rs " + $("#slider-range").slider("values", 0) + " - Max-Sal Rs " + $("#slider-range").slider("values", 1));
            
            // range slider
            $("#slider-range-exp").slider({
                isRTL: Metronic.isRTL(),
                range: true,
                min: 0,
                max: 15,
                step: 1,
                values: [0, 2],

                slide: function (event, ui) {
                    $("#slider-range-amount-exp").text("Min-Exp " + ui.values[0] + " - Max-Exp " + ui.values[1]);
                }

            });

            $("#slider-range-amount-exp").text("Min-Exp " + $("#slider-range-exp").slider("values", 0) + " - Max-Exp " + $("#slider-range-exp").slider("values", 1));
            
            
            //range max
            
            $("#slider-range-max").slider({
                isRTL: Metronic.isRTL(),
                range: "max",
                min: 0,
                max: 15,
                step: 0.5,
                slide: function (event, ui) {
                    $("#slider-range-max-amount").text(ui.value);
                }
            });

            $("#slider-range-max-amount").text($("#slider-range-max").slider("value"));

            // range min
            $("#slider-range-min").slider({
                isRTL: Metronic.isRTL(),
                range: "min",
                value: 37,
                min: 1,
                max: 700,
                slide: function (event, ui) {
                    $("#slider-range-min-amount").text("$" + ui.value);
                }
            });

            $("#slider-range-min-amount").text("$" + $("#slider-range-min").slider("value"));

            // vertical slider
            $("#slider-vertical").slider({
                isRTL: Metronic.isRTL(),
                orientation: "vertical",
                range: "min",
                min: 0,
                max: 100,
                value: 60,
                slide: function (event, ui) {
                    $("#slider-vertical-amount").text(ui.value);
                }
            });
            $("#slider-vertical-amount").text($("#slider-vertical").slider("value"));

            // vertical range sliders
            $("#slider-range-vertical").slider({
                isRTL: Metronic.isRTL(),
                orientation: "vertical",
                range: true,
                values: [17, 67],
                slide: function (event, ui) {
                    $("#slider-range-vertical-amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });

            $("#slider-range-vertical-amount").text("$" + $("#slider-range-vertical").slider("values", 0) + " - $" + $("#slider-range-vertical").slider("values", 1));

        }

    };

}();
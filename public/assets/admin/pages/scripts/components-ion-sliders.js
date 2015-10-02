var ComponentsIonSliders = function () {
// var $range = $(".js-range-slider"),
//     $result = $(".js-result"),
//     $getvalues = $(".js-get-values"),

//     from = 0,
//     to = 0;

// var saveResult = function (data) {
//     from = data.fromNumber;
//     to = data.toNumber;
// };

// var writeResult = function () {
//     var result = "from: " + from + ", to: " + to;
//     $result.html(result);
// };

// $range.ionRangeSlider({
//     type: "double",
//     min: 10,
//     max: 50,
//     from: from,
//     to: to,
//     onLoad: function (data) {
//         saveResult(data);
//         writeResult();
//     },
//     onChange: saveResult,
//     onFinish: saveResult
// });

// $getvalues.on("click", writeResult);
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


            $("#range_1").ionRangeSlider({
                min: 0,
                max: 15,
                from: 2,
                to: 5,
                type: 'double',
                step: 1,
                postfix: "",
                prettify: false,
                hasGrid: true,
                onLoad: function (data) {
                    saveExp(data);
                    writeExp();
                },
                onChange: saveExp,
                onFinish: writeExp
            });
            $("#range_7").ionRangeSlider({
                min: 5000,
                max: 50000,
                from: 5000,
                to: 10000,
                type: 'double',
                step: 5000,
                postfix: "+",
                prettify: false,
                hasGrid: true,
                onLoad: function (data) {
                    saveSal(data);
                    writeSalary();
                },
                onChange: saveSal,
                onFinish: writeSalary
            });    

            // $("#range_2").ionRangeSlider();

            // $("#range_5").ionRangeSlider({
            //     min: 0,
            //     max: 10,
            //     type: 'single',
            //     step: 0.1,
            //     postfix: " mm",
            //     prettify: false,
            //     hasGrid: true
            // });

            // $("#range_6").ionRangeSlider({
            //     min: -50,
            //     max: 50,
            //     from: 0,
            //     type: 'single',
            //     step: 1,
            //     postfix: "°",
            //     prettify: false,
            //     hasGrid: true
            // });

            // $("#range_4").ionRangeSlider({
            //     type: "single",
            //     step: 100,
            //     postfix: " light years",
            //     from: 55000,
            //     hideText: true
            // });
            
            // $("#range_3").ionRangeSlider({
            //     type: "double",
            //     postfix: " miles",
            //     step: 10000,
            //     from: 25000000,
            //     to: 35000000,
            //     onChange: function(obj){
            //         var t = "";
            //         for(var prop in obj) {
            //             t += prop + ": " + obj[prop] + "\r\n";
            //         }
            //         $("#result").html(t);
            //     }
            // });

            // $("#updateLast").on("click", function(){

            //     $("#range_3").ionRangeSlider("update", {
            //         min: Math.round(10000 + Math.random() * 40000),
            //         max: Math.round(200000 + Math.random() * 100000),
            //         step: 1,
            //         from: Math.round(40000 + Math.random() * 40000),
            //         to: Math.round(150000 + Math.random() * 80000)
            //     });

            // });
            
        }

    };

}();
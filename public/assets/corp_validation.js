 $(document).ready(function () {            
    //validation rules
    var form = $('#corp_firm_validation');
    var error = $('.alert-danger', form);
    var success = $('.alert-success', form);
    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            industry : {
                required : true
            },
            operating_since : {
                required : true
            },
            firm_name : {
                required : true
            },
            linked_skill: {
                required : true
            },
            firm_type: {
                required : true
            }
        },
        messages: {
            industry: {
                required: "Select Industry"
            },
            operating_since: {
                required: "Select Operating Since"
            },
            firm_name: {
                required: "Enter Firm Name"
            },
            linked_skill: {
                required: "Enter Work Area"
            },
            firm_type: {
                required: "Enter Firm Type"
            } 
        },
            invalidHandler: function (event, validator) { //display error alert on form submit   
            success.hide();
            error.show();
            Metronic.scrollTo(error, -200);
        },

             highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
            unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
         },
    });
});



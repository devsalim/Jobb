 $(document).ready(function () {            
    //validation rules
    var form = $('#ind_validation');
    var error = $('.alert-danger', form);
    var success = $('.alert-success', form);
    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            education : {
                required : true
            },
            branch : {
                required : true
            },
            dob : {
                required : true
            },
            city : {
                required : true
            },
            state : {
                required : true
            },
            linked_skill : {
                required : true
            },
            prefered_location: {
                required: true
            },
            prefered_jobtype : {
                required : true
            }
        },
        messages: {
            education: {
                required: "Select Education"
            },
            branch: {
                required: "Select Branch"
            },
            dob: {
                required: "Enter Date of Birth"
            },
            city: {
                required: "Enter current City"
            },
            state: {
                required: "Select State"
            },
            linked_skill: {
                required: "Add SKills"
            },
            prefered_location: {
                required: "Select Prefered Location"
            },
            prefered_jobtype: {
                required: "Select Job Type"
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
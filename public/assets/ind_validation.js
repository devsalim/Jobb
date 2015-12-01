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
        ignore: [],
        rules: {
            education : {
                required : true
            },
            about_individual: {
                // maxlength: 1000
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
            },
            resume: {
                required: false,
                extension: 'docx|doc|pdf|rtf'
            }
        },
        messages: {
            education: {
                required: "Select Education"
            },
            about_individual: {
                // maxlength: "Maximum 1000 character only"
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
            },
            resume:{
                extension: "Upload only pdf or word files"
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

$(document).ready(function () {            
//validation rules
    var form = $('#profile_validation');
    var error = $('.alert-danger', form);
    var success = $('.alert-success', form);
    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            fname : {
                required : true,
                minlength: 3
            },
            lname : {
                required : true
            }
        },
        messages: {
            fname: {
                required: "Enter First Name",
                minlength: "Enter minimum 3 character"
            },
           lname: {
                required: "Enter Last Name"
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

 
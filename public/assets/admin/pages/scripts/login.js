var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                remember: {
                    required: false
                }
            },

            messages: {
                email: {
                    required: "Email or mobile no is required."
                },
                password: {
                    required: "Password is required.",
                    minlength: "Minimum 6 lenght is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });
        jQuery('.login-form-corp').hide();
         jQuery('#logincorporate').click(function() {
            jQuery('.login-form').hide();
            jQuery('.login-form-corp').show();
        });
         jQuery('#loginindividual1').click(function() { 
           
            jQuery('.login-form').show();
             jQuery('.login-form-corp').hide();
        });
        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }
    
    
    var handleLogincorp = function() {

        $('.login-form-corp').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                remember: {
                    required: false
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                },
                password: {
                    required: "Password is required.",
                    minlength: "Minimum 6 lenght is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form-corp')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit(); // form validation success, call ajax form submit
            }
        });

       
        $('.login-form-corp input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form-corp').validate().form()) {
                    $('.login-form-corp').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
        
    }
    
    
    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },

            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#forget-password-corp').click(function() {
            jQuery('.login-form-corp').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    }

    var handleRegister = function() {

        function format(state) {
            if (!state.id) return state.text; // optgroup
            return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
        }
       
        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                fname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: '/UserController.php' + $('#email_address').val()
                },
                mobile: {
                    required: false,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 6
                },
                rpassword: {
                    equalTo: "#register_password",
                },
                tnc: {
                    required: true
                }
            },

            messages: { // custom messages for radio buttons and checkboxes
                fname: {
                    required: "Full name is required"
                },
                email: {
                    required: "Email Id or Mobile No is required",
                    remote: "Email Id is already Registered"
                },
                mobile: {
                    required:   "Mobile no. is required",
                    minlength:  "Minimum 10 length is required",
                    maxlength:  "Maximum 10 length is required"
                },
                password: {
                    required: "Password is required",
                    minlength: "Minimum 6 lenght is required."
                },
                rpassword: {
                    equalTo: "Please enter the same password again"
                },
                tnc: {
                    required: "Please accept TNC first"
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                    $('.register-form').reset();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });
            
            jQuery('#corporate1').click(function() {
            jQuery('.register-corporate-form').show();
            jQuery('.register-form').hide();
        });
            jQuery('#individual2').click(function() {
            jQuery('.register-form').show();
            jQuery('.register-corporate-form').hide();
        });
        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
        
    }

    var handleCorporateRegister = function() {

        $('.register-corporate-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                firm_name: {
                    required: true
                },
                firm_email_id: {
                    required: true,
                    email: true
                },
                firm_password: {
                    required: true,
                    minlength: 6
                },
                rpassword: {
                    equalTo: "#com_reg_password"
                },
                firm_type: {
                    required: true
                },
                ctnc: {
                    required: true
                },
            },

            messages: { // custom messages for radio buttons and checkboxes
                firm_name: {
                    required: "Company name is required"
                },
                firm_email_id: {
                    required: "Email is required"
                },
                firm_password: {
                    required: "Password is required",
                    minlength: "Minimum 6 lenght is required."
                },
                rpassword: {
                    required: "Please enter the same password again"
                },
                firm_type: {
                    required: "Firm type is requied"
                },
                ctnc: {
                    required: "Please accept TNC first"
                },
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "ctnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_ctnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else if (element.attr("name") == "radio2") { // insert checkbox errors after the container                  
                    error.insertAfter($('#radio_error'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        jQuery('#individual2').click(function() {
            jQuery('.register-form').show();
            jQuery('.register-corporate-form').hide();
        });
         jQuery('#register-btn-corp').click(function() {
            jQuery('.register-corporate-form').show();
            jQuery('.login-form-corp').hide();
        });
        jQuery('#register-back-btn3').click(function() {
            jQuery('.login-form-corp').show();
            jQuery('.register-corporate-form').hide();
        });
    }


    return {
        //main function to initiate the module
        init: function() {
            handleLogin();
            handleLogincorp();
            handleForgetPassword();
            handleRegister();
            handleCorporateRegister();
        }
    };

}();
var Individual = function() {

    var handleIndividual = function() {

        $('.prof_detail').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                education: {
                    required: true
                },
                branch: {
                    required: true
                },
                role: {
                    required: true
                },
                linked_skill: {
                    required: true
                },
                Job_Category: {
                    required: false
                }
            },


            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.prof_detail')).show();
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
        $('.prof_detail input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.prof_detail').validate().form()) {
                    $('.prof_detail').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
    }
    return {
        //main function to initiate the module
        init: function() {
            handleIndividual();
        }
    };
}
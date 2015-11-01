 $(document).ready(function () {
                
                //validation rules
                $("#ind_validation").validate({
                    onkeyup: false,
                    onfocusout: false,
                    errorElement: "div",
                    errorPlacement: function(error, element) {
                        error.appendTo("div#errors2");
                    }, 
                    rules: {
                        "education" : {
                            required : true
                        },
                        "branch" : {
                            required : true
                        },
                        "city" : {
                            required : true
                        },
                        "state" : {
                            required : true
                        },
                        "linked_skill" : {
                            required : true
                        },
                        "prefered_location" : {
                            required : true
                        },
                        "prefered_jobtype" : {
                            required : true
                        }
                    },
                    messages: {
                        "education": {
                            required: "Select Education"
                        },
                        "branch": {
                            required: "Select Branch"
                        },
                        "city": {
                            required: "Enter current City"
                        },
                        "state": {
                            required: "Select State"
                        },
                        "linked_skill": {
                            required: "Enter SKills"
                        },
                        "prefered_location": {
                            required: "Select Prefered Location for Job"
                        },
                        "prefered_jobtype": {
                            required: "Select Job Type"
                        }  
                    }
                });
            });
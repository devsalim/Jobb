@extends('master')

@section('content')
<?php $selected = 'selected'; ?> 
<div class="portlet light bordered" style="border: 1px solid #e1e1e1 !important;">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Firm Details</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/corporate/basicupdate') }}" id="corp_firm_validation" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
						<div class="row">
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Firm Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-font" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="firm_name" class="form-control" placeholder="Firm Name" value="{{ $user->firm_name }}">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">								
									<label>Slogan</label>										
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-comment-o" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="slogan" class="form-control" value="{{ $user->slogan }}" placeholder="Enter Company Slogan">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">								
									<label>About Firm</label>										
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-institution" style="color:darkcyan;"></i>
										</span>
										<textarea name="about_firm" class="form-control autosizeme" rows="3">{{ $user->about_firm }}</textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Firm Type</label>
									<div class="input-group">
											<div class="md-radio-inline">
												<div class="md-radio">
													<input type="radio" id="radio6" name="firm_type" value="company" class="md-radiobtn" 
														@if($user->firm_type == 'company')
															checked
														@endif
													>
													<label for="radio6" style="">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Company </label>
												</div>
												<div class="md-radio">
													<input type="radio" id="radio7" name="firm_type" value="consultancy" class="md-radiobtn" 
													@if($user->firm_type == 'consultancy')
														checked
													@endif
													>
													<label for="radio7" style="">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Consultancy </label>
												</div>
											</div>	
											<div id="radio_error"></div>					<!-- /input-group -->
										</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Operating since</label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-cube"style="color:darkcyan;"></i>
										</span>
										<select name="operating_since" class="form-control" value="{{ $user->operating_since }}">
											<option value="">-- Select --</option>
											<option @if($user->operating_since == "Startup") {{ $selected }} @endif value="Startup">Startup</option>
											<option @if($user->operating_since == "1 - 2 Years") {{ $selected }} @endif value="1 - 2 Years">1 - 2 Years</option>
											<option @if($user->operating_since == "2 - 4 Years") {{ $selected }} @endif value="2 - 4 Years">2 - 4 Years</option>
											<option @if($user->operating_since == "4 - 7 Years") {{ $selected }} @endif value="4 - 7 Years">4 - 7 Years</option>
											<option @if($user->operating_since == "7 - 10 Years") {{ $selected }} @endif value="7 - 10 Years">7 - 10 Years</option>
											<option @if($user->operating_since == "10 + Years") {{ $selected }} @endif value="10 + Years">10 + Years</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>Industry</label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-cubes"style="color:darkcyan;"></i>
										</span>
										<select name="industry" class="form-control" value="{{ $user->industry }}">
											<option value="">-- Select --</option>
											<option @if($user->industry == "IT") {{ $selected }} @endif value="IT">IT</option>
											<option @if($user->industry == "Fashion") {{ $selected }} @endif value="Fashion">Fashion</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>No of Employee</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-users" style="color:darkcyan;"></i>
										</span>
										<select name="emp_count" class="form-control" value="{{ $user->emp_count }}">
											<option value="">-- Select --</option>
											<option @if($user->emp_count == "0 - 100") {{ $selected }} @endif value="0 - 100">0 - 100</option>
											<option @if($user->emp_count == "100 - 500") {{ $selected }} @endif value="100 - 500">100 - 500</option>
											<option @if($user->emp_count == "500 - 1000") {{ $selected }} @endif value="500 - 1000">500 - 1000</option>
											<option @if($user->emp_count == "1000-2000") {{ $selected }} @endif value="1000-2000">1000-2000</option>
											<option @if($user->emp_count == "2000-5000") {{ $selected }} @endif value="2000-5000">2000-5000</option>
											<option @if($user->emp_count == "5000-10000") {{ $selected }} @endif value="5000-10000">5000-10000</option>
											<option @if($user->emp_count == "10000 +") {{ $selected }} @endif value="10000 +">10000 +</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">								
									<label>Work Area</label>										
									<input type="hidden" name="linked_skill" id="select2_sample5" class="form-control select2" value="{{ $user->linked_skill }}">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Website</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-info"style="color:darkcyan;"></i>
										</span>
										<input type="text" name="website_url" class="form-control" value="{{ $user->website_url }}" placeholder="http://www.website.com">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
				</div>
				<div class="form-actions ">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
					<button type="button" class="btn default">Cancel</button>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

<div class="portlet light bordered" style="border: 1px solid #e1e1e1 !important;">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Contact Details</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/corporate/update', Auth::user()->corpuser_id) }}" id="corp_contact_validation" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">								
									<label>Address</label>										
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-globe" style="color:darkcyan;"></i>
										</span>
										<textarea name="firm_address" class="form-control" rows="3" >{{ $user->firm_address }}</textarea>
									</div>
								</div>
							</div>
						</div>		
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>City</label>									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-map-marker" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="city" class="form-control" value="{{ $user->city }}" placeholder="City">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>State</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-map-marker" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="state" class="form-control" value="{{ $user->state }}" placeholder="State">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Profile Handler Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="Holder Name">
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Working As</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user" style="color:darkcyan;"></i>
										</span>
										<select name="working_as" class="form-control" value="{{ $user->working_as }}">
											<option value="">-- Select --</option>
											<option @if($user->working_as == "HR Recruiter") {{ $selected }} @endif value="HR Recruiter">HR Recruiter</option>
											<option @if($user->working_as == "Administrator") {{ $selected }} @endif value="Administrator">Administrator</option>
											<option @if($user->working_as == "Employee") {{ $selected }} @endif value="Employee">Employee</option>
											<option @if($user->working_as == "Other") {{ $selected }} @endif value="Other">Other</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							 <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-call-end" style="color:darkcyan;"></i>
                                        </span>
                                        <input type="text" name="firm_phone" class="form-control" placeholder="Phone" value="{{ $user->firm_phone }}">
                                    	<span class="input-group-addon">
											<i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i>
										</span>
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>                                
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="icon-envelope" style="color:darkcyan;"></i>
                                        </span>
                                        <input type="text" name="firm_email_id" class="form-control" placeholder="Email" value="{{ $user->firm_email_id }}">
                                    	<span class="input-group-addon">
											<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
										</span>
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</span>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
						</div>	
					</div>
				</div>
				<div class="form-actions ">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
					<button type="button" class="btn default">Cancel</button>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

@stop

@section('javascript')
<script src="{{ asset('/assets/corp_validation.js') }}"></script>
<script>
	jQuery(document).ready(function() {
	    ComponentsDropdowns.init();
	});  
	$(document).ready(function () {   
    var form = $('#cop_contact_validation');
    var error = $('.alert-danger', form);
    var success = $('.alert-success', form);
    form.validate({
        doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        rules: {
            firm_email_id : {
                required : true
            },
            city : {
                required : true
            },
            state : {
                required : true
            },
            firm_address: {
                required: true
            }
        },
        messages: {
            firm_email_id: {
                required: "Enter Email Id"
            },
            city: {
                required: "Enter City"
            },
            state: {
                required: "Select State"
            },
            firm_address: {
                required: "Enter Company/Consultancy Address",
                minlength: 10
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
</script>

@stop
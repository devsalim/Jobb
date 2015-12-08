@extends('login')

@section('content')

<!-- BEGIN LOGIN -->
<div class="content" style="background: url(assets/admin/pages/img/bg-white-lock.png) repeat;box-shadow: 0px 7px 28px 14px;">

	<!-- BEGIN LOGIN FORM -->
	<form class="login-form"  action="{{ url('/auth/login') }}" method="post" id="individual-login">
		<div class="form-body">
			<h3 class="form-title" style="text-shadow: 0px 1px 1px blue;color: khaki;font-size: 20px;">Login As</h3>
				<div class="row" style="margin-bottom: 25px;">
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<div class="btn-group input-group" data-toggle="buttons">
							<label class="" id="loginindividual">
								<button class="btn btn-default active" type="button" style="border-radius: 10px 0px 0px 10px;color: whitesmoke;background-color:darkcyan;">
									<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: white;"></i>&nbsp;Individual
								</button>
							 </label>
							 <label class="" id="logincorporate">
							 	<button class="btn btn-default" type="button" style="border-radius: 0px 10px 10px 0px;color: wheat;">
									<i class="fa fa-university" style="color: antiquewhite;"></i>&nbsp;Corporate
								</button>
							 </label>
						</div>
					</div>
					<!-- /.col-md-6 -->
				</div>
				<div class="login-options" >
					<div class="row social">
						<div class="col-md-4 col-xs-4 " style="padding-right:2px;">
							<a class="btn btn-lg btn-facebook btn-block" href="" style="background: #3b5998;color: white;">
								<i class="fa fa-facebook "></i><span class="hidden-xs">&nbsp;Facebook</span>
							</a>
						</div>
						
						<div class="col-md-4 col-xs-4 " style="padding-left:2px;padding-right:2px;">
							<a class="btn btn-lg btn-google btn-block" href="" style="background: #c32f10;color: white;">
								<i class="fa fa-google-plus"></i><span class="hidden-xs">&nbsp;Google+</span>
							</a>
						</div>
						<div class="col-md-4 col-xs-4 " style="padding-left:2px;">
							<a class="btn btn-lg btn-linkedin btn-block" style="background: #00aced;color: white;">
								<i class="fa fa fa-linkedin"></i><span class="hidden-xs">&nbsp;Linkedin</span>
							</a>
						</div>
					</div>
				</div>
				<h2 class="decorated" style="margin: 18px; color:whitesmoke;">
					<span style="font-size: 13px;">OR</span>
				</h2>

				@if ( Session::has('flash_message') ) 
				  <div class="alert {{ Session::get('flash_type') }}">
				      <ul><li>{{ Session::get('flash_message') }}</li></ul>
				  </div>				  
				@endif

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div id="ind-msg-box" style="display:none">
					<div id="ind-msg"></div>
				</div>

				<div class="form-group">
					<div class="input-icon right">
						<i class="fa"></i>
						<div class="input-group margin-top-10">
							<span class="input-group-addon"><i class="icon-envelope"></i></span>	
							<input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email Id or Mobile No">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-icon right">
						<i class="fa"></i>
						<div class="input-group margin-top-15">
							<span class="input-group-addon"><i class="icon-lock-open"></i></span>
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
				</div>										
				<div class="form-actions" style="margin-top: 14px;border-bottom: 0px;">																
					<div class="form-group" style="margin-left: -4px; margin-bottom: -15px;">
						<div class="input-group">
							<label style="font-size: 13px;">
							<input type="checkbox" name="remember">Remember Me</label>
						</div>
					</div>
					<br><br>
					<button type="submit" class="btn btn-default pull-left" style="margin-left: 0px; " id="individual-login-btn">
					Login <i class="m-icon-swapright"></i>
					</button>
					<a href="javascript:;" id="forget-password" class="forget-password" style="font-size: 14px;/* color: gray; */text-decoration: initial;color: aliceblue !important;">Forgot Password ?
					</a>
				</div>			
			<div class="create-account" style="margin-top: 20px;background-color: darksalmon;" >
				<p style="color:black;">
					Not A Member?&nbsp;&nbsp;<a href="javascript:;" id="register-btn" class="uppercase" style="color: floralwhite;font-size: 15px;font-weight: 600;"> Register Now&nbsp;!</a> 
				</p>
			</div>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<form class="login-form-corp"  action="{{ url('/auth/login') }}" method="post" id="corporate-login">
		<div class="form-body">
			<h3 class="form-title" style="text-shadow: 0px 1px 1px blue;color: khaki;font-size: 20px;">Login As</h3>
				<div class="row" style="margin-bottom: 25px;">
					<div class="col-md-2 col-sm-2 col-xs-1"></div>
					<div class="col-md-10 col-sm-10 col-xs-10">
						<div class="btn-group input-group" data-toggle="buttons">
							<label class="" id="loginindividual1">
								<button class="btn btn-default " type="button" style="border-radius: 10px 0px 0px 10px;color: wheat;">
									<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: antiquewhite;"></i>&nbsp;Individual
								</button>
							 </label>
							 <label class="" id="logincorporate2">
							 	<button class="btn btn-default active" type="button" style="border-radius: 0px 10px 10px 0px;color: whitesmoke;background-color:darkcyan;">
									<i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate
								</button>
							 </label>
						</div>
						
					</div>
					<!-- /.col-md-6 -->
				</div>
				

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div id="corp-msg-box" style="display:none">
					<div id="corp-msg"></div>
				</div>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<div class="input-icon right">
					<i class="fa"></i>
					<div class="input-group margin-top-10">
						<span class="input-group-addon"><i class="icon-envelope"></i></span>	
						<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email Id">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="input-icon right">
					<i class="fa"></i>
					<div class="input-group margin-top-15">
						<span class="input-group-addon"><i class="icon-lock-open"></i></span>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
				</div>
			</div>										
			<div class="form-actions" style="margin-top: 14px;border-bottom: 0px;">																
				<div class="form-group" style="margin-left: -4px; margin-bottom: -15px;">
					<div class="input-group">
						<label style="font-size: 13px;">
						<input type="checkbox" name="remember">Remember Me</label>
					</div>
				</div>
				<br><br>
				<button type="button" class="btn btn-default pull-left" style="margin-left: 0px; " id="corporate-login-btn">
				Login <i class="m-icon-swapright"></i>
				</button>
				<a href="javascript:;" id="forget-password-corp" class="forget-password" style="font-size: 14px;text-decoration: initial;color: aliceblue !important;">Forgot Password ?
				</a>
			</div>			
			<div class="create-account" style="margin-top: 20px;background-color: darksalmon;" >
				<p style="color:black;">
					Not A Member?&nbsp;&nbsp;<a href="javascript:;" id="register-btn-corp" class="uppercase" style="color: floralwhite;font-size: 15px;font-weight: 600;"> Register Now&nbsp;!</a> 
				</p>
			</div>
		</div>
	</form>
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="/forget" method="post" id="forgot-password">
		<h3 style="margin-bottom: 18px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">Forgot Password ?</h3>
		<p style="text-align: center;font-size: 21px;color: yellow;">No Worries&nbsp;<i class="icon-emoticon-smile"></i></p>
		<p style="text-align: center;font-size: 15px;">
			 Enter your e-mail iD or Mobile No. You will get a link to reset password.
		</p>
		@if ( Session::has('flash_message') ) 
		  <div class="alert {{ Session::get('flash_type') }}">
		     <ul><li>{{ Session::get('flash_message') }}</li></ul>
		  </div>	  
		@endif
		<div id="forget-box" style="display:none">
			<div id="forget-box-msg"></div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon"><i class="icon-envelope"></i></span>
					<input type="email" name="forget_email" class="form-control" placeholder="Email Id or Mobile No">
				</div>
			</div>
		</div>
		<div class="form-actions" style="margin-top:25px">
			<label id="back-btn" style="margin-left: 39px;cursor: pointer;">Back</label>
			<button type="submit" id="forget-password-btn" class="btn btn-default pull-left" style="margin-left: 0px; ">Submit 
				<i class="m-icon-swapright"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->

	<!-- BEGIN OTP VERIFICATIO FORM -->
	<form class="otp-verify-form" action="/verify" method="post" id="mobile-otp-form" style="display:none" id="verify-otp">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3 style="margin-bottom: 18px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">Mobile Verification</h3>
		<p style="text-align: center;font-size: 15px;">
			 Enter OTP received to verify your mobile.
		</p>
		@if ( Session::has('flash_message') ) 
		  <div class="alert {{ Session::get('flash_type') }}">
		     <ul><li>{{ Session::get('flash_message') }}</li></ul>
		  </div>	  
		@endif
		<div id="ind-msg-reg-box" style="display:none">
			<div id="ind-reg-msg"></div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon"><i class="icon-envelope"></i></span>
					<input type="password" name="mobileOTP" class="form-control" maxlength="5" placeholder="Enter OTP here"  required>
				</div>
			</div>
		</div>
		<div class="form-actions" style="margin-top:25px;border-bottom: none;">
			<label id="resend-otp-btn" style="margin-left: 39px;cursor: pointer;">Resend OTP</label>
			<button type="submit" class="btn btn-default pull-left" style="margin-left: 0px; ">Submit <i class="m-icon-swapright"></i></button>
		</div>
	</form>
	<!-- END OTP VERIFICATIO FORM -->
	
	<!-- BEGIN REGISTRATION FORM -->

	
	<form class="register-form" id="individual-register" action="{{ url('/individual/store') }}" method="post" id="individual-register">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="login-option" style=" margin-right: 10px;padding-bottom:6px;">
			<h3 class="form-title" style="margin-top: 4px;margin-bottom: 16px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">
				Sign Up As
			</h3>
		</div>
		<div class="row" style="margin-bottom: 25px;">
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<div class="btn-group input-group" data-toggle="buttons">
					<label class="" id="corpor">
						<button class="btn btn-default active" type="button" style="border-radius: 10px 0px 0px 10px;color: whitesmoke;background-color:darkcyan;">
							<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: white;"></i>&nbsp;Individual
						</button>
					 </label>
					 <label class="" id="corporate1">
					 	<button class="btn btn-default" type="button" style="border-radius: 0px 10px 10px 0px;color: wheat;">
							<i class="fa fa-university" style="color: antiquewhite;"></i>&nbsp;Corporate
						</button>
					 </label>
				</div>
			</div>
			<!-- /.col-md-6 -->
		</div>
		
		<div class="login-options" >
			<div class="row social">
				<div class="col-md-4 col-xs-4 " style="padding-right:2px;">
					<a  class="btn btn-lg btn-facebook btn-block" href="" style="background: #3b5998;color: white;">
						<i class="fa fa-facebook "></i><span class="hidden-xs">&nbsp;facebook</span>
					</a>
				</div>
				<div class="col-md-4 col-xs-4 " style="padding-left:2px;padding-right:2px;">
					<a  class="btn btn-lg btn-google btn-block" href="" style="background: #c32f10;color: white;">
						<i class="fa fa-google-plus"></i><span class="hidden-xs">&nbsp;google+</span>
					</a>
				</div>
				<div class="col-md-4 col-xs-4 " style="padding-left:2px;">
					<a class="btn btn-lg btn-twitter btn-block" style="background: #00aced;color: white;">
						<i class="fa fa fa-linkedin"></i><span class="hidden-xs">&nbsp;linkedin</span>
					</a>
				</div>
			</div>
		</div>
		<h2 class="decorated" style="margin:18px; color:whitesmoke;">
			<span style="font-size: 13px;">OR</span>
		</h2>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div id="ind-reg-form-errors" style="display:none"></div>
										
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-font"></i>
					</span>	
					<input type="text" name="fname" class="form-control" placeholder="Full Name" value="{{ old('fname') }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon">
						<i class="icon-envelope"></i>
					</span>	
					<input type="email" id="email_address" pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" name="email" class="form-control" placeholder="Email Id" value="{{ old('email') }}" />
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon">
						<i class="icon-call-end"></i>
					</span>
					<input type="text" name="mobile" maxlength="10" class="form-control" placeholder="Mobile No" 
							value="{{ old('mobile') }}"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
						<i class="icon-lock-open"></i>
					</span>
					<input type="password" id="register_password" name="password" class="form-control" placeholder="Password">
				</div>
			</div>
		</div>			
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
						<i class="icon-lock-open"></i>
					</span>
					<input type="password" name="password_confirmation" class="form-control" placeholder="Re-Type Password">
				</div>
			</div>
		</div>														
		<div class="form-group margin-top-20 margin-bottom-20">
			<label style="font-size: 13px;">
				<input type="checkbox" id="t-n-c" name="tnc"/> I agree to the 
				<a href="javascript:;">Terms of Service </a>& <a href="javascript:;">Privacy Policy </a>
			</label>
			<div id="register_tnc_error"></div>
		</div>									
		<div class="form-actions">
			<label id="register-back-btn" style="margin-left: 39px;cursor: pointer;">Back</label>
			<button type="submit" id="individual-register-btn" class="btn btn-default pull-left">
			Submit&nbsp;<i class="m-icon-swapright"></i>
			</button>
		</div>
	</form>
	<!-- END INDIVIDUAL REGISTRATION FORM -->
	
	<!-- Start CORPORATE REGISTRATION FORM -->
	
	<form class="register-corporate-form" action="{{ url('/corporate/store') }}" method="post" id="corporate-register">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="login-option" style=" margin-right: 26px;">
			<h3 class="form-title" style="margin-top: 4px;margin-bottom: 16px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">
				Sign Up As
			</h3>
		</div>
		<div class="row" style="margin-bottom: 25px;">
			<div class="col-md-2 col-sm-2 col-xs-1"></div>
			<div class="col-md-10 col-sm-10 col-xs-10">
				<div class="btn-group input-group" data-toggle="buttons">
					<label class="" id="individual2">
						<button class="btn btn-default " type="button" style="border-radius: 10px 0px 0px 10px;color: wheat;">
							<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: antiquewhite;"></i>&nbsp;Individual
						</button>
					 </label>
					 <label class="" id="individual3">
					 	<button class="btn btn-default active" type="button" style="border-radius: 0px 10px 10px 0px;color: whitesmoke;background-color:darkcyan;">
							<i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate
						</button>
					 </label>
				</div>
				
			</div>
			<!-- /.col-md-6 -->
		</div>
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div id="corp-reg-form-errors" style="display:none"></div>
		<div id="corp-msg-reg-box" style="display:none">
			<div id="corp-reg-msg"></div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
					<i class="fa fa-university"></i>
					</span>
					<input type="text" name="firm_name" class="form-control" placeholder="Company Name" value="{{ old('cname') }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
					<i class="icon-envelope"></i>
					</span>
					<input type="email" name="firm_email_id" class="form-control" placeholder="Email Id" value="{{ old('email') }}">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
					<i class="icon-lock-open"></i>
					</span>
					<input type="password" name="firm_password" id="com_reg_password" class="form-control" placeholder="Password">
				</div>
			</div>
		</div>
		<div class="form-group" style="margin-bottom:15px;">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
					<i class="icon-lock-open"></i>
					</span>
					<input type="password" name="firm_password_confirmation" class="form-control" placeholder="Re-Type Password">
				</div>
			</div>
		</div>
		<div class="form-group" style="margin-bottom:15px;">
			<!-- <div class="col-md-4"></div> -->
			<label class="control-label" style="float: none;margin: 0 auto;display: table; margin-bottom: 5px;">Firm Type</label>
			<div class="col-md-12">
				<div class="md-radio-inline" style="float: none;margin: 0 auto;display: table;">
					<div class="md-radio">
						<input type="radio" id="radio6" name="firm_type" value="company" class="md-radiobtn">
						<label for="radio6" style="">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Company </label>
					</div>
					<div class="md-radio">
						<input type="radio" id="radio7" name="firm_type" value="consultancy" class="md-radiobtn" >
						<label for="radio7" style="">
						<span></span>
						<span class="check"></span>
						<span class="box"></span>
						Consultancy </label>
					</div>
				</div>						<!-- /input-group -->
			</div>
		</div>
		<div class="form-group margin-top-20 margin-bottom-20">
			<label class="check" style="font-size: 13px;">
				<input type="checkbox" name="tnc"/> I agree to the
				 <a href="javascript:;">Terms of Service </a>& <a href="javascript:;">Privacy Policy </a>
			</label>
			<div id="register_ctnc_error"></div>
		</div>
		<label id="register-back-btn3" style="margin-left: 39px;cursor: pointer;">Back</label>
		<button type="submit" id="corporate-register-btn" class="btn btn-default pull-left">
			Submit&nbsp;<i class="m-icon-swapright"></i>
		</button>
	</form>
</div>
<!-- END LOGIN -->

<div id="loader" style="display:none;z-index:9999;background:white" class="page-loading">
	<img src="assets/loader.gif"><span> Please wait...</span>
</div>

@stop



@section('javascript')
<script type="text/javascript">
function loader(arg){
    if(arg == 'show'){
        $('#loader').show();
    }else{
        $('#loader').hide();
    }
}
function redirect(url){
    window.location = url;
}
$(document).ready(function(){
  $('#individual-login-btn').on('click',function(event){        
    event.preventDefault();

    loader('show');

    var formData = $('#individual-login').serialize(); // form data as string
    var formAction = $('#individual-login').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        // console.log(data)
        if(data.data.page == 'login' && data.data.user == 'invalid'){            
            $('#ind-msg-box').removeClass('alert alert-success');
            $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text(data.data.message);
        }
        else if(data.data.page == 'login' && data.data.email_verify == 0){
        	$('#ind-msg-box').removeClass('alert alert-success');
            $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text(data.data.message);

            $('#individual-login').hide();
            $('#mobile-otp-form').show();
            $('#ind-reg-msg').html(data.data.message);

            $('#ind-msg-reg-box').removeClass('alert alert-success');
            $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
        }
        else if(data.data.page == 'login' && data.data.mobile_verify == 0){
        	$('#ind-msg-box').removeClass('alert alert-success');
            $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text(data.data.message);

            $('#individual-login').hide();
            $('#mobile-otp-form').show();
            $('#ind-reg-msg').html(data.data.message);  
            $('#ind-msg-reg-box').show();

            $('#ind-msg-reg-box').removeClass('alert alert-success');
            $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
        }
        else{          
            redirect(data.data.page);
        }
      },
      error: function(data) {
        loader('hide');
        $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#ind-msg').text('Some error occured !');
      }
    }); 
    return false;
  }); 

$('#corporate-login-btn').on('click',function(event){       
    event.preventDefault();

    loader('show');

    var formData = $('#corporate-login').serialize(); // form data as string
    var formAction = $('#corporate-login').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data == 'login'){
            $('#corp-msg-box').removeClass('alert alert-success');
            $('#corp-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-msg').text('Invalid user');
        }else{
            $('#corp-msg-box').removeClass('alert alert-danger');
            $('#corp-msg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-msg').text('Login success');
            redirect(data);
        }
      },
      error: function(data) {
        loader('hide');
        $('#corp-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#corp-msg').text('Some error occured !');
      }
    }); 
    return false;
  }); 
    
$('#individual-register-btn').on('click',function(event){       
    event.preventDefault();

    loader('show');

    var formData = $('#individual-register').serialize(); // form data as string
    var formAction = $('#individual-register').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data.data.page == 'login'){
            $('#ind-msg-reg-box').removeClass('alert alert-danger');
            $('#ind-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#individual-register')[0].reset();
            $('#t-n-c').attr('checked', false); // Unchecks it

            if(data.data.otp != null && data.data.vcode != null ){
	            $('#individual-register').hide();
	            $('#mobile-otp-form').show();
	            $('#ind-reg-msg').html('Registration successful ! <br/>Check your mobile/email for further instruction. <br/>Your otp: <b>'+data.data.otp+'</b> to verify mobile.');  
	            // console.log('both');

	            $('#ind-msg-reg-box').removeClass('alert alert-danger');
	            $('#ind-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });

	        }else if(data.data.vcode != null && data.data.otp == null){
	        	$('#individual-register').hide();
	            $('#mobile-otp-form').show();
	        	$('#ind-reg-msg').html('Registration successful ! <br/>Check your email for further instruction.');  
	        	// console.log('email');

	        	$('#ind-msg-reg-box').removeClass('alert alert-danger');
	            $('#ind-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });
	        }else if(data.data.otp != null && data.data.vcode == null){
	        	$('#individual-register').hide();
	            $('#mobile-otp-form').show();
	        	$('#ind-reg-msg').html('Registration successful ! <br/>Check your mobile for further instruction. <br/>	        		Your otp: <b>'+data.data.otp+'</b> to verify mobile.');  
	        	// console.log('mobile');

	        	$('#ind-msg-reg-box').removeClass('alert alert-danger');
	            $('#ind-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });
	        }
        }else{
            $('#ind-msg-reg-box').removeClass('alert alert-success');
            $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-reg-msg').text('Some errors occured during Registration!');
        }
      },
      error: function(data) {
        loader('hide');
	    var errors = data.responseJSON;
	    // console.log(errors);
	    $errorsHtml = '<div class="alert alert-danger"><ul>';
	    $.each(errors, function(index, value) {
			 $errorsHtml += '<li>' + value[0] + '</li>';
	    });
 		$errorsHtml += '</ul></div>';	            
        $( '#ind-reg-form-errors' ).html( $errorsHtml );
        $( '#ind-reg-form-errors' ).show();

        // $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
        //         $(this).show();
        // });
        // $('#ind-reg-msg').text('Some error occured !');
      }
    }); 
    return false;
  });

$('#corporate-register-btn').on('click',function(event){       
    event.preventDefault();

    loader('show');

    var formData = $('#corporate-register').serialize(); // form data as string
    var formAction = $('#corporate-register').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data.data.page == 'login'){
            $('#corp-msg-reg-box').removeClass('alert alert-danger');
            $('#corp-reg-form-errors').hide();
            $('#corp-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corporate-register')[0].reset();
            $('#t-n-c').attr('checked', false); // Unchecks it
            // $('#corporate-register').hide();
            // $('#corporate-login').show();
            $('#corp-reg-msg').html('Registration successful ! <br/>Check your Email for further instruction.');  
        }else{
            $('#corp-msg-reg-box').removeClass('alert alert-success');
            $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-reg-msg').text('Some errors occured during Registration!');
        }
      },
      error: function(data) {
        loader('hide');
	    var errors = data.responseJSON;
	    // console.log(errors);
	    $errorsHtml = '<div class="alert alert-danger"><ul>';
	    $.each(errors, function(index, value) {
			 $errorsHtml += '<li>' + value[0] + '</li>';
	    });
 		$errorsHtml += '</ul></div>';	            
        $( '#corp-reg-form-errors' ).html( $errorsHtml );
        $( '#corp-reg-form-errors' ).show();

        // $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
        //         $(this).show();
        // });
        // $('#ind-reg-msg').text('Some error occured !');
      }
    }); 
    return false;
  });

// $('#corporate-register-btn').on('click',function(event){        
//     event.preventDefault();

//     loader('show');

//     var formData = $('#corporate-register').serialize(); // form data as string
//     var formAction = $('#corporate-register').attr('action'); // form handler url

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//       url: formAction,
//       type: "post",
//       data: formData,
//       cache : false,
//       success: function(data){
//         loader('hide');
//         if(data == 'login'){
//             $('#corp-msg-reg-box').removeClass('alert alert-success');
//             $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
//                 $(this).show();
//             });
//             $('#corp-reg-msg').text('Invalid user');
//         }else{
//             $('#corp-msg-reg-box').removeClass('alert alert-danger');
//             $('#corp-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
//                 $(this).show();
//             });
//             $('#corp-reg-msg').text('Registration success');
//             redirect(data);
//         }
//       },
//       error: function(data) {
//         loader('hide');
//         $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
//                 $(this).show();
//         });
//         $('#corp-reg-msg').text('Some error occured !');
//       }
//     }); 
//     return false;
//   });
});

$('#forget-password-btn').on('click',function(event){        
    event.preventDefault();

    loader('show');

    var formData = $('#forgot-password').serialize(); // form data as string
    var formAction = $('#forgot-password').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data.data.page == 'login' && data.data.error == 'none'){
            $('#forget-box').removeClass('alert alert-danger');
            $('#forget-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#forgot-password')[0].reset();
            $('#forget-box-msg').html('Check your mobile/email for password reset link.');  
        }else if(data.data.page == 'login' && data.data.error != 'none'){
            $('#forget-box').removeClass('alert alert-success');
            $('#forget-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#forget-box-msg').text(data.data.error);
        }
      },
      error: function(data) {
        loader('hide');
        $('#forget-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#forget-box-msg').text('Some error occured !');
      }
    }); 
    return false;
  }); 

$('#individual-login').bind('keydown', function(e){         
    if (e.which == 13){
       $('#individual-login-btn').trigger('click'); 
       return false;  
   }     
});

$('#corporate-login').bind('keydown', function(e){         
    if (e.which == 13){
       $('#corporate-login-btn').trigger('click'); 
       return false;  
   }
});

$('#forgot-password').bind('keydown', function(e){         
    if (e.which == 13){
       $('#forgot-password-btn').trigger('click'); 
       return false;  
   }     
});

</script>
@stop
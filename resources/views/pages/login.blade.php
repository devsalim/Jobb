@extends('login')

@section('content')

<!-- BEGIN LOGIN -->
<div class="content" style="background: url(assets/admin/pages/img/bg-white-lock.png) repeat;box-shadow: 0px 7px 28px 14px;">

	<!-- BEGIN LOGIN FORM -->
	<form class="login-form"  action="{{ url('/auth/login') }}" method="post" id="individual-login">
		<div class="form-body">
			<h3 class="form-title" style="text-shadow: 0px 1px 1px blue;color: khaki;font-size: 20px;">Login As</h3>
				<div class="row" style="margin-bottom: 25px;">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="input-group">
							<span class="input-group-btn" id="loginindividual">
								<button class="btn btn-default active" type="button" style="border-radius: 10px 0px 0px 10px;">
									<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: white;"></i>&nbsp;Individual
								</button>
							</span>
							<span class="input-group-btn" id="logincorporate">
								<button class="btn btn-default" type="button" style="border-radius: 0px 10px 10px 0px;color: darkseagreen;">
									<i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate
								</button>
							</span>
						</div>
						<!-- /input-group -->
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
					<button type="submit" class="btn btn-default pull-right" style="margin-left: 0px; " id="individual-login-btn">
					Login <i class="m-icon-swapright"></i>
					</button>
					<a href="javascript:;" id="forget-password" class="forget-password" style="font-size: 14px;/* color: gray; */text-decoration: initial;">Forgot Password ?
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-btn" id="loginindividual1">
						<button class="btn btn-default " type="button" style="border-radius: 10px 0px 0px 10px;">
							<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: white;"></i>&nbsp;Individual
						</button>
					</span>
					<span class="input-group-btn" id="logincorporate2">
						<button class="btn btn-default active" type="button" style="border-radius: 0px 10px 10px 0px;color: darkseagreen;">
							<i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate
						</button>
					</span>
				</div>
				<!-- /input-group -->
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
				<button type="button" class="btn btn-default pull-right" style="margin-left: 0px; " id="corporate-login-btn">
				Login <i class="m-icon-swapright"></i>
				</button>
				<a href="javascript:;" id="forget-password-corp" class="forget-password" style="font-size: 14px;/* color: gray; */text-decoration: initial;">Forgot Password ?
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
	<form class="forget-form" action="#" method="post" id="forgot-password">
		<h3 style="margin-bottom: 18px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">Forgot Password ?</h3>
		<p style="text-align: center;font-size: 21px;color: yellow;">No Worries&nbsp;<i class="icon-emoticon-smile"></i></p>
		<p style="text-align: center;font-size: 15px;">
			 Enter your e-mail iD or Mobile No. You will get a link to reset password.
		</p>
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon"><i class="icon-envelope"></i></span>
					<input type="email" name="email" class="form-control" placeholder="Email Id or Mobile No">
				</div>
			</div>
		</div>
		<div class="form-actions" style="margin-top:25px">
			<label id="back-btn" style="margin-left: 39px;cursor: pointer;">Back</label>
			<button type="submit" class="btn btn-default pull-right" style="margin-left: 0px; ">Submit <i class="m-icon-swapright"></i></button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	
	<!-- BEGIN REGISTRATION FORM -->

	
	<form class="register-form" id="individual-register" action="{{ url('/individual/store') }}" method="post" id="individual-register">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="login-option" style=" margin-right: 10px;padding-bottom:6px;">
			<h3 class="form-title" style="margin-top: 4px;margin-bottom: 16px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">
				Sign Up As
			</h3>
		</div>
		<div class="row" style="margin-bottom: 22px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-btn" id="corpor">
						<button class="btn btn-default active" type="button" style="border-radius: 10px 0px 0px 10px;">
							<i class="fa fa-user" style="border-radius: 10px 0px 0px 10px;color: white;"></i>&nbsp;Individual
						</button>
					</span>
					<span class="input-group-btn" id="corporate1">
						<button class="btn btn-default" type="button" style="border-radius: 0px 10px 10px 0px;color: darkseagreen;">
							<i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate
						</button>
					</span>
				</div>
				<!-- /input-group -->
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
		<div id="ind-msg-reg-box" style="display:none">
			<div id="ind-reg-msg"></div>
		</div>								
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
					<input type="text" name="mobile" maxlength="10" class="form-control" placeholder="Mobile No" value="{{ old('mobile') }}"/>
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
					<input type="password" name="rpassword" class="form-control" placeholder="Re-Type Password">
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
			<button type="submit" id="individual-register-btn" class="btn btn-default pull-right">
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
			<div class="col-md-8">
				<div class="input-group" style="margin-top: 13px;">
					<span class="input-group-btn" id="individual2">
						<button class="btn btn-default" type="button" style="border-radius: 10px 0px 0px 10px;color: darkseagreen;"><i class="fa fa-user" style="color: white;"></i>&nbsp;Individual</button>
					</span>
					<span class="input-group-btn" id="individual3">
						<button class="btn btn-default active" type="button" style="border-radius: 0px 10px 10px 0px;"><i class="fa fa-university" style="color: white;"></i>&nbsp;Corporate</button>
					</span>
				</div>
				<!-- /input-group -->
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
		<div id="copr-msg-reg-box" style="display:none">
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
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-15">
					<span class="input-group-addon">
					<i class="icon-lock-open"></i>
					</span>
					<input type="password" name="rpassword" class="form-control" placeholder="Re-Type Password">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4"></div>
			<label class="control-label col-md-6" style="">Firm Type</label>
			<div class="col-md-12">
				<div class="md-radio-inline" style="margin-left:22px;">
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
				<input type="checkbox" name="ctnc"/> I agree to the
				 <a href="javascript:;">Terms of Service </a>& <a href="javascript:;">Privacy Policy </a>
			</label>
			<div id="register_ctnc_error"></div>
		</div>
		<label id="register-back-btn3" style="margin-left: 39px;cursor: pointer;">Back</label>
		<button type="submit" id="corporate-register-btn" class="btn btn-default pull-right">
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
        if(data == 'login'){            
            $('#ind-msg-box').removeClass('alert alert-success');
            $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text('Invalid user');
        }else{          
            $('#ind-msg-box').removeClass('alert alert-danger');
            $('#ind-msg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text('Login success');
            redirect(data);
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
            $('#ind-reg-msg').html('Registration successful ! <br/>Check your mobile/email for further instruction. <br/>or Go to this url (<a href="http://jobtip.dev/verify" target="_blank">http://jobtip.dev/verify</a>) with your otp: <b>'+data.data.otp+'</b> to verify mobile. or <a href="/verify/'+data.data.vcode+'" target="_blank">click here</a> to verify your email.');
            
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
        $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        console.log(data);
        $('#ind-reg-msg').text('Some error occured !');
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
        if(data == 'login'){
            $('#corp-msg-reg-box').removeClass('alert alert-success');
            $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-reg-msg').text('Invalid user');
        }else{
            $('#corp-msg-reg-box').removeClass('alert alert-danger');
            $('#corp-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-reg-msg').text('Registration success');
            redirect(data);
        }
      },
      error: function(data) {
        loader('hide');
        $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#corp-reg-msg').text('Some error occured !');
      }
    }); 
    return false;
  });
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

</script>
@stop
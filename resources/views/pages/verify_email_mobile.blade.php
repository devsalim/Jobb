@if($type == 'mobile-otp')
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-phone" style="font-size: 16px;color: firebrick;"></i> Change mobile verification
	</h4>
</div>
<form action="{{ url('/verify-otp') }}" method="post" id="verify-otp-form">				
<input type="hidden" name="_token" value="{{ csrf_token() }}">	
<div class="modal-body">
	OTP received : <b>{{$otp}}</b>
	<input type="text" class="form-control" name="mobile_otp" placeholder="Enter OTP">
	<input type="hidden" name="mobile" value="{{ $mobile }}">
	<input type="hidden" name="motpenc" value="{{ $otpEnc }}">
	<div id="msg-box" style="display:none">
		<div id="msg-text"></div>
	</div>
</div>
<div class="modal-footer">		
	<button type="button" class="btn btn-sm blue" id="verify-otp">Verify</button>
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Cancel</button>								
</div>
</form>	
@elseif($type == 'email-verification-code')
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-phone" style="font-size: 16px;color: firebrick;"></i> Change email verification
	</h4>
</div>
<form action="{{ url('/verify-evc') }}" method="post" id="verify-evc-form">				
<input type="hidden" name="_token" value="{{ csrf_token() }}">	
<div class="modal-body">
	Verification code received : <b>{{$code}}</b>
	<input type="text" class="form-control" name="email_vcode" placeholder="Enter verification code">
	<input type="hidden" name="email" value="{{ $email }}">
	<input type="hidden" name="ecodeenc" value="{{ $codeEnc }}">
	<div id="msg-box" style="display:none">
		<div id="msg-text"></div>
	</div>
</div>
<div class="modal-footer">		
	<button type="button" class="btn btn-sm blue" id="verify-ver-code">Verify</button>
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Cancel</button>						
</div>
</form>	
@endif
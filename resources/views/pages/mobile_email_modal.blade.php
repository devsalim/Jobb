@if($type == 'mobile')
<form action="/send-otp" method="post" id="send-mobile-otp-form">				
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-phone" style="font-size: 16px;color: firebrick;"></i> Change mobile
	</h4>
</div>	
<div class="modal-body">
	<input type="text" class="form-control" name="mobile_no" placeholder="Enter new mobile number" required>
</div>
<div class="modal-footer">		
	<button type="button" class="btn btn-sm blue" id="send-otp">Send OTP</button>
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Cancel</button>		
</div>
</form>	
@elseif($type == 'email')
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-envelope" style="font-size: 16px;color: firebrick;"></i> Change email
	</h4>
</div>
<form action="{{ url('/send-evc') }}" method="post" id="send-evc-form">				
<input type="hidden" name="_token" value="{{ csrf_token() }}">	
<div class="modal-body">
	 <input type="text" class="form-control" name="new_email" placeholder="Enter new email">
</div>
<div class="modal-footer">		
	<button type="submit" class="btn btn-sm blue" id="send-evc">Send verification code</button>
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Cancel</button>
</div>
</form>															
@endif
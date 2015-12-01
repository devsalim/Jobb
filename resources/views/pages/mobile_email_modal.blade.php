@if($type == 'mobile')
<form action="/send-otp" class="change-val-mob" method="post" id="send-mobile-otp-form">				
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-phone" style="font-size: 16px;color: firebrick;"></i> Change mobile
	</h4>
</div>	
<div class="modal-body">
	<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon">
						<i class="icon-call-end"></i>
					</span>
					<input type="text" name="mobile_no" pattern="[789][0-9]{9}" maxlength="10" class="form-control" placeholder="Enter New Mobile No" 
							value="{{ old('mobile') }}"/>
				</div>
			</div>
		</div>
	<!-- <input type="number" maxlength="10" class="form-control" name="mobile_no" placeholder="Enter new mobile number" required> -->
</div>
<div class="modal-footer form-actions">		
	<button type="submit" class="btn btn-sm blue" id="send-otp">Send OTP</button>
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
	<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon">
						<i class="icon-envelope"></i>
					</span>	
					<input type="text" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?" name="new_email" class="form-control" placeholder="Enter new Email"  value="{{ old('email') }}" />
				</div>
			</div>
		</div>
	 <!-- <input type="email" class="form-control" name="new_email" placeholder="Enter new email" required> -->
</div>
<div class="modal-footer form-actions">		
	<button type="submit" class="btn btn-sm blue" id="send-evc">Send verification code</button>
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Cancel</button>
</div>
</form>															
@endif

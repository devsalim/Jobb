@extends('verify')

@section('content')

<div class="content" style="background: url(assets/admin/pages/img/bg-white-lock.png) repeat;box-shadow: 0px 7px 28px 14px;">

	<!-- BEGIN OTP FORM -->
	<form class="forget-form" action="/verify" method="post" id="mobile-otp-form" style="display:block">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<h3 style="margin-bottom: 18px;color:khaki;font-size: 27px;text-shadow: 0px 1px 1px blue;">Mobile verification</h3>
		<p style="text-align: center;font-size: 15px;">
			 Enter OTP received to verify your mobile.
		</p>
		@if ( Session::has('flash_message') ) 
		  <div class="alert {{ Session::get('flash_type') }}">
		     <ul><li>{{ Session::get('flash_message') }}</li></ul>
		  </div>	  
		@endif
		<div class="form-group">
			<div class="input-icon right">
				<i class="fa"></i>
				<div class="input-group margin-top-10">
					<span class="input-group-addon"><i class="icon-call-end"></i></span>
					<input type="password" name="mobileOTP" class="form-control" placeholder="Enter OTP here" required>
				</div>
			</div>
		</div>
		<div class="form-actions" style="margin-top:25px">
			<button type="submit" class="btn btn-default pull-right" style="margin-left: 0px; ">Submit <i class="m-icon-swapright"></i></button>
		</div>
	</form>
	<!-- END OTP FORM -->
	
</div>

@stop



@section('javascript')

<script type="text/javascript">
</script>

</script>
@stop
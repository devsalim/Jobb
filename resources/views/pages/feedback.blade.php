@extends('master')

@section('content')

<div class="portlet light bordered">
	<h3 class="page-title">
			Feedback <small>help us making it better</small>
	</h3>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/feedback/store') }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">

						@if(Session::has('message'))
						<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
						@endif
						
						<div class="clearfix">
							<h4 class="block">Tell us about your experience with us</h4>
							<div class="btn-toolbar margin-bottom-10">
								<div class="btn-group" data-toggle="buttons">
								  <label class="btn btn-primary">
								    <input type="radio" name="experience" value="1" class="toggle"> 1 
								  </label>
								  <label class="btn btn-primary">
								    <input type="radio" name="experience" value="2" class="toggle"> 2
								  </label>
								  <label class="btn btn-primary">
								    <input type="radio" name="experience" value="3" class="toggle"> 3
								  </label>
								   <label class="btn btn-primary">
								    <input type="radio" name="experience" value="4" class="toggle"> 4
								  </label>
								  <label class="btn btn-primary">
								    <input type="radio" name="experience" value="5" class="toggle"> 5 <i class="icon-emoticon-smile"></i>
								  </label>
								</div>
							</div>
							<div class="clearfix">
								<h4 class="block">Using Jobtip is...</h4>
								<div class="btn-toolbar margin-bottom-10">
									<div data-toggle="buttons">
									  <label class="btn btn-primary btn-circlenew" style="line-height:3.3;">
									    <input type="radio" name="usability" value="Hard" class="toggle"> Hard
									  </label>
									  <label class="btn btn-primary btn-circlenew1" style="line-height:3.3;">
									    <input type="radio" name="usability" value="Okay" class="toggle btn btn-circlenew1 btn-default"> Okay
									  </label>
									  <label class="btn btn-primary btn-circlenew2" style="line-height:3.3;">
									    <input type="radio" name="usability" value="Easy" class="toggle btn btn-circlenew2 btn-default"> Easy
									  </label>
									</div>
								</div>
							</div>							
							<h4 class="block">Anything else, you wanted to share with us</h4>
							<textarea class="form-control autosizeme" name="comments" rows="3" placeholder="Comments..."></textarea>
						
							<div class="form-actions ">
								<button type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@stop

@section('javascript')

<script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
	});
</script>

@stop
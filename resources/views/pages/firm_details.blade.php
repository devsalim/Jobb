@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Firm Detail</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/corporate/basicupdate') }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
						<div class="row-md-10">
							@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<div class="col-md-6">
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
							<div class="col-md-6">
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
						</div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-call-end" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="firm_phone" class="form-control" placeholder="Phone" value="{{ $user->firm_phone }}">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>								
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-envelope" style="color:darkcyan;"></i>
										</span>
										<input type="text" name="firm_email_id" class="form-control" placeholder="Email" value="{{ $user->firm_email_id }}">
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

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Firm Details</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/corporate/update', Auth::user()->corpuser_id) }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
						<div class="row-md-10">
							<div class="col-md-12">
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
						<div class="row-md-2"></div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Industry</label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-cubes"style="color:darkcyan;"></i>
										</span>
										<select name="industry" class="form-control" value="{{ $user->industry }}">
											<option value="it">IT</option>
											<option value="fashion">Fashion</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Operating since</label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-cube"style="color:darkcyan;"></i>
										</span>
										<input type="text" name="operating_since" class="form-control" value="{{ $user->operating_since }}">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--<div class="row-md-2"></div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Functional Area</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university " style="color:darkcyan;"></i>
										</span>
										<select class="form-control" name="">
											<option value="AL">Alabama</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Job Role</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university" style="color:darkcyan;"></i>
										</span>
										<select name="role" class="form-control" value="{{ $user->role }}">
											<option value="AL">Alabama</option>
											<option value="WY">Wyoming</option>
										</select>
									</div>
								</div>
							</div>
						</div>-->
						<div class="row-md-2"></div>
						<div class="row-md-10">
							<div class="col-md-12">
								<div class="form-group">								
									<label>Work Area</label>										
									<input type="hidden" name="linked_skill" id="select2_sample5" class="form-control select2" value="{{ $user->linked_skill }}">
								</div>
							</div>
						</div>
						<div class="row-md-2"></div>
						<div class="row-md-10">
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
						<div class="row-md-2"></div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Website</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-info"style="color:darkcyan;"></i>
										</span>
										<input type="url" name="website_url" class="form-control" value="{{ $user->website_url }}" placeholder="Company Website">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-2"></div>
						<div class="row-md-10">
							<div class="col-md-6">
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
							<!--/span-->
							<div class="col-md-6">
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
						
					</div>
				</div>
				<div class="form-actions ">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
					<button type="button" class="btn default">Cancel</button>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

@stop

@section('javascript')
<script>
	jQuery(document).ready(function() {
	    ComponentsDropdowns.init();
	});   
</script>
@stop
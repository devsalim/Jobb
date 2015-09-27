@extends('master')

@section('content')

<div class="portlet light bordered" style="border: 1px solid #e1e1e1 !important;">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Profile Details</span>
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
		<form action="{{ url('/individual/basicupdate') }}" class="horizontal-form" method="post">
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
									<label>First Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-font"></i>
										</span>
										<input type="text" name="fname" class="form-control" placeholder="First Name" value="{{ $user->fname }}">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-font"></i>
										</span>
										<input type="text" name="lname" class="form-control" value="{{ $user->lname }}" placeholder="Last Name">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Mobile No</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-call-end"></i>
										</span>
										<input type="text" name="mobile" class="form-control" placeholder="Mobile No" value="{{ $user->mobile }}">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Email Id</label>								
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-envelope"></i>
										</span>
										<input type="text" name="email" class="form-control" placeholder="Email Id" value="{{ $user->email }}">
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
			<span class="caption-subject font-blue-hoki bold uppercase">Professional Details</span>
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
		<form action="{{ url('/individual/update', Auth::user()->induser_id) }}" class="horizontal-form" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Education</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										<select class="form-control" name="education" id="parent_selection" value="{{ $user->education }}">
											<option value="">--Please Select--</option>
											<option value="BA">B.A</option>
											<option value="BArch">B.Arch</option>
											<option value="BCA">BCA</option>
											<option value="BBA">BBA</option>
											<option value="B.Com">B.Com</option>
											<option value="B.Ed">B.Ed</option>
											<option value="BDS">BDS</option>
											<option value="BHM">BHM</option>
											<option value="B.Pharma">B.Pharma</option>
											<option value="btech">B.Tech/B.E.</option>
											<option value="LLB">LLB</option>
											<option value="MBBS">MBBS</option>
											<option value="Diploma">Diploma</option>
											<option value="BVSC">BVSC</option>
											<option value="10+2">10+2</option>
											<option value="10">10</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Branch</label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-university"></i>
										</span>
										<select class="form-control" name="branch" id="child_selection" value="{{ $user->branch }}" >
											<option value="">--Please Select--</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>						
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Job Category</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										<select class="form-control" name="prof_category" value="{{ $user->prof_category }}" >
											<optgroup label="Accounting">
												<option value="Accounts/Finance/Tax">Accounts/Finance/Tax</option>
												<option value="Agent">Agent</option>
												<option value="Analytics & Business Intelligence">
													Analytics & Business Intelligence
												</option>
											</optgroup>
											<optgroup label="IT Field">
												<option value="HR/Administration/IR">HR/Administration/IR</option>
												<option value="IT Software - Client Server">IT Software - Client Server</option>
												<option value="IT Software - Mainframe">IT Software - Mainframe</option>
												<option value="IT Software - Middleware">IT Software - Middleware</option>
												<option value="IT Software - Mobile">IT Software - Mobile</option>
												<option value="IT Software - Other">IT Software - Other</option>
												<option value="IT Software - System Programming">IT Software - System Programming</option>
												<option value="IT Software - Telecom Software">IT Software - Telecom Software</option>
												<option value="IT Software - Application Programming">IT Software - Application Programming</option>
												<option value="IT Software - DBA/Datawarehousing">IT Software - DBA/Datawarehousing</option>
												<option value="IT Software - E-Commerce">IT Software - E-Commerce</option>
												<option value="IT Software - ERP/CRM">IT Software - ERP/CRM</option>
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Working At</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										<input type="text" class="form-control" value="{{ $user->working_at }}" name="working_at">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>Role</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										<input type="text" class="form-control" value="{{ $user->role }}" name="role">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-12">
								<div class="form-group">								
									<label>Experience</label>
									<div id="slider-range-max" class="slider bg-purple"></div>
									<div class="slider-value">
										 Experience: <span id="slider-range-max-amount">{{ $user->experience }}</span>
										<input type="hidden" name="experience" class="exp">
									</div>
								</div>
							</div>
						</div>
						<div class="row-md-10">
							<div class="col-md-6">
								<div class="form-group">
									<label>City</label>									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-map-marker"></i>
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
										<i class="fa fa-map-marker"></i>
										</span>
										<select class="form-control" name="state" value="{{ $user->state }}">
											<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option value="Andhra Pradesh">Andhra Pradesh</option>
											<option value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option value="Assam">Assam</option>
											<option value="Bihar">Bihar</option>
											<option value="Chandigarh">Chandigarh</option>
											<option value="Delhi">Delhi</option>
											<option value="Goa">Goa</option>
											<option value="Gujarat">Gujarat</option>
											<option value="Haryana">Haryana</option>
											<option value="Himachal Pradesh">Himachal Pradesh</option>
											<option value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option value="Jharkhand">Jharkhand</option>
											<option value="Karnataka">Karnataka</option>
											<option value="Kerala">Kerala</option>
											<option value="Lakshadweep">Lakshadweep</option>
											<option value="Madhya Pradesh">Madhya Pradesh</option>
											<option value="Maharashtra">Maharashtra</option>
											<option value="Manipur">Manipur</option>
											<option value="Meghalaya">Meghalaya</option>
											<option value="Mizoram">Mizoram</option>
											<option value="Nagaland">Nagaland</option>
											<option value="Orissa">Orissa</option>
											<option value="Pondicherry">Pondicherry</option>
											<option value="Punjab">Punjab</option>
											<option value="Rajasthan">Rajasthan</option>
											<option value="Sikkim">Sikkim</option>
											<option value="Tamil Nadu">Tamil Nadu</option>
											<option value="Telangana">Telangana</option>
											<option value="Tripura">Tripura</option>
											<option value="Uttar Pradesh">Uttar Pradesh</option>
											<option value="Uttaranchal">Uttaranchal</option>
											<option value="West Bengal">West Bengal</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-12">
								<div class="form-group">
									<label>Key Skills</label>
									<input type="hidden" name="linked_skill" id="select2_sample5" class="form-control select2" value="{{ $user->linked_skill }}">
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-6"><label>Resume:&nbsp;{{ $user->resume }}</label></div>
							<div class="col-md-12">
								<div class="form-group" style="">
									<label class="control-label">Upload Updated Resume</label>&nbsp;
									<label style="font-size:12px;font-weight: 400;">(Optional)</label>
									<div class="">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<span class="btn btn-default btn-file" style=" background-color: #3598dc;  color: white;">
												<i class="icon-paper-clip" style="color: white;"></i>
												<span class="fileinput-new">Select File </span> 
												<span class="fileinput-exists">Upload New Resume </span>
												<input type="file" name="resume">
											</span>
											<br>
											<span class="fileinput-new">only pdf. & word format</span>
											<span class="fileinput-filename"></span>&nbsp; 
											<a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"></a>
										</div>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
				</div>
				<div class="form-actions ">
					<button type="submit" name="individual" value="Save" class="btn blue"><i class="fa fa-check"></i> Save</button>
					<button type="button" class="btn default">Cancel</button>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

@stop


@section('javascript')
<script src="{{ asset('/assets/Edubranch.js') }}"></script>
<script>
	jQuery(document).ready(function() { 
	    ComponentsDropdowns.init();
   		ComponentsjQueryUISliders.init();
	});   
</script>
@stop
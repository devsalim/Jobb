@extends('master')

@section('content')
<?php $selected = 'selected'; ?> 
<div class="portlet light bordered" style="border: 1px solid #e1e1e1 !important;">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Profile Details</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/individual/basicupdate') }}" id="profile_validation" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-9" style="">
														<!-- <div class="row">
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="form-group">							
											<label class=" control-label">Experience </label>&nbsp;: <input type="text" style="width: 20px;background:transparent;border:0" name="min_exp" class="min-exp">-
											<input type="text" style="width: 14px;margin:0 4px;background:transparent;border:0" name="max_exp" class="max-exp">Years
											<div class="">
												<input id="range_1" type="text"  value=""/> -->
												<!-- <input type="hidden" name="min_exp" class="min-exp">
												<input type="hidden" name="max_exp" class="max-exp"> -->
											<!-- </div>
										</div>
									</div> -->
									<!--/span-->
									<!-- <div class="col-md-2 col-sm-2 col-xs-2"></div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="form-group">							
											<label class=" control-label"><input type="checkbox" id="hide-check">&nbsp;Salary 
											</label>&nbsp;:<select name="salary_type" style="border-top: 0px;border-left: 0;border-right: 0;">									
													<option value="Monthly">Monthly</option>
													<option value="Weekly">Weekly</option>
													<option value="Daily">Daily</option>
													<option value="Hourly">Hourly</option>
													<option value="Per Visit">Per Visit</option>	
												</select>
											 <i class="fa fa-rupee (alias)"></i>&nbsp;<input type="text" style="width: 30px;margin:0 6px;background:transparent;border:0" name="min_sal" class="min-sal">-
											<input type="text" style="width:40px;margin:0 4px;background:transparent;border:0" name="max_sal" class="max-sal">&nbsp;
											
											<div id="hide-sal" class="">
												<input id="range_7" type="text"  value=""/> -->
												<!-- <label name="min_sal" class="min-sal"></label> -->
												<!-- <input type="hidden" name="min_sal" class="min-sal">
												<input type="hidden" name="max_sal" class="max-sal"> -->
											<!-- </div>
										</div>
									</div>
								</div> -->
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
							<div class="col-md-6 col-sm-6">
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
							<div class="col-md-6 col-sm-6">
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
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Mobile No</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-call-end"></i>
										</span>
										<input type="text" 
												name="mobile" 
												class="form-control" 
												placeholder="Mobile No" 
												value="{{ $user->mobile }}"
												@if($user->mobile_verify == 1)readonly @endif
												>
										<span class="input-group-addon">
											@if($user->mobile_verify == 0)
											<a>
												<i class="fa fa-exclamation-circle" 
												style="color: #cb5a5e;font-size: 16px;"></i>
											</a>
											@elseif($user->mobile_verify == 1)
												<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
											@endif
										</span>
										<span class="input-group-addon">
											<a href="#edit-me-modal" data-toggle="modal" data-type="mobile" class="change-me">
												<i class="fa fa-pencil"></i>
											</a>
										</span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Email Id</label>								
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-envelope"></i>
										</span>
										<input type="text" name="email" 
												class="form-control" 
												placeholder="Email Id" 
												value="{{ $user->email }}"
												@if($user->email_verify == 1)readonly @endif>
										<span class="input-group-addon">
											@if($user->email_verify == 0)
											<a>
												<i class="fa fa-exclamation-circle" 
												style="color: #cb5a5e;font-size: 16px;"></i>
											</a>
											@elseif($user->email_verify == 1)
												<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
											@endif
										</span>
										<span class="input-group-addon">
											<a href="#edit-me-modal" data-toggle="modal" data-type="email" class="change-me">
												<i class="fa fa-pencil"></i>
											</a>
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
					<!-- <button type="button" class="btn default">Cancel</button> -->
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
		</div>		
	</div>
	<div class="portlet-body form ">
		<!-- BEGIN FORM-->
		<form action="{{ url('/individual/update', Auth::user()->induser_id) }}" id="ind_validation" class="horizontal-form prof_detail" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-9" style="">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>About Me</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-note" style="color:darkcyan;"></i>
										</span>
										<textarea name="about_individual" class="form-control autosizeme" rows="3">{{ $user->about_individual }}</textarea>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>	
						<!-- new column added as dob and gender	 -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Date of Birth <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-calendar" style="color:darkcyan;"></i>
										</span>
										<input class="form-control date-picker" name="dob" size="16" type="text" value="{{ $user->dob }}"/>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Gender</label>
									<div class="input-group">
											<div class="md-radio-inline">
												<div class="md-radio">
													<input type="radio" checked id="radio6" name="gender" value="Male" class="md-radiobtn" 
														@if($user->gender == 'Male')
															checked
														@endif
													>
													<label for="radio6" style="">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Male </label>
												</div>
												<div class="md-radio">
													<input type="radio" id="radio7" name="gender" value="Female" class="md-radiobtn" 
													@if($user->gender == 'Female')
														checked
													@endif
													>
													<label for="radio7" style="">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Female </label>
												</div>
												<div class="md-radio">
													<input type="radio" id="radio8" name="gender" value="Others" class="md-radiobtn" 
													@if($user->gender == 'Others')
														checked
													@endif
													>
													<label for="radio8" style="">
													<span></span>
													<span class="check"></span>
													<span class="box"></span>
													Others </label>
												</div>
											</div>	
											<div id="radio_error"></div>					<!-- /input-group -->
										</div>
								</div>
							</div>
							<!--/span-->
						</div>		
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Education <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-graduation"></i>
										</span>
										<select class="form-control" name="education" id="parent_selection" >
											<option value="">--Please Select--</option>
											<option @if($user->education=="BA") {{ $selected }} @endif value="BA">B.A</option>
											<option @if($user->education=="BArch") {{ $selected }} @endif value="BArch">B.Arch</option>
											<option @if($user->education=="BCA") {{ $selected }} @endif value="BCA">BCA</option>
											<option @if($user->education=="BBA") {{ $selected }} @endif value="BBA">BBA</option>
											<option @if($user->education=="B.Com") {{ $selected }} @endif value="B.Com">B.Com</option>
											<option @if($user->education=="B.Ed") {{ $selected }} @endif value="B.Ed">B.Ed</option>
											<option value="BDS">BDS</option>
											<option value="BHM">BHM</option>
											<option value="B.Pharma">B.Pharma</option>
											<option @if($user->education=="btech") {{ $selected }} @endif value="btech">B.Tech/B.E.</option>
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
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Branch <span class="required"> * </span></label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="icon-graduation"></i>
										</span>
										<select class="form-control" name="branch" id="child_selection" value="{{ $user->branch }}">
											<option value="{{ $user->branch }}">{{ $user->branch }}</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>						
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="form-group">
									<label>Working Status</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class=" icon-briefcase"></i>
										</span>
										<select class="form-control" id="menu" onChange="checkOption(this)" value="{{ $user->working_status }}" name="working_status">
											<option value="">Select</option>
											<option @if($user->working_status=="Student") {{ $selected }} @endif value="Student">Student</option>
											<option @if($user->working_status=="Searching Job") {{ $selected }} @endif value="Searching Job">Searching Job</option>
											<option @if($user->working_status=="Working") {{ $selected }} @endif value="Working">Working</option>
											<option @if($user->working_status=="Freelanching") {{ $selected }} @endif value="Freelanching">Freelanching</option>
										</select>
									</div>
								</div>
							</div>	
							<div class="col-md-3 col-sm-3 col-xs-6">
								<div class="form-group">
									<label>Experience</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class=" icon-briefcase"></i>
										</span>
										<select class="form-control" name="experience" >
											<option value=""> Select </option>
											<option @if($user->experience=="0") {{ $selected }} @endif value="0">0</option>
											<option @if($user->experience=="1") {{ $selected }} @endif value="1">1</option>
											<option @if($user->experience=="2") {{ $selected }} @endif value="2">2</option>
											<option @if($user->experience=="3") {{ $selected }} @endif value="3">3</option>
											<option @if($user->experience=="4") {{ $selected }} @endif value="4">4</option>
											<option @if($user->experience=="5") {{ $selected }} @endif value="5">5</option>
											<option @if($user->experience=="6") {{ $selected }} @endif value="6">6</option>
											<option @if($user->experience=="7") {{ $selected }} @endif value="7">7</option>
											<option @if($user->experience=="8") {{ $selected }} @endif value="8">8</option>
											<option @if($user->experience=="9") {{ $selected }} @endif value="9">9</option>
											<option @if($user->experience=="10") {{ $selected }} @endif value="10">10</option>
											<option @if($user->experience=="11") {{ $selected }} @endif value="11">11</option>
											<option @if($user->experience=="12") {{ $selected }} @endif value="12">12</option>
											<option @if($user->experience=="13") {{ $selected }} @endif value="13">13</option>
											<option @if($user->experience=="14") {{ $selected }} @endif value="14">14</option>
											<option @if($user->experience=="15") {{ $selected }} @endif value="15">15</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Working at</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										
										<input type="text" id="workingAs" class="form-control" value="{{ $user->working_at }}" name="working_at">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Job Category</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-cubes"></i>
										</span>
										<select class="form-control" name="prof_category" value="{{ $user->prof_category }}" >
											<option value="">-- Select --</option>
											<option @if($user->prof_category=="Searching Job") {{ $selected }} @endif value="Searching Job">Searching Job</option>
											<option @if($user->prof_category=="Student") {{ $selected }} @endif value="Student">Student</option>
											<optgroup label="Accounting">
												<option @if($user->prof_category=="Accounts/Finance/Tax") {{ $selected }} @endif value="Accounts/Finance/Tax">Accounts/Finance/Tax</option>
												<option @if($user->prof_category=="Agent") {{ $selected }} @endif value="Agent">Agent</option>
												<option @if($user->prof_category=="Analytics & Business Intelligence") {{ $selected }} @endif value="Analytics & Business Intelligence">
													Analytics & Business Intelligence
												</option>
											</optgroup>
											<optgroup label="IT Field">
												<option @if($user->prof_category=="HR/Administration/IR") {{ $selected }} @endif value="HR/Administration/IR">HR/Administration/IR</option>
												<option @if($user->prof_category=="IT Software - Client Server") {{ $selected }} @endif value="IT Software - Client Server">IT Software - Client Server</option>
												<option @if($user->prof_category=="IT Software - Mainframe") {{ $selected }} @endif value="IT Software - Mainframe">IT Software - Mainframe</option>
												<option @if($user->prof_category=="IT Software - Middleware") {{ $selected }} @endif value="IT Software - Middleware">IT Software - Middleware</option>
												<option @if($user->prof_category=="IT Software - Mobile") {{ $selected }} @endif value="IT Software - Mobile">IT Software - Mobile</option>
												<option @if($user->prof_category=="IT Software - Other") {{ $selected }} @endif value="IT Software - Other">IT Software - Other</option>
												<option @if($user->prof_category=="IT Software - System Programming") {{ $selected }} @endif value="IT Software - System Programming">IT Software - System Programming</option>
												<option @if($user->prof_category=="IT Software - Telecom Software") {{ $selected }} @endif value="IT Software - Telecom Software">IT Software - Telecom Software</option>
												<option @if($user->prof_category=="IT Software - Application Programming") {{ $selected }} @endif value="IT Software - Application Programming">IT Software - Application Programming</option>
												<option @if($user->prof_category=="IT Software - DBA/Datawarehousing") {{ $selected }} @endif value="IT Software - DBA/Datawarehousing">IT Software - DBA/Datawarehousing</option>
												<option @if($user->prof_category=="IT Software - E-Commerce") {{ $selected }} @endif value="IT Software - E-Commerce">IT Software - E-Commerce</option>
												<option @if($user->prof_category=="IT Software - ERP/CRM") {{ $selected }} @endif value="IT Software - ERP/CRM">IT Software - ERP/CRM</option>
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Role</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-cube"></i>
										</span>
										<input type="text" class="form-control" value="{{ $user->role }}" name="role">
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>City <span class="required">
											* </span></label>									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</span>
										<input type="text" name="city" class="form-control" value="{{ $user->city }}" placeholder="City">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>State <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="fa fa-map-marker"></i>
										</span>
										<select class="form-control" name="state" value="{{ $user->state }}">
											<option value="">-- Select --</option>
											<option @if($user->state=="Andaman and Nicobar Islands") {{ $selected }} @endif value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
											<option @if($user->state=="Andhra Pradesh") {{ $selected }} @endif value="Andhra Pradesh">Andhra Pradesh</option>
											<option @if($user->state=="Arunachal Pradesh") {{ $selected }} @endif value="Arunachal Pradesh">Arunachal Pradesh</option>
											<option @if($user->state=="Assam") {{ $selected }} @endif value="Assam">Assam</option>
											<option @if($user->state=="Bihar") {{ $selected }} @endif value="Bihar">Bihar</option>
											<option @if($user->state=="Chandigarh") {{ $selected }} @endif value="Chandigarh">Chandigarh</option>
											<option @if($user->state=="Delhi") {{ $selected }} @endif value="Delhi">Delhi</option>
											<option @if($user->state=="Goa") {{ $selected }} @endif value="Goa">Goa</option>
											<option @if($user->state=="Gujarat") {{ $selected }} @endif value="Gujarat">Gujarat</option>
											<option @if($user->state=="Haryana") {{ $selected }} @endif value="Haryana">Haryana</option>
											<option @if($user->state=="Himachal Pradesh") {{ $selected }} @endif value="Himachal Pradesh">Himachal Pradesh</option>
											<option @if($user->state=="Jammu and Kashmir") {{ $selected }} @endif value="Jammu and Kashmir">Jammu and Kashmir</option>
											<option @if($user->state=="Jharkhand") {{ $selected }} @endif value="Jharkhand">Jharkhand</option>
											<option @if($user->state=="Karnataka") {{ $selected }} @endif value="Karnataka">Karnataka</option>
											<option @if($user->state=="Kerala") {{ $selected }} @endif value="Kerala">Kerala</option>
											<option @if($user->state=="Lakshadweep") {{ $selected }} @endif value="Lakshadweep">Lakshadweep</option>
											<option @if($user->state=="Madhya Pradesh") {{ $selected }} @endif value="Madhya Pradesh">Madhya Pradesh</option>
											<option @if($user->state=="Maharashtra") {{ $selected }} @endif value="Maharashtra">Maharashtra</option>
											<option @if($user->state=="Manipur") {{ $selected }} @endif value="Manipur">Manipur</option>
											<option @if($user->state=="Meghalaya") {{ $selected }} @endif value="Meghalaya">Meghalaya</option>
											<option @if($user->state=="Mizoram") {{ $selected }} @endif value="Mizoram">Mizoram</option>
											<option @if($user->state=="Nagaland") {{ $selected }} @endif value="Nagaland">Nagaland</option>
											<option @if($user->state=="Orissa") {{ $selected }} @endif value="Orissa">Orissa</option>
											<option @if($user->state=="Pondicherry") {{ $selected }} @endif value="Pondicherry">Pondicherry</option>
											<option @if($user->state=="Punjab") {{ $selected }} @endif value="Punjab">Punjab</option>
											<option @if($user->state=="Rajasthan") {{ $selected }} @endif value="Rajasthan">Rajasthan</option>
											<option @if($user->state=="Sikkim") {{ $selected }} @endif value="Sikkim">Sikkim</option>
											<option @if($user->state=="Tamil Nadu") {{ $selected }} @endif value="Tamil Nadu">Tamil Nadu</option>
											<option @if($user->state=="Telangana") {{ $selected }} @endif value="Telangana">Telangana</option>
											<option @if($user->state=="Tripura") {{ $selected }} @endif value="Tripura">Tripura</option>
											<option @if($user->state=="Uttar Pradesh") {{ $selected }} @endif value="Uttar Pradesh">Uttar Pradesh</option>
											<option @if($user->state=="Uttaranchal") {{ $selected }} @endif value="Uttaranchal">Uttaranchal</option>
											<option @if($user->state=="West Bengal") {{ $selected }} @endif value="West Bengal">West Bengal</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<!-- <form action="{{ url('job/newskill') }}" id="newskillfrm" method="post">					
									<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
									<label>Search Skills</label>
									<div style="position:relative;">
										<input type="text" name="name" id="newskill" class="form-control" placeholder="Search for skill...">
											<button id="add-new-skill" style="position:absolute;right:0;top:0;" class="btn btn-success" type="button"><i class="icon-plus"></i> Add</button>	
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Added Skills <span class="required">
													* </span></label>
								    <input type="text" readonly id="linked_skill" value="{{ $user->linked_skill }}" name="linked_skill" 
								     		class="form-control select2"
								     		placeholder="List of skills to be added">
								    <input type="hidden" id="linked_skill_id" name="linked_skill_id" 
								     		class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Prefered Location <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</span>
										<select id="select2_sample_modal_2" value="{{ $user->prefered_location }}" placeholder="Prefered Location" name="prefered_location" class="form-control select2" multiple>
											<option value="">&nbsp;</option>
											<option @if($user->prefered_location=="Hyderabad") {{ $selected }} @endif value="Hyderabad">Hyderabad</option>
											<option @if($user->prefered_location=="Bangalore") {{ $selected }} @endif value="Bangalore">Bangalore</option>
											<option @if($user->prefered_location=="Patna") {{ $selected }} @endif value="Patna">Patna</option>
											<option @if($user->prefered_location=="Mumbai") {{ $selected }} @endif value="Mumbai">Mumbai</option>
											<option @if($user->prefered_location=="Delhi") {{ $selected }} @endif value="Delhi">Delhi</option>
											<option @if($user->prefered_location=="Chennai") {{ $selected }} @endif value="Chennai">Chennai</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Prefered Job Type <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class=" icon-briefcase"></i>
										</span>
										<select class="form-control" value="{{ $user->prefered_jobtype }}" name="prefered_jobtype">
											<option value="">&nbsp;</option>
											<option @if($user->prefered_jobtype=="Full Time") {{ $selected }} @endif value="Full Time">Full Time</option>
											<option @if($user->prefered_jobtype=="Part Time") {{ $selected }} @endif value="Part Time">Part Time</option>
											<option @if($user->prefered_jobtype=="Freelancer") {{ $selected }} @endif value="Freelancer">Freelancer</option>
											<option @if($user->prefered_jobtype=="Work from home") {{ $selected }} @endif value="Work from home">Work from home</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group" style="">
									<label class="control-label">Upload Resume <small style="font-weight: 400; font-size: 13px;">(Optional) only pdf or word format</small></label>&nbsp;
									
									<div class="">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<span class="btn btn-default btn-file" style=" background-color: #44b6ae;  color: white;">
												<i class="icon-paper-clip" style="color: white;"></i>
												<span class="fileinput-new">Select File </span> 
												<span class="fileinput-exists">Upload New Resume </span>
												<input type="file" name="resume">
											</span>
											<br>
											<span class="fileinput-new"></span>
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
					<button type="submit" name="individual" value="Save" class="btn blue"><i class="fa fa-check"></i> Update</button>
					<!-- <button type="button" class="btn default">Cancel</button> -->
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

<!-- Mobile/Email verification -->
<div class="modal fade bs-modal-sm" id="edit-me-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" id="edit-me-content">
			<div id="edit-me-content-inner">
				Edit
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@stop


@section('javascript')
<script src="{{ asset('/assets/Edubranch.js') }}"></script>
<script src="{{ asset('/assets/ind_validation.js') }}"></script>
<script>
	jQuery(document).ready(function() { 
	    ComponentsIonSliders.init();
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>

<script type="text/javascript">
	function checkOption(obj) {
	    var input = document.getElementById("workingAs");
	    input.disabled = obj.value == "Student";
	}

	$(function(){

	 	function split( val ) {
	      return val.split( /,\s*/ );
	    }
	    function extractLast( term ) {
	      return split( term ).pop();
	    }

		$( "#newskill" )
		.bind( "keydown", function( event ) {
			if ( event.keyCode === $.ui.keyCode.TAB && $( this ).autocomplete( "instance" ).menu.active ) {
			  event.preventDefault();
			}
		})
		.autocomplete({
			source: function( request, response ) {
				// $.getJSON( "/job/skillSearch", {
				// 	term: extractLast( request.term )
				// }, response );

				$.ajax({
					url: '/job/skillSearch',
					dataType: "json",
					data: { term: extractLast( request.term ) },
					success: function(data) {
					if (data.length === 0) {
						$('#add-new-skill').removeClass('hide');
						$('#add-new-skill').addClass('show');
					}else{
						$('#add-new-skill').removeClass('show');
						$('#add-new-skill').addClass('hide');
					}
					response(data);
					}
				});

			},
			search: function() {
				var term = extractLast( this.value );
				if ( term.length < 2 ) {
					return false;
				}
			},
			focus: function() {
				return false;
			},
			select: function(event, ui) {
				var terms = split( $('#linked_skill').val() );
				var termsId = split( $('#linked_skill_id').val() );
				// remove the current input
				terms.pop();
				termsId.pop();
				// add the selected item
				terms.push( ui.item.value );
				termsId.push( ui.item.id );
				// add placeholder to get the comma-and-space at the end
				terms.push( "" );
				termsId.push( "" );
				$('#linked_skill').val(terms.join( ", " ));
				$('#linked_skill_id').val(termsId.join( ", " ));
				$(this).val("");
				return false;
			}
		});
	});

	$(document).ready(function(){
		$('#add-new-skill').on('click',function(event){  	    
		  	event.preventDefault();
		  	if (!$('#newskill').val()) {
		  		alert('Please enter some skill to add.');
		  		return false;
		  	}else{
			  	var name = $('#newskill').val(); 
			    $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
			    $.ajax({
			      url: "{{ url('job/newskill') }}",
			      type: "POST",
			      data: { name: name },
			      cache : false,
			      success: function(data){
			        if(data > 0){
			        	$newSkill = $('#newskill').val();
			        	$newSkillId = data;
			        	$selectedSkill = $('#linked_skill').val();
			        	$selectedSkillId = $('#linked_skill_id').val();
			        	$('#linked_skill').val($selectedSkill+""+$newSkill+", ");
			        	$('#linked_skill_id').val($selectedSkillId+""+$newSkillId+", ");
			        	$('#newskill').val("");
			        }
			      },
			      error: function(data) {
			      	alert('some error occured...');
			      }
			    }); 
			    return false;
			}
		});

		// mobile-email-change
		$('.change-me').on('click',function(event){  	    
		  	event.preventDefault();
		  	var type = $(this).data('type');

		    $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

		    $.ajax({
		      url: "/me-change",
		      type: "post",
		      data: {type: type},
		      cache : false,
		      success: function(data){
		    	$('#edit-me-content-inner').html(data);
		    	$('#edit-me-modal').modal('show');
		      }
		    }); 
		    return false;
	  });

	// mobile-email-change
	$('#send-otp').live('click',function(event){  	    
	  	event.preventDefault();

	  	var formData = $('#send-mobile-otp-form').serialize(); 
	    var formAction = $('#send-mobile-otp-form').attr('action');

	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	    $.ajax({
	      url: formAction,
	      type: "post",
	      data: formData,
	      success: function(data){
	    	$('#edit-me-content-inner').html(data);
	    	$('#edit-me-modal').modal('show');
	      }
	    }); 
	    return false;
  	});

  	// verify-otp
	$('#verify-otp').live('click',function(event){  	    
	  	event.preventDefault();

	  	var formData = $('#verify-otp-form').serialize(); 
	    var formAction = $('#verify-otp-form').attr('action');

	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	    $.ajax({
	      url: formAction,
	      type: "post",
	      data: formData,
	      success: function(data){
	      	if(data == 'verification-failure'){
	      		$('#msg-box').removeClass('alert alert-success');
	            $('#msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
	                $(this).show();
	            });
	            $('#msg-text').text('Invalid OTP');
	      	}else if(data == 'verification-success'){
	      		$('#msg-box').removeClass('alert alert-danger');
	            $('#msg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });
	            $('#msg-text').text('Verification successful');
	      		window.location = "/individual/edit";
	      	}
	      }
	    }); 
	    return false;
  	});

	// mobile-email-change
	$('#send-evc').live('click',function(event){  	    
	  	event.preventDefault();

	  	var formData = $('#send-evc-form').serialize(); 
	    var formAction = $('#send-evc-form').attr('action');

	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	    $.ajax({
	      url: formAction,
	      type: "post",
	      data: formData,
	      success: function(data){
	    	$('#edit-me-content-inner').html(data);
	    	$('#edit-me-modal').modal('show');
	      }
	    }); 
	    return false;
  	});

  	// verify-otp
	$('#verify-ver-code').live('click',function(event){  	    
	  	event.preventDefault();

	  	var formData = $('#verify-evc-form').serialize(); 
	    var formAction = $('#verify-evc-form').attr('action');

	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	    $.ajax({
	      url: formAction,
	      type: "post",
	      data: formData,
	      success: function(data){
	      	if(data == 'verification-failure'){
	      		$('#msg-box').removeClass('alert alert-success');
	            $('#msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
	                $(this).show();
	            });
	            $('#msg-text').text('Invalid verification code');
	      	}else if(data == 'verification-success'){
	      		$('#msg-box').removeClass('alert alert-danger');
	            $('#msg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });
	            $('#msg-text').text('Verification successful');
	      		window.location = "/individual/edit";
	      	}else{
	      		$('#msg-text').text('some error occured');
	      	}
	      }
	    }); 
	    return false;
  	});

	$(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	  });
		

	});
</script>
@stop
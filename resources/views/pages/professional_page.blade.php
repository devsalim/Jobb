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
		<form action="{{ url('/individual/basicupdate') }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
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
										<input type="text" name="mobile" class="form-control" placeholder="Mobile No" value="{{ $user->mobile }}">
										<span class="input-group-addon">
											<a><i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i></a>
										</span>
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
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
										<input type="text" readonly name="email" class="form-control" placeholder="Email Id" value="{{ $user->email }}">
										<span class="input-group-addon">
											<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
										</span>
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
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
		</div>		
	</div>
	<div class="portlet-body form ">
		<!-- BEGIN FORM-->
		<form action="{{ url('/individual/update', Auth::user()->induser_id) }}" id="ind_validation" class="horizontal-form prof_detail" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
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
									<label>Branch <span class="required">
											* </span></label>
									<div class="input-group">
										<span class="input-group-addon">
										<i class="icon-graduation"></i>
										</span>
										<select class="form-control" name="branch" id="child_selection" value="{{ $user->branch }}">
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
						</div>						
						<div class="row">
							
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Working at</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-university"></i>
										</span>
										
										<input type="text" class="form-control" value="{{ $user->working_at }}" name="working_at">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Experience</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class=" icon-briefcase"></i>
										</span>
										<select class="form-control" name="experience" >
											<option value="">-- Select --</option>
											<option @if($user->experience=="Fresher") {{ $selected }} @endif value="Fresher">Fresher</option>
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
											<optgroup label="Accounting">
												<option @if($user->experience=="Accounts/Finance/Tax") {{ $selected }} @endif value="Accounts/Finance/Tax">Accounts/Finance/Tax</option>
												<option @if($user->experience=="Agent") {{ $selected }} @endif value="Agent">Agent</option>
												<option @if($user->experience=="Analytics & Business Intelligence") {{ $selected }} @endif value="Analytics & Business Intelligence">
													Analytics & Business Intelligence
												</option>
											</optgroup>
											<optgroup label="IT Field">
												<option @if($user->experience=="HR/Administration/IR") {{ $selected }} @endif value="HR/Administration/IR">HR/Administration/IR</option>
												<option @if($user->experience=="IT Software - Client Server") {{ $selected }} @endif value="IT Software - Client Server">IT Software - Client Server</option>
												<option @if($user->experience=="IT Software - Mainframe") {{ $selected }} @endif value="IT Software - Mainframe">IT Software - Mainframe</option>
												<option @if($user->experience=="IT Software - Middleware") {{ $selected }} @endif value="IT Software - Middleware">IT Software - Middleware</option>
												<option @if($user->experience=="IT Software - Mobile") {{ $selected }} @endif value="IT Software - Mobile">IT Software - Mobile</option>
												<option @if($user->experience=="IT Software - Other") {{ $selected }} @endif value="IT Software - Other">IT Software - Other</option>
												<option @if($user->experience=="IT Software - System Programming") {{ $selected }} @endif value="IT Software - System Programming">IT Software - System Programming</option>
												<option @if($user->experience=="IT Software - Telecom Software") {{ $selected }} @endif value="IT Software - Telecom Software">IT Software - Telecom Software</option>
												<option @if($user->experience=="IT Software - Application Programming") {{ $selected }} @endif value="IT Software - Application Programming">IT Software - Application Programming</option>
												<option @if($user->experience=="IT Software - DBA/Datawarehousing") {{ $selected }} @endif value="IT Software - DBA/Datawarehousing">IT Software - DBA/Datawarehousing</option>
												<option @if($user->experience=="IT Software - E-Commerce") {{ $selected }} @endif value="IT Software - E-Commerce">IT Software - E-Commerce</option>
												<option @if($user->experience=="IT Software - ERP/CRM") {{ $selected }} @endif value="IT Software - ERP/CRM">IT Software - ERP/CRM</option>
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
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Add Skill</label>
									<!-- <form action="{{ url('job/newskill') }}" id="newskillfrm" method="post">					
									<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
									<div class="input-group">
										<input type="text" name="name" id="newskill" class="form-control" placeholder="Search for skill...">
										<span class="input-group-btn">
											<button id="add-new-skill" class="btn btn-success" type="button"><i class="icon-plus"></i> Add</button>	
										</span>
									</div>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Added Skill <span class="required">
											* </span></label>
								    <input type="text" id="linked_skill" name="linked_skill" value="{{ $user->linked_skill }}"
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
											<optgroup label="NFC EAST">
											<option>Hyderabad</option>
											<option>Bangalore</option>
											<option>Philadelphia Eagles</option>
											<option>Washington Redskins</option>
											</optgroup>
											<optgroup label="NFC NORTH">
											<option>Chicago Bears</option>
											<option>Detroit Lions</option>
											<option>Green Bay Packers</option>
											<option>Minnesota Vikings</option>
											</optgroup>
											<optgroup label="NFC SOUTH">
											<option>Patna</option>
											<option>Mumbai</option>
											<option>New Orleans Saints</option>
											<option>Tampa Bay Buccaneers</option>
											</optgroup>
											<optgroup label="NFC WEST">
											<option>Delhi</option>
											<option>Chennai</option>
											<option>San Francisco 49ers</option>
											<option>Seattle Seahawks</option>
											</optgroup>
											<optgroup label="AFC EAST">
											<option>Buffalo Bills</option>
											<option>Miami Dolphins</option>
											<option>New England Patriots</option>
											<option>New York Jets</option>
											</optgroup>
											<optgroup label="AFC NORTH">
											<option>Baltimore Ravens</option>
											<option>Cincinnati Bengals</option>
											<option>Cleveland Browns</option>
											<option>Pittsburgh Steelers</option>
											</optgroup>
											<optgroup label="AFC SOUTH">
											<option>Houston Texans</option>
											<option>Indianapolis Colts</option>
											<option>Jacksonville Jaguars</option>
											<option>Tennessee Titans</option>
											</optgroup>
											<optgroup label="AFC WEST">
											<option>Denver Broncos</option>
											<option>Kansas City Chiefs</option>
											<option>Oakland Raiders</option>
											<option>San Diego Chargers</option>
											</optgroup>
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
<script src="{{ asset('/assets/ind_validation.js') }}"></script>
<script>
	jQuery(document).ready(function() { 
	    ComponentsIonSliders.init();
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>
<script type="text/javascript">
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
				$.getJSON( "/job/skillSearch", {
					term: extractLast( request.term )
				}, response );
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
});
</script>
@stop
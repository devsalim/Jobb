@extends('master')

@section('content')
																			
<div class="row">
		<div class="col-md-9">
			<label style="font-size: 18px;text-align: center;width:100%;border-bottom:2px solid darkred;">Do you like to Post Job?<br>Post Job for FREE!!</label>	
		<div class="portlet box" id="form_wizard_1">
			
			<div class="portlet-body form">
				<!-- <form action="#" class="form-horizontal"  method="POST"> -->
				<form action="{{ url('job/store') }}" method="post" id="submit_form" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">
								
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
									<span class="desc">
									Job </span>
									</a>
									
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">
									
									<span class="desc">
									Skills </span>
									</a>
									
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">
									
									<span class="desc">
									 Contact</span>
									</a>
									
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">
									
									<span class="desc">
									 Confirm </span>
									</a>
									
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar" style="background-color: transparent;height: 10px;">
								<!--  -->
								<div class="progress-bar progress-bar-success">
								</div>
							</div>
							<div class="tab-content">
								@if (count($errors) > 0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								<div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div>
								<div class="tab-pane active" id="tab1">
									<!-- <h3 class="block">Provide your account details</h3> -->
									<input type="hidden" name="post_id" value"rand(11111,99999)">
									<div class="col-md-12">
										<div class="form-group">
											<label>Job Title</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user" style="color:darkcyan;"></i></span>
												<input type="text" name="post_title" class="form-control" placeholder="Job Title">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Job Details</label>
											<div class="" style=" padding-bottom: 10px;">
												<textarea name="job_detail" class="form-control" rows="6"></textarea>
											</div>
										</div>
									</div>
									
									<div class="col-md-5">
										<div class="form-group">
											<label>Job Category</label>
											<div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-university " style="color:darkcyan;"></i>
											</span>
											<select class="form-control" name="prof_category">
												<optgroup label="Accounting">
												<option value="Accounts/Finance/Tax">Accounts/Finance/Tax</option>
												<option value="Agent">Agent</option>
												<option value="Analytics & Business Intelligence">Analytics & Business Intelligence</option>
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
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Job Role</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-university" style="color:darkcyan;"></i>
												</span>
												<select name="role" class="form-control" >
													<option value="Web Developer">Web Developer</option>
													<option value="Software Developer">Software Developer</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Company Name</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user" style="color:darkcyan;"></i>
												</span>
												<input type="text" name="post_compname" class="form-control" placeholder="Company Name">
											</div>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Reference Id</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-user" style="color:darkcyan;"></i>
												</span>
												<input type="text" name="reference_id" class="form-control" placeholder="Reference Id">
											</div>
										</div>
									</div>													
									<!--/span-->
									<div class="form-group">
										
									</div>
								</div>
								<div class="tab-pane" id="tab2">
									<div class="col-md-5">
										<div class="form-group">
											<!-- <form action="{{ url('job/newskill') }}" id="newskillfrm" method="post">					
											<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
											<div class="input-group">
												<input type="text" name="name" id="newskill" class="form-control" placeholder="Search for skill...">
												<span class="input-group-btn">
													<button id="add-new-skill" class="btn btn-success hide" type="button"><i class="icon-plus"></i> Add</button>	
												</span>
											</div>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="form-group">
										    <input type="text" id="linked_skill" name="linked_skill" 
										     		class="form-control select2"
										     		placeholder="List of skills to be added">
										    <input type="hidden" id="linked_skill_id" name="linked_skill_id" 
										     		class="form-control">
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label> Required Education</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-university"></i>
												</span>
												<select class="bs-select form-control" name="education" multiple>
													<option value="Any Diploma">Any Diploma</option>
													<option value="Any Graduate">Any Graduate</option>
													<option value="Any Post Graduate">Any Post Graduate</option>
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
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Job Type</label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon-hourglass" style="color:darkcyan;"></i>
												</span>
												<select name="time_for" class="form-control" >
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Freelancer">Freelancer</option>
												</select>
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-12">
										<div class="form-group">
											<!-- <label>Job Title</label> -->
											<div class="input-group">
												<input type="checkbox" id="resume-check" name="resume_required" value="1" class="form-control">
												<label>Resume Required to apply for this Job</label>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">							
											<label class=" control-label">Experience </label>&nbsp;: <input type="text" style="width: 20px;background:transparent;border:0" name="min_exp" class="min-exp">-
											<input type="text" style="width: 14px;margin:0 4px;background:transparent;border:0" name="max_exp" class="max-exp">Years
											<div class="">
												<input id="range_1" type="text"  value=""/>
												<!-- <input type="hidden" name="min_exp" class="min-exp">
												<input type="hidden" name="max_exp" class="max-exp"> -->
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="col-md-2"></div>
									<div class="col-md-5">
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
												<input id="range_7" type="text"  value=""/>
												<!-- <label name="min_sal" class="min-sal"></label> -->
												<!-- <input type="hidden" name="min_sal" class="min-sal">
												<input type="hidden" name="max_sal" class="max-sal"> -->
											</div>
										</div>
									</div>
									<!--/span-->
									<div class="form-group">
										
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<div class="col-md-5">
										<div class="form-group">
											<label>Job Location</label>
											
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon-pointer" style="color:darkcyan;"></i>
												</span>
												<input type="text" name="city" class="form-control" placeholder="City, State">
											</div>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5">
										<div class="form-group">
											<label>Post Duration</label>
											<div class="input-group">
												<span class="input-group-addon">
												<i class="icon-clock" style=" color: darkcyan;"></i>
												</span>
												<select name="post_duration" class="form-control" >						
													<option value="3">3 Days</option>
													<option value="7">7 Days</option>
													<option value="15">15 Days</option>
													<option value="30">30 Days</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label style="margin-left: -5px;"><input id="hide-apply" type="checkbox"></label><label>&nbsp;Apply On Company Website</label>
											<div id="" class="input-group show-apply">
												<span class="input-group-addon">
													<i class="icon-info"style="color:darkcyan;"></i>
												</span>
												<input type="text" name="website_redirect_url" class="form-control" value="" placeholder="http://">
											</div>
										</div>
									</div>
									<div class="col-md-2"></div>
									<div class="col-md-5 show-apply-email">
										<div class="form-group">
											<label>Contact Person</label>
											<div class="input-group">
											<span class="input-group-addon">
											<i class="icon-call-end" style="color:darkcyan;"></i>
											</span>
											<input type="text" name="contact_person" class="form-control" placeholder="Contact Person">
											</div>
										</div>
									</div>
										<!--/span-->
									<div class="show-apply-email">
											<div class="col-md-5">
												<div class="form-group">
													<label>Email Id (Registered)</label>
													<div class="input-group">
													<span class="input-group-addon" >
													<i class="icon-envelope" style="color:darkcyan;"></i>
													
													</span>
													<input type="text" name="email_id" value="{{ Auth::user()->email }}" class="form-control" placeholder="">
													</div>
												</div>
											</div>
											<!--/span-->
											<div class="col-md-2"></div>
											<div class="col-md-5">
												<div class="form-group">
													<label>Phone No (Registered)</label>
													<div class="input-group">
													<span class="input-group-addon">
													<i class="icon-call-end" style="color:darkcyan;"></i>
													</span>
													<input type="text" name="phone" value="{{ Auth::user()->mobile }}"  class="form-control" placeholder="">
													
													</div>
												</div>
											</div>
											<!--/span-->
										</div>
									<div class="form-group">
									
									</div>
								</div>
								<div class="tab-pane" id="tab4">
									
									<input type="hidden" name="post_type">
											<div class="form-body">
												@if(Auth::user()->induser)
												<div class="row" style="margin-top: -20px;">	
													<div class="col-md-12">
														<div class="form-group">
															<label>Who can see this Post</label>
															{{-- <input type="hidden" name="tag_friends" id="select2_sample7" class="form-control select2" value="All"> --}}
															{!! Form::select('connections[]', $connections, null, ['id'=>'connections', 'class'=>'form-control', 'multiple']) !!}
														</div>
													</div>
												</div>
												@endif				
											</div>
											<?php $var = 1; ?>
											<div class="portlet light bordered" style="border: none !important;background:transparent">										
												<div class="portlet-body form">
													<!-- BEGIN FORM-->
														<div class="form-body">
															<div class="row">																				
																<div class="col-md-12" style="">												
																		<div class="timeline" style="margin: 0 -25px;">
																		<!-- TIMELINE ITEM -->
																		<div class="timeline-item time-item" style="margin: -30px 0px 0px 0px;">
																			<div class="timeline-body" style="margin-left: 0;">
																				<div class="timeline-body-content" style="margin-top: -25px;">
																					<!-- <span class="font-grey-cascade"> -->
																						<div style="font-weight: 600;color: black;font-size: 16px;"><p class="form-control-static" data-display="post_title"></p>  </div>
																						 <div><div> <h4 style="margin: 0 0 4px 0;"> <p class="form-control-static" data-display="post_compname"></p> </h4></div>  </div>		 							
																					<!-- </span> -->
																					
																						
																							<i class="icon-pointer"></i>&nbsp;: <p class="form-control-static" data-display="city"></p>
																						
																						<br><i class="icon-briefcase"></i>&nbsp;: <p class="form-control-static" data-display="min_exp"></p>-<p class="form-control-static" data-display="max_exp"></p> Years
																						
																						
																					
																				</div>		
																				<div class="post-job-skill-bar">
																					<div class="job"><a class="post-type-class">Job</a></div>
																				</div>
																			</div>
																			<div class="portlet-body" style="margin: 0 -5px;">
																			<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
																				<div class="panel panel-default" style=" position: relative;">
																					<div class="panel-heading">
																						<h4 class="panel-title">
																						<a class="accordion-toggle accordion-toggle-styled" 
																						data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;">
																						Details:</a>	
																						</h4>
																					</div>
																					<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
																						<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
																							
																							Education Required: <p class="form-control-static" data-display="education"></p><br>
																							Role: <p class="form-control-static" data-display="role"></p><br>
																							Job Category: <p class="form-control-static" data-display="prof_category"></p><br>
																							Skill: <p class="form-control-static" data-display="linked_skill"></p><br>
																							 <div class="resume-required">Resume: Required</div><div class="not-required">Resume: Not Required</div><br>
																							Salary (<i class="fa fa-rupee (alias)"></i>): <p class="form-control-static" data-display="min_sal"></p>-<p class="form-control-static" data-display="max_sal"></p> <p class="form-control-static" data-display="salary_type"></p><br>
																							Description:
																							<div class="row">
																								<div class="col-md-11">
																									<p class="form-control-static" data-display="job_detail"></p>
																								</div>
																							</div>
																							<div >Reference Id: <p class="form-control-static" data-display="reference_id"></p></div>
																							<div >Post Duration: <p class="form-control-static" data-display="post_duration"></p></div>
																							<div class="skill-display">Contact Details:<br> </div>
																							<div class="show-apply">Apply on Company Website:<p class="form-control-static" data-display="website_redirect_url"></p></div><br>
																							<div id="con" class="show-apply-email">
																							Contact Person: <p class="form-control-static" data-display="contact_person"></p><br>

																								<i class="glyphicon glyphicon-envelope" style="color: #13B8D4;font-size: 16px;"></i>&nbsp;:<p class="form-control-static" data-display="email_id"></p>
																								 
																							<br>
																								<i class="glyphicon glyphicon-earphone" style="color: green;font-size: 16px;"></i>&nbsp;:<p class="form-control-static" data-display="phone"></p>
																								</div> 
																							<div class="skill-display">Post Id&nbsp;:  </div> 

																						</div>
																					</div>
																					
																				</div>
																			</div>
																		</div>
																		</div>

																		<!-- END TIMELINE ITEM -->
																	</div>
																</div>	
																
																<!-- END TIMELINE ITEM -->
															
															</div>
														</div>
													
													<!-- END FORM-->
												</div>
											</div>	
										<?php $var++; ?>
									
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<a href="javascript:;" class="btn default button-previous">
									<i class="m-icon-swapleft"></i> Back </a>
									<a href="javascript:;" class="btn blue button-next">
									Continue <i class="m-icon-swapright m-icon-white"></i>
									</a>
									<!-- <a href="javascript:;" class="btn green ">
									Submit <i class="m-icon-swapright m-icon-white"></i>
									</a> -->
									<button type="submit" class=" btn blue button-submit">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

@stop


@section('javascript')

<script>
jQuery(document).ready(function() {       
	ComponentsIonSliders.init();    
	ComponentsDropdowns.init();
	ComponentsEditors.init();
    FormWizard.init();
});
</script>
<script type="text/javascript">
    $(function () {
    	$("#hide-sal").hide();
        $("#hide-check").click(function () {
            if ($(this).is(":checked")) {
                $("#hide-sal").show();
            } else {
                $("#hide-sal").hide();
            }
        });
    });

        $(function () {
        $("#resume-check").click(function () {
            if ($(this).is(":checked")) {
                $(".resume-required").show();
                $(".not-required").hide();
            } else {
            	$(".not-required").show();
                $(".resume-required").hide();
                
            }
        });
    });

    $('#connections').select2();
</script>
<script type="text/javascript">
	 $(function () {
	 	$(".show-apply").hide();
        $("#hide-apply").click(function () {
            if ($(this).is(":checked")) {
                $(".show-apply").show();
                $(".show-apply-email").hide();
                 
            } else {
                $(".show-apply-email").show();
                $(".show-apply").hide();
            }
        });
    });

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
});
</script>
@stop

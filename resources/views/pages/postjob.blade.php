@extends('master')

@section('content')
																			
<div class="row">
	<div class="col-md-9">
		<label class="post-job-heading">
			Do you like to Post Job?<br>
			Post Job for FREE!!
		</label>	
		<div class="portlet box" id="form_wizard_1">			
			<div class="portlet-body form">
				<form action="{{ url('job/store') }}" method="post" id="submit_form" 
					  data-toggle="validator" role="form" class="form-horizontal">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-wizard">
						<div class="form-body">
							<ul class="nav nav-pills nav-justified steps">							
								<li>
									<a href="#tab1" data-toggle="tab" class="step">
										<span class="desc">Job</span>
									</a>									
								</li>
								<li>
									<a href="#tab2" data-toggle="tab" class="step">									
										<span class="desc">Skills </span>
									</a>									
								</li>
								<li>
									<a href="#tab3" data-toggle="tab" class="step active">							
										<span class="desc">Contact</span>
									</a>									
								</li>
								<li>
									<a href="#tab4" data-toggle="tab" class="step">									
										<span class="desc">Confirm</span>
									</a>									
								</li>
							</ul>
							<div id="bar" class="progress progress-striped" role="progressbar">
								<div class="progress-bar progress-bar-success"></div>
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
								<!-- <div class="alert alert-danger display-none">
									<button class="close" data-dismiss="alert"></button>
									You have some form errors. Please check below.
								</div>
								<div class="alert alert-success display-none">
									<button class="close" data-dismiss="alert"></button>
									Your form validation is successful!
								</div> -->
								<div class="tab-pane active" id="tab1">
									<input type="hidden" name="post_id" value"rand(11111,99999)">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="input-icon right">
													<i class="fa"></i>
													<label>Job Title <span class="required">*</span></label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-flag" style="color:darkcyan;"></i>
														</span>
														<input type="text" name="post_title" class="form-control" 
															   placeholder="Job Title" required>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Job Details <span class="required">*</span></label>								
											<textarea name="job_detail" onkeyup="countChar(this)" class="form-control autosizeme" rows="6"></textarea>
											<div id="charNum" style="text-align:right;"></div>
										</div>
									</div>
									</div>


									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>
													Job Role <span class="required">*</span>
												</label>

												<div class="input-group">	
													<span class="input-group-addon">
														<i class="fa fa-cube" style="color:darkcyan;"></i>
													</span>			
													<select class="job-role-ajax form-control" name="role" id="jobrole">
												  		<option value="0" selected="selected"></option>
													</select>													
												</div>
												example: manager, admin, secretory <a href="#all-roles" data-toggle="modal" >see all</a>

												<div id="charNum" style="text-align:right;"></div>
											</div>
										</div>
									</div>
									<input type="hidden" name="prof_category" value="prof_category">

									@if(Auth::user()->identifier == 1)
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
												<div class="input-icon right">
														<i class="fa"></i>
													<label>Company Name</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-building" style="color:darkcyan;"></i>
														</span>
														<input type="text" id="comp_name_1" style="z-index:0;" name="post_compname" class="form-control" placeholder="Company Name">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2"></div>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
												<label>Reference Id</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-info" style="color:darkcyan;"></i>
													</span>
													<input type="text" id="ref_id_1" style="z-index:0;" name="reference_id" class="form-control" placeholder="Reference Id">
												</div>
											</div>
										</div>
									</div>	
									@elseif(Auth::user()->identifier == 2 && Auth::user()->corpuser->firm_type == "consultancy")
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
												<div class="input-icon right">
														<i class="fa"></i>
													<label>Company Name</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-building" style="color:darkcyan;"></i>
														</span>
														<input type="text" id="comp_name_2" name="post_compname" class="form-control" placeholder="Company Name">
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-2 col-sm-2 col-xs-2"></div>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
												<label>Reference Id</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-info" style="color:darkcyan;"></i>
													</span>
													<input type="text" id="ref_id_2" name="reference_id" class="form-control" placeholder="Reference Id">
												</div>
											</div>
										</div>
									</div>	
									@elseif(Auth::user()->identifier == 2 && Auth::user()->corpuser->firm_type == "company")
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
												<label>Reference Id</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-info" style="color:darkcyan;"></i>
													</span>
													<input type="text" id="ref_id_3" name="reference_id" style="z-index:0;" class="form-control" placeholder="Reference Id">
												</div>
											</div>
										</div>
									</div>	
									@endif	
								</div>
								<div class="tab-pane" id="tab2">
									<div class="row">
									<div class="col-md-5 col-sm-5 col-xs-12">
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
									<div class="col-md-2 col-sm-2 col-xs-2"></div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="form-group">
											<label>Added Skills <span class="required">
															* </span></label>
										    <input type="text" readonly id="linked_skill" name="linked_skill" 
										     		class="form-control select2"
										     		placeholder="List of skills to be added">
										    <input type="hidden" id="linked_skill_id" name="linked_skill_id" 
										     		class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label> Required Education <span class="required">
															* </span></label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon-hourglass" style="color:darkcyan;"></i>
												</span>
												<select class="form-control" name="education" id="education" multiple=multiple style="margin: 20px;width:300px;" style="float:none;">
													
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
									<div class="col-md-2 col-sm-2 col-xs-2"></div>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="form-group">
											<label>Job Type <span class="required">
											* </span></label>
											<div class="input-group">
												<span class="input-group-addon">
													<i class="icon-hourglass" style="color:darkcyan;"></i>
												</span>
												<select name="time_for" class="form-control" style="z-index:0;">
													<option value="">-- select --</option>
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Freelancer">Freelancer</option>
													<option value="Work from Home">Work from Home</option>
												</select>
											</div>
										</div>
									</div>
								</div>
									<!--/span-->
								<div class="row">
									<div class="ccol-md-5 col-sm-5 col-xs-12">
										<div class="form-group">							
											<label class=" control-label">Experience </label>&nbsp;: 
													<input type="text" readonly id="slider-range-exp1" name="min_exp" class="input-exp-width" /> - 
													<input type="text" readonly id="slider-range-exp2" name="max_exp" class="input-exp-width" /> Years
											<div id="slider-range-exp" class="slider bg-gray">
												</div>
												
										</div>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2"></div>
									
									<div class="ccol-md-5 col-sm-5 col-xs-12">
										<div class="form-group">							
											<label class=" control-label"><input type="checkbox" id="hide-check"> Salary </label>&nbsp;: 
													<label class="hide-sal input-sal-exp-label"><i class="fa fa-rupee (alias)" style="font-size:12px;"></i></label>
													<input type="text" readonly id="slider-range-amount1" name="min_sal" class="input-sal-width hide-sal" />
													<label class="hide-sal input-sal-exp-label">- <i class="fa fa-rupee (alias)" style="font-size:12px;"></i></label>
													<input type="text" readonly id="slider-range-amount2" name="max_sal" class="input-sal-width hide-sal" />
											<select name="salary_type" class="hide-sal input-sal-exp-label" style="border-top: 0px;border-left: 0;border-right: 0;width:75px">									
												<option value="Monthly">Monthly</option>
												<option value="Weekly">Weekly</option>
												<option value="Daily">Daily</option>
												<option value="Hourly">Hourly</option>
												<option value="Per Visit">Per Visit</option>	
											</select>
											<div class="hide-sal">
												<div id="slider-range" class="slider bg-gray"></div>
											</div>
										</div>
									</div>
								</div>
									<!--/span-->
									<div class="form-group">
										
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group new-margin-formgroup">
												<label>Job Location <span class="required">
											* </span></label>
												<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-map-marker" style="color:darkcyan;"></i>
												</span>
													<select id="select2_sample_modal_2" placeholder="Job Location" name="city" class="form-control select2" multiple>
														<option value="">-- select --</option>
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
										<div class="col-md-2 col-sm-2 col-xs-2"></div>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group new-margin-formgroup">
												<div class="input-icon right">
													<i class="fa"></i>
													<label>Locality</label>
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-map-marker" style="color:darkcyan;"></i>
														</span>
														<input type="text" name="locality" class="form-control" 
															   placeholder="Locality">
													</div>
												</div>
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group">
											<label style="margin-left: -5px;"><input id="hide-apply" name="apply-check" type="checkbox"></label><label>&nbsp;Apply On Company Website</label>
											<div id="" class="input-group show-apply">
												<span class="input-group-addon">
													<i class="icon-info"style="color:darkcyan;"></i>
												</span>
												<input type="text" name="website_redirect_url" class="form-control" value="" placeholder="http://">
											</div>
											</div>
										</div>
										<div class="col-md-2 col-sm-2"></div>
										<div class="col-md-5 col-sm-5 col-xs-12 show-apply-email">
											<div class="form-group">
											<!-- <label>Job Title</label> -->
												<div class="input-group">
													<input type="checkbox" id="resume-check" name="resume_required" value="1" class="form-control">
													<label>Resume Required to apply for this Job</label>
												</div>
											</div>
										</div>
										<div class="col-md-5 col-sm-5 col-xs-12">
											<div class="form-group new-margin-formgroup">
												<label>Post Duration <span class="required">
													* </span></label>
												<div class="input-group">
													<span class="input-group-addon">
													<i class="icon-clock" style=" color: darkcyan;"></i>
													</span>
													<select name="post_duration" class="form-control" >
														<option value="">--select--</option>					
														<option value="3">3 Days</option>
														<option value="7">7 Days</option>
														<option value="15">15 Days</option>
														<option value="30">30 Days</option>
													</select>
												</div>
											</div>
										</div>
									<!-- </div> -->
									<!-- <div class="row"> -->
										<div class="col-md-2"></div>
										@if(Auth::user()->identifier == 2)
										<div class="col-md-5 show-apply-email">
											<div class="form-group">
												<label>Contact Person</label>
												<div class="input-group">
												<span class="input-group-addon">
												<i class="glyphicon glyphicon-user" style="color:darkcyan;"></i>
												</span>
												<input type="text" name="contact_person" value="{{ Auth::user()->corpuser->username }}" class="form-control" placeholder="Contact Person">
												</div>
											</div>
										</div>
										@else
										<div class="col-md-5 show-apply-email">
											<div class="form-group">
												<label>Contact Person</label>
												<div class="input-group">
												<span class="input-group-addon">
												<i class="glyphicon glyphicon-user" style="color:darkcyan;"></i>
												</span>
												<input type="text" name="contact_person" value="{{ Auth::user()->name }}" class="form-control" placeholder="Contact Person">
												</div>
											</div>
										</div>
										@endif
									</div>
										<!--/span-->
									<div class="row show-apply-email">
											<div class="col-md-5">
												<div class="form-group">
													<label>Email Id (Registered)</label>
													<div class="input-group">
													<span class="input-group-addon" >
													<i class="icon-envelope" style="color:darkcyan;"></i>
													
													</span>
													<input type="text" name="email_id" value="{{ Auth::user()->email }}" class="form-control group" placeholder="">
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
													<input type="text" name="phone" minlength="10" value="{{ Auth::user()->mobile }}"  class="form-control group" placeholder="">
													
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
											<div class="row">	
												<div class="col-md-4">											
													<h4>Who can see this Post</h4>
												</div>
												<div class="col-md-8">
													<label for="tag-group-all" style="padding: 5.5px 12px;">
														<input type="checkbox" id="tag-group-all" name="tag-group" value="all" class="md-radiobtn">
														Public 
													</label>
													<label for="tag-group-links" style="padding: 5.5px 12px;">
														<input type="checkbox" id="tag-group-links" name="tag-group" value="links" class="md-radiobtn" >
														Links 
													</label>
													<label for="tag-group-groups" style="padding: 5.5px 12px;">
														<input type="checkbox" id="tag-group-groups" name="tag-group" value="groups" class="md-radiobtn" >														
														Groups 
													</label>
												</div>
											</div>

											<div class="row">	
											  	<div class="col-md-12"><hr style="margin:0 0 15px 0"></div>
											</div>

											<div class="row">	
												<div class="col-md-6" id="connections-list">
													<div class="form-group">
														<label>Links</label>
														{!! Form::select('connections[]', $connections, null, ['id'=>'connections', 'class'=>'form-control', 'multiple']) !!}								
													</div>									
													{{-- <input type="hidden" name="tag_friends" id="select2_sample7" class="form-control select2" value="All"> --}}
												</div>
												<div class="col-md-6" id="groups-list">
													<div class="form-group" >
														<label>Groups</label>
														{!! Form::select('groups[]', $groups, null, ['id'=>'groups', 'class'=>'form-control', 'multiple']) !!}	
													</div>												
												</div>
											</div>
											@endif	
											<?php $var = 1; ?>
											
											<div class="row">																				
												<div class="col-md-12" style="">												
														<div class="timeline">
														<!-- TIMELINE ITEM -->
														<div class="timeline-item time-item">
															<div class="timeline-body" style="margin: 0;">
																<div class="timeline-body-content" style="margin: 0;">
																	<div style="font-weight: 600;color: black;font-size: 16px;">
																		<p class="form-control-static" data-display="post_title"></p>
																	</div>
																	<div>
																	 	<div> 
																	 		<h4 style="margin: 0 0 4px 0;"> 
																	 			<p class="form-control-static" data-display="post_compname"></p> 
																	 		</h4>
																	 	</div>  
																	</div>
																	<i class="icon-pointer"></i>&nbsp;: 
																	<p class="form-control-static" data-display="city"></p><br>
																	<i class="icon-briefcase"></i>&nbsp;: 
																	<p class="form-control-static" data-display="min_exp"></p>-
																	<p class="form-control-static" data-display="max_exp"></p> Years
																</div>		
																{{-- <div class="post-job-skill-bar">
																	<div class="job"><a class="post-type-class">Job</a></div>
																</div> --}}
																<div class="box">
																   <div class="ribbon"><span class="job">Job</span></div>
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
														
													
													<!-- END FORM-->
													
										<?php $var++; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div style="margin: auto;display: table;">
								<a href="javascript:;" class="btn default button-previous">
									<i class="m-icon-swapleft"></i> Back 
								</a>
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
				</form>
			</div>
		</div>
	</div>
	</div>


<!-- BEGIN ROLE MODAL-->
<div class="modal fade" id="all-roles" tabindex="-1" role="dialog" aria-labelledby="Roles" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Roles</h4>
      </div>
      <div class="modal-body">
	      <ol>
	      	@foreach($roles as $role)
	      	<li><a href="#" data-jrole="{{$role->name}}">{{$role->name}}</a></li>
	      	@endforeach
	      </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END ROLE MODAL -->


<div id="loader" style="display:none;z-index:9999;background:white" class="page-loading">
	<img src="/assets/loader.gif"><span> Please wait...</span>
</div>

@stop


@section('javascript')

<script>
jQuery(document).ready(function() {       
	ComponentsIonSliders.init();  
	 
	ComponentsDropdowns.init();
	ComponentsEditors.init();
    FormWizard.init();
    ComponentsjQueryUISliders.init(); 
});
</script>
<script type="text/javascript">
function loader(arg){
    if(arg == 'show'){
        $('#loader').show();
    }else{
        $('#loader').hide();
    }
}
	function countChar(val) {
		var len = val.value.length;
		if (len >= 1000) {
			val.value = val.value.substring(0, 1000);
		} else {
			$('#charNum').text(1000 - len);
		}
	};
   
    $("#education").multipleSelect({
        filter: true,
        multiple: true
    });

    var job_categories = new Array();
	function addRole(val){
		job_categories.push(val);		
		// console.log(job_categories); 
	}

	function removeRole(val){
		job_categories.splice( job_categories.indexOf(val), 1 );
		// console.log(job_categories); 
	}
    
	$("#job_categories").multipleSelect({
		onClick: function(view) {
			view.checked ? addRole(view.value) : removeRole(view.value);
		},
		onClose: function() {	
			if(job_categories.length > 0){
				loader('show');
				$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });
				$.ajax({
					url: '/jobcategory/roles',
					type: "post",
					data: {category: job_categories},
					cache : false,
					success:function(data){
						var $select = $('#job_roles');
						$select.html(' ');
						$.each(data.role, function(key, val){
						  $select.append('<option id="' + val.job_role + '">' + val.job_role + '</option>');
						});
						loader('hide');
					},
					error:function(data){
						console.log(data);
						loader('hide');
					}
				});
			}else{
				var $select = $('#job_roles');
				$select.html(' ');
				$select.append('<option id="">Please select job category</option>');
			}
		}	
	});
    </script>
<script type="text/javascript">
    $(function () {
    	$(".hide-sal").hide();
        $("#hide-check").click(function () {
            if ($(this).is(":checked")) {
                $(".hide-sal").show();
            } else {
                $(".hide-sal").hide();
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
    $('#groups').select2();
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

	// user post tagging
	/*$("#connections-list").hide();
    $("#groups-list").hide();*/
   /* $("#connections").prop('required',false);
    $("#groups").prop('required',false);*/
    $("#connections").prop('disabled',true);
    $("#groups").prop('disabled',true);
    $("#tag-group-all").prop('checked', true);
	$("input[name$='tag-group']").click(function() {
        var selected = $(this).val();
        if(selected == 'all' && $(this).prop('checked')){
        	/*$("#connections-list").hide();
        	$("#groups-list").hide();
        	$("#connections").hide();
        	$("#groups").hide();*/
        	$("#connections").prop('required',false);
        	$("#groups").prop('required',false);
        	$("#connections").prop('disabled',true);
        	$("#groups").prop('disabled',true);
        	$("#tag-group-links").prop('checked', false);
        	$("#tag-group-groups").prop('checked', false);
        }else if(selected == 'links' && $(this).prop('checked')){
        	/*$("#connections-list").show();
        	$("#groups-list").show();
        	$("#connections").show();
        	$("#groups").show();*/
        	$("#connections").prop('required',true);
        	$("#connections").prop('disabled',false);
        	if ($("#groups").prop('disabled') === false) {
	        	$("#groups").prop('disabled',false);
	        }else{
	        	$("#groups").prop('disabled',true);
	        }
	        if ($("#groups").prop('required') === false) {
	        	$("#groups").prop('required',false);
	        }else{
	        	$("#groups").prop('required',true);
	        }
        	$("#tag-group-all").prop('checked', false);
        }else if(selected == 'groups' && $(this).prop('checked')){
        	/*$("#connections-list").show();
        	$("#groups-list").show();
        	$("#connections").show();
        	$("#groups").show();*/
        	$("#groups").prop('required',true);
        	$("#groups").prop('disabled',false);
        	if ($("#connections").prop('disabled') === false) {	        	
        		$("#connections").prop('disabled',false);
	        }else{
	        	$("#connections").prop('disabled',true);
	        }
	        if ($("#connections").prop('required') === false) {	        	
        		$("#connections").prop('required',false);
	        }else{
	        	$("#connections").prop('required',true);
	        }
        	$("#tag-group-all").prop('checked', false);
        }else if(selected == 'links' && $(this).prop('checked') === false){
        	$("#connections").prop('disabled',true);
        	if($("#tag-group-groups").prop('checked') === false){
	        	$("#tag-group-all").prop('checked', true);
	        }
        }else if(selected == 'groups' && $(this).prop('checked') === false){
        	$("#groups").prop('disabled',true);
        	if($("#tag-group-links").prop('checked') === false){
	        	$("#tag-group-all").prop('checked', true);
	        }
        }
    }); 

});










// var values = new Array();
// $("#job_categories").change(function() {

// 	// alert('Selected values: ' + $('#job_categories').multipleSelect('getSelects'));

// 	var val = $('#job_categories').multipleSelect('getSelects');
// 	values.push(val);
//     console.log(values);   

//  //    if(this.checked) { 
//  //        values.push($(this).val());
//  //      	console.log(values);       
//  //    }
//  //    if(!this.checked){
//  //    		values.pop($(this).val());
//  //      	console.log(values); 
//  //    }
// });

$(".job-role-ajax").select2({
	placeholder: 'Enter a role',
  ajax: {
    url: "/post/jobroles/",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      return {
        q: params.term, // search term
        page: params.page
      };
    },
    processResults: function (data, params) {
      return {
        results: data
      };
    },
    cache: true
  },
  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 2,
  templateResult: formatRepo, // omitted for brevity, see the source of this page
  templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
});

function formatRepo (repo) {
      if (repo.loading) return repo.text;

      var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__meta'>" +
          "<div class='select2-result-repository__title'><b>Role</b>: " + repo.role + "</div>";

      markup += "<div class='select2-result-repository__statistics'>" +
        "<div class='select2-result-repository__forks'><b>Functional area: </b> " + repo.functional_area + " Forks</div>" +
        "<div class='select2-result-repository__stargazers'><b>Industry</b>: " + repo.industry + " Stars</div>" +
      "</div>" +
      "</div></div>";

      return markup;
    }

    function formatRepoSelection (repo) {
      return repo.role;
    }

$(document).on('click', 'a', function(event, ui) {
    var jrole = $(this).data('jrole');

    $.ajaxSetup({
        headjroleers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    if(jrole != null){
      event.preventDefault();
      $('#all-roles').modal('hide');
      $('#jobrole').select2('open');
      $('.select2-search__field').val(jrole);
      $('.select2-search__field').trigger('keyup');
       // $('.select2-dropdown').hide();
    }
});

 

</script>
@stop

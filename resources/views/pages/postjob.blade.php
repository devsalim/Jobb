@extends('master')

@section('content')
									
<label style="font-size: 19px;text-align: center;margin: auto;width: 75%;border-bottom:2px solid darkred;">Do you know about any job opening?<br>Post Job information for FREE!!</label>										
	
<div class="row">
		<div class="col-md-9">
						<div class="portlet box blue" id="form_wizard_1">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> Post Job - <span class="step-title">
									Step 1 of 4 </span>
								</div>
								<div class="tools hidden-xs">
									<a href="javascript:;" class="collapse">
									</a>
									
								</div>
							</div>
							<div class="portlet-body form">
								<!-- <form action="#" class="form-horizontal"  method="POST"> -->
								<form action="{{ url('job/store') }}" method="post" id="submit_form" class="form-horizontal">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-wizard">
										<div class="form-body">
											<ul class="nav nav-pills nav-justified steps">
												<li>
													<a href="#tab1" data-toggle="tab" class="step">
													<!-- <span class="number">
													1 </span> -->
													<span class="desc">
													<i class="fa fa-check"></i> Job Details </span>
													</a>
												</li>
												<li>
													<a href="#tab2" data-toggle="tab" class="step">
													<!-- <span class="number">
													2 </span> -->
													<span class="desc">
													<i class="fa fa-check"></i> Company Details </span>
													</a>
												</li>
												<li>
													<a href="#tab3" data-toggle="tab" class="step active">
													<!-- <span class="number">
													3 </span> -->
													<span class="desc">
													<i class="fa fa-check"></i> Location </span>
													</a>
												</li>
												<li>
													<a href="#tab4" data-toggle="tab" class="step">
													<!-- <span class="number">
													4 </span> -->
													<span class="desc">
													<i class="fa fa-check"></i> Confirm </span>
													</a>
												</li>
											</ul>
											<div id="bar" class="progress progress-striped" role="progressbar" style="background-color: transparent;">
												<div class="progress-bar progress-bar-success" style="height:5px;">
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
													<div class="col-md-12">
														<div class="form-group">
															<label>Job Title</label>
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="fa fa-user" style="color:darkcyan;"></i>
																</span>
																<input type="text" name="post_title" class="form-control" placeholder="Job Title">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label>Job Details</label>
															<div class="" style=" padding-bottom: 10px;">
																<textarea name="job_detail" class="wysihtml5 form-control" rows="6"></textarea>
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
															<label>Key Skills</label>
														      <input type="text" id="skill" name="skill" class="form-control" placeholder="Search for skill...">
															<!--{!! Form::select('skill_list[]', $skills, null, ['id'=>'skill-list', 'class'=>'form-control', 'multiple']) !!}-->
														</div>
													</div>
													<!--/span-->
													<div class="col-md-2">
														<div class="form-group" style="display:table;">
															<label>&nbsp;</label>
															<div class="input-group" style="text-align:center;">
														        <button class="btn btn-success" type="button">Add</button>
														    </div>
														</div>
													</div>
													<div class="col-md-5">
														<div class="form-group">
															<label>&nbsp;</label>
														     <input type="text" id="linked_skill" name="linked_skill" 
														     		class="form-control select2"
														     		placeholder="List of skills to be added">
														</div>
													</div>
													
												</div>
												<div class="tab-pane" id="tab2">
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
															<label>Employment Type</label>
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
															</label>&nbsp;:<select name="salary-type" style="border-top: 0px;border-left: 0;border-right: 0;">									
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
													<div class="col-md-5">
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
																	<span class="input-group-addon" style="width: 55px;">
																		Public
																	</span>
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
																	<span class="input-group-addon" style="width: 55px;">
																		Private
																	</span>
																	</div>
																</div>
															</div>
															<!--/span-->
														
														
															<div class="col-md-5">
																<div class="form-group">
																	<label>Alternate Email Id (Optional)</label>
																	<div class="input-group">
																	<span class="input-group-addon">
																	<i class="icon-envelope" style="color:darkcyan;"></i>
																	</span>
																	<input type="text" name="alt_emailid" class="form-control" placeholder="Email Id">
																	</div>
																</div>
															</div>
															<!--/span-->
															<div class="col-md-2"></div>
															<div class="col-md-5">
																<div class="form-group">
																	<label>Alternate Phone No (Optional)</label>
																	<div class="input-group">
																	<span class="input-group-addon">
																	<i class="icon-call-end" style="color:darkcyan;"></i>
																	</span>
																	<input type="text" name="alt_phone" class="form-control" placeholder="Phone No">
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
																											Salary (<i class="fa fa-rupee (alias)"></i>): <p class="form-control-static" data-display="min_sal"></p>-<p class="form-control-static" data-display="max_sal"></p> <p class="form-control-static" data-display="salary-type"></p><br>
																											Description:
																											<div class="row">
																												<div class="col-md-11">
																													<p class="form-control-static" data-display="job_detail"></p>
																												</div>
																											</div>
																											<div >Reference Id: <a class="form-control-static" data-display="reference_id"></a></div>
																											<div >Post Duration: <a class="form-control-static" data-display="post_duration"></a></div>
																											<div class="skill-display">Contact Details:<br> </div>
																											Company Website: <p class="form-control-static" data-display="website_redirect_url"></p><br>
																											Contact Person: <p class="form-control-static" data-display="contact_person"></p><br>
 
																												<i class="glyphicon glyphicon-envelope" style="color: #13B8D4;font-size: 16px;"></i>&nbsp;:<p class="form-control-static" data-display="email_id"></p>
																												 <p class="form-control-static" data-display="alt_emailid"></p>
																											<br>
																												<i class="glyphicon glyphicon-earphone" style="color: green;font-size: 16px;"></i>&nbsp;:<p class="form-control-static" data-display="phone"></p>
																												 <p class="form-control-static" data-display="alt_phone"></p>
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
</div>															<?php $var++; ?>
													<!-- <div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Job Title:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="post_title">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Job Details:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="job_detail">
															</p>
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Job Category:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="prof_category">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Job Role:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="role">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Key Skills:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="linked_skill">
															</p>
														</div>
													</div>
													<h4 class="form-section"></h4>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Company Name:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="post_compname">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Reference Id:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="reference_id">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Required Education:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="education">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Employment Type:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="time_for">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Experience:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="min_exp" data-display="max_exp">
															</p>
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Salary:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="min_sal" data-display="max_sal">
															</p>
														</div>
													</div>
													<h4 class="form-section"></h4>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Job Location:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="city">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Post Duration:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="post_duration">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-6 col-sm-6 col-xs-12">Company Website:</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<p class="form-control-static" data-display="website_redirect_url">
															</p>
														</div>
													</div> -->
													
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
													<button type="submit" class=" btn button-submit">Submit</button>
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
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormWizard.init();
});
</script>
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features  // set current page
   ComponentsIonSliders.init();
});
</script>
<script>
	jQuery(document).ready(function() { 
	    
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>
<script type="text/javascript">
    $(function () {
        $("#hide-check").click(function () {
            if ($(this).is(":checked")) {
                $("#hide-sal").show();
            } else {
                $("#hide-sal").hide();
            }
        });
    });

    $('#skill-list').select2();
    $('#linked-skill').select2({
  tags: true
});
    $('#connections').select2();
</script>
<script type="text/javascript">
	 $(function () {
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

		$( "#skill" )
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
				// remove the current input
				terms.pop();
				// add the selected item
				terms.push( ui.item.value );
				// add placeholder to get the comma-and-space at the end
				terms.push( "" );
				$('#linked_skill').val(terms.join( ", " ));
				$(this).val("");
				return false;
			}
		});
	});
</script>
@stop

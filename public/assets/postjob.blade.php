@extends('master')

@section('content')
									
<label style="font-size: 19px;text-align: center;width: 60%;border-bottom:1px solid darkred;">POST JOB</label>										
	

<div class="row">
		<div class="col-md-9" style="margin-top:15px;">
			<div class="col-md-1"></div>
		<div class="col-md-11">	
      <div class="stepwizard col-md-offset-3">
    <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Step 1</p>
      </div>
          <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Step 2</p>
      </div>
          <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Step 3</p>
      </div>
       <div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Step 4</p>
      </div>
        </div>
  </div>
  </div>
      <form action="{{ url('job/store') }}" method="post" id="submit_form" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row setup-content" id="step-1">
    	 <div class="col-md-12">
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
		<div class="col-md-12">
			<div class="form-group">
				<label>Key Skills</label>
				{{-- <input type="hidden" name="linked_skill" id="select2_sample5" class="form-control select2" value=""> --}}
				{!! Form::select('skill_list[]', $skills, null, ['id'=>'skill-list', 'class'=>'form-control', 'multiple']) !!}
			</div>
		</div>
		<!--/span-->
		<div class="col-md-12">
		<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Continue</button>
        </div>
        </div>
        </div>
    <div class="row setup-content" id="step-2">
          <!-- <div class="col-xs-6 col-md-offset-3"> -->
        <div class="col-md-12">
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
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
      <!-- </div> -->
        </div>
    <div class="row setup-content" id="step-3">
          <!-- <div class="col-xs-6 col-md-offset-3"> -->
        <div class="col-md-12">
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
				
			</div>
			<div class="form-group">
			
			</div>
              <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
           <!--  </div> -->
      </div>
        </div>
        <div class="row setup-content" id="step-4">
          <!-- <div class="col-xs-6 col-md-offset-3"> -->
        <div class="col-md-12">
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
			</div>	
		<?php $var++; ?>
             <button type="submit" class=" btn success button-submit">Submit</button>
            </div>
      <!-- </div> -->
        </div>
  </form>	
</div>
</div>
@stop


@section('javascript')
<!-- new test code -->
<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
		  allWells = $('.setup-content'),
		  allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
	  e.preventDefault();
	  var $target = $($(this).attr('href')),
			  $item = $(this);

	  if (!$item.hasClass('disabled')) {
		  navListItems.removeClass('btn-primary').addClass('btn-default');
		  $item.addClass('btn-primary');
		  allWells.hide();
		  $target.show();
		  $target.find('input:eq(0)').focus();
	  }
  });

  allNextBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		  curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
		  isValid = true;

	  $(".form-group").removeClass("has-error");
	  for(var i=0; i<curInputs.length; i++){
		  if (!curInputs[i].validity.valid){
			  isValid = false;
			  $(curInputs[i]).closest(".form-group").addClass("has-error");
		  }
	  }

	  if (isValid)
		  nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>
  <!-- new test code end -->
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
</script>
@stop

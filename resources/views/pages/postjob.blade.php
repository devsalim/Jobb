
<div class="portlet light">
	<div class="portlet-title">									
		<label style="font-size: 19px;text-align: center;margin: auto;width: 75%;border-bottom:2px solid darkred;">Do you know about any job opening?<br>Post Job information for FREE!!</label>									
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form" style="width: 71%;">
		<!-- BEGIN FORM-->
		<form action="{{ url('job/store') }}" method="post" class="horizontal-form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<input type="hidden" name="post_type">
			<div class="form-body">
				<div class="row">
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
				</div>
				<div class="row-md-3"></div>
				<div class="row-md-2"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Company Name</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-user" style="color:darkcyan;"></i>
								</span>
								<input type="text" name="post_compname" class="form-control" placeholder="Job Title">
							</div>
						</div>
					</div>
				</div>
				<!--/row-->
				<div class="row-md-2"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Job Category</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="fa fa-university " style="color:darkcyan;"></i>
							</span>
							<select class="bs-select form-control" name="prof_category">
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
					<div class="col-md-6">
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
					<!--/span-->
				</div>
				<div class="row-md-2"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>City</label>
							
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-map-marker" style="color:darkcyan;"></i>
								</span>
								<input type="text" name="city" class="form-control" placeholder="City">
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
								<select class="form-control" name="state">
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
				<!--/row-->
				<div class="row-md-2"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">							
							<label class=" control-label">Experience (in Years)</label>
							<div class="">
								<input id="range_1" type="text"  value=""/>
								<input type="hidden" name="min_exp" class="min-exp">
								<input type="hidden" name="max_exp" class="max-exp">
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">							
							<label class=" control-label"><input type="checkbox">&nbsp;Salary (<i class="fa fa-rupee (alias)"></i>/Month)</label>
							<div class="">
								<input id="range_7" type="text"  value=""/>
								<input type="hidden" name="min_sal" class="min-sal">
								<input type="hidden" name="max_sal" class="max-sal">
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="form-group">
						<label style="padding-left: 15px;">Job Details</label>
						<div class="col-md-12" style=" padding-bottom: 10px;">
						<textarea name="job_detail" class="wysihtml5 form-control" rows="6"></textarea>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Key Skills</label>
							<input type="hidden" name="linked_skill" id="select2_sample5" class="form-control select2" value="">
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label>Post Duration</label>
							<div class="input-group">
									<span class="input-group-addon">
									<i class="icon-clock"></i>
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
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Email Id (Registered)</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="icon-envelope" style="color:darkcyan;"></i>
							</span>
							<input type="text" name="email_id" class="form-control" placeholder="">
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
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
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Phone No (Registered)</label>
							<div class="input-group">
							<span class="input-group-addon">
							<i class="icon-call-end" style="color:darkcyan;"></i>
							</span>
							<input type="phone" name="phone" class="form-control" placeholder="">
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
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
			</div>
			<div class="form-actions">
				<button type="button" class="btn default">Cancel</button>
				<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

<script>
	jQuery(document).ready(function() {       
	   // initiate layout and plugins
	   	Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
	    ComponentsIonSliders.init();
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>
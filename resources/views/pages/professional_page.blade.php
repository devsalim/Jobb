<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Profile Detail</span>
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
					<div class="row-md-10" style=" margin-bottom: 20px;">
						<div class="profile-userpic user-image" style="margin-top: 20px;">
							<div class="hover-image"><h3 class="form-title" style="font-size: 14px;margin-left: 33px;"><a class="" style="color: white;text-decoration: blink; font-size:11px;" id="ajax-demo" data-toggle="modal">Upload Image </a></h3></div>
						</div>	<!-- ajax -->
						<div id="ajax-modal" class="modal fade" tabindex="-1"></div>
					</div>
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
										<i class="glyphicon glyphicon-font" style="color:darkcyan;"></i>
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
										<i class="glyphicon glyphicon-font" style="color:darkcyan;"></i>
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
										<i class="icon-call-end" style="color:darkcyan;"></i>
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
										<i class="icon-envelope" style="color:darkcyan;"></i>
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
					<button type="button" class="btn default">Cancel</button>
					<button type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
				</div>
			</form>
			<!-- END FORM-->
			</div>
		</div></div>
<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption">
					<i class=""></i>
					<span class="caption-subject font-blue-hoki bold uppercase">Professional Details</span>
					
				</div>
				
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="#" class="horizontal-form">
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
						<select class="form-control" name="education" value="{{ $user->education }}">
							<option value="B.E.">B.E.</option>
							<option value="B.A">B.A</option>
							<option value="B.Arch">B.Arch</option>
							<option >BCA</option>
							<option >B.B.A</option>
							<option >B.Com</option>
							<option >B.Ed</option>
							<option >BDS</option>
							<option >BHM</option>
							<option >B.Pharma</option>
							<option >B.Tech/B.E.</option>
							<option >LLB</option>
							<option >MBBS</option>
							<option >Diploma</option>
							<option >BVSC</option>
							<option >10+2</option>
							<option >10</option>
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
						<i class="fa fa-university" style="color:darkcyan;"></i>
						</span>
						<select class="form-control" value="{{ $user->branch }}" >
							<option value="Mustard">Mustard</option>
							<option value="Ketchup">Ketchup</option>
							<option value="Relish">Relish</option>
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
						<i class="fa fa-university " style="color:darkcyan;"></i>
						</span>
						<select class="form-control" value="{{ $user->prof_category }}" >
							<option value="Mustard">Mustard</option>
							<option value="Ketchup">Ketchup</option>
							<option value="Relish">Relish</option>
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
						<i class="fa fa-university" style="color:darkcyan;"></i>
						</span>
						<input type="text" class="form-control" value="{{ $user->working_at }}" placeholder="City">
					</div>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-12">
								<div class="form-group">
								
									<label>Experience</label>
									<div id="slider-range-max" class="slider bg-purple">
					</div>
					<div class="slider-value">
						 Experience: <span id="slider-range-max-amount">{{ $user->experience }}
						</span>
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
									<i class="fa fa-map-marker" style="color:darkcyan;"></i>
									</span>
									<input type="text" class="form-control" value="{{ $user->city }}" placeholder="City">
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
						<select class="form-control" value="{{ $user->state }}">
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
									<input id="tags_1" type="text" class="form-control tags" value="{{ $user->linked_skill }}"/>
								</div>
							</div>
							<!--/span-->
						</div>
						<div class="row-md-10">
							<div class="col-md-12">
								<div class="form-group" style="">
									
									<label class="control-label">Upload Resume</label>&nbsp;<label style="font-size:12px;font-weight: 400;">(Optional)</label>
										<div class="">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file" style=" background-color: #3598dc;  color: white;">
												<i class="icon-paper-clip" style="color: white;"></i>
												<span class="fileinput-new">
												Select File </span> 
												<span class="fileinput-exists">
												Upload New Resume </span>
												<input type="file" name="...">
												</span><br>
												<span class="fileinput-new">only pdf. & word format</span>
												<span class="fileinput-filename">
												</span>
												&nbsp; <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput">
												</a>
											</div>
										</div>
									</div>
							</div>
							<!--/span-->
						</div>
					</div></div>
					<div class="form-actions ">
						<button type="button" class="btn default">Cancel</button>
						<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div></div></div>

<script>
    jQuery(document).ready(function() {       
    // initiate layout and plugins
    Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
    ComponentsDropdowns.init();
   	ComponentsjQueryUISliders.init();
});
</script>
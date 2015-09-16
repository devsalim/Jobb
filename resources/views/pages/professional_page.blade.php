<div class="portlet light bordered">
										<div class="portlet-title">
											<div class="caption">
												<i class=""></i>
												<span class="caption-subject font-blue-hoki bold uppercase">Profile Edit</span>
												
											</div>
											<div class="tools">
												<a href="" class="collapse">
												</a>
												<a href="#portlet-config" data-toggle="modal" class="config">
												</a>
												<a href="" class="reload">
												</a>
												<a href="" class="remove">
												</a>
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
																<label>First Name</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Full Name" value="{{ $user->name }}">
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Last Name</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Last Name">
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
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Mobile No" value="{{ $user->mobile }}">
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Email Id</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Email Id" value="{{ $user->email }}">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													
													<h3 class="form-section">Password Reset</h3>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Old Password</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Old Password">
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>New Password</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="New Password">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Reset Password</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Old Password">
																</div>
															</div>
														</div>
														<!--/span-->
														
														<!--/span-->
													</div>
												</div></div>
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
																<label>Functional Area</label>
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
																<label>Job Role</label>
																<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-university" style="color:darkcyan;"></i>
													</span>
													<select class="form-control" value="{{ $user->role }}" >
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
													<select class="form-control" value="{{ $user->state }}" >
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Key Skills</label>
																<input id="tags_1" type="text" class="form-control tags" value="{{ $user->linked_skill }}"/>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Active</label>
																<div class="input-group">
																		<span class="input-group-addon">
																		<i class="fa fa-university"></i>
																		</span>
																		<select class="form-control" >
																			<option value="AL">Alabama</option>
																			<option value="WY">Wyoming</option>
																			</select>
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
        });   
    </script>

	
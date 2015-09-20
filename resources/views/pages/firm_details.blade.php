<div class="portlet light bordered">
										<div class="portlet-title">
											<div class="caption">
												<i class=""></i>
												<span class="caption-subject font-blue-hoki bold uppercase">Firm Details</span>
												
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
														<div class="col-md-12">
															<div class="form-group">
															
																<label>About Firm</label>
																	
																<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-institution" style="color:darkcyan;"></i>
													</span>
												<textarea class="form-control autosizeme" rows="3">{{ $user->about_firm }}</textarea>
												</div>
															</div>
														</div>
													</div>
													
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Industry</label>
																<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-cubes"style="color:darkcyan;"></i>
													</span>
													<select class="form-control" value="{{ $user->industry }}">
														<option value="it">IT</option>
														<option value="fashion">Fashion</option>
													</select>
												</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Functional Area</label>
																<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-cube"style="color:darkcyan;"></i>
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
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-12">
															<div class="form-group">
															
																<label>Address</label>
																	
																<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-globe" style="color:darkcyan;"></i>
													</span>
												<textarea class="form-control" rows="3" >{{ $user->firm_address }}</textarea>
												</div>
															</div>
														</div>
													</div>
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Functional Area</label>
																<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-university " style="color:darkcyan;"></i>
													</span>
													<select class="form-control" >
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
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
													<select class="form-control" >
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
															</div>
														</div>
														<!--/span-->
													</div>
														<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Phone No</label>
																
																<div class="input-group">
														<span class="input-group-addon">
														<i class="icon-call-end"style="color:darkcyan;"></i>
														</span>
														<input type="number" class="form-control" value="{{ $user->firm_mobile_no }}" placeholder="Phone No">
													</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Website</label>
																<div class="input-group">
														<span class="input-group-addon">
														<i class="icon-info"style="color:darkcyan;"></i>
														</span>
														<input type="text" class="form-control" value="{{ $user->website_url }}" placeholder="Company Website">
													</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="row-md-2"></div>
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
													<input type="text" class="form-control" value="{{ $user->state }}" placeholder="State">
												</div>
															</div>
														</div>
														<!--/span-->
													</div>
												<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-12">
															<div class="form-group">
															
																<label>Work Area</label>
																	
																<input type="hidden" id="select2_sample5" class="form-control select2" value="html,css">
															</div>
														</div>
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
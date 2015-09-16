<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link href="font_icon_css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			function ShowHidePassword(ID) {
				if (document.getElementById($("#" + ID).prev().attr('id')).type == "phone") {
					$("#" + ID).attr("data-hint", "Hide");
					$("#" + ID).find("i").removeClass("icon-eye").addClass("icon-eye-slash");
					document.getElementById($("#" + ID).prev().attr('id')).type = "text";
				}
				else {
					$("#" + ID).attr("data-hint", "Show");
					$("#" + ID).find("i").removeClass("icon-eye-slash").addClass("icon-eye");
					document.getElementById($("#" + ID).prev().attr('id')).type = "phone";
				}
			}
		</script>



	<div class="portlet light bordered">
										<div class="portlet-title">
											<div class="caption">
												<i class=""></i>
												<span class="caption-subject font-blue-hoki bold uppercase"></span>
												<ul class="nav nav-pills">
									<li class="active">
										<a href="#tab_2_1" data-toggle="tab" style="
    border-radius: 12px 0px 0px 12px !important;border: 1px solid royalblue;
">
										Post Job </a>
									</li>
									<li>
										<a href="#tab_2_2" data-toggle="tab" style="
    margin-bottom: 25px;border-radius: 0px 12px 12px 0px !important;border: 1px solid royalblue;    margin-left: px;">
										Post Skill</a>
									</li>
								
								</ul>
											</div>
											
										</div>
										<div class="portlet-body form">
											<!-- BEGIN FORM-->
											<form action="#" class="horizontal-form">
												<div class="form-body">
												<div class="row">
										<div class="" style=""></div>
					<div class="col-md-8" style="">
												
								<div class="tab-content">
									<div class="tab-pane fade active in" id="tab_2_1">
										<div class="row-md-6">
														<div class="col-md-12">
															<div class="form-group">
															
																<label>Job Title</label>
																	
																<div class="input-group">
																
														<span class="input-group-addon">
														<i class="fa fa-user" style="color:darkcyan;"></i>
														</span>
														<input type="text" class="form-control" placeholder="Job Title">
													</div>
															</div>
														</div>
													</div>
													<div class="row-md-3"></div>
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Company Name</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-university" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Company Name">
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Industry</label>
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
																<label>City</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="City">
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
													<div class="form-group">
													<label style="
    padding-left: 15px;
">Job Details</label>
											<div class="col-md-12" style="
    padding-bottom: 10px;
">
												<textarea class="wysihtml5 form-control" rows="6"></textarea>
											</div>
											</div></div>
													
													
													<br><br><br>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label >Key Skills</label>
																<input id="tags_1" type="text" class="form-control tags" value="foo,bar,baz,roffle"/>
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
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Email Id (Registered)</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="icon-envelope" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="">
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
																<input type="text" class="form-control" placeholder="Email Id">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Phone No (Registered)</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="icon-call-end" style="color:darkcyan;"></i>
																</span>
																<input type="phone" class="form-control" placeholder="">
																
		</span>
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
																<input type="text" class="form-control" placeholder="Phone No">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="form-actions ">
													<button type="button" class="btn default">Cancel</button>
													<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
												</div>
									</div>
									<div class="tab-pane fade" id="tab_2_2">
										<div class="row-md-6">
														<div class="col-md-12">
															<div class="form-group">
															
																<label>Skills Title</label>
																	
																<div class="input-group">
																
														<span class="input-group-addon">
														<i class="fa fa-user" style="color:darkcyan;"></i>
														</span>
														<input type="text" class="form-control" placeholder="Job Title">
													</div>
															</div>
														</div>
													</div>
													<div class="row-md-3"></div>
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Functional Area</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-university" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="Company Name">
																</div>
															</div>
														</div>
														<!--/span-->
														<div class="col-md-6">
															<div class="form-group">
																<label>Industry</label>
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
																<label>City</label>
																
																<div class="input-group">
																<span class="input-group-addon">
																<i class="fa fa-map-marker" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="City">
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
													<div class="form-group">
													<label style="
    padding-left: 15px;
">Skill Details</label>
											<div class="col-md-12" style="
    padding-bottom: 10px;
">
												<textarea class="wysihtml5 form-control" rows="6"></textarea>
											</div>
											</div></div>
													
													
													<br><br><br>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Key Skills</label>
																<input id="tags_1" type="text" class="form-control tags" value="foo,bar,baz,roffle"/>
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
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Email Id (Registered)</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="icon-envelope" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="">
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
																<input type="text" class="form-control" placeholder="Email Id">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="row-md-2"></div>
													<div class="row-md-10">
														<div class="col-md-6">
															<div class="form-group">
																<label>Phone No (Registered)</label>
																<div class="input-group">
																<span class="input-group-addon">
																<i class="icon-call-end" style="color:darkcyan;"></i>
																</span>
																<input type="text" class="form-control" placeholder="">
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
																<input type="text" class="form-control" placeholder="Phone No">
																</div>
															</div>
														</div>
														<!--/span-->
													</div>
													<div class="form-actions ">
													<button type="button" class="btn default">Cancel</button>
													<button type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
												</div>
									</div>
									
								</div>
													
												</div></div>
												
											</form>
											<!-- END FORM-->
										</div></div></div>
									
	
	
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   ComponentsEditors.init();
});   
</script>
<script>
jQuery(document).ready(function() {
// initiate layout and plugins
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
FormEditable.init();
});
</script>
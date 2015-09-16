@extends('register')

@section('content')

<!-- BEGIN LOGIN -->
<div class="contentP" style="background: url(assets/admin/pages/img/bg-white-lock.png) repeat;">
		<h3 class="form-title" style="color:khaki;font-size: 25px;text-shadow: 0px 1px 1px green; text-align:center;">Professional Detail</h3>			
				<div class="portlet box">
							<!-- BEGIN FORM-->
							<form action="{{ url('/updateProfessionalDetail') }}" method="post" class="form-horizontal form-row-sepe">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="email" value="{{ $email }}">
						<div class="form-body">
									
										<div class="form-group">
											
											<label class="control-label col-md-4" style="">Education</label>
											<div class="col-md-8">
													<select class="form-control" name="education" id="parent_selection">
														<option value="">--Please Select--</option>
														<option value="BA">B.A</option>
														<option value="BArch">B.Arch</option>
														<option value="BCA">BCA</option>
														<option value="BBA">BBA</option>
														<option >B.Com</option>
														<option >B.Ed</option>
														<option >BDS</option>
														<option >BHM</option>
														<option >B.Pharma</option>
														<option value="btech">B.Tech/B.E.</option>
														<option >LLB</option>
														<option >MBBS</option>
														<option >Diploma</option>
														<option >BVSC</option>
														<option >10+2</option>
														<option >10</option>
													</select>
													
												<!-- /input-group -->
											</div>
											
										</div>
										<div class="form-group">
											
											<label class="control-label col-md-4">Branch</label>
											<div class="col-md-8">
												<select class="form-control" name="branch" id="child_selection">
												<option value="">--Please Select--</option>
												</select>
											
											</div>
											
										</div>
										<div class="form-group">
											
											<label class="col-md-4 control-label">Experience:</label>
											<div class="col-md-8">
												<div id="slider-range-max" class="slider bg-purple">
												</div>
												<div class="slider-value">
												<span id=""></span>&nbsp;<input text="text" id="slider-range-max-amount">Years
												</div>
											</div>
											
										</div>
										<div class="form-group">
											
											<label class="control-label col-md-4">Job Category</label>
											<div class="col-md-8">
												<select class="bs-select form-control" name="functional" multiple>
													<optgroup label="Accounting">
													<option>Accounts/Finance/Tax</option>
													<option>Agent</option>
													<option>Analytics & Business Intelligence</option>
													</optgroup>
													<optgroup label="IT Field">
													<option>HR/Administration/IR</option>
													<option>IT Software - Client Server</option>
													<option>IT Software - Mainframe</option>
													<option>IT Software - Middleware</option>
													<option>IT Software - Mobile</option>
													<option>IT Software - Other</option>
													<option>IT Software - System Programming</option>
													<option>IT Software - Telecom Software</option>
													<option>IT Software - Application Programming</option>
													<option>IT Software - DBA/Datawarehousing</option>
													<option>IT Software - E-Commerce</option>
													<option>IT Software - ERP/CRM</option>
													<option>IT Software - ERP/CRM</option>
													<option>IT Software - ERP/CRM</option>
													</optgroup>
												</select>
											</div>
											
										</div>
									
										<div class="form-group">
											
											<label class="control-label col-md-4">Key Skills*</label>
											<div class="col-md-8">
												<input type="hidden" placeholder="Java" id="select2_sample5" name="skill" class="form-control select2" value="java">
											</div>
									</div>
										
										
										 
										<!-- <div class="form-group">
											
											<label class="control-label col-md-3">Job Role</label>
											<div class="col-md-5">
											
												<select class="bs-select form-control" name="role" multiple>
													<option>Mustard</option>
													<option>Ketchup</option>
													<option>Relish</option>
												</select>
											
											</div>
										</div> -->
										<div class="form-group">
											
											<label class="col-md-4 control-label">Working At</label>
											<div class="col-md-8">
												
													<div class="input-group">
														<span class="input-group-addon">
														<i class="fa fa-user"></i>
														</span>
														<input type="text" class="form-control" name="working_at" placeholder="Current Working At">
													</div>
												
											</div>
										</div>							
										<div class="form-group">
											
											<label class="control-label col-md-4" style="">State</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-map-marker"></i>
													</span>
													<select class="form-control" name="state">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										<div class="form-group">
											
											<label class="control-label col-md-4" style="">City</label>
											<div class="col-md-8">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-map-marker"></i>
													</span>
													<select class="form-control" name="city">
														<option value="AL">Alabama</option>
														<option value="WY">Wyoming</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										
									<div class="form-group" style="">
										
									<label class="control-label col-md-4">Upload Resume</label>
										<div class="col-md-8">
											<div class="fileinput fileinput-new" data-provides="fileinput">
												<span class="btn btn-default btn-file">
												<i class="fa fa-file-pdf-o" style="color: black;"></i>
												<span class="fileinput-new">
												Select File </span> 
												<span class="fileinput-exists">
												Upload New Resume </span>
												<input type="file" name="...">
												</span><br>
												<span class="fileinput-new">only pdf. & word format (Optional)</span>
												<span class="fileinput-filename">
												</span>
												&nbsp; <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput">
												</a>
											</div>
										</div>
									</div>
									
									<div class="left" style="">	
										<button type="submit" class="btn btn-default pull-right">Save&nbsp;<i class="m-icon-swapright"></i></button>	
										<label style="margin-left: 62px;margin-top: 6px;"><a href="" style="text-decoration: none;">Fill it Later</a><label>
									</div>
							</form>
							<!-- END FORM-->
						</div>
				</div>
</div>
<!-- END LOGIN -->
@stop
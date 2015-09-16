@extends('register')

@section('content')

<!-- BEGIN LOGIN -->
<div class="contentP" style="background: url(assets/admin/pages/img/bg-white-lock.png) repeat;">
		<h3 class="form-title" style="color:khaki;font-size: 25px;text-shadow: 0px 1px 1px green; text-align:center;">Firm Details</h3>			
				<div class="portlet box">
							<!-- BEGIN FORM-->
							<form action="{{ url('/updateFirmDetail') }}" method="post" class="form-horizontal form-row-sepe">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="firm_email_id" value="{{ $email }}">
						<div class="form-body">
										<div class="form-group">
											<label class="col-md-3 control-label">About Firm</label>
											<div class="col-md-9">
												<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-institution"></i>
													</span>
												<textarea class="form-control autosizeme" rows="2" name="aboutfirm"></textarea>
												</div>
											</div>
										</div>
									
										<div class="form-group">
											<label class="control-label col-md-3" style="">Industry</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-cubes"></i>
													</span>
													<select class=" form-control" name="industry">
														<option value="it">IT</option>
														<option value="fashion">Fashion</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="control-label col-md-3" style="">Operating Since</label>
											<div class="col-md-3">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="icon-calendar"></i>
													</span>
													<select class="form-control" name="operatingsince">
														<option value="">Years</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
														<option value="10">10</option>
														<option value="11">11</option>
														<option value="12">12</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
											<label class="control-label col-md-2" style="">Phone</label>
											<div class="col-md-4">
												<div class="input-group">
													
													<div class="input-group">
														<span class="input-group-addon">
														<i class="icon-call-end"></i>
														</span>
														<input type="text" name="phone" class="form-control" placeholder="Phone No">
													</div>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Address</label>
											<div class="col-md-9">
												
													<div class="input-group">
														<span class="input-group-addon">
														<i class="fa fa-globe"></i>
														</span>
														<textarea class="form-control autosizeme" name="address" rows="2" ></textarea>
													</div>
												
											</div>
										</div>	
											
										<div class="form-group">
											<label class="control-label col-md-3" style="">State</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-map-marker"></i>
													</span>
													<select class="form-control" name="state">
														<option value="ap">A.P</option>
														<option value="assam">Assam</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3" style="">City</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
													<i class="fa fa-map-marker"></i>
													</span>
													<select class="form-control" name="city">
														<option value="hyderabad">Hyderabad</option>
														<option value="bangalore">Bangalore</option>
													</select>
												</div>
												<!-- /input-group -->
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Website</label>
											<div class="col-md-9">
												
													<div class="input-group">
														<span class="input-group-addon">
														<i class="icon-info"></i>
														</span>
														<input type="text" class="form-control" placeholder="Company Website" name="website">
													</div>
												
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Work Area</label>
											<div class="col-md-9">
												<input type="hidden" id="select2_sample5" class="form-control select2" value="html,css" name="workarea">
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
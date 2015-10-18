@extends('master')

@section('content')

<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-trophy"></i>My Activity
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom">
			<ul class="nav nav-tabs" style="padding-left: 5px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					My Posts </a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					My Updates </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					<div class="row">
				@if (count($posts) > 0)
				<?php $var = 1; ?>
				@foreach($posts as $post)	
				<div class="col-md-9" style="">												
					<div class="timeline" >
						<!-- TIMELINE ITEM -->
						<div class="timeline-item time-item">
							<div class="timeline-body" style="margin-left: 0;">
								<div class="timeline-body-head">
									<div class="timeline-body-head-caption">
										<a>	
											Post Id:&nbsp;<a style="">{{ $post->id }}</a>
										</a>
										<span class="timeline-body-time font-grey-cascade">Posted at 
											{{ date('M d, Y', strtotime($post->created_at)) }}
										</span>
									</div>
								</div>
								<div class="timeline-body-content">
									<div class="post-job-skill-bar">
										<div class="{{ $post->post_type }}"><a class="post-type-class">{{ $post->post_type }}</a></div>
									</div>
									<span class="font-grey-cascade">
										@if($post->post_type == 'skill')	
										<div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }} </div>
									@elseif($post->post_type == 'job')
										 <div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }}<div> <h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{ $post->post_compname }}</h4></div>  </div>
									@endif					 							
									</span>
									<div class="row" style="margin-top: 15px;">
										<div class="col-md-3 col-sm-3 col-xs-6">
											<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}
										</div>
										<div class="col-md-3 col-sm-3 col-xs-6">
											<i class="glyphicon glyphicon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years
										</div>
									</div>
									<?php 
								 		$strNew = '+'.$post->post_duration.' day';
								 		$strOld = $post->created_at;
								 		$fresh = $strOld->modify($strNew);

								 		$currentDate = new \DateTime();
								 		$expiryDate = new \DateTime($fresh);
								 		$difference = $currentDate->diff($expiryDate);
								 		$remainingDays = $difference->format('%d');
								 		$remainingHours = $difference->format('%h');
								 		if($currentDate >= $fresh){
								 			$expired = 1;
								 		}else{
								 			$expired = 0;
								 		}
								  	?>
									<div class="row" style="margin-top: 15px;">
										@if($remainingDays > 2)
										<div class="col-md-6 col-sm-3 col-xs-12">
											<div class="">Post Expires in: {{ $remainingDays }} days
												<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
										@elseif( $remainingDays == 2 && $remainingDays > 1)
										<div class="col-md-6 col-sm-3 col-xs-12">
											<div class="">Post Expires in: Tomorrow
												<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
										@elseif($remainingDays < 1 && $remainingHours > 10)
										<div class="col-md-6 col-sm-3 col-xs-12">
											<div class="">Post Expires in: Today
												<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
										@elseif($remainingHours < 10)
										<div class="col-md-6 col-sm-3 col-xs-12">
											<div class="">Post Expires in: {{ $remainingHours }} Hours
												<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
										@else
										<div class="col-md-3 col-sm-3 col-xs-12">
											<div class="">
												<a href="#extend-job-expiry-{{ $post->id }}" disabled data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
										@endif
										@if($expired != 1)
										<div class="col-md-3 col-sm-3 col-xs-12">
											<a class="btn btn-sm red extend-expire" data-toggle="modal" href="#expire">
												Expire
											</a>
											<div class="modal fade bs-modal-sm" id="expire" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
															<h4 class="modal-title"><i class="glyphicon glyphicon-exclamation-sign" style="font-size: 16px;color: firebrick;"></i> Are you sure</h4>
														</div>
														<div class="modal-body">
															 Do you want to expire this post?
														</div>
														<div class="modal-footer">		
															<form action="{{ url('job/expire') }}" method="post">				
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
																<input type="hidden" name="post_id" value="{{$post->id}}">					
																<button type="submit" class="btn blue">Yes</button>
																<button type="button" class="btn default" data-dismiss="modal">No</button>
															</form>															
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
											<!-- /.modal -->
										</div>
										@elseif($expired == 1)
										<div class="col-md-3 col-sm-3 col-xs-12">
											<a class="btn btn-sm red extend-expire" disabled data-toggle="modal" href="#expire">
												Expired
											</a>
										</div>
										@endif
									</div>
									<div class="row" style="margin-top: 15px;">
										@if($post->post_duration_extend != 0 && $expired != 1)
										<div class="col-md-12 col-sm-12 col-xs-12">
											You have extended the post for {{ $post->post_duration }} days 
										</div>
										@elseif($expired == 1)
										<div class="col-md-12 col-sm-12 col-xs-12">
											Your post has been expired. 
										</div>
										@endif
									</div>
								</div>		
							</div>
							<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled collapsed" 
											data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;">
											Details :</a>	
											</h4>
										</div>
										<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
											<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
												<div class="row">
													<div class="col-md-12 col-sm-12 col-xs-12">														
														<label class="detail-label">Education Required :</label>														
														{{ $post->education }}														 
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12">				
														<label class="detail-label">Role :</label>
														{{ $post->role }}	
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12">
														<label class="detail-label">Job Category :</label>
														{{ $post->prof_category }}
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12">
														<label class="detail-label">Skills :</label>														
														@foreach($post->skills as $skill)
															{{$skill->name}},
														@endforeach												 
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12">														
														<label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>														
														{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
													</div>
												</div>
												<div class="skill-display">Description : </div>
												{{ $post->job_detail }}
												@if($post->post_type == 'job')
												<div class="skill-display">Reference Id : {{ $post->reference_id }} </div>
												@endif	
												<div class="skill-display">Post Duration : {{ $post->post_duration }} </div>
														<div class="skill-display">Contact Details : </div> 
														<div class="row">
															@if($post->post_type == 'job' && $post->website_redirect_url != null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																	<label class="detail-label"><i class="glyphicon glyphicon-globe" style="color: deepskyblue;"></i> :</label>
																	{{ $post->website_redirect_url }}
															</div>
															@endif
															@if($post->website_redirect_url == null && $post->contact_person !=null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-user"></i> :</label>
																
																	{{ $post->contact_person }}
																
															</div>
															@endif

															@if($post->email_id != null && $post->alt_emailid != null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																
																	
																	{{ $post->email_id }} - {{ $post->alt_emailid }}
																
															</div>	
															
															@elseif($post->email_id != null && $post->alt_emailid == null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																
																	
																	{{ $post->email_id }}
																
															</div>
															@elseif($post->email_id == null && $post->alt_emailid != null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																
																		{{ $post->alt_emailid }}
																 
															</div>	
															@endif	
															@if($post->phone != null && $post->alt_phone != null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																
																	
																	{{ $post->phone }} - {{ $post->alt_phone }}
																 
															</div>	
															@elseif($post->phone != null && $post->alt_phone == null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																
																	
																	{{ $post->phone }}
																
															</div>
															@elseif($post->phone == null && $post->alt_phone != null && $post->website_redirect_url == null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																
																		{{ $post->alt_phone }}
																
															</div>	
															@endif											
														</div>
												<div class="skill-display">Post Id : {{ $post->id }} </div> 
											</div>

										</div>								
									</div>
								</div>
							</div>
							<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion2" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled collapsed" 
											data-toggle="collapse" data-parent="#accordion2" href="#collapse_2_2"  style="font-size: 15px;font-weight: 600;">
											Post Activity :</a>	
											</h4>
										</div>
										<div id="collapse_2_2" class="panel-collapse collapse">
											<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
												
												<div class="portlet box">
													<div class="portlet-body">
													<div class="tabbable-custom ">
														<ul class="nav nav-tabs" style="padding-left:5px;">
															
															@if($post->post_type == 'job')
															<li  class="active">	
																<a href="#tab_1_{{ $post->id }}_1" class="label-new" data-toggle="tab">Applied </a>
															</li>
															@endif
															@if($post->post_type == 'skill')
															<li class="active">
																<a href="#tab_1_{{ $post->id }}_2" class="label-new" data-toggle="tab">Contacted</a>
															</li>
															@endif
															<li>
																<a href="#tab_1_{{ $post->id }}_3" class="label-new" data-toggle="tab">Thanks & Share </a>
															</li>
														</ul>
														<div class="tab-content">
															<div class="tab-pane active" id="tab_1_{{ $post->id }}_1">
																<div class="portlet light">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp bold uppercase">Application received:</span>
																			<span class="caption-helper">
																				<?php $i=0; ?>
																				@foreach($post->postactivity as $pa)
																		  			@if($pa->apply == 1) <?php $i++; ?> @endif
																		  		@endforeach
																		  		<?php echo $i; ?>
																			</span>
																		</div>		
																	</div>

																	<div class="portlet-body">										
																		<ul data-handle-color="#637283">

														                  @foreach($post->postactivity as $pa)
																		  	@if($pa->apply == 1)
														                 	<li style="font-size:15px;">
															                    <span class="photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    </span>
															                    <span class="subject">
																                    <span class="from" style="font-weight:600;color:darkcyan;">
																                    	{{$pa->user->fname}} {{$pa->user->lname}}
																                   	</span>
																                    <span class="time"> </span>
															                    </span>
															                    <span class="message">
															                    	has applied for this post <i class=" icon-clock"></i>
															                    	{{$pa->apply_dtTime}}
															                    </span>
														                   	</li>
														                   	@endif									                 
														                  @endforeach									                  
														                </ul>											
																	</div>

																</div>
															</div>
															<div class="tab-pane active" id="tab_1_{{ $post->id }}_2">
																<div class="portlet light">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp bold uppercase">Contacted:</span>
																			<span class="caption-helper">100</span>
																		</div>		
																	</div>

																	<div class="portlet-body">													
																		<ul class="dropdown-menu-list scroller" data-handle-color="#637283">
														                  				                  
																		<ul data-handle-color="#637283">
														                  @foreach($post->postactivity as $pa)
																		  	@if($pa->contact_view == 1)
														                 	<li style="font-size:15px;">
															                    <span class="photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    </span>
															                    <span class="subject">
																                    <span class="from" style="font-weight:600;color:darkcyan;">
																                    	{{$pa->user->fname}} {{$pa->user->lname}}
																                   	</span>
																                    <span class="time"> </span>
															                    </span>
															                    <span class="message">
															                    	has contacted for this post <i class=" icon-clock"></i>
															                    	{{$pa->contact_view_dtTime}}
															                    </span>
														                   	</li>
														                   	@endif									                 
														                  @endforeach									                  
														                </ul>											
																	</div>
																	</div>
															</div>
															<div class="tab-pane" id="tab_1_{{ $post->id }}_3">
																<div class="portlet light">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp bold ">Thanks Recieved:</span>
																			<span class="caption-helper">
																				<?php $i=0; ?>
																				@foreach($post->postactivity as $pa)
																		  			@if($pa->thanks == 1) <?php $i++; ?> @endif
																		  		@endforeach
																		  		<?php echo $i; ?>
																			</span>
																		</div>
																	</div>
																	<div class="portlet-body">
																		<ul data-handle-color="#637283">
																		 @foreach($post->postactivity as $pa)
																		  	@if($pa->thanks == 1)
														                 	<li style="font-size:15px;">
															                    <span class="photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    </span>
															                    <span class="subject">
																                    <span class="from" style="font-weight:600;color:darkcyan;">
																                    	{{$pa->user->fname}} {{$pa->user->lname}}
																                   	</span>
																                    <span class="time"> </span>
															                    </span>
															                    <span class="message">
															                    	has thanked this post <i class=" icon-clock"></i>
															                    	{{$pa->thanks_dtTime}}
															                    </span>
														                   	</li>
														                   	@endif									                 
														                  @endforeach							                  
														                </ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>								
								</div>
							</div>
						</div>
					</div>			
				<!-- </div> -->
				<!-- END TIMELINE ITEM -->	
				</div>
			</div>
			<div class="col-md-3">
				<div class="portlet box red-sunglo">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Unordered Lists
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body">
						<ul>
							<li>
								 Lorem ipsum dolor sit amet
							</li>
							<li>
								 Consectetur adipiscing elit
							</li>
							<li>
								 Integer molestie lorem at massa
							</li>
							<li>
								 Facilisis in pretium nisl aliquet
							</li>									
						</ul>
					</div>
				</div>
			</div>	
			<!-- END TIMELINE ITEM -->

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="extend-job-expiry-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="{{ url('/job/extend') }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="post_id" value="{{ $post->id }}">
		     <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		        <h4 class="modal-title">Extend Post Validity</h4>
		      </div>
		      <div class="modal-body">
		      		@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
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
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-success">Update</button>
		        <button type="button" class="btn default" data-dismiss="modal">Close</button>
		      </div>
		</form>
	</div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php $var++; ?>
	 @endforeach
	 @else
	 You haven't Post Anything!!
	@endif
			</div>
				</div>
				<div class="tab-pane" id="tab_5_2">
					<div class="row">
						<!-- <div class="portlet light bordered" style="border: none !important;background:transparent">										
							<div class="portlet-body form">
									<div class="form-body"> -->
										<div class="row">
												@foreach($posts as $post)	

												<div class="col-md-9">												
													<!-- <div class="timeline" > -->
														<!-- TIMELINE ITEM -->
														<!-- <div class="timeline-item time-item"> -->
															<!-- <div class="timeline-body" style="margin-left:0 !important;"> -->
																<!-- <div class="timeline-body-head"> -->
																	<!-- <div class="timeline-body-head-caption"> -->
																<div class="updates-style">{{ date('M d, Y', strtotime($post->created_at)) }}: Applied for {{ $post->post_title }}, {{ $post->post_compname }} 
																<br>Post ID: {{ $post->id }} <a class="" data-toggle="modal" href="#basic">See the full Post </a>
																</div>
																	<!-- </div> -->
																	
																<!-- </div> -->
																
															 
															<!-- </div> -->
															<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																			<h4 class="modal-title">Modal Title</h4>
																		</div>
																		<div class="modal-body">
																			<div class="row">
																			@foreach($posts as $post)	
																				<div class="col-md-12" style="">												
																					<div class="timeline" >
																						<!-- TIMELINE ITEM -->
																						<div class="timeline-item time-item">
																							<div class="timeline-badge" style="margin: 10px 0px;">
																								@if($post->induser != null && !empty($post->induser->profile_pic))
																								<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
																								<a class="icon-userpic"><i class="glyphicon glyphicon-user"></i></a>
																								@elseif($post->corpuser != null && !empty($post->corpuser->logo_status))
																								<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
																								<a class="icon-userpic"><i class="fa fa-institution (alias)" style="padding: 0px 5px;"></i></a>
																								@elseif(empty($post->corpuser->logo_status) && $post->corpuser != null)
																								<img class="timeline-badge-userpic userpic-box" src="/assets/images/couple.png">
																								<a class="icon-userpic"><i class="fa fa-institution (alias)" style="padding: 0px 5px;"></i></a>
																								@elseif(empty($post->induser->profile_pic) && $post->induser != null)
																								<img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
																								<a class="icon-userpic"><i class="glyphicon glyphicon-user" style="padding: 0px 5px;"></i></a>
																								@endif
																							</div>
																							<div class="timeline-body" style="">
																								<div class="timeline-body-head">
																									@if(Auth::user()->id == $post->individual_id || Auth::user()->id == $post->corporate_id)
																									<div class="timeline-body-head-caption">
																										@if($post->post_type == 'job')
																										<a class="user-link"><i class="fa fa-unlink (alias)" style="color:lightslategray;"></i></a><a style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">You have</a>
																										@else
																										<a class="user-link-click"><i class="fa fa-link" style="color:white;"></i></a><a style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">You have</a>
																										@endif
																										<span class="timeline-body-time font-grey-cascade">Posted at 
																											{{ date('M d, Y', strtotime($post->created_at)) }}
																										</span>
																									</div>
																									@else
																									<div class="timeline-body-head-caption">
																										@if($post->post_type == 'job')
																										<a class="user-link"><i class="fa fa-unlink (alias)" style="color:lightslategray;"></i></a><a style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">{{ $post->induser->fname }} {{ $post->induser->lname }}</a>
																										@else
																										<a class="user-link-click"><i class="fa fa-link" style="color:white;"></i></a><a style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">{{ $post->induser->fname }} {{ $post->induser->lname }}</a>
																										@endif
																										<span class="timeline-body-time font-grey-cascade">Posted at 
																											{{ date('M d, Y', strtotime($post->created_at)) }}
																										</span>
																									</div>
																									@endif
																								</div>
																								<div class="timeline-body-content">
																									<span class="font-grey-cascade">
																										@if($post->post_type == 'skill')	
																										<div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }} </div>
																									@elseif($post->post_type == 'job')
																										 <div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }}  </div>
																									@endif	
																									@if($post->post_compname != null)
																									<div><h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{ $post->post_compname }}</h4></div>
																									@endif				 							
																									</span>
																									<div class="row">
																										<!-- <div class="col-md-4 col-sm-4 col-xs-12">
																											<i class="icon-badge"></i>&nbsp;: {{ $post->role }}
																										</div> -->
																										<div class="col-md-4 col-sm-4 col-xs-12">
																											<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}
																										</div>
																										<div class="col-md-4 col-sm-4 col-xs-12">
																											<i class="icon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years
																										</div>
																										<!-- <div class="col-md-4 col-sm-4 col-xs-12">
																											<i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{ $post->min_sal }}-{{ $post->max_sal }}/Hours
																										</div> -->
																									</div>
																								</div>		
																								<div class="post-job-skill-bar">
																									<div class="{{ $post->post_type }}">
																										<a class="post-type-class">{{ $post->post_type }}</a>
																									</div>
																									@if(Auth::user()->id != $post->individual_id )
																									<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">
																										<input type="hidden" name="_token" value="{{ csrf_token() }}">
																										<input type="hidden" name="fav_post" value="{{ $post->id }}">

																										<button class="fav-btn btn btn-icon-only pin-bar btn-circle 
																												@if(!$post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())
																												@if($post->postactivity->where('user_id', Auth::user()->induser_id)->first()->fav_post == 1) 
																													{{'btn-warning'}} 
																												@endif
																												@endif" 
																												id="fav-btn-{{$post->id}}" type="button">
																											<i class="icon-pin" style="font-size: 20px;"></i>
																										</button>
																										@endif
																									</form>
																									
																								</div>
																							</div>
																							<div class="portlet-body" style="margin: 0 -5px;">
																								<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
																									<div class="panel panel-default" style=" position: relative;">
																										<div class="panel-heading">
																											<h4 class="panel-title">
																											<a class="accordion-toggle accordion-toggle-styled collapsed" 
																											data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;" >
																											Details: </a>	
																											</h4>
																										</div>
																										<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
																											<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
																												
																												<div class="row">
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label">Education Required :</label>
																														
																															{{ $post->education }}
																														 
																													</div>
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label">Role :</label>
																														
																															{{ $post->role }}
																														
																													</div>
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label">Job Category :</label>
																														
																															{{ $post->prof_category }}
																														 
																													</div>
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label">Skills :</label>
																														
																															@foreach($post->skills as $skill)
																																{{$skill->name}},
																															@endforeach
																														 
																													</div>
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																														
																															{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }}
																														 
																													</div>
																												</div>
																												<?php 
																											 		$strNew = '+'.$post->post_duration.' day';
																											 		$strOld = $post->created_at;
																											 		$fresh = $strOld->modify($strNew);

																											 		$currentDate = new \DateTime();
																											 		$expiryDate = new \DateTime($fresh);
																											 		// $difference = $expiryDate->diff($currentDate);
																											 		// $remainingDays = $difference->format('%d');
																											 		if($currentDate >= $fresh){
																											 			$expired = 1;
																											 		}else{
																											 			$expired = 0;
																											 		}
																											  	?>
																												<div class="skill-display">Description : </div>
																												{{ $post->job_detail }}
																												
																												@if($post->post_type == 'job')
																												<div class="skill-display">Reference Id&nbsp;: {{ $post->reference_id }} </div>	
																												@endif

																												@if($expired != 1)
																												<div class="skill-display">Contact Details : </div> 
																												<div class="row">
																													@if($post->post_type == 'job' && $post->website_redirect_url != null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														<label class="detail-label">Apply on Company Website: Yes</label>
																													</div>
																													@endif
																													@if($post->post_type == 'job' && $post->website_redirect_url != null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-globe" style="color: deepskyblue;"></i> :</label>
																														{{ $post->website_redirect_url }}
																															
																														
																													</div>
																													@endif
																													@if($post->website_redirect_url == null && $post->contact_person != null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-user"></i> :</label>
																														
																															{{ $post->contact_person }}
																														
																													</div>
																													@endif

																													@if($post->email_id != null && $post->alt_emailid != null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																														
																															
																															{{ $post->email_id }} - {{ $post->alt_emailid }}
																														
																													</div>	
																													
																													@elseif($post->email_id != null && $post->alt_emailid == null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																														
																															
																															{{ $post->email_id }}
																														
																													</div>
																													@elseif($post->email_id == null && $post->alt_emailid != null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-envelope"></i> :</label>
																														
																																{{ $post->alt_emailid }}
																														 
																													</div>	
																													@endif	
																													@if($post->phone != null && $post->alt_phone != null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																														
																															
																															{{ $post->phone }} - {{ $post->alt_phone }}
																														 
																													</div>	
																													@elseif($post->phone != null && $post->alt_phone == null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																														
																															
																															{{ $post->phone }}
																														
																													</div>
																													@elseif($post->phone == null && $post->alt_phone != null && $post->website_redirect_url == null)
																													<div class="col-md-12 col-sm-12 col-xs-12">
																														
																															<label class="detail-label"><i class="glyphicon glyphicon-earphone"></i> :</label>
																														
																																{{ $post->alt_phone }}
																														
																													</div>	
																													@endif											
																												</div>
																												@endif
																												<div class="skill-display">Post Id&nbsp;: {{ $post->id }} </div>

																												@if($expired != 1)
																													 <div class="skill-display">Post expires on: 										 
																													 <span class="btn-success" style="padding: 2px 8px;font-size: 12px;border-radius: 20px !important;">{{$fresh->format("d M Y")}}</span>
																													 </div>
																												 @else
																													 <div class="skill-display">Post expired on: 										 
																													 <span class="btn-danger" style="padding: 2px 8px;font-size: 12px;border-radius: 20px !important;">{{$fresh->format("d M Y")}}</span>
																													 </div>
																												@endif
																											</div>
																										</div>
																										@if($expired != 1)
																										<div class="post-{{ $post->post_type }} post-icon-bar">
																											<form action="/job/like" method="post" id="post-{{$post->id}}" data-id="{{$post->id}}">						
																												<input type="hidden" name="_token" value="{{ csrf_token() }}">
																												<input type="hidden" name="like" value="{{ $post->id }}">
																												<button class="btn like-btn"  type="button" style="background-color: transparent;">
																												<i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>
																												</button>
																											</form>
																											
																											<span class="badge-like" id="like-count-{{ $post->id }}">
																											{{ $post->postactivity->sum('thanks') }} 
																											{{-- {{ $post->postactivity->where('user_id', Auth::user()->induser_id)->sum('thanks') }} --}}
																											</span>
																											
																												@if(count($post->postactivity) > 0 && $post->post_type == 'job' && Auth::user()->id != $post->individual_id)		
																											@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())
																												<form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">	
																													<input type="hidden" name="_token" value="{{ csrf_token() }}">
																													<input type="hidden" name="apply" value="{{ $post->id }}">
																													<button class="btn apply-btn blue btn-sm apply-contact-btn" 
																															id="apply-btn-{{$post->id}}" type="button">Apply
																													</button>
																												</form>	
																											@elseif($post->postactivity->where('user_id', Auth::user()->induser_id)->first()->apply == 1) 
																												<button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
																													Applied
																												</button>
																												@else
																											<form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">	
																												<input type="hidden" name="_token" value="{{ csrf_token() }}">
																												<input type="hidden" name="apply" value="{{ $post->id }}">
																												<button class="btn apply-btn blue btn-sm apply-contact-btn" 
																														id="apply-btn-{{$post->id}}" type="button">Apply
																												</button>
																											</form>							
																											@endif	
																										@endif	
																										@if(count($post->postactivity) > 0 && $post->post_type == 'skill' && Auth::user()->id != $post->individual_id)		
																											@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())
																												<form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">	
																													<input type="hidden" name="_token" value="{{ csrf_token() }}">
																													<input type="hidden" name="contact" value="{{ $post->id }}">
																													<button class="btn contact-btn blue btn-sm apply-contact-btn" 
																															id="contact-btn-{{$post->id}}" type="button">Contact
																													</button>
																												</form>	
																											@elseif($post->postactivity->where('user_id', Auth::user()->induser_id)->first()->contact_view == 1) 
																												<button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
																													<i class="glyphicon glyphicon-ok"></i> Contacted
																												</button>
																												@else
																											<form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">	
																												<input type="hidden" name="_token" value="{{ csrf_token() }}">
																												<input type="hidden" name="contact" value="{{ $post->id }}">
																												<button class="btn contact-btn green btn-sm apply-contact-btn" 
																														id="contact-btn-{{$post->id}}" type="button">Contact
																												</button>
																											</form>							
																											@endif	
																										@endif
																										<div class="btn-group dropup share-bar">
																											<div class="btn-group dropup">
																												<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: transparent;padding: 18px 5px 7px 6px;">
																												<i class="fa fa-share-square-o" style="font-size: 23px;color: darkslateblue;"></i><span class="badge-share">1</span>
																												</button>
																												<ul class="dropdown-menu pull-right" role="menu" style="min-width:0;box-shadow:0 0 !important">
																													<li style="background-color: #3b5998;">
																														<a href="/" class="facebook"><i class="fa fa-facebook post-social-icon" ></i></a>
																													</li>
																													<li style="background-color: #c32f10;">
																														<a href="/" class="google-plus"><i class="fa fa-google-plus post-social-icon"></i></a>
																													</li>
																													<li style="background-color: #00aced;">
																														<a href="/" class="linkedin"><i class="fa fa-linkedin post-social-icon" ></i></a>
																													</li>
																												</ul>
																											</div>
																										</div>
																									</div>
																									@else
																									<div class="post-job post-icon-bar">
																										<button type="button" class="btn btn-sm bg-grey-steel expire-btn" disabled="true">
																													Expired
																												</button>
																									</div>
																									@endif
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																					<!-- END TIMELINE ITEM -->
																				</div>
																				@endforeach
																			</div>
																		</div>
																	</div>
																	<!-- /.modal-content -->
																</div>
																<!-- /.modal-dialog -->
															</div>
															<!-- /.modal -->
														<!-- </div>
													</div> -->
													<!-- END TIMELINE ITEM -->
												</div>
										 @endforeach
										</div>
									<!-- </div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('javascript')
<script type="text/javascript">
	jQuery('#show-social').hide();
	jQuery(document).ready(function(){ 
	    jQuery('#hide-social').on('click', function(event) {
	    jQuery('#show-social').toggle('show');
	    });
	});

$(document).ready(function(){
  $('.like-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-'+post_id).serialize(); 
    var formAction = $('#post-'+post_id).attr('action');

	$count = $('#like-count-'+post_id).text();
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        if(data > $count){
 			$('#like-count-'+post_id).text(data);
 			$('#like-btn-'+post_id).css({'background-color':'lightgreen'});
        }else if(data < $count){
 			$('#like-count-'+post_id).text(data);
 			$('#like-btn-'+post_id).css({'background-color':'burlywood'});
        }
      }
    }); 
    return false;
  }); 
});

</script>
<script>
$('.content').slideUp(400);//reset panels

$('.panel').click(function() {//open
   var takeID = $(this).attr('id');//takes id from clicked ele
   $('#'+takeID+'C').slideDown(400);
                             //show's clicked ele's id macthed div = 1second
});
$('span').click(function() {//close
   var takeID = $(this).attr('id').replace('Close','');
   //strip close from id = 1second
    $('#'+takeID+'C').slideUp(400);//hide clicked close button's panel
});​

</script>
@stop
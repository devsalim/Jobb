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
				@if(Auth::user()->identifier == 1)
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					My Updates </a>
				</li>
				@endif
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					<div class="row">
				@if (count($posts) > 0)
				
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

								 		$dateExpire= $expiryDate->format('d M Y');

								 		if($currentDate >= $fresh){
								 			$expired = 1;
								 		}else{
								 			$expired = 0;
								 		}
								  	?>
									<div class="row" style="margin-top: 15px;">
										@if($expired != 1)
											@if($remainingDays >= 2)
											<div class="col-md-5 col-sm-3 col-xs-12">
												<div class="">Post Expires in: {{ $remainingDays }} days
													@if($post->post_duration_extend == 0)
														<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" 
														class="btn btn-sm btn-info">Extend</a>
												   @else
												   	<a href="" disabled class="btn btn-sm btn-info">Extended</a>
												   @endif
												</div>
											</div>
											@elseif( $remainingDays == 1)
											<div class="col-md-6 col-sm-3 col-xs-12">
												<div class="">Post Expires : Tomorrow
													@if($post->post_duration_extend == 0)
													<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" 
													   class="btn btn-sm btn-info">Extend</a>
													@else
												   	<a href="" disabled class="btn btn-sm btn-info">Extended</a>
													   @endif
												</div>
											</div>
											@elseif($remainingDays == 0 && $remainingHours > 10)
											<div class="col-md-6 col-sm-3 col-xs-12">
												<div class="">Post Expires : Today
													@if($post->post_duration_extend == 0)
													<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" 
													   class="btn btn-sm btn-info">Extend</a>
													@else
												   	<a href="" disabled class="btn btn-sm btn-info">Extended</a>   
													   @endif
												</div>
											</div>
											@elseif($remainingHours < 10)
											<div class="col-md-6 col-sm-3 col-xs-12">
												<div class="">Post Expires in: {{ $remainingHours }} Hours
													@if($post->post_duration_extend == 0)
													<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" 
													   class="btn btn-sm btn-info">Extend</a>
													@else
												   	<a href="" disabled class="btn btn-sm btn-info">Extended</a>
													@endif
												</div>
											</div>										
											@endif

										@endif
										@if($expired != 1)
										<div class="col-md-3 col-sm-3 col-xs-12">
											<a class="btn btn-sm btn-danger" data-toggle="modal" href="#expire">
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
											<a class="btn btn-sm btn-danger" disabled data-toggle="modal" href="#expire">
												Expired
											</a>
										</div>
										@endif
									</div>
									<div class="row" style="margin-top: 15px;">
										@if($post->post_duration_extend == 1 && $expired == 0)
										<div class="col-md-12 col-sm-12 col-xs-12">
											You have extended the post for {{ $post->post_duration }} days <br/>
											Now this post will expire on {{$dateExpire}}											
										</div>
										@elseif($post->post_duration_extend == 0 && $expired == 0)
											<div class="col-md-12 col-sm-12 col-xs-12">
												Date:   Post extended for {{ $post->post_duration }} days<br/>
												Your post will expire on {{$dateExpire}}
											</div>
										@elseif($expired == 1)
										<div class="col-md-12 col-sm-12 col-xs-12">
											Date: Post extended for {{ $post->post_duration }} days<br/>
											{{$dateExpire}}: Post Expired
										</div>
										@endif
									</div>
								</div>		
							</div>
							<div class="box">
										   <div class="ribbon"><span class="{{ $post->post_type }}">{{ $post->post_type }}</span></div>
										</div>
							<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion{{$post->id}}" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled collapsed" 
											data-toggle="collapse" data-parent="#accordion{{$post->id}}" href="#collapse_{{$post->id}}_{{$post->id}}"  style="font-size: 15px;font-weight: 600;">
											Details :</a>	
											</h4>
										</div>
										<div id="collapse_{{$post->id}}_{{$post->id}}" class="panel-collapse collapse">
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

														<?php $postSkills = array(); ?>														
														@foreach($post->skills as $skill)
															<?php $postSkills[] = $skill->name; ?>
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
												<div class="skill-display">Post Id : {{ $post->unique_id }} </div> 
											</div>

										</div>								
									</div>
								</div>
							</div>
							<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion2_{{$post->id}}" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled" 
											data-toggle="collapse" data-parent="#accordion2_{{$post->id}}" href="#collapse2_{{$post->id}}_{{$post->id}}"  style="font-size: 15px;font-weight: 600;">
											Post Activity :</a>	
											</h4>
										</div>
										<div id="collapse2_{{$post->id}}_{{$post->id}}" class="panel-collapse">
											<div class="panel-body" style="border-top: 0;padding: 0;">
												
												<div class="portlet box">
													<div class="portlet-body" style="padding: 0px 3px;">
													<div class="tabbable-custom ">
														<ul class="nav nav-tabs" style="padding-left: 0px;">
															
															@if($post->post_type == 'job')
															<li  class="active">	
																<a href="#tab_1_{{ $post->id }}_1" class="label-new" data-toggle="tab" style="border-left: 0;">Applied </a>
															</li>
															@endif
															@if($post->post_type == 'skill')
															<li class="active">
																<a href="#tab_1_{{ $post->id }}_2" class="label-new" data-toggle="tab" style="border-left: 0;">Contacted</a>
															</li>
															@endif
															<li>
																<a href="#tab_1_{{ $post->id }}_3" class="label-new" data-toggle="tab" >Thanks & Share </a>
															</li>
														</ul>
														<div class="tab-content" style="padding: 10px 0px;">
															@if($post->post_type == 'job')
															<div class="tab-pane active" id="tab_1_{{ $post->id }}_1">
																<div class="portlet light" style="padding:0px; !important">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp ap-th-con">Application Received:</span>
																			<span class="caption-helper">
																				<?php $i=0; ?>
																				@foreach($post->postactivity as $pa)
																		  			@if($pa->apply == 1) <?php $i++; ?> @endif
																		  		@endforeach
																		  		<?php 
																			  		if($i>0){
																			  			echo $i;
																			  		} 
																			  	?>
																			</span>
																		</div>		
																	</div>

																	<div class="portlet-body">										
																		<ul data-handle-color="#637283" style="padding: 0">

														                  @foreach($post->postactivity as $pa)
																		  	@if($pa->apply == 1)
														                 	<li style="font-size:15px;">
														                 		<!-- <div class="mypost-match"><i class="icon-speedometer"></i> 49%</div> -->
															                    <span class="photo mypost-photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    		 
															                    </span>
															                    <span class="subject mypost-subject" >
																                    <span class="from" >
																                    	<a href="/profile/ind/{{$pa->user->id}}" data-utype="ind">
																                    		{{$pa->user->fname}} {{$pa->user->lname}}</a> has applied for this post <i class=" icon-clock"></i>
															                    	{{ \Carbon\Carbon::createFromTimeStamp(strtotime($pa->apply_dtTime))->diffForHumans() }}
																                   	</span>
																                  <!--   <span class="time"> </span> -->
															                    </span>
															                   <?php
															                    $userSkills = array_map('trim', explode(',', $pa->user->linked_skill));
															                    unset ($userSkills[count($userSkills)-1]); 
															                    ?>
																				<?php 
																					$overlap = array_intersect($postSkills, $userSkills);
																					$counts  = array_count_values($overlap);
																				?>

															                    <div class="row">
																                    <div class="col-md-1"></div>
															                        <div class="col-md-10">
																                    	<div class="row">
																	                    	<div class="col-md-2 col-sm-4 col-xs-4">
																	                    		<a data-toggle="modal" href="#post-mod-{{$post->id}}">
																	                    			<i class="icon-speedometer"></i> 
<?php
try{
	if(count($postSkills) > 0){
		$skillPer = (count($counts) / count($postSkills)) * 100;
		if(strcasecmp($post->role, Auth::user()->induser->role) == 0){$rolePer = 100;}else{$rolePer = 0;}
		if($post->prof_category == Auth::user()->induser->prof_category){$jobPer = 100;}else{$jobPer = 0;}
		if($post->min_exp == Auth::user()->induser->experience){$expPer = 100;}else{$expPer = 0;}
		if($post->education == Auth::user()->induser->education){$eduPer = 100;}else{$eduPer = 0;}
		if($post->city == Auth::user()->induser->city){$cityPer = 100;}else{$cityPer = 0;}
		if($post->time_for == Auth::user()->induser->prefered_jobtype){$typePer = 100;}else{$typePer = 0;}
		$avgPer = ($skillPer + $rolePer + $jobPer + $expPer + $eduPer + $cityPer + $typePer)/7;
		echo round($avgPer).' %';
	}
}
catch(\Exception $e){}
?>


																	                    		</a>
																	                    	</div>
																	                    	<!-- <div class="col-md-2 col-sm-4 col-xs-4">
																	                    		Profile
																	                    	</div> -->
																	                    	<div class="col-md-2 col-sm-4 col-xs-4">
																	                    	<a class="viewcontact-view" data-toggle="modal" href="#viewcontact-view">
																	                    		View Contact</a>
																	                    	</div>
																                    	</div>
															                		</div>
															               		</div>
															               		<div id="oval"></div>
										<!-- Modal for Matching Percentage -->
										<div class="modal fade" id="post-mod-{{$post->id}}" tabindex="-1" role="basic" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
													   <h4 class="modal-title">
													   		<i class="icon-speedometer" style="font-size:16px;"></i> Match 
													   		<?php
																try{
																	echo round($avgPer).'%';
																} 
																catch(\Exception $e){
																}
															?>
													   	</h4>
													</div>
													<div class="modal-body">

														<!-- BEGIN BORDERED TABLE PORTLET-->
														<div class="portlet box">
															<div class="portlet-body" style=" padding: 0 !important;">
																<div class="table-scrollable">
																	<table class="table table-bordered table-hover">
																	<thead style="border:0 !important;">
																	<tr style="border:0 !important;">
																		<th class="col-md-4 col-sm-4 col-xs-6 matching-criteria-align">
																			 Criteria
																		</th>
																		<th class="col-md-4 col-sm-4 col-xs-6 matching-criteria-align">
																			 Required Profile
																		</th>
																		<th class="col-md-4 col-sm-4 col-xs-6 matching-criteria-align">
																			 User's Profile
																		</th>
																	</tr>
																	</thead>

																	<tbody>
																		<tr class="@if(count($counts) > 0) success @else danger @endif">
																			<td>
																				<label class="title-color">
																					Skills <i class="badge">{{count($counts)}}</i> 
																				</label>
																			</td>
																			<td>
																				@foreach($post->skills as $skill)
																					{{$skill->name}},
																				@endforeach
																			</td>
																			<td>
																				@foreach($userSkills as $myskill)
																					{{$myskill}},
																				@endforeach												
																			</td>
																		</tr>
																		<tr class="@if(strcasecmp($post->role, Auth::user()->induser->role) == 0) success @else danger @endif">
																			<td>
																				<label class="title-color">Job Role</label>
																			</td>
																			<td>{{ $post->role }}</td>
																			<td>{{ Auth::user()->induser->role }}</td>
																		</tr>
																		<tr class="@if($post->prof_category == Auth::user()->induser->prof_category) success @else danger @endif">
																			<td>
																				 <label class="title-color">Job Category</label>
																			</td>																		
																			<td>{{ $post->prof_category }}</td>
																			<td>{{ Auth::user()->induser->prof_category }}</td>
																		</tr>
																		<tr class="@if($post->min_exp == Auth::user()->induser->experience) success @else danger @endif">
																			<td>
																				<label class="title-color">Experience</label>
																			</td>
																			<td>{{ $post->min_exp }}-{{ $post->max_exp }}</td>
																			<td>{{ Auth::user()->induser->experience }}</td>
																		</tr>
																		<tr class="@if($post->education == Auth::user()->induser->education) success @else danger @endif">
																			<td>
																				<label class="title-color">Education</label>
																			</td>
																			<td>{{ $post->education }}</td>
																			<td>{{ Auth::user()->induser->education }}</td>
																		</tr>
																		<tr class="@if($post->city == Auth::user()->induser->city) success @else danger @endif">
																			<td>
																				<label class="title-color">Location</label>			
																			</td>															
																			<td>{{ $post->city }}</td>
																			<td>{{ Auth::user()->induser->city }}</td>
																		</tr>
																		<tr class="@if($post->time_for == Auth::user()->induser->prefered_jobtype || ($post->time_for == 'Part Time' && Auth::user()->induser->prefered_jobtype == 'Full Time')) success @else danger @endif">
																			<td>						
																				<label class="title-color">Job Type
																				</label>
																			</td>															
																			<td>{{ $post->time_for }}</td>
																			<td>{{ Auth::user()->induser->prefered_jobtype }}</td>
																		</tr>
																	</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END BORDERED TABLE PORTLET-->
														<!-- </div> -->	
													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
											</div>
											<!-- /.modal -->
														                   	</li>
														                   	@endif									                 
														                  @endforeach									                  
														                </ul>											
																	</div>

																</div>
															</div>
															@endif
															@if($post->post_type == 'skill')
															<div class="tab-pane active" id="tab_1_{{ $post->id }}_2">
																<div class="portlet light" style="padding:0px; !important">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp ap-th-con">Contacted:</span>
																			<span class="caption-helper">
																				<?php $i=0; ?>
																				@foreach($post->postactivity as $pa)
																		  			@if($pa->contact_view == 1) <?php $i++; ?> @endif
																		  		@endforeach
																		  		<?php 
																			  		if($i>0){
																			  			echo $i;
																			  		} 
																			  	?>
																			 </span>
																		</div>		
																	</div>
																	<div class="portlet-body">													
																		<!-- <ul class="" data-handle-color="#637283"> 	 -->			                  
																		<ul data-handle-color="#637283"  style="padding: 0">
														                  @foreach($post->postactivity as $pa)
																		  	@if($pa->contact_view == 1)
														                 	<li style="font-size:15px;">
															                    <span class="photo mypost-photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    </span>
															                    <span class="subject mypost-subject">
																                    <span class="from" style="font-weight:600;color:darkcyan;">
																                    	<a href="/profile/ind/{{$pa->user->id}}" data-utype="ind">
																                    		{{$pa->user->fname}} {{$pa->user->lname}}</a> has contacted for this post <i class=" icon-clock"></i>
															                    	{{ \Carbon\Carbon::createFromTimeStamp(strtotime($pa->contact_view_dtTime))->diffForHumans() }}
																                   	</span>
																                    <span class="time"> </span>
															                    </span>
															                    <span class="message">
															                    	
															                    </span>
															                    <div class="row">
																                    <div class="col-md-1"></div>
															                        <div class="col-md-10">
																                    	<div class="row">
																	                    	<div class="col-md-3 col-sm-4 col-xs-4">
																	                    		<a href="/profile/ind/{{$pa->user->id}}" data-utype="ind">
																	                    		Contact</a>
																	                    	</div>
																                    	</div>
															                		</div>
															               		</div>
														                   	</li>
														                   	@endif									                 
														                  @endforeach									                  
														                </ul>											
																	</div>
																</div>
															</div>
															@endif
															<div class="tab-pane" id="tab_1_{{ $post->id }}_3">
																<div class="portlet light" style="padding:0px; !important">
																	<div class="portlet-title">
																		<div class="caption">
																			<i class="fa fa-gift font-green-sharp"></i>
																			<span class="caption-subject font-green-sharp ap-th-con">Thanks Recieved:</span>
																			<span class="caption-helper">
																				<?php $i=0; ?>
																				@foreach($post->postactivity as $pa)
																		  			@if($pa->thanks == 1) <?php $i++; ?> @endif
																		  		@endforeach
																		  		<?php 
																			  		if($i>0){
																			  			echo $i;
																			  		} 
																			  	?>
																			</span>
																		</div>
																	</div>
																	<div class="portlet-body">
																		<ul data-handle-color="#637283" style="padding: 0">
																		 @foreach($post->postactivity as $pa)
																		  	@if($pa->thanks == 1)
														                 	<li style="font-size:15px;">
															                    <span class="photo">
															                    	<img src="@if($pa->user->profile_pic != null){{ '/img/profile/'.$pa->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
															                    		 width="45" height="45" 
															                    		 class="img-circle">
															                    </span>
															                    <span class="subject">
																                    <span class="from" style="font-weight:600;color:darkcyan;">
																                    	<a href="/profile/ind/{{$post->individual_id}}" data-utype="ind">
																                    		{{$pa->user->fname}} {{$pa->user->lname}}</a>
																                   	</span>
																                    <span class="time"> </span>
															                    </span>
															                    <span class="message">
															                    	has thanked this post <i class=" icon-clock"></i>					                    	
															                    	{{ \Carbon\Carbon::createFromTimeStamp(strtotime($pa->thanks_dtTime))->diffForHumans() }}
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
					</div>
					<div class="portlet-body">
						<ul>
							<li>
								 Lorem ipsum dolor sit amet
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

	 @endforeach
	 @else
	 ---- You haven't Post Anything ! ----
	@endif
			</div>
				</div>
				@if(Auth::user()->identifier == 1)
				<div class="tab-pane" id="tab_5_2">
					<div class="row">
						@foreach($myActivities as $myActivity)								
						<div class="col-md-9">												
							<div class="updates-style" data-postid="{{$myActivity->post_id}}">{{$myActivity->time}}: {{$myActivity->identifier}} for {{$myActivity->post_title}}, {{$myActivity->post_compname}} 
							<br>Post ID: {{$myActivity->unique_id}}  
							<a class="myactivity-post" data-toggle="modal" href="#myactivity-post">See the full Post </a>
							</div>				
						</div>	
						@endforeach		
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="myactivity-post" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog-new">
		<div class="modal-content">
			<div id="myactivity-post-content">
				My Activity Post 
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="viewcontact-view" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog-new">
		<div class="modal-content">
			<div id="viewcontact-view-content">
				My Activity Post 
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
// $('.content').slideUp(400);//reset panels

// $('.panel').click(function() {//open
//    var takeID = $(this).attr('id');//takes id from clicked ele
//    $('#'+takeID+'C').slideDown(400);
//                              //show's clicked ele's id macthed div = 1second
// });
// $('span').click(function() {//close
//    var takeID = $(this).attr('id').replace('Close','');
//    //strip close from id = 1second
//     $('#'+takeID+'C').slideUp(400);//hide clicked close button's panel
// });​

$(document).ready(function(){
	// myactivity-post
$('.myactivity-post').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('postid');

    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $.ajax({
      url: "/myactivity/post",
      type: "post",
      data: {post_id: post_id},
      cache : false,
      success: function(data){
    	$('#myactivity-post-content').html(data);
    	$('#myactivity-post').modal('show');
      }
    }); 
    return false;
});

$('.viewcontact').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('postid');

    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

    $.ajax({
      url: "/viewcontact/view",
      type: "post",
      data: {post_id: post_id},
      cache : false,
      success: function(data){
    	$('#viewcontact-view-content').html(data);
    	$('#viewcontact-view').modal('show');
      }
    }); 
    return false;
});

});
</script>
@stop
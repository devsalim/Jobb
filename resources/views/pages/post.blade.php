@extends('master')

@section('content')

<div class="portlet light bordered" style="border: none !important;background:transparent">										
	<div class="portlet-body form">
			<div class="form-body">
				<div class="row">
					@if (count($posts) > 0)
						<?php $var = 1; ?>
						@foreach($posts as $post)
						
						<?php $groupsTagged = array(); ?>
						@foreach($post->groupTagged as $gt)
							<?php $groupsTagged[] = $gt->group_id; ?>
						@endforeach

						<?php
							$crossCheck = array_intersect($groupsTagged, $groups);
							$elements  = array_count_values($crossCheck); ?>

						@if($post->tagged->contains('user_id', Auth::user()->induser_id) || 
							$post->individual_id == Auth::user()->induser_id || 
							count($elements) > 0 || 
							(count($elements) == 0 && !$post->tagged->contains('user_id', Auth::user()->induser_id)))

						<div class="col-md-9">

							<div class="timeline" >
								<!-- TIMELINE ITEM -->
								<div class="timeline-item time-item">
									<div class="timeline-badge" style="margin: 10px 0px;">
										@if($post->induser != null && !empty($post->induser->profile_pic))
										<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
										<a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style="font-size:12px;"></i></a>
										@elseif($post->corpuser != null && !empty($post->corpuser->logo_status))
										<img class="" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
										<a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
										@elseif(empty($post->corpuser->logo_status) && $post->corpuser != null)
										<img class="" src="/assets/images/corp.png">
										<a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
										@elseif(empty($post->induser->profile_pic) && $post->induser != null)
										<img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
										<a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style=" font-size:12px;"></i></a>
										@endif
										@if(Auth::user()->identifier == 1 && $post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id)
										<div class="match">
											<?php $postSkills = array(); ?>
											@foreach($post->skills as $skill)
												<?php $postSkills[] = $skill->name; ?>
											@endforeach
											<?php 
												$overlap = array_intersect($userSkills, $postSkills);
												$counts  = array_count_values($overlap);
											?>
											<a data-toggle="modal" href="#mod-{{$post->id}}">
												<i class="icon-speedometer"></i> 
												<?php
													try{
														if(count($postSkills) > 0){
															$skillPer = (count($counts) / count($userSkills)) * 100;
															if($post->role == Auth::user()->induser->role){$rolePer = 100;}else{$rolePer = 0;}
															if($post->prof_category == Auth::user()->induser->prof_category){$jobPer = 100;}else{$jobPer = 0;}
															if($post->min_exp == Auth::user()->induser->experience){$expPer = 100;}else{$expPer = 0;}
															if($post->education == Auth::user()->induser->education){$eduPer = 100;}else{$eduPer = 0;}
															if($post->city == Auth::user()->induser->city){$cityPer = 100;}else{$cityPer = 0;}
															if($post->time_for == Auth::user()->induser->prefered_jobtype){$typePer = 100;}else{$typePer = 0;}
															$avgPer = ($skillPer + $rolePer + $jobPer + $expPer + $eduPer + $cityPer + $typePer)/7;
															echo round($avgPer).' %';
														}
													}
													catch(\Exception $e){

													}
												?>
											</a>
										</div>

										<div id="oval"></div>
										<!-- Modal for Matching Percentage -->
										<div class="modal fade" id="mod-{{$post->id}}" tabindex="-1" role="basic" aria-hidden="true">
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
																			 My Profile
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
																		<tr class="@if($post->role == Auth::user()->induser->role) success @else danger @endif">
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
											@endif
									</div>
									<div class="timeline-body" style="">
										<div class="timeline-body-head">
											@if(Auth::user()->induser_id == $post->individual_id && $post->individual_id != null)
												<div class="timeline-body-head-caption">												
														<a href="/profile/ind/{{$post->individual_id}}" class="link-label" data-utype="ind">
															You have
														</a>
													<span class="timeline-body-time font-grey-cascade">Posted at 
														{{ date('M d, Y', strtotime($post->created_at)) }}
													</span>
												</div>
											@elseif(Auth::user()->corpuser_id == $post->corporate_id && $post->corporate_id != null)
												<div class="timeline-body-head-caption">													
														<a href="/profile/corp/{{$post->corporate_id}}" class="link-label" data-utype="corp">
															You have
														</a>
													<span class="timeline-body-time font-grey-cascade">Posted at 
														{{ date('M d, Y', strtotime($post->created_at)) }}
													</span>
												</div>
											@elseif($post->individual_id != null)
												<div class="timeline-body-head-caption" data-puid="{{$post->individual_id}}">
												
														@if($links->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:salmon;"></i>
														</a>
														@elseif($following->contains('id', $post->individual_id))
														<a class="user-link2" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:steelblue;"></i>
														</a>
														@else
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
														</a>
														@endif
														
														<a href="/profile/ind/{{$post->individual_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
															{{ $post->induser->fname}} {{ $post->induser->lname}}
														</a>
													

													
													<span class="timeline-body-time font-grey-cascade">Posted at 
														{{ date('M d, Y', strtotime($post->created_at)) }}
													</span>
												</div>
											@elseif($post->corporate_id != null)
												<div class="timeline-body-head-caption" data-puid="{{$post->corporate_id}}">
														@if($following->contains('id', $post->corporate_id))
															<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="corp">
																<i class="icon-user-following" style="color:black;"></i>
															</a>
														@else
															<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="corp">
																<i class="icon-user-follow" style="color:lightslategray;"></i>
															</a>
														@endif														
														<a href="/profile/corp/{{$post->corporate_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
															{{ $post->corpuser->firm_name}}
														</a>
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
											@if($post->post_compname != null && $post->post_type == 'job')
											<div><h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{ $post->post_compname }}</h4></div>
											@elseif($post->post_compname != null && $post->post_type == 'skill')
											<div><h4 style="margin: 0 0 4px 0;"><small>Working at</small> {{ $post->post_compname }}</h4></div>
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
										<div class="box">
										   <div class="ribbon"><span class="{{ $post->post_type }}">{{ $post->post_type }}</span></div>
										</div>
										<div class="post-job-skill-bar">
											
											@if(Auth::user()->induser_id != $post->individual_id )
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
															@if($post->post_type == 'job')
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label">Education Required :</label>
																
																	{{ $post->education }}
																 
															</div>
															@else
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label">Qualification :</label>
																
																	{{ $post->education }}
																 
															</div>
															@endif
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
															@if($post->post_type == 'job')
															<div class="col-md-12 col-sm-12 col-xs-12">													
																<label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
															</div>
															@else
															<div class="col-md-12 col-sm-12 col-xs-12">													
																<label class="detail-label">Expected Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
															</div>
															@endif
															
															<div class="col-md-12 col-sm-12 col-xs-12">
																<label class="detail-label">Job Type :</label>
																{{ $post->time_for }}
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
																Click on Apply, it will redirect you to Company Website.
															</div>
															@endif
															@if($post->post_type == 'job' && $post->website_redirect_url != null && $post->corpuser != null)
															<div class="col-md-12 col-sm-12 col-xs-12">
																
																	<label class="detail-label"><i class="glyphicon glyphicon-globe" style="color: deepskyblue;"></i> :</label>
																{{ $post->website_url }}
																	
																
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
														<div class="skill-display">Post Id&nbsp;: {{ $post->unique_id }} </div>

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
													<form action="/job/like" method="post" id="post-like-{{$post->id}}" data-id="{{$post->id}}">						
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
													
														@if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)		
													@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())

														<form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">	
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="apply" value="{{ $post->id }}">
															@if($post->website_redirect_url != null)
																<button class="btn apply-btn blue btn-sm apply-contact-btn" 
																	onclick="window.location='{{ $post->website_redirect_url }}';"	 type="button">Apply
																</button>	
															@else
																<button class="btn apply-btn blue btn-sm apply-contact-btn" 
																		id="apply-btn-{{$post->id}}" type="button">Apply
																</button>
																@endif
														</form>	
													@elseif($post->postactivity->where('user_id', Auth::user()->induser_id)->first()->apply == 1 && Auth::user()->identifier == 1) 
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
												@if($post->post_type == 'skill' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)		
													@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())
														<form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">	
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="contact" value="{{ $post->id }}">
															<button class="btn contact-btn green btn-sm apply-contact-btn" 
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
														<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: transparent;padding: 18px 20px 7px 6px;">
														<i class="fa fa-share-square-o" style="font-size: 23px;color: darkslateblue;"></i><span class="badge-share">132</span>
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
												@if(Auth::user()->id != $post->individual_id)
												<div class="report"><a class="" data-toggle="modal" href="#basic">
													<i class="fa fa-warning (alias)" style="color:red;"></i></a>
												</div>
												@endif
												<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
													<div class="modal-dialog" style="width: 250px;">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																<h4 class="modal-title">Report this Post</h4>
																<div class="icheck-list">
																	<label>
																	<input type="checkbox" checked class="icheck" data-checkbox="icheckbox_line-grey" data-label="Report Abuse">
																	</label>
																	<label>
																	<input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Spam">
																	</label>
																	<label>
																	<input type="checkbox" class="icheck" data-checkbox="icheckbox_line-grey" data-label="Hide this Post">
																	</label>
																	<label>
																</div>
																<button type="submit" class="btn btn-warning">Submit</button>
															</div>
														</div>
														<!-- /.modal-content -->
													</div>
													<!-- /.modal-dialog -->
												</div>
												<!-- /.modal -->
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
																	
									</ul>
								</div>
							</div>
						</div>	
						<!-- END TIMELINE ITEM -->
						@endif
					<?php $var++; ?>
				 @endforeach

				@endif
				</div>

				<div class="row">
					<div class="col-md-9">
						<?php echo $posts->render(); ?>
					</div>
				</div>

				<div class="modal fade bs-modal-sm" id="links-follow" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content" id="links-follow">
							<div id="links-follow-content">
								Links Follow
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->


			</div>
	</div>
</div>


@stop

@section('javascript')
<script>
jQuery(document).ready(function() {       
	ComponentsIonSliders.init();    
	ComponentsDropdowns.init();
	ComponentsEditors.init();
    FormWizard.init();
});
$('#skill-list').select2();
function myFunction() {
    document.getElementById("home-filter").reset();
}
</script>
<script type="text/javascript">
$(document).ready(function(){

    jQuery('.hide-show-filter').on('click', function(event) {
	    jQuery('.show-filter').toggle('show');
	    jQuery('.hide-label').toggle('hide');
    });

    var displayConfirm = function() {
        $('#filter .form-control-static', form).each(function(){
            var input = $('[name="'+$(this).attr("data-display")+'"]', form);
            if (input.is(":radio")) {
                input = $('[name="'+$(this).attr("data-display")+'"]:checked', form);
            }
            if (input.is(":text") || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") && input.is(":checked")) {
                $(this).html(input.attr("data-title"));
            } else if ($(this).attr("data-display") == 'payment[]') {
                var payment = [];
                $('[name="payment[]"]:checked', form).each(function(){ 
                    payment.push($(this).attr('data-title'));
                });
                $(this).html(payment.join("<br>"));
            }
        });
    }

  $('.like-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-like-'+post_id).serialize(); 
    var formAction = $('#post-like-'+post_id).attr('action');

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
 			$('#like-'+post_id).css({'color':'burlywood'});
 			$('#like-count-'+post_id).removeClass('hide');
            $('#like-count-'+post_id).addClass('show');
        }else if(data < $count){
 			$('#like-count-'+post_id).text(data);
 			$('#like-'+post_id).css({'color':'lightslategray'});
 			if(data < $count && data == 0){
            $('#like-count-'+post_id).removeClass('show');
            $('#like-count-'+post_id).addClass('hide');
            }
        }
        else if(data == 0){
            $('#like-count-'+post_id).addClass('hide');
        }
      }
    }); 
    return false;
  }); 

  $('.fav-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-fav-'+post_id).serialize(); 
    var formAction = $('#post-fav-'+post_id).attr('action');
    $count = $('#myfavcount').text();
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
 			$('#fav-btn-'+post_id).addClass('btn-warning');
 			$('#myfavcount').text(data);
 			$('#myfavcount').removeClass('hide');
 			$('#myfavcount').addClass('show');
        }else if(data < $count){
 			$('#fav-btn-'+post_id).removeClass('btn-warning');
 			$('#myfavcount').text(data);
 			if(data < $count && data == 0){
			$('#myfavcount').removeClass('show');
			$('#myfavcount').addClass('hide');
 			}
        }
        else if(data == 0){
        	$('#myfavcount').addClass('hide');
        }
      }
    }); 
    return false;
  }); 

$('.apply-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-apply-'+post_id).serialize(); 
    var formAction = $('#post-apply-'+post_id).attr('action');

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
        if(data == "applied"){
        	$('#apply-btn-'+post_id).prop('disabled', true);
 			$('#apply-btn-'+post_id).text('Applied');
        }
      }
    }); 
    return false;
  });
	
	$('.contact-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-contact-'+post_id).serialize(); 
    var formAction = $('#post-contact-'+post_id).attr('action');

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
        if(data == "contacted"){
        	$('#contact-btn-'+post_id).prop('disabled', true);
 			$('#contact-btn-'+post_id).text('Contacted');
        }
      }
    }); 
    return false;
  });

	// user-link
	$('.user-link').on('click',function(event){  	    
	  	event.preventDefault();
	  	var post_user_id = $(this).parent().data('puid');
	  	var post_user_linked = $(this).data('linked');
	  	var post_user_type = $(this).data('utype');

	  	// var formData = $('#post-apply-'+post_id).serialize(); 
	   //  var formAction = $('#post-apply-'+post_id).attr('action');

	    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	    $.ajax({
	      url: "/follow-modal",
	      type: "post",
	      data: {puid: post_user_id, linked: post_user_linked, utype: post_user_type},
	      cache : false,
	      success: function(data){
	    	$('#links-follow-content').html(data);
	    	$('#links-follow').modal('show');
	      }
	    }); 
	    return false;
  });

});
</script>

@stop
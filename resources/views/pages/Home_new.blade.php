@extends('master')

@section('content')
<!-- BEGIN TAB PORTLET-->
<div class="portlet box blue col-md-9">
	<div class="portlet-title" style="float:left;">
		<ul class="nav nav-tabs" style="padding:0;">
			<li class="active">
				<a href="#portlet_tab1" data-toggle="tab" style="font-size:15px;">
				Job</a>
			</li>
			<li>
				<a href="#portlet_tab2" data-toggle="tab" style="font-size:15px;">
				Skills </a>
			</li>
			<!-- <li>
				<a href="#portlet_tab3" data-toggle="tab">
				Tab 3 </a>
			</li> -->
		</ul>
	</div>
	<div class="portlet-body">
		<div class="tab-content">
			<div class="tab-pane active" id="portlet_tab1">
				@if (count($posts) > 0)
					<?php $var = 1; ?>
					@foreach($posts as $post)
					@if($post->post_type == 'job')
				<div class="portlet light bordered" style="border: none !important;background:transparent;padding:0 !important;margin: -20px 0px;">										
					<div class="portlet-body form">
							<div class="form-body">
								<div class="row">

										<?php $groupsTagged = array(); ?>
										@foreach($post->groupTagged as $gt)
											<?php $groupsTagged[] = $gt->group_id; ?>
										@endforeach
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
										<?php
											$crossCheck = array_intersect($groupsTagged, $groups);
											$elements = array_count_values($crossCheck); ?>

										@if($post->tagged->contains('user_id', Auth::user()->induser_id) || 
											$post->individual_id == Auth::user()->induser_id || 
											count($elements) > 0 || 
											(count($groupsTagged) == 0 && count($post->tagged) == 0))
										<div class="col-md-12" style="margin:0 -10px;">

											<div class="timeline" >
												<!-- TIMELINE ITEM -->
												@if($expired == 1)
												<div class="timeline-item time-item-ex">
												@else
												<div class="timeline-item time-item">
													@endif
													<div class="timeline-badge" style="margin: 4px 3px;">
														@if($post->induser != null && !empty($post->induser->profile_pic))
														<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
														<a class=" img-circle">
															@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)
																<div class="" data-puid="{{$post->individual_id}}">
																
																		@if($links->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksPending->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class="icon-hourglass (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksApproval->contains('id', $post->individual_id) )
																		<a href="#links-follow " data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class=" fa fa-question (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($following->contains('id', $post->individual_id))
																		<a href="#links-follow" class="user-link2 link-follow-icon" data-toggle="modal" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:steelblue;"></i>
																		</a>
																		@else
																		<a href="#links-follow" data-toggle="modal" class="user-link3" data-linked="no" data-utype="ind">
																			<i class="fa fa-unlink (alias) icon-size" style="color:darkslategray;"></i>
																		</a>

																		@endif
																</div>
																
															@endif</a>
														@elseif($post->corpuser != null && !empty($post->corpuser->logo_status))
														<img class="" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
														@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id  && Auth::user()->identifier == 1)
																<a class="icon-userpic">
																<div class="" data-puid="{{$post->corporate_id}}">
																		@if($following->contains('id', $post->corporate_id))
																			<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																				<i class="icon-user-following icon-size" style="color:chartreuse;"></i>
																			</a>
																		@else
																			<a href="#links-follow" data-toggle="modal" class="user-link3 link-follow-icon" data-linked="no" data-utype="corp">
																				<i class="icon-user-follow icon-size" style="color:darkslategray;"></i>
																			</a>
																		@endif														
																</div></a>
															@endif
														@elseif(empty($post->corpuser->logo_status) && $post->corpuser != null )
														<img class="" src="/assets/images/corpnew.jpg">
														@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id  && Auth::user()->identifier == 1)
																<a class="icon-userpic">
																<div class="" data-puid="{{$post->corporate_id}}">
																		@if($following->contains('id', $post->corporate_id))
																			<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																				<i class="icon-user-following icon-size" style="color:chartreuse;"></i>
																			</a>
																		@else
																			<a href="#links-follow" data-toggle="modal" class="user-link3 link-follow-icon" data-linked="no" data-utype="corp">
																				<i class="icon-user-follow icon-size" style="color:darkslategray;"></i>
																			</a>
																		@endif														
																</div></a>
															@endif
														@elseif(empty($post->induser->profile_pic) && $post->induser != null)
														<img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
														<a class=" img-circle">
															@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id  && Auth::user()->identifier == 1)
																<div class="" data-puid="{{$post->individual_id}}">
																
																		@if($links->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksPending->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class="icon-hourglass (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksApproval->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class=" fa fa-question (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($following->contains('id', $post->individual_id))
																		<a href="#links-follow" class="user-link2 link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:darkslategray;"></i>
																		</a>
																		@else
																		<a href="#links-follow" data-toggle="modal" class="user-link3" data-linked="no" data-utype="ind">
																			<i class="fa fa-unlink (alias) icon-size" style="color:darkslategray;"></i>
																		</a>
																		@endif
																</div>
															@endif</a>
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
															<div class="ribbon-wrapper3">
																	<div class="ribbon-front3">
																	
															<a data-toggle="modal" class="magic-font" href="#mod-{{$post->id}}" style="color: white;line-height: 1.7;text-decoration: none;">
																<i class="icon-speedometer magic-font"></i> 
													<?php
														try{
															if(count($postSkills) > 0){
																$skillPer = (count($counts) / count($userSkills)) * 100;
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
														catch(\Exception $e){

														}
													?>
															</a>
															</div>
																<div class="ribbon-edge-topleft3"></div>
																<div class="ribbon-edge-topright3"></div>
																<div class="ribbon-edge-bottomleft3"></div>
																<div class="ribbon-edge-bottomright3"></div>
																<div class="ribbon-back-left3"></div>
																<div class="ribbon-back-right3"></div>
															</div>
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
															@endif
													</div>
													@if($expired == 1)
													<div class="timeline-body new-timeline-body">
														@else
													<div class="timeline-body ">
														@endif
														<div class="timeline-body-head">
															@if(Auth::user()->induser_id == $post->individual_id && $post->individual_id != null)
																<div class="timeline-body-head-caption">							

										<!-- Post shared by user -->						
										@if(count($post->groupTagged) > 0)
											@if($post->sharedGroupBy->first()->mode == 'shared')
											<div class="shared-by">
										{{$post->sharedGroupBy->first()->mode}} by <b>{{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</b> to <b>{{$post->sharedToGroup->first()->group_name}}</b> group<br/>
											</div>
											@endif
										@endif

																		<a href="/profile/ind/{{$post->individual_id}}" class="link-label" data-utype="ind">
																			<small>You</small>
																		</a>
																	<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		<small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif(Auth::user()->corpuser_id == $post->corporate_id && $post->corporate_id != null)
																<div class="timeline-body-head-caption">													
																		<a href="/profile/corp/{{$post->corporate_id}}" class="link-label" data-utype="corp">
																			<small>You</small>
																		</a>
																	<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		<small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif($post->individual_id != null)
																<div class="timeline-body-head-caption" data-puid="{{$post->individual_id}}">
																
										<!-- Post shared by user -->						
										@if(count($post->groupTagged) > 0)
											@if($post->sharedGroupBy->first()->mode == 'shared')
											<div class="shared-by">
										<small>{{$post->sharedGroupBy->first()->mode}} by {{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</small> to <small>{{$post->sharedToGroup->first()->group_name}}</small> group<br/>
											</div>
											@endif
										@endif

										<!-- Post shared by user -->						
										@if($post->tagged->contains('user_id', Auth::user()->induser_id) && 
											$post->sharedBy->first()->mode == 'shared')
											
										<small>	{{$post->sharedBy->first()->mode}} by 
											{{$post->sharedBy->first()->fname}} {{$post->sharedBy->first()->lname}}</small><br/>

										@endif
																		<a href="/profile/ind/{{$post->individual_id}}" style="font-size: 13px;text-decoration:none;font-weight:500;">

																			{{ $post->induser->fname}} {{ $post->induser->lname}}
																		</a>
																	

																	
																	<span class="timeline-body-time font-grey-cascade"><small><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		{{$post->created_at->diffForHumans()}}
																		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif($post->corporate_id != null)
																<div class="timeline-body-head-caption" data-puid="{{$post->corporate_id}}">
																														
																		<a href="/profile/corp/{{$post->corporate_id}}" style="font-size: 13px;text-decoration:none;">
																			{{ $post->corpuser->firm_name}}
																		</a><span class="label label-sm label-success">{{ $post->corpuser->firm_type}}</span>
																	<span class="timeline-body-time font-grey-cascade"><small><i class="fa fa-clock-o" style="font-size: 11px;"></i>
																		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@endif
														</div>
														<!--  -->
														<div class="timeline-body-content new-hide" style="cursor:pointer;">
															
															@if($post->post_type == 'skill')	
																<div class="elipsis-code" style="font-weight: 600;color: black;font-size: 13px;">{{ $post->post_title }} </div>
															@elseif($post->post_type == 'job')
																 <div class="elipsis-code" style="font-weight: 600;color: black;font-size: 13px;">{{ $post->post_title }}  </div>
															@endif	
															@if($post->post_compname != null && $post->post_type == 'job')
															<div><h4 style="margin: 0 0 4px 0;"><small>Required at {{ $post->post_compname }}</small></h4></div>
															@elseif($post->post_compname != null && $post->post_type == 'skill')
															<div><h4 style="margin: 0 0 4px 0;"><small>Working at {{ $post->post_compname }} </small></h4></div>
															@endif				 							
															
															<div class="row" style="cursor:pointer;">
																<!-- <div class="col-md-4 col-sm-4 col-xs-12">
																	<i class="icon-badge"></i>&nbsp;: {{ $post->role }}
																</div> -->
																<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code elipsis-city-code" style="padding:0 12px;">
																<small>	<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}</small>
																</div>
																
																<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code" style="float: none;margin:0;display: table;">
																<small>	<i class="glyphicon glyphicon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Yr</small>
																</div>
																<div id="{{ $post->id }}-{{$var}}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 hide-details" style="float: right;right: -40px;bottom: 16px;">
																    <a><i class="fa fa-angle-double-down" style="font-size:20px;"></i></a>
																</div>
																<div id="{{ $post->id }}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 show-details" style="float: right;right: -40px;bottom: 16px;">
																    <a><i class="fa fa-angle-double-up" style="font-size:20px;"></i></a>
																</div>
															</div>

														</div>	
														@if($expired != 1)
														
															<div class="row" style="">	
																
																<div class="col-md-3 col-sm-3 col-xs-3" style="padding:0 8px;">
																	<form action="/job/like" method="post" id="post-like-{{$post->id}}" data-id="{{$post->id}}">						
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="like" value="{{ $post->id }}">
																<button class="btn like-btn"  type="button" style="background-color: transparent;padding:0 10px;" title="Thanks">
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())					
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->thanks == 1) 
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}" style="color:burlywood"></i>
																	@else
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>		
																	@endif
																</button>	
																		<span class="badge-like" id="like-count-{{ $post->id }}">
																		@if($post->postactivity->sum('thanks') > 0)
																		{{ $post->postactivity->sum('thanks') }}
																		@endif
																		</span>
																	</form>	
																</div>
																<div class="col-md-3 col-sm-3 col-xs-3 ">
																	@if(Auth::user()->induser_id != $post->individual_id )
																	<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="fav_post" value="{{ $post->id }}">

																		<button class="btn fav-btn" type="button" style="background-color: transparent;padding:0 10px;border:0">
																			@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->fav_post == 1) 
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:#E26A6A"></i>
																			@else
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@endif	
																		</button>	
																	</form>
																	@endif
																</div>
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)										
																	
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	<div class="col-md-3 col-sm-3 col-xs-3">
																	</div>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1)
																	<div class="col-md-3 col-sm-3 col-xs-3"  style="">													
																		<i class="fa fa-check-square-o" style="font-size:15px;"></i><span class="applied-css"> Applied</span> 
																	</div>
																	@endif
																@endif
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	<div class="col-md-3 col-sm-3 col-xs-3">
																	</div>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																	<div class="col-md-3 col-sm-3 col-xs-3"  style="">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																	</div>
																	@endif
																@endif
																<div  class="col-md-3 col-sm-3 col-xs-3" style="">
																    <div class="dropup ">											
																		<button class="btn dropdown-toggle" type="button" 
																				data-toggle="dropdown" title="Share" 
																				style="background-color: transparent;border: 0;margin-top:-4px;">
																			<i class="fa fa-share-square-o" 
																				style="font-size: 19px;color: darkslateblue;"></i>
																			<span class="badge-share" id="share-count-{{ $post->id }}">@if($post->postactivity->sum('share') > 0){{ $post->postactivity->sum('share') }}@endif</span>
																		</button>
																		<ul class="dropdown-menu pull-right" role="menu" 
																			style="min-width:0;box-shadow:0 0 !important">
																			<li style="background-color: tan;">
																				<a href="#share-post" data-toggle="modal" class="jobtip sojt" id="sojt-{{$post->id}}" data-share-post-id="{{$post->id}}">
																					Share on Jobtip
																				</a>
																			</li>
																			<li style="background-color: #3b5998;">
																				<a href="/" class="facebook">
																					<i class="fa fa-facebook post-social-icon" ></i>
																				</a>
																			</li>
																			<li style="background-color: #c32f10;">
																				<a href="/" class="google-plus">
																					<i class="fa fa-google-plus post-social-icon"></i>
																				</a>
																			</li>
																			<li style="background-color: #00aced;">
																				<a href="/" class="linkedin">
																					<i class="fa fa-linkedin post-social-icon" ></i>
																				</a>
																			</li>
																		</ul>													
																	</div>
																</div>
																
																	
															</div>
														
															@else
															<div class="row" style="padding:5px 0">
																<div class="col-md-3 col-sm-3 col-xs-4" style="font-size:12px;">
																<!-- <div class="expired-css">													 -->
																	<i class="glyphicon glyphicon-ban-circle"></i> Expired
																<!-- </div> -->
																</div>
																<div class="col-md-3 col-sm-3 col-xs-4 ">
																	@if(Auth::user()->induser_id != $post->individual_id )
																	<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="fav_post" value="{{ $post->id }}">

																		<button class="btn fav-btn" type="button" style="background-color: transparent;padding:0 10px;border:0">
																			@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->fav_post == 1) 
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:#E26A6A"></i>
																			@else
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@endif	
																		</button>	
																	</form>
																	@endif
																</div>
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1)
																	<div class="col-md-3 col-sm-3 col-xs-4">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
																	</div>
																	@endif
																@endif
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																	<div class="col-md-3 col-sm-3 col-xs-4">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																	</div>
																	@endif
																@endif
																
																
															</div>											
															@endif

														<div class="box">
														   <div class="ribbon"><span class="{{ $post->post_type }}">{{ $post->post_type }}</span></div>
														</div>
														<div class="post-job-skill-bar">
															 @if($expired != 1 && Auth::user()->induser_id != $post->individual_id || Auth::user()->corpuser_id != $post->corporate_id)
																	<div class=""><a class="" data-toggle="modal" href="#basic-{{ $post->id }}">
																		<i class="fa  fa-ellipsis-v" style="color:red;"></i></a>
																	</div>										
																@endif
															<div class="modal fade" id="basic-{{ $post->id }}" tabindex="-1" role="basic" 
																		 aria-hidden="true">
																		<div class="modal-dialog" style="width: 300px;">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" 
																							data-dismiss="modal" aria-hidden="true">
																					</button>
																					<h4 class="modal-title">Report this Post</h4>				
																				</div>
																				<form action="/report-abuse" method="post" id="report-abuse-form-{{ $post->id }}">
																				<input type="hidden" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" name="report_post_id" value="{{ $post->id }}">
																				<div class="modal-body">
																					<div class="icheck-list">
																						<label>
																							<input type="checkbox" class="icheck" 
																									name="report-abuse-check[]"
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Abusive post"
																									value="Abusive post" checked>
																						</label>												
																						<label>
																							<input type="checkbox" class="icheck" 
																									name="report-abuse-check[]"
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Abusive profile"
																									value="Abusive profile">
																						</label>
																						<label>
																							<input type="checkbox" class="icheck"
																									name="report-abuse-check[]" 
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Spam post"
																									value="Spam post">
																						</label>
																					</div>
																					
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-warning btn-xs">Submit</button>
																					<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
																				</div>
																				</form>
																			</div>
																			<!-- /.modal-content -->
																		</div>
																		<!-- /.modal-dialog -->
																	</div>
																	<!-- /.modal -->	
														</div>
													</div>
													<div class="portlet-body show-details">
														<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
															<div class="panel panel-default" style=" position: relative;">
																<div class="panel-heading">
																	<h4 class="panel-title">
																	<a class="accordion-toggle " 
																	data-toggle="collapse" data-parent="#accordion{{$var}}" href=""  style="font-size: 15px;font-weight: 600;" >
																	Details: </a>	
																	</h4>
																</div>
																<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse">
																	<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
																		
																		<div class="row">
																			@if($post->post_type == 'job')
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Job Title :</label>					
																					{{ $post->post_title }}														 
																			</div>
																			@elseif($post->post_type == 'skill')
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Skill Title :</label>					
																					{{ $post->post_title }}													 
																			</div>
																			@endif
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
																			@if( $post->min_exp != null && $post->max_exp != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Experience :</label>										
																					{{ $post->min_exp}}-{{ $post->max_exp}} Years															
																			</div>
																			@else
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label"><i class="icon-briefcase"></i> :</label>										
																					Not Provided															
																			</div>
																			@endif
																			<div class="col-md-12 col-sm-12 col-xs-12">											
																					<label class="detail-label">Skills :</label>									
																					@foreach($post->skills as $skill)
																						{{$skill->name}},
																					@endforeach																 
																			</div>
																			@if($post->post_type == 'job' && $post->min_sal != null && $post->max_sal != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																				<label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																				{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
																			</div>
																			@elseif($post->post_type == 'skill' && $post->min_sal != null && $post->max_sal != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																				<label class="detail-label">Expected Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																				{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
																			</div>
																			@endif
																			
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">Job Type :</label>
																				{{ $post->time_for }}
																			</div>
																			@if($post->locality != null && $post->city !=null)
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">Locality :</label>
																				{{ $post->locality }},{{ $post->city }} 
																			</div>
																			@elseif($post->locality == null && $post->city !=null)
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">City :</label>
																				{{ $post->city }} 
																			</div>
																			@endif
																		</div>
																		
																		<div class="skill-display">Description : </div>
																		{{ $post->job_detail }}
																		
																		@if($post->post_type == 'job' && $post->reference_id != null)
																		<div class="skill-display">Reference Id&nbsp;: {{ $post->reference_id }} </div>	
																		@endif

																		@if($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																		@elseif($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																		<div  class="skill-display ">Contact Details : </div> 
																		<div id="show-hide-contacts" class="row">
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

																@if($expired != 1 && Auth::user()->identifier == 1)
																<div style="margin:27px 0 0;">
																    <!-- if corporate_id not null -->
																    @if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id)     
																        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url != null)
																            <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
																                <input type="hidden" name="_token" value="{{ csrf_token() }}">
																                <input type="hidden" name="apply" value="{{ $post->id }}">
																                    <a class="btn apply-btn blue btn-sm apply-contact-btn show-contact" target="_blank" 
																                        href="{{ $post->website_redirect_url }}" type="button"><i class="icon-globe"></i> Apply
																                    </a>    
																            </form> 
																                
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url == null && $post->corporate_id != null)
																        <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
																            <input type="hidden" name="_token" value="{{ csrf_token() }}">
																            <input type="hidden" name="apply" value="{{ $post->id }}">
																            <button class="btn apply-btn blue btn-sm apply-contact-btn show-contact" 
																                    id="apply-btn-{{$post->id}}" type="button">Apply
																            </button>
																        </form> 
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url == null && $post->individual_id != null)
																        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
																            <input type="hidden" name="_token" value="{{ csrf_token() }}">
																            <input type="hidden" name="contact" value="{{ $post->id }}">
																            <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
																                    id="contact-btn-{{$post->id}}" type="button">Contact
																            </button>
																        </form> 
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 && Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url != null) 
																            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true" style="padding: 4px 10px; line-height: 1.4;">
																                <i class="icon-check icon-check-css"></i> Applied 
																            </button>

																            <div class="center-css">{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->apply_dtTime)) }}
																            </div>
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1 &&  Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url == null && $post->individual_id != null) 
																        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true" style="padding: 4px 10px; line-height: 1.4;">
																            <i class="icon-check icon-check-css"></i> Contacted 
																        </button>
																        <div class="center-css">
																        	{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
																        </div>
																       
																        @endif

																    <!-- if corporate_id is null     -->
																    @elseif($post->post_type == 'job' && $post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)        
																        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->resume_required == 1)
																            <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
																                <input type="hidden" name="_token" value="{{ csrf_token() }}">
																                <input type="hidden" name="contact" value="{{ $post->id }}">
																                <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
																                        id="contact-btn-{{$post->id}}" type="button">Contact
																                </button>
																            </form>     
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1 && Auth::user()->identifier == 1 && $post->resume_required == 1) 
																            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
																            <i class="icon-check icon-check-css"></i> Contacted 
																        </button> 
																        <div class="center-css">
																        	{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
																        </div>                                    
																        @endif   
																   

																    @endif  
																
																</div>
																@elseif($expired != 1)
																<div style="margin:27px 0 0;">
																	@if($post->post_type == 'skill' && Auth::user()->induser_id != $post->individual_id)       
																    @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
																            <input type="hidden" name="_token" value="{{ csrf_token() }}">
																            <input type="hidden" name="contact" value="{{ $post->id }}">
																            <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
																                    id="contact-btn-{{$post->id}}" type="button">Contact
																            </button>
																        </form> 
																    @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
																        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
																            <i class="glyphicon glyphicon-ok"></i> Contacted
																        </button>
																        <div class="center-css">
																        	{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
																        </div>
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
																</div>
																@elseif($expired == 1)
																<div class="row" style="text-align:center;">
																    @if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1) 
																        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty()) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																            </div>
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
																            </div>
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																            </div>
																        @endif
																    <div class="col-md-4 col-sm-4 col-xs-4">
																        <i class="glyphicon glyphicon-ban-circle"></i> Expired
																    </div>
																    @endif
																</div>                                      
																@endif

															</div>
														</div>
														<div style="float: right; right: 15px; position: absolute; bottom: 3px;"><a class="hide-detail">Hide Details</a></div>
													</div>

												</div>
											</div>
											<!-- END TIMELINE ITEM -->
										</div>
										@endif
									
								</div>


							</div>
					</div>
				</div>
				@endif
				<?php $var++; ?>
				 @endforeach

				@endif

				<div class="row">
					<div class="col-md-12">
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
			<div class="tab-pane" id="portlet_tab2">
				@if (count($posts) > 0)
					<?php $var = 1; ?>
					@foreach($posts as $post)
					@if($post->post_type == 'skill')
				<div class="portlet light bordered" style="border: none !important;background:transparent;padding:0 !important;margin: -20px 0px;">										
					<div class="portlet-body form">
							<div class="form-body">
								<div class="row">
										<?php $groupsTagged = array(); ?>
										@foreach($post->groupTagged as $gt)
											<?php $groupsTagged[] = $gt->group_id; ?>
										@endforeach
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
										<?php
											$crossCheck = array_intersect($groupsTagged, $groups);
											$elements = array_count_values($crossCheck); ?>

										@if($post->tagged->contains('user_id', Auth::user()->induser_id) || 
											$post->individual_id == Auth::user()->induser_id || 
											count($elements) > 0 || 
											(count($groupsTagged) == 0 && count($post->tagged) == 0))
										<div class="col-md-12">

											<div class="timeline" >
												<!-- TIMELINE ITEM -->
												@if($expired == 1)
												<div class="timeline-item time-item-ex">
												@else
												<div class="timeline-item time-item">
													@endif
													<div class="timeline-badge" style="margin: 4px 3px;">
														@if($post->induser != null && !empty($post->induser->profile_pic))
														<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
														<a class=" img-circle">
															@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)
																<div class="" data-puid="{{$post->individual_id}}">
																
																		@if($links->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksPending->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class="icon-hourglass (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksApproval->contains('id', $post->individual_id) )
																		<a href="#links-follow " data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class=" fa fa-question (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($following->contains('id', $post->individual_id))
																		<a href="#links-follow" class="user-link2 link-follow-icon" data-toggle="modal" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:steelblue;"></i>
																		</a>
																		@else
																		<a href="#links-follow" data-toggle="modal" class="user-link3" data-linked="no" data-utype="ind">
																			<i class="fa fa-unlink (alias) icon-size" style="color:darkslategray;"></i>
																		</a>

																		@endif
																</div>
																
															@endif</a>
														@elseif($post->corpuser != null && !empty($post->corpuser->logo_status))
														<img class="" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
														@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id  && Auth::user()->identifier == 1)
																<a class="icon-userpic">
																<div class="" data-puid="{{$post->corporate_id}}">
																		@if($following->contains('id', $post->corporate_id))
																			<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																				<i class="icon-user-following icon-size" style="color:chartreuse;"></i>
																			</a>
																		@else
																			<a href="#links-follow" data-toggle="modal" class="user-link3 link-follow-icon" data-linked="no" data-utype="corp">
																				<i class="icon-user-follow icon-size" style="color:darkslategray;"></i>
																			</a>
																		@endif														
																</div></a>
															@endif
														@elseif(empty($post->corpuser->logo_status) && $post->corpuser != null )
														<img class="" src="/assets/images/corpnew.jpg">
														@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id  && Auth::user()->identifier == 1)
																<a class="icon-userpic">
																<div class="" data-puid="{{$post->corporate_id}}">
																		@if($following->contains('id', $post->corporate_id))
																			<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																				<i class="icon-user-following icon-size" style="color:chartreuse;"></i>
																			</a>
																		@else
																			<a href="#links-follow" data-toggle="modal" class="user-link3 link-follow-icon" data-linked="no" data-utype="corp">
																				<i class="icon-user-follow icon-size" style="color:darkslategray;"></i>
																			</a>
																		@endif														
																</div></a>
															@endif
														@elseif(empty($post->induser->profile_pic) && $post->induser != null)
														<img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
														<a class=" img-circle">
															@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id  && Auth::user()->identifier == 1)
																<div class="" data-puid="{{$post->individual_id}}">
																
																		@if($links->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksPending->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class="icon-hourglass (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($linksApproval->contains('id', $post->individual_id) )
																		<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
																			<i class=" fa fa-question (alias) icon-size" style="color:chartreuse;"></i>
																		</a>
																		@elseif($following->contains('id', $post->individual_id))
																		<a href="#links-follow" class="user-link2 link-follow-icon" data-linked="yes" data-utype="ind">
																			<i class="fa fa-link (alias) icon-size" style="color:darkslategray;"></i>
																		</a>
																		@else
																		<a href="#links-follow" data-toggle="modal" class="user-link3" data-linked="no" data-utype="ind">
																			<i class="fa fa-unlink (alias) icon-size" style="color:darkslategray;"></i>
																		</a>
																		@endif
																</div>
															@endif</a>
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
															<div class="ribbon-wrapper3">
																	<div class="ribbon-front3">
																	
															<a data-toggle="modal" class="magic-font" href="#mod-{{$post->id}}" style="color: white;line-height: 1.7;text-decoration: none;">
																<i class="icon-speedometer magic-font"></i> 
													<?php
														try{
															if(count($postSkills) > 0){
																$skillPer = (count($counts) / count($userSkills)) * 100;
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
														catch(\Exception $e){

														}
													?>
															</a>
															</div>
																<div class="ribbon-edge-topleft3"></div>
																<div class="ribbon-edge-topright3"></div>
																<div class="ribbon-edge-bottomleft3"></div>
																<div class="ribbon-edge-bottomright3"></div>
																<div class="ribbon-back-left3"></div>
																<div class="ribbon-back-right3"></div>
															</div>
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
															@endif
													</div>
													@if($expired == 1)
													<div class="timeline-body new-timeline-body">
														@else
													<div class="timeline-body ">
														@endif
														<div class="timeline-body-head">
															@if(Auth::user()->induser_id == $post->individual_id && $post->individual_id != null)
																<div class="timeline-body-head-caption">							

										<!-- Post shared by user -->						
										@if(count($post->groupTagged) > 0)
											@if($post->sharedGroupBy->first()->mode == 'shared')
											<div class="shared-by">
										{{$post->sharedGroupBy->first()->mode}} by <b>{{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</b> to <b>{{$post->sharedToGroup->first()->group_name}}</b> group<br/>
											</div>
											@endif
										@endif

																		<a href="/profile/ind/{{$post->individual_id}}" class="link-label" data-utype="ind">
																			<small>You</small>
																		</a>
																	<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		<small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif(Auth::user()->corpuser_id == $post->corporate_id && $post->corporate_id != null)
																<div class="timeline-body-head-caption">													
																		<a href="/profile/corp/{{$post->corporate_id}}" class="link-label" data-utype="corp">
																			<small>You</small>
																		</a>
																	<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		<small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif($post->individual_id != null)
																<div class="timeline-body-head-caption" data-puid="{{$post->individual_id}}">
																
										<!-- Post shared by user -->						
										@if(count($post->groupTagged) > 0)
											@if($post->sharedGroupBy->first()->mode == 'shared')
											<div class="shared-by">
										<small>{{$post->sharedGroupBy->first()->mode}} by {{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</small> to <small>{{$post->sharedToGroup->first()->group_name}}</small> group<br/>
											</div>
											@endif
										@endif

										<!-- Post shared by user -->						
										@if($post->tagged->contains('user_id', Auth::user()->induser_id) && 
											$post->sharedBy->first()->mode == 'shared')
											
										<small>	{{$post->sharedBy->first()->mode}} by 
											{{$post->sharedBy->first()->fname}} {{$post->sharedBy->first()->lname}}</small><br/>

										@endif
																		<a href="/profile/ind/{{$post->individual_id}}" style="font-size: 13px;text-decoration:none;font-weight:500;">

																			{{ $post->induser->fname}} {{ $post->induser->lname}}
																		</a>
																	

																	
																	<span class="timeline-body-time font-grey-cascade"><small><i class="fa fa-clock-o" style="font-size: 11px;"></i> 
																		{{$post->created_at->diffForHumans()}}
																		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@elseif($post->corporate_id != null)
																<div class="timeline-body-head-caption" data-puid="{{$post->corporate_id}}">
																														
																		<a href="/profile/corp/{{$post->corporate_id}}" style="font-size: 13px;text-decoration:none;">
																			{{ $post->corpuser->firm_name}}
																		</a><span class="label label-sm label-success">{{ $post->corpuser->firm_type}}</span>
																	<span class="timeline-body-time font-grey-cascade"><small><i class="fa fa-clock-o" style="font-size: 11px;"></i>
																		{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
																	</span>
																</div>
															@endif
														</div>
														<!--  -->
														<div class="timeline-body-content new-hide" style="cursor:pointer;">
															
															@if($post->post_type == 'skill')	
																<div class="elipsis-code" style="font-weight: 600;color: black;font-size: 13px;">{{ $post->post_title }} </div>
															@elseif($post->post_type == 'job')
																 <div class="elipsis-code" style="font-weight: 600;color: black;font-size: 13px;">{{ $post->post_title }}  </div>
															@endif	
															@if($post->post_compname != null && $post->post_type == 'job')
															<div><h4 style="margin: 0 0 4px 0;"><small>Required at {{ $post->post_compname }}</small></h4></div>
															@elseif($post->post_compname != null && $post->post_type == 'skill')
															<div><h4 style="margin: 0 0 4px 0;"><small>Working at {{ $post->post_compname }} </small></h4></div>
															@endif				 							
															
															<div class="row" style="cursor:pointer;">
																<!-- <div class="col-md-4 col-sm-4 col-xs-12">
																	<i class="icon-badge"></i>&nbsp;: {{ $post->role }}
																</div> -->
																<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code elipsis-city-code" style="padding:0 12px;">
																<small>	<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}</small>
																</div>
																
																<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code" style="float: none;margin:0;display: table;">
																<small>	<i class="glyphicon glyphicon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Yr</small>
																</div>
																<div id="{{ $post->id }}-{{$var}}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 hide-details" style="float: right;right: -40px;bottom: 16px;">
																    <a><i class="fa fa-angle-double-down" style="font-size:20px;"></i></a>
																</div>
																<div id="{{ $post->id }}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 show-details" style="float: right;right: -40px;bottom: 16px;">
																    <a><i class="fa fa-angle-double-up" style="font-size:20px;"></i></a>
																</div>
															</div>

														</div>	
														@if($expired != 1)
														
															<div class="row" style="">	
																
																<div class="col-md-3 col-sm-3 col-xs-3" style="padding:0 8px;">
																	<form action="/job/like" method="post" id="post-like-{{$post->id}}" data-id="{{$post->id}}">						
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="like" value="{{ $post->id }}">
																<button class="btn like-btn"  type="button" style="background-color: transparent;padding:0 10px;" title="Thanks">
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())					
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->thanks == 1) 
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}" style="color:burlywood"></i>
																	@else
																		 <i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>		
																	@endif
																</button>	
																		<span class="badge-like" id="like-count-{{ $post->id }}">
																		@if($post->postactivity->sum('thanks') > 0)
																		{{ $post->postactivity->sum('thanks') }}
																		@endif
																		</span>
																	</form>	
																</div>
																<div class="col-md-3 col-sm-3 col-xs-3 ">
																	@if(Auth::user()->induser_id != $post->individual_id )
																	<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="fav_post" value="{{ $post->id }}">

																		<button class="btn fav-btn" type="button" style="background-color: transparent;padding:0 10px;border:0">
																			@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->fav_post == 1) 
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:#E26A6A"></i>
																			@else
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@endif	
																		</button>	
																	</form>
																	@endif
																</div>
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)										
																	
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	<div class="col-md-3 col-sm-3 col-xs-3">
																	</div>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1)
																	<div class="col-md-3 col-sm-3 col-xs-3"  style="">													
																		<i class="fa fa-check-square-o" style="font-size:15px;"></i><span class="applied-css"> Applied</span> 
																	</div>
																	@endif
																@endif
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	<div class="col-md-3 col-sm-3 col-xs-3">
																	</div>
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																	<div class="col-md-3 col-sm-3 col-xs-3"  style="">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																	</div>
																	@endif
																@endif
																<div  class="col-md-3 col-sm-3 col-xs-3" style="">
																    <div class="dropup ">											
																		<button class="btn dropdown-toggle" type="button" 
																				data-toggle="dropdown" title="Share" 
																				style="background-color: transparent;border: 0;margin-top:-4px;">
																			<i class="fa fa-share-square-o" 
																				style="font-size: 19px;color: darkslateblue;"></i>
																			<span class="badge-share" id="share-count-{{ $post->id }}">@if($post->postactivity->sum('share') > 0){{ $post->postactivity->sum('share') }}@endif</span>
																		</button>
																		<ul class="dropdown-menu pull-right" role="menu" 
																			style="min-width:0;box-shadow:0 0 !important">
																			<li style="background-color: tan;">
																				<a href="#share-post" data-toggle="modal" class="jobtip sojt" id="sojt-{{$post->id}}" data-share-post-id="{{$post->id}}">
																					Share on Jobtip
																				</a>
																			</li>
																			<li style="background-color: #3b5998;">
																				<a href="/" class="facebook">
																					<i class="fa fa-facebook post-social-icon" ></i>
																				</a>
																			</li>
																			<li style="background-color: #c32f10;">
																				<a href="/" class="google-plus">
																					<i class="fa fa-google-plus post-social-icon"></i>
																				</a>
																			</li>
																			<li style="background-color: #00aced;">
																				<a href="/" class="linkedin">
																					<i class="fa fa-linkedin post-social-icon" ></i>
																				</a>
																			</li>
																		</ul>													
																	</div>
																</div>
																
																	
															</div>
														
															@else
															<div class="row" style="padding:5px 0">
																<div class="col-md-3 col-sm-3 col-xs-4" style="font-size:12px;">
																<!-- <div class="expired-css">													 -->
																	<i class="glyphicon glyphicon-ban-circle"></i> Expired
																<!-- </div> -->
																</div>
																<div class="col-md-3 col-sm-3 col-xs-4 ">
																	@if(Auth::user()->induser_id != $post->individual_id )
																	<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">
																		<input type="hidden" name="_token" value="{{ csrf_token() }}">
																		<input type="hidden" name="fav_post" value="{{ $post->id }}">

																		<button class="btn fav-btn" type="button" style="background-color: transparent;padding:0 10px;border:0">
																			@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->fav_post == 1) 
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:#E26A6A"></i>
																			@else
																			<i class="fa fa-star" id="fav-btn-{{$post->id}}" style="font-size: 20px;color:lightslategray;"></i>
																			@endif	
																		</button>	
																	</form>
																	@endif
																</div>
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1)
																	<div class="col-md-3 col-sm-3 col-xs-4">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
																	</div>
																	@endif
																@endif
																@if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)											
																	@if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	
																	@elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																	<div class="col-md-3 col-sm-3 col-xs-4">													
																		<i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																	</div>
																	@endif
																@endif
																
																
															</div>											
															@endif

														<div class="box">
														   <div class="ribbon"><span class="{{ $post->post_type }}">{{ $post->post_type }}</span></div>
														</div>
														<div class="post-job-skill-bar">
															 @if($expired != 1 && Auth::user()->induser_id != $post->individual_id || Auth::user()->corpuser_id != $post->corporate_id)
																	<div class=""><a class="" data-toggle="modal" href="#basic-{{ $post->id }}">
																		<i class="fa  fa-ellipsis-v" style="color:red;"></i></a>
																	</div>										
																@endif
															<div class="modal fade" id="basic-{{ $post->id }}" tabindex="-1" role="basic" 
																		 aria-hidden="true">
																		<div class="modal-dialog" style="width: 300px;">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" 
																							data-dismiss="modal" aria-hidden="true">
																					</button>
																					<h4 class="modal-title">Report this Post</h4>				
																				</div>
																				<form action="/report-abuse" method="post" id="report-abuse-form-{{ $post->id }}">
																				<input type="hidden" name="_token" value="{{ csrf_token() }}">
																				<input type="hidden" name="report_post_id" value="{{ $post->id }}">
																				<div class="modal-body">
																					<div class="icheck-list">
																						<label>
																							<input type="checkbox" class="icheck" 
																									name="report-abuse-check[]"
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Abusive post"
																									value="Abusive post" checked>
																						</label>												
																						<label>
																							<input type="checkbox" class="icheck" 
																									name="report-abuse-check[]"
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Abusive profile"
																									value="Abusive profile">
																						</label>
																						<label>
																							<input type="checkbox" class="icheck"
																									name="report-abuse-check[]" 
																									data-checkbox="icheckbox_line-grey" 
																									data-label="Spam post"
																									value="Spam post">
																						</label>
																					</div>
																					
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-warning btn-xs">Submit</button>
																					<button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
																				</div>
																				</form>
																			</div>
																			<!-- /.modal-content -->
																		</div>
																		<!-- /.modal-dialog -->
																	</div>
																	<!-- /.modal -->	
														</div>
													</div>
													<div class="portlet-body show-details">
														<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
															<div class="panel panel-default" style=" position: relative;">
																<div class="panel-heading">
																	<h4 class="panel-title">
																	<a class="accordion-toggle " 
																	data-toggle="collapse" data-parent="#accordion{{$var}}" href=""  style="font-size: 15px;font-weight: 600;" >
																	Details: </a>	
																	</h4>
																</div>
																<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse">
																	<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
																		
																		<div class="row">
																			@if($post->post_type == 'job')
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Job Title :</label>					
																					{{ $post->post_title }}														 
																			</div>
																			@elseif($post->post_type == 'skill')
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Skill Title :</label>					
																					{{ $post->post_title }}													 
																			</div>
																			@endif
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
																			@if( $post->min_exp != null && $post->max_exp != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label">Experience :</label>										
																					{{ $post->min_exp}}-{{ $post->max_exp}} Years															
																			</div>
																			@else
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																					<label class="detail-label"><i class="icon-briefcase"></i> :</label>										
																					Not Provided															
																			</div>
																			@endif
																			<div class="col-md-12 col-sm-12 col-xs-12">											
																					<label class="detail-label">Skills :</label>									
																					@foreach($post->skills as $skill)
																						{{$skill->name}},
																					@endforeach																 
																			</div>
																			@if($post->post_type == 'job' && $post->min_sal != null && $post->max_sal != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																				<label class="detail-label">Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																				{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
																			</div>
																			@elseif($post->post_type == 'skill' && $post->min_sal != null && $post->max_sal != null)
																			<div class="col-md-12 col-sm-12 col-xs-12">												
																				<label class="detail-label">Expected Salary (<i class="fa fa-rupee (alias)"></i>):</label>
																				{{ $post->min_sal }}-{{ $post->max_sal }} {{ $post->salary_type }} 
																			</div>
																			@endif
																			
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">Job Type :</label>
																				{{ $post->time_for }}
																			</div>
																			@if($post->locality != null && $post->city !=null)
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">Locality :</label>
																				{{ $post->locality }},{{ $post->city }} 
																			</div>
																			@elseif($post->locality == null && $post->city !=null)
																			<div class="col-md-12 col-sm-12 col-xs-12">
																				<label class="detail-label">City :</label>
																				{{ $post->city }} 
																			</div>
																			@endif
																		</div>
																		
																		<div class="skill-display">Description : </div>
																		{{ $post->job_detail }}
																		
																		@if($post->post_type == 'job' && $post->reference_id != null)
																		<div class="skill-display">Reference Id&nbsp;: {{ $post->reference_id }} </div>	
																		@endif

																		@if($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																		@elseif($expired != 1 && $post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1)
																		<div  class="skill-display ">Contact Details : </div> 
																		<div id="show-hide-contacts" class="row">
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
																<div style="margin:27px 0 0;">
																	@if($post->post_type == 'skill' && Auth::user()->induser_id != $post->individual_id)       
																	    @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
																	        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
																	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
																	            <input type="hidden" name="contact" value="{{ $post->id }}">
																	            <button class="btn contact-btn green btn-sm apply-contact-btn show-contact" 
																	                    id="contact-btn-{{$post->id}}" type="button">Contact
																	            </button>
																	        </form> 
																	    @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
																	        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
																	            <i class="glyphicon glyphicon-ok"></i> Contacted
																	        </button>
																	        <div class="center-css">
																	        	{{ date('M d, Y', strtotime($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime)) }}
																	        </div>
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
																</div>
																@elseif($expired == 1)
																<div class="row" style="text-align:center;">
																    @if(Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1) 
																        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty()) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																            </div>
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
																            </div>
																        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
																            <div class="col-md-4 col-sm-4 col-xs-4">
																                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Contacted</span> 
																            </div>
																        @endif
																    <div class="col-md-4 col-sm-4 col-xs-4">
																        <i class="glyphicon glyphicon-ban-circle"></i> Expired
																    </div>
																    @endif
																</div>                                      
																@endif

															</div>
														</div>
														<div style="float: right; right: 15px; position: absolute; bottom: 3px;"><a class="hide-detail">Hide Details</a></div>
													</div>

												</div>
											</div>
											<!-- END TIMELINE ITEM -->
										</div>
										@endif
									
								</div>


							</div>
					</div>
				</div>
				@endif
				<?php $var++; ?>
				 @endforeach

				@endif
				
				<div class="row">
					<div class="col-md-12">
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
			<!-- <div class="tab-pane" id="portlet_tab3">
				
			</div> -->
		</div>
	</div>
</div>
<!-- END TAB PORTLET-->
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
<!-- SHARE MODAL FORM-->
<div class="modal fade" id="share-post" tabindex="-1" role="dialog" aria-labelledby="share-post" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Share post</h4>
      </div>
      <form class="form-horizontal" id="modal-post-share-form" role="form" method="POST" action="{{ url('/post/share') }}">
      <div class="modal-body">
                  
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="share_post_id" id="modal_share_post_id" value="">
		@if(Auth::user()->induser)

		<div id="post-share-msg-box" style="display:none">
			<div id="post-share-msg"></div>
		</div>
		<div id="post-share-form-errors" style="display:none"></div>

		<div class="row"> 
            <div class="col-md-6">                      
              <h4>Who can see this Post</h4>
            </div>
            <div class="col-md-6">
              <!-- <label for="tag-group-all" style="padding: 5.5px 12px;">
                <input type="checkbox" id="tag-group-all" name="tag-group" value="all" class="md-radiobtn">
                Public 
              </label> -->
              <label for="tag-group-links" style="padding: 5.5px 12px;">
                <input type="checkbox" id="tag-group-links" name="tag-group" value="links" class="md-radiobtn" >
                Links 
              </label>
              <label for="tag-group-groups" style="padding: 5.5px 12px;">
                <input type="checkbox" id="tag-group-groups" name="tag-group" value="groups" class="md-radiobtn" >                  
                Groups 
              </label>
            </div>
		</div>          

      	<div class="row"> 
            <div class="col-md-12" id="connections-list">
            
            <label>Links</label>
            {!! Form::select('share_links[]', $share_links, null, ['id'=>'connections', 'class'=>'form-control', 'multiple']) !!}               
            </div>    
		</div>
		<div class="row"> 
			<div class="col-md-12" id="groups-list">
	            <label>Groups</label>
	            {!! Form::select('share_groups[]', $share_groups, null, ['id'=>'groups', 'class'=>'form-control', 'multiple']) !!}  
	        </div>             
		</div>
		@endif            
     
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success" id="modal-post-share-btn">Share</button>
        <button type="button" class="btn btn-sm default" data-dismiss="modal">Close</button>
      </div>      
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SHARE MODAL FORM -->
@stop

@section('javascript')

<script>

jQuery(document).ready(function() {       
	ComponentsIonSliders.init();    
	ComponentsDropdowns.init();
	ComponentsEditors.init();
    // FormWizard.init();
});
$('#skill-list').select2();
$('#category-list').select2();
function resetFilter() {
    document.getElementById("home-filter").reset();
}
</script>

<script type="text/javascript">
$(document).ready(function(){
	
    jQuery('.hide-show-filter').on('click', function(event) {
	    jQuery('.show-filter').toggle('show');
	    jQuery('.hide-label').toggle('hide');
    });

    jQuery('.show-more').on('click', function(event) {
	    jQuery('.extra-show').toggle('show');
    });

    // jQuery('.hide-details').on('click', function(event) {
    //     jQuery('.show-details').toggle('show');
    //     jQuery('.hide-details').toggle('hide');
    // });

    jQuery('.new-hide').on('click', function(event) {
    	
        jQuery('.show-details').toggle('show');
        jQuery('.hide-details').toggle('hide');
    });

    jQuery('.hide-detail').on('click', function(event) {
        jQuery('.show-details').toggle('hide');
        jQuery('.hide-details').toggle('show');
    });

    $("#category-list").change(function () {
	    $("#category-label-exp").val($(this).val());
	    //alert($(this).val()) 
	})
         $("#exp").change(function () {
	    $("#label-exp").val($(this).val());
	    //alert($(this).val()) 
	})
         $("#title").change(function () {
	    $("#label-title").val($(this).val());
	    //alert($(this).val()) 
	})
         $("#max-sal").change(function () {
	    $("#max-label-sal").val($(this).val());
	    //alert($(this).val()) 
	})
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

	$count = $.trim($('#like-count-'+post_id).text());
	if($count.length == 0 || $count == ""){
		$count = 0;
	}
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
        }else if(data < $count && data != 0){
			$('#like-'+post_id).css({'color':'lightslategray'});
			$('#like-count-'+post_id).text(data);
			$('#like-count-'+post_id).removeClass('hide');
            $('#like-count-'+post_id).addClass('show');
        }
        else if(data < $count && data == 0){
            $('#like-'+post_id).css({'color':'lightslategray'});
            $('#like-count-'+post_id).removeClass('show');
            $('#like-count-'+post_id).addClass('hide');
            $('#like-count-'+post_id).text(data);
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
    $count = $.trim($('#myfavcount').text());
    if($count.length == 0 || $count == ""){
		$count = 0;
	}
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
 			$('#myfavcount').text(data);
 			$('#fav-btn-'+post_id).css({'color':'#E26A6A'});
 			$('#myfavcount').removeClass('hide');
            $('#myfavcount').addClass('show');
        }else if(data < $count && data != 0){
			$('#fav-btn-'+post_id).css({'color':'lightslategray'});
			$('#myfavcount').text(data);
			$('#myfavcount').removeClass('hide');
            $('#myfavcount').addClass('show');
        }
        else if(data < $count && data == 0){
            $('#fav-btn-'+post_id).css({'color':'lightslategray'});
            $('#myfavcount').removeClass('show');
            $('#myfavcount').addClass('hide');
            $('#myfavcount').text(data);
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
 			$('#show-hide-contacts').addClass('show-hide-new');
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
	// console.log(post_id);
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
      	// console.log("s:"+data);
        if(data.data.contact_status == "contacted"){
        	$('#contact-btn-'+post_id).prop('disabled', true);
 			$('#contact-btn-'+post_id).text('Contacted');
 			$('#show-hide-contacts').addClass('show-hide-new');
        }
      },
      error: function(data) {
	        console.log("e:"+data);
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

	$('.user-link2').on('click',function(event){  	    
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

	$('.user-link3').on('click',function(event){  	    
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

	// user post sharing
	/*$("#connections-list").hide();
    $("#groups-list").hide();*/
   /* $("#connections").prop('required',false);
    $("#groups").prop('required',false);*/
	$("#connections").prop('disabled',true);
    $("#groups").prop('disabled',true);
    // $("#tag-group-all").prop('checked', true);
	$("input[name$='tag-group']").click(function() {
        var selected = $(this).val();
        // if(selected == 'all' && $(this).prop('checked')){
        	/*$("#connections-list").hide();
        	$("#groups-list").hide();
        	$("#connections").hide();
        	$("#groups").hide();*/
        // 	$("#connections").prop('required',false);
        // 	$("#groups").prop('required',false);
        // 	$("#connections").prop('disabled',true);
        // 	$("#groups").prop('disabled',true);
        // 	$("#tag-group-links").prop('checked', false);
        // 	$("#tag-group-groups").prop('checked', false);
        // }
        if(selected == 'links' && $(this).prop('checked')){
        	/*$("#connections-list").show();
        	$("#groups-list").show();
        	$("#connections").show();
        	$("#groups").show();*/
        	$("#connections").prop('required',true);
        	$("#connections").prop('disabled',false);
        	if ($("#groups").prop('disabled') === false) {
	        	$("#groups").prop('disabled',false);
	        }else{
	        	$("#groups").prop('disabled',true);
	        }
	        if ($("#groups").prop('required') === false) {
	        	$("#groups").prop('required',false);
	        }else{
	        	$("#groups").prop('required',true);
	        }
        	// $("#tag-group-all").prop('checked', false);
        }else if(selected == 'groups' && $(this).prop('checked')){
        	/*$("#connections-list").show();
        	$("#groups-list").show();
        	$("#connections").show();
        	$("#groups").show();*/
        	$("#groups").prop('required',true);
        	$("#groups").prop('disabled',false);
        	if ($("#connections").prop('disabled') === false) {	        	
        		$("#connections").prop('disabled',false);
	        }else{
	        	$("#connections").prop('disabled',true);
	        }
	        if ($("#connections").prop('required') === false) {	        	
        		$("#connections").prop('required',false);
	        }else{
	        	$("#connections").prop('required',true);
	        }
        	// $("#tag-group-all").prop('checked', false);
        }else if(selected == 'links' && $(this).prop('checked') === false){
        	$("#connections").prop('disabled',true);
        	// if($("#tag-group-groups").prop('checked') === false){
	        // 	$("#tag-group-all").prop('checked', true);
	        // }
        }else if(selected == 'groups' && $(this).prop('checked') === false){
        	$("#groups").prop('disabled',true);
        	// if($("#tag-group-links").prop('checked') === false){
	        // 	$("#tag-group-all").prop('checked', true);
	        // }
        }
    }); 

	// get post id for post share
	$('.sojt').on('click',function(event){
	  	var share_post_id = $(this).data('share-post-id');
	  	$('#modal_share_post_id').val(share_post_id);
	});
	
	$('#connections').select2({
            placeholder: "Select links to share"
        });
    $('#groups').select2({
            placeholder: "Select groups to share"
        });

    // share post 
    $('#modal-post-share-btn').on('click',function(event){       
	    event.preventDefault();
		loader('show');

		var share_post_id = $("#modal_share_post_id").val();
	    var formData = $('#modal-post-share-form').serialize(); // form data as string
	    var formAction = $('#modal-post-share-form').attr('action'); // form handler url
	    // console.log(share_post_id);
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
	      	loader('hide');
	        if(data.data.page == 'home'){
	            $('#post-share-msg-box').removeClass('alert alert-danger');
	            $('#post-share-form-errors').hide();
	            $('#post-share-msg-box').addClass('alert alert-success').fadeIn(1000, function(){
	                $(this).show();
	            });
	            $('#share-count-'+share_post_id).text(data.data.sharecount);
	            // console.log(data.data.sharecount+" - "+share_post_id);
	            $('#modal-post-share-form')[0].reset();
	            $("#connections").select2("val", "");
	            $("#groups").select2("val", "");
	            $("#connections").prop('disabled',true);
               	$("#groups").prop('disabled',true);
	            $('#post-share-msg').html('Post shared successfully ! <br/>');  
	            $("#share-post").fadeTo(2000, 500).slideUp(500, function(){	            	
               		 $('#share-post').modal('hide');
               		 $('#post-share-msg-box').hide();
               		 $('#post-share-msg-box').removeClass('alert alert-success');
               		 $('#post-share-msg-box').removeClass('alert alert-danger');               		 
                });   
	           
	        }
	      },
	      error: function(data) {
	        loader('hide');
		    var errors = data.responseJSON;
		    // console.log(errors);
		    $errorsHtml = '<div class="alert alert-danger"><ul>';
		    $.each(errors.errors, function(index, value) {
		    	console.log(value);
				 $errorsHtml += '<li>' + value[0] + '</li>';
		    });
	 		$errorsHtml += '</ul></div>';	            
	        $( '#post-share-form-errors' ).html( $errorsHtml );
	        $( '#post-share-form-errors' ).show();
	      }
	    }); 
	    return false;
  });
});
</script>

@stop
@extends('master')

@section('content')
@if($title == 'home')
<!-- Jobtip Filter Start -->

<div class="row">
	<div class="col-md-9" style=" lightgray;margin-bottom: 5px;">
		<div class="hide-label col-md-8 col-sm-6 col-xs-10" style="padding: 5px;">
			<label style="font-weight:500; ">
				Showing all Jobs, Skills posted by Individuals & Corporates
			</label>
		</div>
		<div class="show-filter col-md-8 col-sm-6 col-xs-10">
			You have selected <label style="font-weight:500;" id="job-type">
			<input type="text" style="background:transparent;border:0;font-size:11px;" id="category-label-exp" class="min-exp">
			<input type="text" style="background:transparent;border:0;font-size:11px; width:30px;" id="label-exp" class="min-exp">
			<input type="text" style="background:transparent;border:0;font-size:11px;" id="label-title" class="min-exp">
	</label>
		</div>
		<div class="filter-icon hide-show-filter"><i class="icon-equalizer" style="font-size:16px;"></i></div>		
	</div>
</div>
<form id="home-filter" name="filter_form" action="/home" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row show-filter">
	<div class="col-md-12">
		<div class="btn-group col-md-3 col-sm-2 col-xs-6 jobskill new-col-md-3" data-toggle="buttons" style="padding: 6px 14px;">
			<label class="btn btn-default color-button check-font-size active input-responsive" style="padding:6px; border-color:black;">
			<input type="checkbox" name="post_type[]" value="job" class="toggle"> Jobs </label>
			<label class="btn btn-default color-button check-font-size active input-responsive" style="padding:6px; border-color:black;">
			<input type="checkbox" name="post_type[]" value="skill" class="toggle"> Skills </label>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-6">
			<div class="form-group">				
				<input type="text" id="exp" name="experience" class="form-control filter-input" placeholder="Exp">				
			</div>	
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12">
			<div class="form-group">
				<input type="text" id="title" name="job_title" class="form-control filter-input" placeholder="Job Title, Role">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-6">
			<div class="form-group">				
				<input type="text" name="unique_id" class="form-control filter-input" placeholder="Unique id">				
			</div>	
		</div>
		<div class="col-md-3 col-sm-3 col-xs-6">
			<div class="form-group">
				<select id="category-list" class="form-control filter-input check-font-size" name="prof_category">
					<option value="">Category</option>
					<optgroup label="Accounting">
						<option value="Accounts/Finance/Tax">Accounts/Finance/Tax</option>
						<option value="Agent">Agent</option>
						<option value="Analytics & Business Intelligence">
							Analytics & Business Intelligence
						</option>
					</optgroup>
					<optgroup label="IT Field">
						<option value="HR/Administration/IR">HR/Administration/IR</option>
						<option value="IT Software - Client Server">IT Software - Client Server</option>
						<option value="IT Software - Mainframe">IT Software - Mainframe</option>
						<option value="IT Software - Middleware">IT Software - Middleware</option>
						<option value="IT Software - Mobile">IT Software - Mobile</option>
						<option value="IT Software - Other">IT Software - Other</option>
						<option value="IT Software - System Programming">IT Software - System Programming</option>
						<option value="IT Software - Telecom Software">IT Software - Telecom Software</option>
						<option value="IT Software - Application Programming">IT Software - Application Programming</option>
						<option value="IT Software - DBA/Datawarehousing">IT Software - DBA/Datawarehousing</option>
						<option value="IT Software - E-Commerce">IT Software - E-Commerce</option>
						<option value="IT Software - ERP/CRM">IT Software - ERP/CRM</option>
					</optgroup>
				</select>
			</div>
		</div>
	</div>
</div>
<div class="row show-filter" style="margin-top:10px;">
	<div class="col-md-12">
		<div class="col-md-2 col-sm-3 col-xs-12">
			<div class="form-group">
				<select id="select2_sample_modal_2" placeholder="City" name="city" class="form-control filter-input select2" multiple>
					<option value="">select</option>
					<optgroup label="NFC EAST">
					<option>Hyderabad</option>
					<option>Bangalore</option>
					<option>Philadelphia Eagles</option>
					<option>Washington Redskins</option>
					</optgroup>
					<optgroup label="NFC NORTH">
					<option>Chicago Bears</option>
					<option>Detroit Lions</option>
					<option>Green Bay Packers</option>
					<option>Minnesota Vikings</option>
					</optgroup>
					<optgroup label="NFC SOUTH">
					<option>Patna</option>
					<option>Mumbai</option>
					<option>New Orleans Saints</option>
					<option>Tampa Bay Buccaneers</option>
					</optgroup>
					<optgroup label="NFC WEST">
					<option>Delhi</option>
					<option>Chennai</option>
					<option>San Francisco 49ers</option>
					<option>Seattle Seahawks</option>
					</optgroup>
					<optgroup label="AFC EAST">
					<option>Buffalo Bills</option>
					<option>Miami Dolphins</option>
					<option>New England Patriots</option>
					<option>New York Jets</option>
					</optgroup>
					<optgroup label="AFC NORTH">
					<option>Baltimore Ravens</option>
					<option>Cincinnati Bengals</option>
					<option>Cleveland Browns</option>
					<option>Pittsburgh Steelers</option>
					</optgroup>
					<optgroup label="AFC SOUTH">
					<option>Houston Texans</option>
					<option>Indianapolis Colts</option>
					<option>Jacksonville Jaguars</option>
					<option>Tennessee Titans</option>
					</optgroup>
					<optgroup label="AFC WEST">
					<option>Denver Broncos</option>
					<option>Kansas City Chiefs</option>
					<option>Oakland Raiders</option>
					<option>San Diego Chargers</option>
					</optgroup>
				</select>
			</div>	
		</div>
		<div class="col-md-2 col-sm-2 col-xs-6">
			<div class="form-group">				
				{{-- <input type="hidden" placeholder="Skills" name="linked_skill" id="select2_sample5" class="form-control filter-input select2" value=""> --}}
				{!! Form::select('skill_list[]', $skills, null, ['id'=>'skill-list', 'class'=>'form-control', 'placeholder'=>'Skills', 'multiple']) !!}				
			</div>	
		</div>
		<div class="col-md-2 col-sm-2 col-xs-6">
            <div class="form-group">              
                <select name="time_for" class="form-control filter-input" >
                	<option value="">Time For</option>
					<option value="Full Time">Full Time</option>
					<option value="Part Time">Part Time</option>
					<option value="Freelancer">Freelancer</option>
					<option value="Work from Home">Work from Home</option>
                </select>
            </div>  
         </div>
         <div class="col-md-2 col-sm-3 col-xs-4" >
         	 <div class="form-group"> 
				<select name="active-expire" class="form-control filter-input">
				  <option selected value="">All</option>
                  <option value="Active" >Active</option>
                </select>
            </div>
		</div>
		<div class="col-md-2 col-sm-3 col-xs-5">
			<div class="form-group">		
				<select class="bs-select form-control filter-input" name="education" multiple >
					<optgroup label="Posted by">
						<option selected value=""><b>Posted by:</b> All</option>
						<option value="individual">Individual</option>
						<option value="company">Company</option>
						<option value="consultancy">Consultancy</option>
					</optgroup>
				</select>
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-sm-2">
			<button type="submit" class="btn btn-info" value="Search" title="Search" 
					style="float:left;background-color:transparent !important;margin:10px -25px; border-color: transparent;">
				<i class="fa fa-check-square-o" style="font-size:25px;color:#3598dc;"></i>
			</button>
			<button type="button" class="btn" onclick="resetFilter()" title="Reset" 
					style="background-color:transparent !important;margin:8px 1px;" >
				<i class="icon-refresh" style="font-size:22px;"></i>
			</button>
		</div>
	</div>
</div>
<!-- <div id="filter">
	<p class="form-control-static" data-display="experience"></p>
	<p class="form-control-static" data-display="job_title"></p>
</div> -->
</form>
<!-- Jobtip Filter End-->
@elseif($title == 'favourite')
<div class="portlet light bordered col-md-9">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">My Favourite Posts</span>
		</div>
	</div>
</div>
@elseif($title == 'postByUser')
<div class="portlet light bordered col-md-9">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Posts by "<span style="color: orangered;"> {{$postuser->firm_name}}{{$postuser->fname}} {{$postuser->lname}} </span>"</span>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-9">
		<div class="sorting-row pull-right">
			Sort by 
			<div class="btn-group btn-group-xs" role="group" aria-label="...">
			  <button type="button" class="btn btn-default">Magic match</button>
			  <button type="button" class="btn btn-default">Date</button>
			  <div class="btn-group  btn-group-xs" role="group">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      posted by
			      <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu">
			      <li><a href="#">Individual</a></li>
			      <li><a href="#">Corporate</a></li>
			    </ul>
			  </div>
			</div>
		</div>
	</div>
</div>
<div class="portlet light bordered" style="border: none !important;background:transparent;padding:0 !important">										
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
							$elements = array_count_values($crossCheck); ?>

						@if($post->tagged->contains('user_id', Auth::user()->induser_id) || 
							$post->individual_id == Auth::user()->induser_id || 
							count($elements) > 0 || 
							(count($groupsTagged) == 0 && count($post->tagged) == 0))
						<div class="col-md-9">

							<div class="timeline" >
								<!-- TIMELINE ITEM -->
								<div class="timeline-item time-item">
									<div class="timeline-badge" style="margin: 10px">
										@if($post->induser != null && !empty($post->induser->profile_pic))
										<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
										<a class="icon-userpic img-circle">@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id)
												<div class="" data-puid="{{$post->individual_id}}">
												
														@if($links->contains('id', $post->individual_id) )
														<a href="#links-follow link-follow-icon" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksPending->contains('id', $post->individual_id) )
														<a href="#links-follow link-follow-icon" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="fa fa-question (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksApproval->contains('id', $post->individual_id) )
														<a href="#links-follow link-follow-icon" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="icon-hourglass (alias)" style="color:salmon;"></i>
														</a>
														@elseif($following->contains('id', $post->individual_id))
														<a class="user-link2 link-follow-icon" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:steelblue;"></i>
														</a>
														@else
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
														</a>
														@endif
												</div>
											@endif</a>
										@elseif($post->corpuser != null && !empty($post->corpuser->logo_status))
										<img class="" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
										<a class="icon-userpic">@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id)
												<div class="" data-puid="{{$post->corporate_id}}">
														@if($following->contains('id', $post->corporate_id))
															<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																<i class="icon-user-following" style="color:black;"></i>
															</a>
														@else
															<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="corp">
																<i class="icon-user-follow" style="color:lightslategray;"></i>
															</a>
														@endif														
												</div>
											@endif</a>
										@elseif(empty($post->corpuser->logo_status) && $post->corpuser != null)
										<img class="" src="/assets/images/corp.png">
										<a class="icon-userpic">@if($post->corporate_id != null && Auth::user()->corpuser_id != $post->corporate_id)
												<div class="" data-puid="{{$post->corporate_id}}">
														@if($following->contains('id', $post->corporate_id))
															<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
																<i class="icon-user-following" style="color:black;"></i>
															</a>
														@else
															<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="corp">
																<i class="icon-user-follow" style="color:lightslategray;"></i>
															</a>
														@endif														
												</div>
											@endif</a>
										@elseif(empty($post->induser->profile_pic) && $post->induser != null)
										<img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
										<a class="icon-userpic img-circle">@if($post->individual_id != null && Auth::user()->induser_id != $post->individual_id)
												<div class="" data-puid="{{$post->individual_id}}">
												
														@if($links->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksPending->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
															<i class="fa fa-question (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksApproval->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
															<i class="icon-hourglass (alias)" style="color:salmon;"></i>
														</a>
														@elseif($following->contains('id', $post->individual_id))
														<a class="user-link2 link-follow-icon" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:steelblue;"></i>
														</a>
														@else
														<a href="#links-follow" data-toggle="modal" class="user-link link-follow-icon" data-linked="no" data-utype="ind">
															<i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
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
											<a data-toggle="modal" href="#mod-{{$post->id}}">
												<i class="icon-speedometer"></i> 
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
									<div class="timeline-body" style="border-radius: 15px !important;">
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
															You
														</a>
													<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o"></i> 
														{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
													</span>
												</div>
											@elseif(Auth::user()->corpuser_id == $post->corporate_id && $post->corporate_id != null)
												<div class="timeline-body-head-caption">													
														<a href="/profile/corp/{{$post->corporate_id}}" class="link-label" data-utype="corp">
															You {{ $post->corpuser->firm_type}}
														</a>
													<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o"></i> 
														{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
													</span>
												</div>
											@elseif($post->individual_id != null)
												<div class="timeline-body-head-caption" data-puid="{{$post->individual_id}}">
												
												<!-- Post shared by user -->						
						@if(count($post->groupTagged) > 0)
							@if($post->sharedGroupBy->first()->mode == 'shared')
							<div class="shared-by">
						{{$post->sharedGroupBy->first()->mode}} by <b>{{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</b> to <b>{{$post->sharedToGroup->first()->group_name}}</b> group<br/>
							</div>
							@endif
						@endif

														@if($links->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
															<i class="fa fa-link (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksPending->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="fa fa-question (alias)" style="color:salmon;"></i>
														</a>
														@elseif($linksApproval->contains('id', $post->individual_id) )
														<a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
															<i class="icon-hourglass (alias)" style="color:salmon;"></i>
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
													

													
													<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o"></i> 
														{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
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
															{{ $post->corpuser->firm_name}} <small>{{ $post->corpuser->firm_type}}</small>
														</a>
													<span class="timeline-body-time font-grey-cascade"><i class="fa fa-clock-o"></i>
														{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
													</span>
												</div>
											@endif
										</div>
										<div class="timeline-body-content">
											<span class="font-grey-cascade">
												@if($post->post_type == 'skill')	
												<div class="elipsis-code" style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }} </div>
											@elseif($post->post_type == 'job')
												 <div class="elipsis-code" style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }}  </div>
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
												<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code">
													<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}
												</div>
												<div class="col-md-4 col-sm-4 col-xs-4 elipsis-code">
													<i class="icon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years
												</div>
												<div id="{{ $post->id }}-{{$var}}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 hide-details">
												    <a><i class="fa fa-angle-double-down" style="font-size:20px;"></i></a>
												</div>
												<div id="{{ $post->id }}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 show-details">
												    <a><i class="fa fa-angle-double-up" style="font-size:20px;"></i></a>
												</div>
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
													<i class="fa fa-star" style="font-size: 20px;"></i>
												</button>
												@endif
											</form>
											
										</div>
									</div>
									<div class="portlet-body show-details">
										<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
											<div class="panel panel-default" style=" position: relative;">
												<div class="panel-heading">
													<h4 class="panel-title">
													<a class="accordion-toggle accordion-toggle-styled" 
													data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;" >
													Details: </a>	
													</h4>
												</div>
												<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse">
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
												<div>
														@if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)		
													@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())

														<form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">	
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="hidden" name="apply" value="{{ $post->id }}">
															@if($post->website_redirect_url != null)
																<a class="btn apply-btn blue btn-sm apply-contact-btn" 
																	target="_blank" href="{{ $post->website_redirect_url }}" 
																	type="button">Apply
																</a>	
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
											</div>
											</div>
										</div>
									</div>
											@if($expired != 1)
												<div class="post-{{ $post->post_type }} post-icon-bar clearfix">
													<form action="/job/like" method="post" id="post-like-{{$post->id}}" data-id="{{$post->id}}" style="float:left">						
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="hidden" name="like" value="{{ $post->id }}">
												<button class="btn like-btn"  type="button" style="background-color: transparent;" title="Thanks">
													@if($post->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())					
														<i class="fa fa-thumbs-up thanks-icon" id="like-{{$post->id}}"></i>
													@elseif($post->postactivity->where('user_id', Auth::user()->induser_id)->first()->thanks == 1) 
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
												<div class="dropup share-bar">											
													<button class="btn dropdown-toggle" type="button" 
															data-toggle="dropdown" title="Share" 
															style="background-color: transparent;border: 0;line-height: 1;padding-top: 11px;">
														<i class="fa fa-share-alt" 
															style="font-size: 22px;color: darkslateblue;"></i>
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
												@if(Auth::user()->id != $post->individual_id || Auth::user()->id != $post->corporate_id)
													<div class="report">
														<a class="btn" data-toggle="modal" href="#basic-{{ $post->id }}">
														<i class="fa fa-warning (alias)" style="color:red;"></i></a>
													</div>
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
												@endif
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

<div id="loader" style="display:none;z-index:999999;background:white" class="page-loading">
	<img src="assets/loader.gif"><span> Please wait...</span>
</div>

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
	function loader(arg){
	    if(arg == 'show'){
	        $('#loader').show();
	    }else{
	        $('#loader').hide();
	    }
	}

    jQuery('.hide-show-filter').on('click', function(event) {
	    jQuery('.show-filter').toggle('show');
	    jQuery('.hide-label').toggle('hide');
    });

    jQuery('.hide-details').on('click', function(event) {
        jQuery('.show-details').toggle('show');
        jQuery('.hide-details').toggle('hide');
    });

    jQuery('.show-details').on('click', function(event) {
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
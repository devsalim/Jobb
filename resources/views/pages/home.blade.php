@extends('master')

@section('content')
<!-- <select>
	<option>Red</option>
	<option>red</option>
	<option>red</option>
	<option>red</option>
	<option>red</option>
</select>	 -->
<div class="portlet light bordered" style="border: none !important;">										
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="#" class="horizontal-form">
			<div class="form-body">
				<div class="row">
					@if (count($posts) > 0)
						<?php $var = 1; ?>
						@foreach($posts as $post)	
					<div class="col-md-9" style="">												
							<div class="timeline" >
							<!-- TIMELINE ITEM -->
							<div class="timeline-item time-item">
								<div class="timeline-badge" style="margin: 10px 0px;">
									@if($post->induser != null)
									<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
									<a class="icon-userpic"><i class="glyphicon glyphicon-user"></i></a>
									@elseif($post->corpuser != null)
									<img class="timeline-badge-userpic userpic-box" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
									<a class="icon-userpic"><i class="fa fa-institution (alias)" style="padding: 0px 5px;"></i></a>
									@endif
								</div>
								<div class="timeline-body" style="">
									<div class="timeline-body-head">
										<div class="timeline-body-head-caption">
											<a>
												@if($post->induser != null && Auth::user()->induser_id)	
												<a class="user-link"><i class="glyphicon glyphicon-link"></i></a>&nbsp;<a style="padding: 0px 0px 0px 23px;">{{ $post->induser->fname }} {{ $post->induser->lname }}</a>
												@elseif($post->corpuser != null)
													{{ $post->post_compname }} 
												@endif
											</a>
											<span class="timeline-body-time font-grey-cascade">Posted at 
												{{ date('M d, Y', strtotime($post->created_at)) }}
											</span>
										</div>
									</div>
									<div class="timeline-body-content">
										<span class="font-grey-cascade">
											@if($post->post_type == 'skill')	
											<div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }} </div>
										@elseif($post->post_type == 'job')
											 <div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }}<div> <h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{ $post->post_compname }}</h4></div>  </div>
										@endif					 							
										</span>
											<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<i class="icon-badge"></i>&nbsp;: {{ $post->role }}
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<i class="icon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{ $post->min_sal }}-{{ $post->max_sal }}/Hours
											</div>
										</div>
									</div>		
									<div class="post-job-skill-bar">
										<div class="{{ $post->post_type }}"><a class="post-type-class">{{ $post->post_type }}</a></div>
										
										<a href="javascript:;" class="btn btn-icon-only pin-bar btn-circle green"><i class="icon-pin" style="font-size: 20px;"></i></a>
										
									</div>
								</div>
								<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled" 
											data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;">
											Description:</a>	
											</h4>
										</div>
										<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
											<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
												
												{{ $post->job_detail }}
												<div class="skill-display">Reference Id&nbsp;: </div>
												<div class="skill-display">Skills&nbsp;:<br> </div>
												<ul>
												@foreach($post->skills as $skill)
													<li>{{$skill->name}}</li>
												@endforeach
												</ul>

												<div class="skill-display">Contact&nbsp;:<br> </div> 
												<div class="row">
													<div class="col-md-8 col-sm-8 col-xs-12">
														<i class="glyphicon glyphicon-envelope" style="color: #13B8D4;font-size: 16px;"></i>&nbsp;: {{ $post->email_id }}
														@if($post->alt_emailid != null)
														 OR {{ $post->alt_emailid }}
														 @endif
													</div>									
												</div>
												<div class="row">
													<div class="col-md-8 col-sm-8 col-xs-12">
														<i class="glyphicon glyphicon-earphone" style="color: green;font-size: 16px;"></i>&nbsp;:{{ $post->phone }}
														@if($post->alt_phone != null)
														 OR {{ $post->alt_phone }}
														 @endif 
													</div>
												</div>
												<div class="skill-display">Post Id&nbsp;: {{ $post->id }} </div> 
											</div>
										</div>
										<div class="post-{{ $post->post_type }} post-icon-bar">
											<div class="btn-group dropup like-bar">
												<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius: 25px !important; height: 40px;background-color: burlywood;">
												<i class="icon-like" ></i>
												</button>
												<span class="badge-like">100 </span>
											</div>
											
											@if($post->post_type == 'job')
											<button type="button" class="btn btn-success" style=" margin: 0px auto;float:none;background-color: #61b3de;display:table;"><i class="icon-arrow-right" style="font-size:22px;vertical-align:middle;"></i>&nbsp;<span style="font-weight:600;vertical-align:middle">Apply</span></button>
											
											@elseif($post->post_type == 'skill')
											<button type="button" class="btn btn-success" style=" margin: 0px auto;float:none;background-color: #70b29c;display:table;"><i class="icon-arrow-right" style="font-size:22px;vertical-align:middle;"></i>&nbsp;<span style="font-weight:600;vertical-align:middle">Contact</span></button>
											@endif
											<span class="span-share">Share</span>
											<div class="btn-group dropup share-bar">
												<button class="btn green dropdown-toggle" type="button" data-toggle="dropdown" style="border-radius: 25px !important; height: 40px;background-color:tomato;">
												<i class="icon-share"></i>
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
								</div>
							</div>
							</div>

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
					<?php $var++; ?>
				 @endforeach
				@endif
				</div>
			</div>
		</form>
		<!-- END FORM-->
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
</script>

@stop
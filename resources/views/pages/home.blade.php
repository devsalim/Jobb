@extends('master')

@section('content')

<div class="portlet light bordered">										
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="#" class="horizontal-form">
			<div class="form-body">
				<div class="row">
					<div class="col-md-10" style="">
						
						@if (count($posts) > 0)
							<?php $var = 1; ?>
							@foreach($posts as $post)						
							<div class="timeline" >
							<!-- TIMELINE ITEM -->
							<div class="timeline-item time-item">
								<div class="timeline-badge" style="margin: 10px 0px;">
									@if($post->induser != null)
									<img class="timeline-badge-userpic" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
									<a class="icon-userpic"><i class=" icon-users"></i></a>
									@elseif($post->corpuser != null)
									<img class="timeline-badge-userpic" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
									<a class="icon-userpic"><i class="fa fa-bank (alias)"></i></a>
									@endif
								</div>
								<div class="timeline-body" style="margin: 10px 0 0 100px;">
									<div class="timeline-body-arrow"></div>
									<div class="timeline-body-head">
										<div class="timeline-body-head-caption">
											<a>
												@if($post->induser != null && Auth::user()->induser_id)	
												<a class="user-link"><i class="glyphicon glyphicon-link"></i></a>&nbsp;<a style="padding: 0px 0px 0px 23px;">{{ $post->post_title }}</a>
												@elseif($post->corpuser != null)
													{{ $post->post_compname }} 
												@endif
											</a>
											<span class="timeline-body-time font-grey-cascade">Posted {{ $post->post_type }} At 
												{{ date('M d, Y', strtotime($post->created_at)) }}&nbsp;&nbsp;<i class="icon-pin"></i>
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
										<div class="post-job-skill-type"><a class="post-type-class">{{ $post->post_type }}</a></div>
									</div>
								</div>
								<div class="portlet-body">
								<div class="panel-group accordion" id="accordion{{$var}}">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled" 
											data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}" style="font-size: 15px;font-weight: 600;">
											Description: </a>	
											</h4>
										</div>
										<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
											<div class="panel-body" style="border-top: 0;padding: 4px 15px;text-align:justify;">
												<div class="skill-display">Job Id&nbsp;:{{ $post->id }} </div>
												{{ $post->job_detail }}
												
												<div class="skill-display">Skills&nbsp;:<br> </div>
												<ul>
												@foreach($post->skills as $skill)
													<li>{{$skill->name}}</li>
												@endforeach
												</ul>

												<div class="skill-display">Contact&nbsp;:<br> </div> 
												<div class="row">
													<div class="col-md-4 col-sm-4 col-xs-12">
														<i class="glyphicon glyphicon-envelope" style="color: #13B8D4;font-size: 16px;"></i>&nbsp;: {{ $post->email_id }}
													</div>
													<div class="col-md-4 col-sm-4 col-xs-12">
														<i class="glyphicon glyphicon-earphone" style="color: green;font-size: 16px;"></i>&nbsp;: {{ $post->phone }}
													</div>
												</div>
											</div>
										</div>
										<div class="post-icon-bar">
											<button type="button"  class="post-icon" style="background-color:transparent;border:0;font-size:12px;">
											 <i class="glyphicon glyphicon-thumbs-up" style="font-size:20px;color: darkmagenta;"></i><span class="badge-like"> 7 </span>
											</button>
											@if($post->post_type == 'job')
											<button type="button" class="post-icon" style="background-color:transparent;border:0;font-size:12px;padding: 0px 0px 0px 12px;">
											 <i class="glyphicon glyphicon-ok-circle" style="font-size:20px;color: #4FBF4F;"></i>&nbsp;Apply
											</button>
											@endif
											<button type="button" id="hide-social" class="post-icon" style="background-color:transparent;border:0;font-size:12px;">
											 <i class="glyphicon glyphicon-share" style="font-size:20px;color: tomato;"></i>&nbsp;Share
											</button>
											<div id="show-social" class="post-social-icon-bar ">
												<a href="/" class="facebook"><i class="fa fa-facebook post-social-icon" ></i></a>
												<a href="/" class="google-plus"><i class="fa fa-google-plus post-social-icon"></i></a>
												<a href="/" class="linkedin"><i class="fa fa-linkedin post-social-icon" ></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
							<?php $var++; ?>
						 @endforeach
						@endif
							<!-- END TIMELINE ITEM -->
						</div>
					</div>			
					<!-- END TIMELINE ITEM -->
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@stop

@section('javascript')
<script type="text/javascript">
	$("#show-social").hide(); 
     $(document).ready(function() {
        $("#hide-social").on('click',function () {
          $("#show-social").show();
        else 
          $("#show-social").hide(); 
        });
    });
</script>
@stop
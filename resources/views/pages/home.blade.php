@extends('master')

@section('content')
<div class="portlet light bordered" style="border: none !important;background:transparent">										
	<div class="portlet-body form">
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
										<div class="{{ $post->post_type }}">
											<a class="post-type-class">{{ $post->post_type }}</a>
										</div>
										
										<form action="/job/fav" method="post" id="post-fav-{{$post->id}}" data-id="{{$post->id}}">						
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="fav_post" value="{{ $post->id }}">
											<button class="fav-btn btn btn-icon-only pin-bar btn-circle" id="fav-btn-{{$post->id}}" type="button">
											<i class="icon-pin" style="font-size: 20px;"></i>
											</button>
										</form>
										
									</div>
								</div>
								<div class="portlet-body" style="margin: 0 -5px;">
								<div class="panel-group accordion" id="accordion{{$var}}" style="margin-bottom: 0;">
									<div class="panel panel-default" style=" position: relative;">
										<div class="panel-heading">
											<h4 class="panel-title">
											<a class="accordion-toggle accordion-toggle-styled" 
											data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;">
											Details:</a>	
											</h4>
										</div>
										<div id="collapse_{{$var}}_{{$var}}" class="panel-collapse collapse">
											<div class="panel-body" style="border-top: 0;padding: 4px 15px;">
												<div class="skill-display">Description&nbsp;: </div>
												<div class="row">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														{{ $post->job_detail }}
													</div>
												</div>
												
												<div class="skill-display">Reference Id&nbsp;: </div>
												<div class="skill-display">Education & skills&nbsp;:<br> </div>
												<div class="row">
													<div class="col-md-1"></div>
													<div class="col-md-11">
														Education: {{ $post->education }}
													</div>
													<div class="col-md-1"></div>
													<div class="col-md-11">
														Job Category: {{ $post->prof_category }}
													</div>
													<div class="col-md-1"></div>
													<div class="col-md-11">
														Skills: @foreach($post->skills as $skill)
																{{$skill->name}}
															@endforeach
													</div>
												</div>	
												<div class="skill-display">Contact&nbsp;:<br> </div> 
												<ul>

													<li>
														<i class="glyphicon glyphicon-envelope" style="color: #13B8D4;font-size: 16px;"></i>&nbsp;: {{ $post->email_id }}
														@if($post->alt_emailid != null)
														OR {{ $post->alt_emailid }}
														@endif
													</li>
												</ul>
												<ul>
													<li>
														<i class="glyphicon glyphicon-earphone" style="color: green;font-size: 16px;"></i>&nbsp;: {{ $post->phone }}
														@if($post->alt_phone != null)
														OR {{ $post->alt_phone }}
														@endif
													</li>
												</ul>
												<div class="skill-display">Post Id&nbsp;: {{ $post->id }} </div> 
											</div>
										</div>
										<div class="post-{{ $post->post_type }} post-icon-bar">
											<div class="btn-group dropup like-bar">
												<form action="/job/like" method="post" id="post-{{$post->id}}" data-id="{{$post->id}}" style="float:left">						
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="like" value="{{ $post->id }}">
													<button class="btn like-btn" id="like-btn-{{$post->id}}" type="button" style="border-radius: 25px !important; height: 40px;background-color: burlywood;">
													<i class="icon-like" ></i>
													</button>
												</form>
												<span class="badge-like" id="like-count-{{ $post->id }}">0</span>
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

  $('.fav-btn').on('click',function(event){  	    
  	event.preventDefault();
  	var post_id = $(this).parent().data('id');

  	var formData = $('#post-fav-'+post_id).serialize(); 
    var formAction = $('#post-fav-'+post_id).attr('action');

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
        if(data == "favourite"){
        	$('#fav-btn-'+post_id).removeClass('btn-success');
 			$('#fav-btn-'+post_id).addClass('btn-warning');
        }else if(data == 'unfavourite'){
 			$('#fav-btn-'+post_id).removeClass('btn-warning');
 			$('#fav-btn-'+post_id).addClass('btn-success');
        }
      }
    }); 
    return false;
  }); 
});

</script>

@stop
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
													<a class="accordion-toggle accordion-toggle-styled" 
													data-toggle="collapse" data-parent="#accordion{{$var}}" href="#collapse_{{$var}}_{{$var}}"  style="font-size: 15px;font-weight: 600;">
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
														
														<div class="skill-display">Description : </div>
														{{ $post->job_detail }}
														
														@if($post->post_type == 'job')
														<div class="skill-display">Reference Id&nbsp;: {{ $post->reference_id }} </div>	
														@endif
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
																
															<div class="col-md-1"></div>
															<div class="col-md-11">
																Skills: {{ $post->linked_skill }}
															<!--	@foreach($post->skills as $skill)
																		{{$skill->name}}
																	@endforeach -->
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
														<div class="skill-display">Post Id&nbsp;: {{ $post->id }} </div> 
													</div>
												</div>
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
												<button type="button" class="btn btn-sm blue apply-contact-btn" disabled="true">
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
												<button type="button" class="btn btn-sm green apply-contact-btn" disabled="true">
													Contacted
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
														<button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: transparent;border-left: 1px solid lightgray;padding: 18px 20px 7px 8px;">
														<i class="fa fa-share-square-o" style="font-size: 23px;color: darkslateblue;"></i><span class="badge-share">1000 </span>
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
        }else if(data < $count){
 			$('#like-count-'+post_id).text(data);
 			$('#like-'+post_id).css({'color':'lightslategray'});
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

});
</script>

@stop
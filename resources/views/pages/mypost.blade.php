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
									<span class="font-grey-cascade">
										@if($post->post_type == 'skill')	
										<div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }} </div>
									@elseif($post->post_type == 'job')
										 <div style="font-weight: 600;color: black;font-size: 16px;">{{ $post->post_title }}<div> <h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{ $post->post_compname }}</h4></div>  </div>
									@endif					 							
									</span>
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-8">
											<i class="icon-badge"></i>&nbsp;: {{ $post->role }}
										</div>
										<div class="col-md-3 col-sm-3 col-xs-8">
											<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}
										</div>
										<div class="col-md-3 col-sm-3 col-xs-8">
											<i class="icon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years
										</div>
										<div class="col-md-3 col-sm-3 col-xs-8">
											<i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{ $post->min_sal }}-{{ $post->max_sal }}/Hours
										</div>
									</div>
								</div>		
								<div class="post-job-skill-bar">
									<div class="{{ $post->post_type }}"><a class="post-type-class">{{ $post->post_type }}</a></div>
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
											<div class="panel-body" style="border-top: 1px solid lightgrey !important;padding: 4px 15px;">
												<div class="skill-display">Description&nbsp;: </div>
												<ul>
													<li>{{ $post->job_detail }}</li>
												</ul>
												<div class="skill-display">Reference Id&nbsp;: </div>
												<div class="skill-display">Education & skills&nbsp;:<br> </div>
												<ul>

													<li>Education: {{ $post->education }}</li>
												</ul>
												<ul>
													<li>Job Category: {{ $post->prof_category }}</li>
												</ul>
												<ul>
													<li>Skills:</li>
														<ol>
															@foreach($post->skills as $skill)
																{{$skill->name}}
															@endforeach
														</ol>
												
												</ul>
												

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
											</div>

										</div>								
									</div>
								</div>
							</div>
							<div class="portlet-title">
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable-custom nav-justified" >
									<ul class="nav nav-tabs nav-justified" style="padding-left:0;">
										<li class="active">
											<a href="#tab_1_{{ $post->id }}_1" data-toggle="tab">Thanks & Share </a>
										</li>
										<li>
											<a href="#tab_1_{{ $post->id }}_2" data-toggle="tab">Applied </a>
										</li>
										<li>
											<a href="#tab_1_{{ $post->id }}_3" data-toggle="tab">Contact </a>
										</li>	
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1_{{ $post->id }}_1">
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

										<div class="tab-pane" id="tab_1_{{ $post->id }}_2">
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

										<div class="tab-pane" id="tab_1_{{ $post->id }}_3">
											<div class="portlet light">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-gift font-green-sharp"></i>
														<span class="caption-subject font-green-sharp bold uppercase">Contact viewed:</span>
														<span class="caption-helper">100</span>
													</div>		
												</div>

												<div class="portlet-body">													
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
	 @else
	 You haven't Post Anything!!
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
});

</script>
@stop
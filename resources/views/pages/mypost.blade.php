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
									<div class="row" style="margin-top: 15px;">
										<div class="col-md-6 col-sm-3 col-xs-12">
											<div class="">Post Expires in: {{ $post->post_duration }} days  
												<a href="#extend-job-expiry-{{ $post->id }}" data-toggle="modal" class="btn btn-sm extend-expire">Extend</a>
											</div>
										</div>
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
							<div class="portlet box">
								<div class="portlet-body">
								<div class="tabbable-custom ">
									<ul class="nav nav-tabs" style="padding-left:0;">
										<li class="active">
											
											<a href="#tab_1_{{ $post->id }}_1" data-toggle="tab">Thanks & Share </a>
										</li>
										@if($post->post_type == 'job')
										<li>
											
											<a href="#tab_1_{{ $post->id }}_2" data-toggle="tab">Applied </a>
										</li>
										@endif
										@if($post->post_type == 'skill')
										<li>
											<a href="#tab_1_{{ $post->id }}_3" data-toggle="tab">Contacted</a>
										</li>
										@endif
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
		        <h4 class="modal-title">Extend Post expiry date</h4>
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
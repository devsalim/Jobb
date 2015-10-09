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
<<<<<<< HEAD
										</div>
									</div>
								</div>
							</div>
						<div class="portlet-title">
=======
										</div>								
									</div>
								</div>
							</div>
							<div class="portlet-title">
>>>>>>> 732ff36bdbb2cac5c5b9fa08fd0bd98624b270ec
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
								</div>
							</div>
							<div class="portlet-body">
								<div class="tabbable-custom nav-justified" >
									<ul class="nav nav-tabs nav-justified" style="padding-left:0;">
										<li class="active">
											<a href="#tab_1_1_1" data-toggle="tab">Thanks & Share </a>
										</li>
										<li>
<<<<<<< HEAD
											<a href="#tab_1_1_2" data-toggle="tab">
											Applied </a>
										</li>
										
=======
											<a href="#tab_1_1_2" data-toggle="tab">Contact </a>
										</li>									
>>>>>>> 732ff36bdbb2cac5c5b9fa08fd0bd98624b270ec
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_1_1_1">
											<div class="portlet light">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-gift font-green-sharp"></i>
															<span class="caption-subject font-green-sharp bold ">Thanks Recieved:</span>
															<span class="caption-helper">100</span>&nbsp;&nbsp;
															<span class="caption-subject font-green-sharp bold ">Post Shared:</span>
															<span class="caption-helper">110</span>
														</div>
													</div>

<<<<<<< HEAD
													<div class="portlet-body">
														<ul class="dropdown-menu-list scroller"  data-handle-color="#637283">
										                  <li style="font-size:15px;">
										                    <!-- <a href="" > -->
										                    <span class="photo">
										                    <img src="{{ asset('/assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
										                    </span>
										                    <span class="subject">
										                    <span class="from" style="font-weight:600;color:darkcyan;">
										                   Deepika </span>
										                    <span class="time"> </span>
										                    </span>
										                    <span class="message">
										                    has thanked this post <i class=" icon-clock"></i> Oct 06,2015 13:04 PM </span>
										                    <!-- </a> -->
										                  </li>
										                  <li>
										                  </li>
										                  <li style="font-size:15px;">
										                   <!--  <a href="" > -->
										                    <span class="photo">
										                    <img src="{{ asset('/assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
										                    </span>
										                    <span class="subject">
										                    <span class="from" style="font-weight:600;color:darkcyan;">
										                    Deepak Gupta </span>
										                    <span class="time"> </span>
										                    </span>
										                    <span class="message">
										                    has shared this post via <a href="/" class="facebook" style="background-color: #3b5998;"><i class="fa fa-facebook post-social-icon"></i></a> <i class=" icon-clock"></i> Oct 05,2015 13:04 PM  </span>
										                   <!--  </a> -->
										                  </li>
										                  
										                </ul>
=======
												<div class="portlet-body">
													<div class="table-container">
														<div class="table-actions-wrapper">
															<span>
															</span>
															<select class="table-group-action-input form-control input-inline input-small input-sm">
																<option value="">Select...</option>
																<option value="Cancel">Cancel</option>
																<option value="Cancel">Hold</option>
																<option value="Cancel">On Hold</option>
																<option value="Close">Close</option>
															</select>
															<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
														</div>
														<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
														<thead>
														<tr role="row" class="heading">
															<th width="2%">
																No.
															</th>
															<th width="5%">
																 User
															</th>
															<th width="10%">
																 Activity
															</th>
															<th width="15%">
																 Date & Time
															</th>
															
														</tr>
														<tr role="row" class="filter">
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
																	<input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
																	<span class="input-group-btn">
																	<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
																	<input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
																	<span class="input-group-btn">
																	<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</td>
															
														</tr>
														</thead>
														<tbody>
														</tbody>
														</table>
>>>>>>> 732ff36bdbb2cac5c5b9fa08fd0bd98624b270ec
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab_1_1_2">
											<div class="portlet light">
												<div class="portlet-title">
													<div class="caption">
														<i class="fa fa-gift font-green-sharp"></i>
														<span class="caption-subject font-green-sharp bold uppercase">Contact Viewed:</span>
														<span class="caption-helper">100</span>
													</div>		
												</div>

<<<<<<< HEAD
													<div class="portlet-body">
														
														<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										                  <li style="font-size:15px;">
										                    <!-- <a href="" > -->
										                    <span class="photo">
										                    <img src="{{ asset('/assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
										                    </span>
										                    <span class="subject">
										                    <span class="from" style="font-weight:600;color:darkcyan;">
										                   Priyanka </span>
										                    <span class="time"> </span>
										                    </span>
										                    <span class="message">
										                    has applied for this post <i class=" icon-clock"></i> Oct 06,2015 13:04 PM </span>
										                    <!-- </a> -->
										                  </li>
										                  <li>
										                  </li>
										                  <li style="font-size:15px;">
										                   <!--  <a href="" > -->
										                    <span class="photo">
										                    <img src="{{ asset('/assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
										                    </span>
										                    <span class="subject">
										                    <span class="from" style="font-weight:600;color:darkcyan;">
										                    Deepak Gupta </span>
										                    <span class="time"> </span>
										                    </span>
										                    <span class="message">
										                    has applied for this post <i class=" icon-clock"></i> Oct 05,2015 13:04 PM  </span>
										                   <!--  </a> -->
										                  </li>
										                  
										                </ul>
=======
												<div class="portlet-body">
													<div class="table-container">
														<div class="table-actions-wrapper">
															<span>
															</span>
															<select class="table-group-action-input form-control input-inline input-small input-sm">
																<option value="">Select...</option>
																<option value="Cancel">Cancel</option>
																<option value="Cancel">Hold</option>
																<option value="Cancel">On Hold</option>
																<option value="Close">Close</option>
															</select>
															<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
														</div>
														<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
														<thead>
														<tr role="row" class="heading">
															<th width="2%">
																No.
															</th>
															<th width="5%">
																 User
															</th>
															<th width="10%">
																 User Type
															</th>
															<th width="10%">
																 Role
															</th>
															<th width="15%">
																 Date & Time
															</th>
															<th width="15%">
																 Resume
															</th>
															
														</tr>
														<tr role="row" class="filter">
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
															<td>
																<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
																	<input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
																	<span class="input-group-btn">
																	<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
																<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
																	<input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
																	<span class="input-group-btn">
																	<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
																	</span>
																</div>
															</td>
															<td>
																<input type="text" class="form-control form-filter input-sm" name="order_id">
															</td>
														</tr>
														</thead>
														<tbody>
														</tbody>
														</table>
>>>>>>> 732ff36bdbb2cac5c5b9fa08fd0bd98624b270ec
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
<<<<<<< HEAD
							<!-- END TIMELINE ITEM -->
				</div>
			</div>		
					<!-- END TIMELINE ITEM -->
		<?php $var++; ?>
	 @endforeach
	 @else
	 You haven't Post Anything!!
	@endif
=======
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
>>>>>>> 732ff36bdbb2cac5c5b9fa08fd0bd98624b270ec
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
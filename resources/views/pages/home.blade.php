@extends('master')

@section('content')

<div class="portlet light bordered">										
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="#" class="horizontal-form">
			<div class="form-body">
				<div class="row">
					<div class="col-md-11" style="">
						<div class="timeline">
						@if (count($posts) > 0)
							@foreach($posts as $post)
							<!-- TIMELINE ITEM -->
							<div class="timeline-item">
								<div class="timeline-badge">
									@if($post->induser != null)
									<img class="timeline-badge-userpic" src="/img/profile/{{ $post->induser->profile_pic }}" title="{{ $post->induser->fname }}">
									<a class="icon-userpic"><i class=" icon-users"></i></a>
									@elseif($post->corpuser != null)
									<img class="timeline-badge-userpic" src="/img/profile/{{ $post->corpuser->logo_status }}" title="{{ $post->corpuser->firm_name }}">
									<a class="icon-userpic"><i class="fa fa-bank (alias)"></i></a>
									@endif
									
								</div>
								<div class="timeline-body">
									<div class="timeline-body-arrow">
									</div>
									<div class="timeline-body-head">
										<div class="timeline-body-head-caption">
											<a href="javascript:;" class="timeline-body-title font-blue-madison">
												@if($post->induser != null)	
													{{ $post->post_title }}
												@elseif($post->corpuser != null)
													{{ $post->post_compname }} 
												@endif
											</a>
											<span class="timeline-body-time font-grey-cascade">Posted at 
												{{ date('F d, Y', strtotime($post->created_at)) }}&nbsp;&nbsp;<i class="icon-pin"></i>
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
										<i class="icon-badge"></i>&nbsp;: {{ $post->role }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}<br>

										<i class="icon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Years &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{ $post->min_sal }}-{{ $post->max_sal }}/Hours<br>Description: {{ $post->job_detail }}
										</span>
									</div>
											
									<div class="post-icon-bar">
									<label style="position: relative;"><a><i class=" icon-like post-icon" style="font-size:20px;"></i><span class="badge-like "> 7 </span></a></label>
									<label style="margin: 0px 10px"><a><i class="glyphicon glyphicon-ok post-icon" style="font-size:20px;"></i></a><span style="font-size: 12px;font-weight: 400;"> Interest </span></label>
									@if($post->induser != null)	
											<label style="position: relative;"><a><i class="icon-user-follow" style="font-size:20px;"></i><span class="badge-like-add"> 7 </span></a></label>
											<!-- If logged in user =corporate then hide add connection  -->
										@endif
									<label style="margin: 0px 10px"><a><i class="icon-action-redo post-icon" ></i></a><span style="font-size: 12px;font-weight: 400;"> Share</span></label>
									<div class="post-type">{{ $post->post_type }}</div>
									</div>
								</div>

							</div>

							<!-- END TIMELINE ITEM -->
							 @endforeach
						@endif
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

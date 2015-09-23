<div class="portlet light bordered">										
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="#" class="horizontal-form">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-11" style="">
						<div class="timeline">

						@if (count($posts) > 0)
							@foreach($posts as $post)
							<!-- TIMELINE ITEM -->
							<div class="timeline-item">
								<div class="timeline-badge">
									<img class="timeline-badge-userpic" src="../../assets/admin/pages/media/users/avatar80_1.jpg">
								</div>
								<div class="timeline-body">
									<div class="timeline-body-arrow">
									</div>
									<div class="timeline-body-head">
										<div class="timeline-body-head-caption">
											<a href="javascript:;" class="timeline-body-title font-blue-madison">{{ $post->post_compname }} {{ $post->post_title }}</a>
											<span class="timeline-body-time font-grey-cascade">Posted {{ $post->post_type}} At 
												{{ date('F d, Y', strtotime($post->created_at)) }}
											</span>
										</div>
									</div>
									<div class="timeline-body-content">
										<span class="font-grey-cascade">
										{{ $post->post_title }}, Role: {{ $post->role }}<br>at {{ $post->post_compname }}, City: {{ $post->city }}<br>Exp: {{ $post->min_exp}}-{{ $post->max_exp}} Years Pay Scale:&nbsp;<i class="fa fa-rupee (alias)"></i> {{ $post->min_sal }}-{{ $post->max_sal }}<br>Details: {{ $post->job_detail }}
										</span>
									</div>
									<div class="post-social-icon-bar">
										<a href="/" class="facebook"><i class="fa fa-facebook post-social-icon" ></i></a>
										<a href="/" class="google-plus"><i class="fa fa-google-plus post-social-icon"></i></a>
										<a href="/" class="linkedin"><i class="fa fa-linkedin post-social-icon" ></i></a>
									</div>
									<div class="post-icon-bar">
									<a><i class="icon-star post-icon" ></i></a>
									<a><i class="icon-like post-icon"></i></a>
									<a><i class="glyphicon glyphicon-ok post-icon" ></i></a>
									<a><i class="icon-user-follow post-icon" ></i></a>
									<a><i class="icon-call-end post-icon" ></i></a>
									<a><i class="icon-action-redo post-icon" ></i></a>
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

<script>
// $(document).scroll(function(){  
//     if ($(window).scrollTop() + $(window).height() == $(document).height())  
//          { // Reached page bottom. make an ajax call  
          
//                 $.ajax({  
//                     url: 'http://jobtip.dev/master', //targeted URL   
//                     method: 'post',  
//             dataType:'html',  
//                     success: function(data){  
//             $(".wrapRows").append(data); //append the response  
                         
//                     }  
//                 });  
//     }  
// });  
// </script>
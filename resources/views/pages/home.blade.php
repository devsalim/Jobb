<div class="portlet light bordered">										
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="#" class="horizontal-form">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-11" style="">
						<div class="timeline">

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
											<span class="timeline-body-time font-grey-cascade">Posted Job At 
												{{ date('F d, Y', strtotime($post->created_at)) }}
											</span>
										</div>
									</div>
									<div class="timeline-body-content">
										<span class="font-grey-cascade">
										{{ $post->post_title }}, Role: {{ $post->role }}<br>at {{ $post->post_compname }}, City: {{ $post->city }}<br>Exp: {{ $post->min_exp}} Years Pay Scale: {{ $post->min_sal }}<br>Details: {{ $post->job_detail }}
										</span>
									</div>
								</div>
							</div>
							<!-- END TIMELINE ITEM -->
							 @endforeach

						</div>
					</div>			
					<!-- END TIMELINE ITEM -->
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>



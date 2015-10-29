@extends('master')

@section('content')

<div class="portlet light bordered" style="border: none !important;background:transparent">	
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Profile search</span>
		</div>
	</div>									
	<div class="portlet-body form">
			<div class="form-body">
				
				<div class="row">
					<div class="col-md-9">
						@if(count($users) > 0)
							@foreach($users as $user)
							<!-- BEGIN FORM-->
							@if($type == 'people')	
								  <div class="row" style="padding: 0 0 15px 0; margin: 0 0 15px 0;border-bottom: 1px solid #eee;">
								    <div class="col-md-2">
								      <a href="#">
								        <img class="profile-pic" src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="border-radius: 50% !important;">
								      </a>
								    </div>
								    <div class="col-md-10">
								    	<div class="row">
									    	<div class="col-md-8" style="float:left;">
										      <h4 class="user-name" style="text-transform:capitalize">{{ $user->fname }} {{ $user->lname }}</h4>
										     	{{ $user->working_at }}<br>
											 	{{ $user->city }} {{ $user->state }}
											</div>
											@if($user->id != Auth::user()->induser_id)
										 	<div class="col-md-4">

										 		@if($links->contains('id', $user->id))
										 			<div class="btn btn-success btn-sm">Linked</div>
										 			<form action="{{ url('/connections/removeLink', $user->id) }}" method="post" 
										 					style="float: right;">				
														<input type="hidden" name="_token" value="{{ csrf_token() }}">	
														<button type="submit" class="btn btn-sm blue">Unlink</button>
													</form>			
										 		@else
										 		<span class="input-group-btn btn-right">
										 			<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="btn btn-success" >
														<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i> 
														</button>													
													</form>
												</span>
												@endif
										 	</div>
										 	@endif
									    </div>
								    </div>
								  </div>
							@elseif($type == 'company')
							
								
								  <div class="row" style="padding: 0 0 15px 0; margin: 0 0 15px 0;border-bottom: 1px solid #eee;">
								    <div class="col-md-2">
								      <a href="#">
								        <img class="profile-pic" src="@if($user->logo_status != null){{ '/img/profile/'.$user->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="border-radius: 50% !important;">
								      </a>
								    </div>
								    <div class="col-md-10">
								    	<div class="row">
									    	<div class="col-md-8" style="float:left;">
										      <h4 class="user-name" style="text-transform:capitalize">{{ $user->firm_name }}</h4>
										     	
											 	{{ $user->city }} {{ $user->state }}
											</div>
											
										 	<div class="col-md-4">

										 		@if($following->contains('id', $user->id))
										 			<div class="btn btn-success btn-sm">Following</div>
										 			<form action="{{ url('/corporate/unfollow', $user->id) }}" method="post"
										 					style="float: right;">				
														<input type="hidden" name="_token" value="{{ csrf_token() }}">	
														<button type="submit" class="btn btn-sm blue">Unfollow</button>
													</form>
										 		@else
										 		<span class="input-group-btn btn-right">
										 			<form action="{{ url('/corporate/follow', $user->id) }}" method="post">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<button type="submit" class="btn btn-success" >
														<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i> 
														</button>													
													</form>
												</span>
														
												@endif
										 	</div>
										 	
									    </div>
								    </div>
								  </div>
							@endif
							@endforeach
						<?php echo $users->render(); ?>
						@else
							<div class="btn btn-warning btn-lg">No profile matches</div>
						@endif
					</div>

					<div class="col-md-3">
						<div class="portlet box red-sunglo">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Advertisement
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse">
									</a>
								</div>
							</div>
							<div class="portlet-body">
								<ul>
									<li>Ads</li>															
								</ul>
							</div>
						</div>
					</div>	

				</div>

				<div class="modal fade bs-modal-sm" id="links-follow" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content" id="links-follow">
							<div id="links-follow-content">
								Links Follow
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
@stop

@section('javascript')

<script type="text/javascript">
$(document).ready(function(){

	// your java script

});
</script>

@stop
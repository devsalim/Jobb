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
					<div class="col-md-7">
						@if(count($users) > 0)
							@foreach($users as $user)
							<!-- BEGIN FORM-->
							@if($type == 'people')	
								  <div class="row" style="padding: 0 0 15px 0; margin: 0 0 15px 0;border-bottom: 1px solid #eee;">
									    <div class="col-md-2 col-sm-3 col-xs-3">
										      <a href="#">
										        <img class="media-object img-circle" 
										        src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
										      	alt="DP" style="width:100%">
										     </a>
									    </div>
								    	<div class="col-md-7 col-sm-6 col-xs-6">
										      <h4 class="user-name" style="text-transform:capitalize">{{ $user->fname }} {{ $user->lname }}</h4>
											 	@if($user->working_status == "Student")
				                                     {{ $user->education }} in {{ $user->branch }}, {{ $user->city }}
				                                
				                                @elseif($user->working_status == "Searching Job")
				                                
				                                     {{ $user->working_status }} in {{ $user->prof_category }}, {{ $user->city }}
				                                
				                                @elseif($user->working_status == "Freelanching")
				                                
				                                     {{ $user->role }} {{ $user->working_status }}, {{ $user->city }}
				                                
				                                @elseif($user->role != null && $user->working_at !=null && $user->working_status == "Working")
				                                
				                                     {{ $user->role }} @ {{ $user->working_at }} 
				                            
				                                @elseif($user->role != null && $user->working_at ==null && $user->working_status == "Working")
				                                
				                                     {{ $user->role }}, {{ $user->city }}
				                                
				                                @elseif($user->role == null && $user->working_at !=null && $user->working_status == "Working")
				                                
				                                     {{ $user->woring_at }}, {{ $user->city }}
				                                
				                                @elseif($user->role == null && $user->working_at ==null && $user->working_status == "Working")
				                                
				                                   {{ $user->prof_category }}, {{ $user->city }}
				                               
				                                @endif
											</div>
											@if($user->id != Auth::user()->induser_id)
										 	<div class="col-md-3 col-sm-3 col-xs-3">
									 		@if($links->contains('id', $user->id))
									 			<!-- <div class="btn btn-success btn-sm">Linked</div> -->
									 			<form action="{{ url('/users/removeLink', $user->id) }}" method="post" 
									 					>				
													<input type="hidden" name="_token" value="{{ csrf_token() }}">	
													<button type="submit" class="btn btn-success btn-sm" style="padding:2px 5px;">Linked</button>
												</form>			
									 		@else
									 		
									 			<form action="{{ url('/users/inviteFriend', $user->id) }}" method="post">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<button type="submit" class="btn btn-success apply-ignore-font" style="padding:2px 5px;">
														Add Link
													</button>													
												</form>
											
											@endif
									 	</div>
									 	@endif
								  </div>
							@elseif($type == 'company')
							
								
								  <div class="row" style="padding: 0 0 15px 0; margin: 0 0 15px 0;border-bottom: 1px solid #eee;">
								    <div class="col-md-2 col-sm-3 col-xs-3">
								      <a href="#">
								        <img class="media-object img-circle" src="@if($user->logo_status != null){{ '/img/profile/'.$user->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:100%">
								      </a>
								    </div>
								    <div class="col-md-7 col-sm-6 col-xs-6">
								    	
									      <h4 class="user-name" style="text-transform:capitalize">{{ $user->firm_name }}</h4>  	
										 	 	{{ $user->firm_type }}<br>
										     	@if($user->emp_count != null)
												Employees ({{ $user->emp_count }}) @endif 
												Followers ({{$followCount}})
																						
									</div>	
								 	<div class="col-md-3 col-sm-3 col-xs-3">

								 		@if($following->contains('id', $user->id))
								 			<!-- <div class="btn btn-success btn-sm">Following</div> -->
								 			<form action="{{ url('/userorate/unfollow', $user->id) }}" method="post">				
												<input type="hidden" name="_token" value="{{ csrf_token() }}">	
												<button type="submit" class="btn btn-sm btn-success" style="padding:2px 5px;">Following</button>
											</form>
								 		@else
								 		
								 			<form action="{{ url('/userorate/follow', $user->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-success apply-ignore-font" style="padding:2px 5px;">
													<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;"></i> 
													Follow</button>													
											</form>
										
												
										@endif
								 	</div>
								    </div>
								  
							@endif
							@endforeach
							</div>
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
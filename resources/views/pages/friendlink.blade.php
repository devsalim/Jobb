@extends('master')

@section('content')

<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>Manage your Links
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Linked </a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					Following</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">							
					<ul class="media-list">
					@foreach($connections as $connection)
																			
						  <li class="media ">
						  	
						    <div class="media-left col-md-2 col-sm-2 col-xs-2" style="padding:0">
						      <a href="#">
						        <img class="media-object" 
						        src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
						      alt="DP">
						      </a>
						    </div>
						    <div class="media-body col-md-4 col-sm-8 col-xs-8" style="padding:0;margin: 8px 14px; !important">
						    	<div class="media-body-left">
						    		 
								      	{{ $connection->fname }} {{ $connection->lname }}<br>
								    
								      @if($connection->working_at != null && $connection->city != null)
								     	Working at {{ $connection->working_at }} in {{ $connection->city }}
								      @elseif($connection->working_at == null && $connection->city != null)
								      	{{ $connection->city }}
								      @endif		
						    	</div>
						    <!-- 	<div class="media-body-right">
						    		
						    	</div> -->
						     
						    </div>
						  </li>
						
					@endforeach
					</ul>
				</div>
				<div class="tab-pane" id="tab_5_2">
						<ul class="media-list">
						@foreach($linkFollow as $follow)														
							  <li class="media">
							    <div class="media-left">
							      <a href="#">
							        <img class="media-object" src="@if($follow->logo_status != null){{ '/img/profile/'.$follow->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:60px">
							      </a>
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
							    		 	{{ $follow->firm_name }}
							    		 </h4>
										 {{ $follow->city }}, {{ $follow->operating_since }}
							    	</div>
							    	
							    	<div class="media-body-right">
							    		<span class="input-group-btn btn-right">
											<form action="{{ url('/corporate/unfollow', $follow->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" name="action" value="accept" class="btn btn-success button-style-add">
													<i class="icon-user-follow icon-style-add"  style="font-size:12px;color:white;padding-top: 3px;"></i>&nbsp;Unfollow
												</button>
											</form>
										</span>
							    	</div>
								</div>														     
							  </li>						
						@endforeach		
						</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

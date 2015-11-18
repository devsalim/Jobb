@extends('master')

@section('content')
@if($utype == 'ind')
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>
			Links			
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Linked @if($linksCount > 0)({{ $linksCount }})@endif</a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					Following @if($followCount > 0)({{ $followCount }})@endif</a>
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
						    		 
								    <a href="/profile/ind/{{$connection->id}}" data-utype="ind">
								      	{{ $connection->fname }} {{ $connection->lname }}</a><br>
								    
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
							        <img class="media-object" src="@if($follow->logo_status != null){{ '/img/profile/'.$follow->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP">
							      </a>
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
							    		 	{{ $follow->firm_name }}
							    		 </h4>
										 {{ $follow->city }}, {{ $follow->operating_since }}
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
@elseif($utype == 'corp')
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>
			Followers			
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Followers @if(count($followers) > 0)({{ count($followers) }})@endif</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					<ul class="media-list">
						@foreach($followers as $follower)												
						  <li class="media">
						    <div class="media-left">
						      <a href="#">
						        <img class="media-object" src="@if($follower->profile_pic != null){{ '/img/profile/'.$follower->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP">
						      </a>
						    </div>
						    <div class="media-body">
						    	<div class="media-body-left"  style="margin: 4px 0;">
						    		 <h4 class="media-heading">
						    		 	<a href="/profile/ind/{{$follower->id}}" data-utype="ind">
						    		 	{{ $follower->fname }} {{ $follower->lname }}
						    		 	</a>
						    		 </h4>
									 {{ $follower->city }}, {{ $follower->state }}
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
@endif

@stop

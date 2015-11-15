<ul class="media-list">
@foreach($users as $user)
<!-- BEGIN FORM-->
<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	  <li class="media">
	    <div class="media-left">
	      <a href="#">
	        <img class="media-object" src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:64px;height:64px">
	      </a>
	    </div>
	    <div class="media-body">
	    	<div class="media-body-left" style="float: left;min-width: 250px;">
		      <h4 class="media-heading">
		      	<a href="/profile/ind/{{$user->id}}" data-utype="ind">
		      		{{ $user->fname }} {{ $user->lname }}</h4>
		      	</a>
		     	{{ $user->working_at }}<br>
			 	{{ $user->city }} {{ $user->state }}
			</div>
			@if($user->id != Auth::user()->induser_id)
		 	<div class="media-body-right">
		 		@if($links->contains('id', $user->id))
		 			<div class="btn btn-success">Linked</div>
		 		@else
		 		<span class="input-group-btn btn-right">
					<button type="submit" class="btn btn-success" >
					<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i> 
					</button>
				</span>
				@endif
		 	</div>
		 	@endif
	    </div>
	  </li>
</form>
@endforeach
@foreach($corps as $corp)
<!-- BEGIN FORM-->
<form action="{{ url('/links/corporate/follow', $corp->id) }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	  <li class="media">
	    <div class="media-left">
	      <a href="#">
	        <img class="media-object" src="@if($corp->logo_status != null){{ '/img/profile/'.$corp->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:64px;height:64px">
	      </a>
	    </div>
	    <div class="media-body">
	    	<div class="media-body-left" style="float: left;min-width: 250px;">
		      <h4 class="media-heading">
		      	<a href="/profile/corp/{{$corp->id}}" class="link-label" data-utype="corp">
		      		{{ $corp->firm_name }}
		      	</a> {{ $corp->firm_type }}
		      </h4>
		      	{{ $corp->city }} 
		     	<i class="fa fa-clock-o" style="color:darkslategray;font-size:16px;"></i>
		     	 {{ $corp->operating_since }} 
		     	 <i class="fa fa-users" style="color:darkslategray;"></i> {{ $corp->emp_count }}<br>
		     	 ({{$corp->followers}}) followers
			</div>
			
		 	<div class="media-body-right">
		 		@if($follows->contains('id', $corp->id))
		 			<div class="btn btn-success">Following</div>
		 		@else
		 		<span class="input-group-btn btn-right">
					<button type="submit" class="btn btn-success" >
					<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i> 
					Follow</button>
				</span>
				@endif
		 	</div>
		 	
	    </div>
	  </li>
</form>
@endforeach
</ul>

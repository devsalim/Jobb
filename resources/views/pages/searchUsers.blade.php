<ul class="media-list">
@foreach($users as $user)
<!-- BEGIN FORM-->
<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	  <li class="media">
	    <div class="media-left">
	      <a href="#">
	        <img class="media-object" src="/img/profile/{{ $user->profile_pic }}" alt="..." style="width:65px">
	      </a>
	    </div>
	    <div class="media-body">
	    	<div class="media-body-left">
		      <h4 class="media-heading">{{ $user->fname }} {{ $user->lname }}</h4>
		     	{{ $user->working_at }}<br>
			 	{{ $user->city }}, {{ $user->state }}
			</div>
		 	<div class="media-body-right">
		 		<span class="input-group-btn btn-right">
					<button type="submit" class="btn green-haze" >
					<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i> 
					</button>
				</span>
		 	</div>

	    </div>
	  </li>
</form>
@endforeach
</ul>

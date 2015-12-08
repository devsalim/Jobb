@foreach($users as $user)
<div class="row search-user-tool">
	<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2 col-sm-2 col-xs-2">
		 	<a href="#">
	        	<img class="media-object img-circle img-link-size" src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" >
	      	</a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<a href="/profile/ind/{{$user->id}}" data-utype="ind">
		      	{{ $user->fname }} {{ $user->lname }}<br>
	      	</a>
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
		<div class="col-md-3 col-sm-3 col-xs-2">
			@if($user->id != Auth::user()->induser_id)
				@if($links->contains('id', $user->id))
		 			<div class="btn btn-success" style="padding:2px 5px;">Linked</div>
		 		@else
		 			<button type="submit" class="btn btn-success" style="padding:2px 5px;">
						Link
					</button>
				@endif
			@endif
		</div>
	</form>
</div>
@endforeach
@foreach($corps as $corp)
<div class="row search-user-tool">
	<form action="{{ url('/links/corporate/follow', $corp->id) }}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="col-md-2 col-sm-2 col-xs-2">
		 	<a href="#">
		        <img class="media-object img-circle img-link-size" src="@if($corp->logo_status != null){{ '/img/profile/'.$corp->logo_status }}@else{{'/assets/images/corpnew.jpg'}}@endif" alt="DP">
		     </a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<a href="/profile/corp/{{$corp->id}}" class="link-label" data-utype="corp">
		      	{{ $corp->firm_name }}
		    </a> {{ $corp->firm_type }}<br>
	     	@if($corp->emp_count != null)
			Employees ({{ $corp->emp_count }})@endif, 
			@if($corp->followers > 0)Followers ({{ $corp->followers }})@endif 
		</div>
		<div class="col-md-3 col-sm-3 col-xs-2">
			@if($follows->contains('id', $corp->id))
		 			<div class="btn btn-success" style="padding:2px 5px;">Following</div>
	 		@else
	 			<button type="submit" class="btn btn-success" style="padding:2px 5px;">
				<i class="glyphicon glyphicon-plus-sign" style="font-size: 12px;"></i> 
				Follow</button>
			@endif
		</div>
	</form>
</div>
@endforeach
@foreach($users as $user)
<div class="row search-user-tool">
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
			@if($groupUsers->contains('id', $user->id))
				@if($groupAdmin->contains('id', $user->id))
	 				<div class="btn btn-info apply-ignore-font" style="padding:2px 5px;">Admin</div>
	 			@else
	 				<div class="btn btn-warning apply-ignore-font" style="padding:2px 5px;">In group</div>
	 			@endif
	 		@else
	 			<form action="{{ url('/group/adduser') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="add_user_id" value="{{$user->id}}">
					<input type="hidden" name="add_group_id" value="{{$groupId}}">
		 			<button type="submit" class="btn btn-success apply-ignore-font" style="padding:2px 5px;">
						Add to group
					</button>
				</form>
			@endif
		@elseif($user->id == Auth::user()->induser_id && $groupAdmin->contains('id', $user->id))
			<div class="btn btn-info apply-ignore-font" style="padding:2px 5px;">Hi, Admin</div>
		@endif
	</div>
</div>
@endforeach
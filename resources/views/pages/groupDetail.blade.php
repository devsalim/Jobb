@extends('master')

@section('content')

<div class="portlet light bordered col-md-7">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Group: {{$group->group_name}}</span>
		</div>
	</div>
	<div class="portlet-body form">
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10" style="">
						<div class="form-group clearfix">	
							<!-- BEGIN FORM-->
							<form action="searchConnections" class="horizontal-form" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">				
								<div class="input-icon right">
									<i class="fa fa-search" style="color: darkcyan;"></i>
									<input type="text" name="keywords" id="search-input" onkeydown="down()" onkeyup="up()" class="form-control input-circle" placeholder="Search" style="border: 1px solid darkcyan;">
								</div>	
							</form>
							<!-- END FORM-->
						</div>

						<div class="col-md-12" id="search-results"></div>
					</div>			
				</div>
					
			</div>
	</div>
</div>
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Group Members </a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					Add Members </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					<ul class="media-list">
					@if(count($users) > 0)
					@foreach($users as $user)
						  <li class="media">
						    <div class="media-left">
						      <a href="#">
						        <img class="media-object" src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="..." style="width:60px;padding: 3px;border: 1px solid #ddd;">
						      </a>
						    </div>
						    <div class="media-body" style="font-weight:300">
							    <div class="media-body-left">
							      <h4 class="media-heading" style="margin-bottom:0;font-weight:300;word-break:break-word">
							      	{{ $user->fname }} {{ $user->lname }}
								      @if($user->id == $user->admin_id && $user->id != null)
								      	<span class="btn btn-xs btn-warning" style="border-radius:25px !important;margin:0 10px">
								      		Admin
								      	</span>
								      @endif
							      </h4>
							     {{ $user->working_at }}<br>
								 {{ $user->city }} {{ $user->state }}
								</div>
								<div class="media-body-right">
								 	<span class="input-group-btn btn-right">
									 	@if($user->admin_id == Auth::user()->induser_id)
										<form action="{{ url('/group/deleteuser') }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="id" value="{{$user->groups_users_id}}">
											<input type="hidden" name="groupid" value="{{$user->group_id}}">
											<button type="submit" class="btn btn-danger">
											<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
											</button>
										</form>
										@endif								
									</span>								 	
								</div>							
						    </div>
						  </li>								
					@endforeach
					@else
					<li>No user</li>
					@endif
					</ul>
				</div>
				<div class="tab-pane" id="tab_5_2">
					<ul class="media-list">
					@if(count($connections) > 0)
					@foreach($connections as $connection)	
						@if($connection->id != $group->admin_id)						
						  <li class="media">
						    <div class="media-left">
						      <a href="#">
						        <img class="media-object" src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="..." style="width:60px;padding: 3px;border: 1px solid #ddd;">
						      </a>
						    </div>
						    <div class="media-body" style="font-weight:300">
							    <div class="media-body-left">
							      <h4 class="media-heading" style="margin-bottom:0;font-weight:300;margin-bottom:0">
								      	{{$connection->fname}} {{$connection->lname}}
							      </h4>
							     {{ $connection->working_at }}<br>
								 {{ $connection->city }} {{ $connection->state }}
								 </div>
								 <div class="media-body-right">
								 	<span class="input-group-btn btn-right">
										<form action="{{ url('/group/adduser') }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="user_id" value="{{$connection->id}}">
											<input type="hidden" name="group_id" value="{{$group->id}}">
											<button type="submit" class="btn btn-success">
											<i class="icon-plus" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
											</button>
										</form>
									</span>								 	
								 </div>
						    </div>
						  </li>		
						  @endif						
					@endforeach
					@else
					<li>No user</li>
					@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@stop


@section('javascript')
<script>
	jQuery(document).ready(function() { 
	    ComponentsIonSliders.init();
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>
<script type="text/javascript">
    $('#connections').select2();
</script>
@stop

@extends('master')

@section('content')

<div class="portlet light bordered col-md-7">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">				
				{{$group->group_name}}   				
			</span>
			<a href="/group" class="group-title-info btn btn-xs btn-warning" 
				style="text-decoration:none;border-radius: 25px !important;float:left;margin:0 5px;">
				Back
			</a>
			

			<div class="group-admin-title pull-right">
				@if($group->admin->id == Auth::user()->induser_id)
				<a id="ajax-demo" href="#edit-group" data-toggle="modal" class="badge btn btn-xs btn-info" style="" title="Edit">
					<i class="fa fa-edit"></i><span class="hidden-sm hidden-xs"> Edit</span>
				</a>
			@endif
			@if($group->admin->id == Auth::user()->induser_id)				
				<a id="ajax-demo" href="#delete-group" data-toggle="modal" title="Delete" 
					class="badge btn btn-xs btn-danger" style="text-decoration: none;">
					<i class="fa fa-trash"></i><span class="hidden-sm hidden-xs"> Delete Group</span>
				</a>				
			@else				
				<a id="ajax-demo" href="#leave-group" data-toggle="modal" 
					class="badge btn btn-xs" style="text-decoration: none;">						
					<i class="fa fa-sign-out"></i><span class="hidden-sm hidden-xs"> Leave Group</span>
				</a>
			@endif
				
			</div>
		</div>		
	</div>
	<span class="group-admin-title-left">Admin</span> 
				<a href="/profile/ind/{{$group->admin->id}}">
				<span class="group-admin-title-right">{{$group->admin->fname}} {{$group->admin->lname}}</span>
				</a>
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<div class="modal fade" id="edit-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 300px;">
	    <div class="modal-content">
	    	<form action="{{ url('/group/update', $group->id) }}" class="horizontal-form" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			        <h4 class="modal-title">{{$group->group_name}}</h4>
			     </div>
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="icon-call-end" style="color:darkcyan;"></i>
							</span>
							<input type="text" name="group_name" class="form-control" placeholder="Enter New Group name">
						</div>
					</div>	      		
	     		</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Update</button>
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	    <!-- /.modal-content -->
 	</div>
  	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="delete-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 300px;">
	    <div class="modal-content">
	    	<form action="{{ url('/group/destroy', $group->id) }}" class="horizontal-form" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			        <h4 class="modal-title">Are you sure</h4>
			     </div>
				<div class="modal-body">
					  You want to delete this Group   		
	     		</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-warning">Yes</button>
					<button type="button" class="btn default" data-dismiss="modal">No</button>
				</div>
			</form>
		</div>
	    <!-- /.modal-content -->
 	</div>
  	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="leave-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 300px;">
	    <div class="modal-content">
	    	<form action="{{ url('/group/leavegroup') }}" class="horizontal-form" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			        <h4 class="modal-title">Are you sure</h4>
			     </div>
				<div class="modal-body">
					  You want to leave this Group   		
	     		</div>
				<div class="modal-footer">
					<input type="hidden" name="my_id" value="{{Auth::user()->induser_id}}">
					<input type="hidden" name="my_group_id" value="{{$group->id}}">
					<button type="submit" class="btn btn-warning">Yes</button>
					<button type="button" class="btn default" data-dismiss="modal">No</button>
				</div>
			</form>
		</div>
	    <!-- /.modal-content -->
 	</div>
  	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
	<div class="portlet-body form">
		<div class="form-body">	
<!-- 			<span class="input-group-btn btn-right">
				<form action="{{ url('/group/destroy', $group->id) }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div>
						<button type="submit" class="btn yellow">
							<i class="glyphicon glyphicon-edit" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
						</button>
					</div>
					<div>
						<button type="submit" class="btn btn-danger">
							<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
						</button>
					</div>
				</form>
			</span> -->
		</div>
	</div>
</div>
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i> Members
		</div>
		<div class="done-show" style="float:right;margin:10px 0;">
			<button class="btn" style="padding: 0px 5px;background-color: darkslategrey;color: white;">
				Delete
			</button>
		</div>
		<div class="add-done-show" style="float:right;margin:10px 0;">
			<button class="btn" style="padding: 0px 5px;background-color: darkslategrey;color: white;">
				Done
			</button>
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">

			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="">
					<div class="form-group clearfix" style="margin-bottom:0">	
						<!-- BEGIN FORM-->
						<form action="searchConnections" class="horizontal-form" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">				
							<div class="input-icon right">
								<i class="fa fa-search" style="color: darkcyan;"></i>
								<input type="text" name="keywords" id="search-input " onkeydown="down()" onkeyup="up()" class="form-control" placeholder="Search" style="border: 1px solid darkcyan;">
							</div>	
						</form>
						<!-- END FORM-->
					</div>

					<div class="col-md-12" id="search-results" style="background:#f2f2f2;max-height:200px;overflow:auto;margin-bottom:10px"></div>
				</div>			
			</div>

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
					@if(count($users) > 0)
					@foreach($users as $user)
					<div class="row" style="border-bottom:1px dotted lightgrey;">
						
						<div class="col-md-2 col-sm-2 col-xs-2">
							<a href="#">
						        <img class="media-object img-circle" src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="..." style="padding: 3px;border: 1px solid #ddd;">
						    </a>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-6">
							<a href="/profile/ind/{{$user->id}}" data-utype="ind">
				      			{{ $user->fname }} {{ $user->lname }}</a>
						     	 @if($user->id == $user->admin_id && $user->id != null)
						      	<span class="btn btn-xs btn-warning" style="border-radius:25px !important;margin:0 10px">
						      		Admin
						      	</span>
					      @endif
					      {{ $user->working_at }}<br>
							 {{ $user->city }} {{ $user->state }}
						</div>
						<div class="col-md-2 col-sm-2 col-xs-2">
							<span class="input-group-btn btn-right">
							 	@if($user->admin_id == Auth::user()->induser_id)
								<form action="{{ url('/group/deleteuser') }}" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="delete_id" value="{{$user->groups_users_id}}">
									<input type="hidden" name="delete_group_id" value="{{$user->group_id}}">
									<button type="submit" name="action" value="reject" class="btn apply-ignore-font" style="padding: 0px 3px; background-color: white;">
										<i class="icon-close icon-close-css"></i>
									</button>
									<!-- <button type="submit" class="btn btn-sm btn-danger">
									<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
									</button> -->
								</form>
								@endif								
							</span>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-1">
						<!-- <div class="checkboxFour"> -->
							<label>
								<input type="checkbox" id="" class="group-done" data-checkbox="icheckbox_square-grey" onchange="valueChanged()">
							</label>
						<!-- </div> -->
						</div>
					</div>
					@endforeach
					@else
					No Group Members
					@endif

				</div>
				<div class="tab-pane" id="tab_5_2">
					@if(count($connections) > 0)
					@foreach($connections as $connection)	
						@if($connection->id != $group->admin_id)
						<div class="row" style="border-bottom:1px dotted lightgrey;">
							
							<div class="col-md-2 col-sm-2 col-xs-2">
								<a href="#">
							        <img class="media-object" src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="..." style="width:60px;padding: 3px;border: 1px solid #ddd;">
							     </a>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-6">
								<a href="/profile/ind/{{$connection->id}}" data-utype="ind">
								      		{{$connection->fname}} {{$connection->lname}}</a>
							     {{ $connection->working_at }}<br>
								 {{ $connection->city }} {{ $connection->state }}
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2">
								<span class="input-group-btn btn-right">
									<form action="{{ url('/group/adduser') }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="add_user_id" value="{{$connection->id}}">
										<input type="hidden" name="add_group_id" value="{{$group->id}}">
										<button type="submit" name="action" value="accept" class="btn apply-ignore-font" style="padding: 0px 3px; background-color: white;">
											<i class="icon-check icon-check-css"></i>
										</button>
										<!-- <button type="submit" class="btn btn-sm btn-success">
										<i class="icon-plus" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
										</button> -->
									</form>
								</span>
							</div>
							<div class="col-md-1 col-sm-1 col-xs-1">
							<label>
								<input type="checkbox" id="" class="add-done" data-checkbox="icheckbox_square-grey" onchange="valueChange()">
							 </label>
							</div>
						</div>						
						
						  @endif						
					@endforeach
					@else
					No user
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@stop


@section('javascript')
<script type="text/javascript">
function valueChanged()
{
    if($('.group-done').is(":checked"))   
        $(".done-show").show();
    else
        $(".done-show").hide();
}
</script>
<script type="text/javascript">
function valueChange()
{
    if($('.add-done').is(":checked"))   
        $(".add-done-show").show();
    else
        $(".add-done-show").hide();
}
</script>
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
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

var timer;
function up()
{
	timer=setTimeout(function()
		{
			var keywords = $('#search-input').val();
			if(keywords.length>2)
			{
				$.post('/searchConnections', {keywords: keywords}, function(markup)
				{
					$('#search-results').html(markup);
				});
			}
			else
			{
				$('#search-results').empty();
			}
		}, 500);
}

function down()
{
	clearTimeout(timer);
}
</script>
@stop

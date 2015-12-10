@extends('master')

@section('content')

<div class="portlet light bordered col-md-6">
	<div class="portlet-title">
		<div class="caption links-title">
			<span class="caption-subject font-blue-hoki bold uppercase">Groups</span>
			<a id="ajax-demo" href="#create-group" data-toggle="modal" class="config pull-right" style="text-decoration: none;">
				<label>
					<i class="glyphicon glyphicon-plus-sign" style="font-size:14px;color:#46AFA6;"></i>
				</label> 
				<label style="font-size: 15px;"> Create new</label>				
			</a> 
		</div>
	</div>
	<div class="portlet-body form">
		<div class="form-body">

			@if(count($groups)>0)
			@foreach($groups as $group)
			<div style="border: 1px dotted lightgray; margin:10px 0">
				<div class="row" style="margin: 7px 0;padding: 7px 0px 0 0px;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="/group/{{ $group->id }}" style="font-weight:600;">
							{{ $group->group_name }}
						</a>
						@if($group->posts_count == 1)
						<button class="btn btn-success" style="padding: 0 8px;    border-radius: 15px !important; background-color: deepskyblue;border-color: deepskyblue;">
							<a href="/home" style="color:white;">
								{{$group->posts_count}} Post
							</a>
						</button>
						@elseif($group->posts_count > 1)
						<button class="btn btn-success" style="padding: 0 8px;    border-radius: 15px !important; background-color: deepskyblue;border-color: deepskyblue;">
							<a href="/home" style="color:white;">
								{{$group->posts_count}} Posts
							</a>
						</button>
						@else
						<button class="btn btn-success" style="padding: 0 10px;">
							No Post
						</button>
						@endif
					</div>
				</div>
				<div class="row" style="margin:10px 0">
					<div class="col-md-4 col-sm-4 col-xs-3">
						<i class="fa fa-users"></i> ({{count($group->users)}})
					</div>
					<div class="col-md-4 col-sm-4 col-xs-5 group-align">
						<i class="icon-shield"></i> {{$group->admin()->first()->fname}}
					</div>
					@if($group->admin->id == Auth::user()->induser_id)
					<div class="col-md-4 col-sm-4 col-xs-4 group-align">
							<a href="/group/{{ $group->id }}">
								<i class="fa fa-edit (alias)"></i> Edit
							</a>
					</div>
					@else
					<div class="col-md-4 col-sm-4 col-xs-4 group-align">
						
							<a href="/group/{{ $group->id }}" style="">
								<i class="fa fa-plus-circle"></i> Add
							</a>
						
					</div>
					@endif
				</div>
			</div>
			@endforeach
			@endif
		</div>
	 </div>
</div>


<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="create-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="width: 300px;">
	    <div class="modal-content">
	    	<form action="{{ url('/group/store') }}" class="horizontal-form" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		     	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
			        <h4 class="modal-title">New Group</h4>
			     </div>
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="icon-call-end" style="color:darkcyan;"></i>
							</span>
							<input type="text" name="group_name" class="form-control" placeholder="Enter Group name">
						</div>
					</div>	      		
	     		</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Create</button>
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	    <!-- /.modal-content -->
 	</div>
  	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
@stop

@section('javascript')

<script>
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
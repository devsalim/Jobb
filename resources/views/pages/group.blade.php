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
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-8 links-title" style="">		
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
					<div class="col-md-10 links-title" id="search-results">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 links-title">
					@if(count($groups)>0)
					@foreach($groups as $group)
					<!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
						<div class="form-group form-md-line-input">
							<div class="input-group">
								<div class="input-group-control">
									<label class=" control-label" for="form_control_1" style="font-weight:500 !important;">
										<a href="/group/{{ $group->id }}">{{ $group->group_name }}</a> 
										({{$group->postsCount()->first()->totalPosts}}) 
										<i class="icon-users"></i> {{count($group->users)}}  <i class="icon-shield"></i> {{$group->admin()->first()->fname}}
									</label>
								</div>
							</div>
						</div>
					<!-- </div>	 -->

					@endforeach
					@endif
				</div>
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
			if(keywords.length>0)
			{
				$.post('/searchConnections', {keywords: keywords}, function(markup)
				{
					$('#search-results').html(markup);
				});
			}
		}, 500);
}

function down()
{
	clearTimeout(timer);
}
</script>
@stop
@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Connections</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-7" style="">
						<div class="portlet light col-md-12 clearfix" style="background-color: transparent;">
							<div class="row social">
								<div class="col-md-4 col-xs-4 ">
									<a  class="btn btn-lg btn-facebook btn-block" href="" style="background: #3b5998;color: white;border-radius: 25px !important;height: 35px;">
									<i class="fa fa-facebook "></i><span class="hidden-xs" style="font-size:14px"> &nbsp;Facebook</span></a>	
								</div>
								<div class="col-md-4 col-xs-4 ">
									  <a  class="btn btn-lg btn-google btn-block" href="" style="background: #c32f10;color: white;border-radius: 25px !important;height: 35px;">
									  <i class="fa fa-google-plus"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Google+</span></a>
								</div>
								<div class="col-md-4 col-xs-4 ">
									  <a class="btn btn-lg btn-linkedin btn-block" style="background: #00aced;color: white;border-radius: 25px !important;height: 35px;">
									  <i class="fa fa fa-linkedin"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Linkedin</span></a>
								</div>
							</div>
						</div>
						
						<div class="form-group  col-md-12 clearfix">	
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

						@if(count($connectionRequest)>0)
						<div class="col-md-12">
							<h3>New Connection Request</h3>
							<div>
								
								@foreach($connectionRequest as $conreq)					
								<div class="form-group form-md-line-input" style="margin-left: -11px;">
									<div class="input-group">
										<div class="input-group-control">
											<label class="col-md-12 control-label" for="form_control_1" >
												{{ $conreq->connectiondetail->fname }} {{ $conreq->connectiondetail->lname }}
											</label>
										</div>
										<span class="input-group-btn btn-right">
											@if($conreq->status==0)
											<form action="{{ url('/connections/response', $conreq->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" name="action" value="accept" class="btn btn-success">
													<i class="fa fa-check"  style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Accept
												</button>
												<button type="submit" name="action" value="reject" class="btn btn-danger">
													<i class="fa fa-remove" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Reject
												</button>
											</form>
											@endif
										</span>
									</div>
								</div>
								@endforeach					
							</div>
						</div>					
						@endif		
						
						<div class="col-md-12" id="search-results">
						@if(count($connections)>0)
						@foreach($connections as $connection)					
						<div class="form-group form-md-line-input" style="margin-left: -11px;">
							<div class="input-group">
								<div class="input-group-control">
									<label class="col-md-6 control-label" for="form_control_1" >
									@if(Auth::user()->induser_id == $connection->user_id)
									{{ $connection->user->fname }} {{ $connection->user->lname }}
									@elseif(Auth::user()->induser_id == $connection->connection_user_id && $connection->status == 1)
									{{ $connection->connectiondetail->fname}} {{ $connection->connectiondetail->lname}}
									@endif
									</label>
								</div>
								<span class="input-group-btn btn-right">
									@if($connection->status==0 && Auth::user()->induser_id == $connection->user_id)
									<form action="{{ url('/connections/destroy', $connection->id) }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="btn btn-warning">
											<i class="fa fa-exclamation" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Pending
										</div>
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-remove" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Cancel
										</button>
									</form>
									@elseif($connection->status==1 )
									<form action="{{ url('/connections/destroy', $connection->id) }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn green-haze">
										<i class="fa fa-check" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Remove
										</button>
									</form>
									@endif
								</span>
							</div>
						</div>
						@endforeach
						@endif
						</div>			
					</div>
					
				</div>
			</div>
		
	</div>
</div>
									
@stop

@section('javascript')<script type="text/javascript">
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
				$.post('http://jobtip.dev/searchConnections', {keywords: keywords}, function(markup)
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
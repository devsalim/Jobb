@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Links</span>
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
						
						<div class="form-group  col-md-8 clearfix">	
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
			<i class="icon-users"></i>Links
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Linked </a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					Link Request </a>
				</li>
				<li>
					<a href="#tab_5_3" class="label-new" data-toggle="tab">
					New Links </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					@if(count(Auth::user()->induser->friends) > 0)								
					<ul class="media-list">
					@foreach(Auth::user()->induser->friends as $connection)
						@if($connection->pivot->status == 1)													
						  <li class="media">
						    <div class="media-left">
						      <a href="#">
						        <img class="media-object" 
						        src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" 
						      alt="DP" style="width:60px">
						      </a>
						    </div>
						    <div class="media-body">
						    	<div class="media-body-left">
						    		 <h4 class="media-heading">
								      	{{ $connection->fname }} {{ $connection->lname }}
								      </h4>
								     	{{ $connection->working_at }}<br>
										{{ $connection->city }}-{{ $connection->state }}
						    	</div>
						    	<div class="media-body-right">
						    		<span class="input-group-btn btn-right">
										<form action="{{ url('/connections/destroy', $connection->pivot->id) }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger">
											<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
											</button>
										</form>													
									</span>
						    	</div>
						     
						    </div>
						  </li>
						@endif
					@endforeach
					</ul>
					
			@endif
				</div>
				<div class="tab-pane" id="tab_5_2">
					@if(count(Auth::user()->induser->friendsOfMine) > 0)								
					<ul class="media-list">
					@foreach(Auth::user()->induser->friendsOfMine as $pendingconnection)
						@if($pendingconnection->pivot->status == 0)	
						  <li class="media">
						    <div class="media-left">
						      <a href="#">								     									      	
						        <img class="media-object" src="@if($pendingconnection->profile_pic != null){{ '/img/profile/'.$pendingconnection->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" alt="DP" style="width:60px">
						      </a>
						    </div>
						    <div class="media-body">
						    	<div class="media-body-left">
							      <h4 class="media-heading">
							      	{{ $pendingconnection->fname }} {{ $pendingconnection->lname }}
							      </h4>
							     	{{ $pendingconnection->working_at }}<br>
								 	{{ $pendingconnection->city }} {{ $pendingconnection->state }}
							 	</div>
							 	<div class="media-body-right">
							 		<span class="input-group-btn btn-right">
					
										<form action="{{ url('/connections/destroy', $pendingconnection->pivot->id) }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<div class="btn btn-warning">
												<i class="icon - glyphicon glyphicon-question-sign" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
											</div>
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-remove" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
											</button>
										</form>
										
									</span>
							 	</div>
						    </div>
						  </li>
						@endif
					@endforeach
					</ul>
					@endif
				</div>
				<div class="tab-pane" id="tab_5_3">
					@if(count(Auth::user()->induser->friendOf) > 0)
						<ul class="media-list">
						@foreach(Auth::user()->induser->friendOf as $conreq)
							@if($conreq->pivot->status == 0)														
							  <li class="media">
							    <div class="media-left">
							      <a href="#">
							        <img class="media-object" src="@if($conreq->profile_pic != null){{ '/img/profile/'.$conreq->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" alt="DP" style="width:60px">
							      </a>
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
							    		 	{{ $conreq->fname }} {{ $conreq->lname }}
							    		 </h4>
									     {{ $conreq->working_at }}<br>
										 {{ $conreq->city }} {{ $conreq->state }}
							    	</div>
							    	
							    	<div class="media-body-right">
							    		<span class="input-group-btn btn-right">
											<form action="{{ url('/connections/response', $conreq->pivot->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" name="action" value="accept" class="btn btn-success">
													<i class="fa fa-check"  style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Accept
												</button>
												<button type="submit" name="action" value="reject" class="btn btn-danger">
													<i class="fa fa-remove" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Reject
												</button>
											</form>
										</span>
							    	</div>
								</div>														     
							  </li>
							@endif
						@endforeach		
						</ul>									
					@endif	
				</div>
			</div>
		</div>
	</div>
</div>									
@stop

@section('javascript')
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
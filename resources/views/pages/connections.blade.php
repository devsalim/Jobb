@extends('master')

@section('content')
@if(Auth::user()->identifier == 1)
<div class="portlet light bordered col-md-7">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Links</span>
		</div>
	</div>
	<div class="portlet-body form">
		
			<div class="form-body">
				<label style="font-size: 16px;text-align: center;width: 100%;">Invite Your Friends on JobTip & Share Job Information</label>
				<div class="row">
					<div class="col-md-12" style="margin-bottom:15px;">
						<div class="portlet light col-md-12 clearfix" style="background-color: transparent;">
							<div class="row social" style="margin: 5px auto;display: table;">
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
						
						
					</div>	
					<div class="form-group col-md-10 col-sm-10 col-md-xs clearfix" style="margin-bottom:10px">	
							<!-- BEGIN FORM-->
							<form action="searchConnections" class="horizontal-form" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">				
								<!--  <span class="">
						            <a class="advance-search btn">Click for Advance Search</a>
						          </span> -->
						          	<div class="show-adsearch">
						          		<form id="search-profile" action="/search/profile" method="post">
					                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
					                      <div class="row-md-2"></div>
					                      <div class="row-md-6" style="margin-bottom: 20px;margin-top: 10px;">
					                        <div class="col-md-12 col-sm-12 col-xs-12 advance-len">
					                          <div class="input-group" style="margin:0 auto;">
					                            <div class="icheck-inline">
					                              <label>
					                              <input id="id_radio1" type="radio" checked name="type" value="people" class="">People</label>
					                              <label>
					                              <input id="id_radio2" type="radio" value="company" name="type" class="">Company</label>
					                            </div>
					                          </div>
					                        </div> 
					                      </div>
					                      <div class="row show-firm-type">
					                      	<div class="btn-group col-md-12 col-sm-12 col-xs-12" style="margin:10px;" data-toggle="buttons">
												<label class="btn btn-default color-button check-font-size active" >
												<input type="checkbox" name="firm_type[]" value="Company" class="toggle"> Company </label>
												<label class="btn btn-default color-button check-font-size">
												<input type="checkbox" name="firm_type[]" value="Consultancy" class="toggle"> Consultancy </label>
											</div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="name" class="form-control filter-input" placeholder="Enter Name or Email Id">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="city" class="form-control filter-input" placeholder="Location: Pune, Hyderabad">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="role" class="form-control filter-input" placeholder="Job Role">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="category" class="form-control filter-input" placeholder="Job Category">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row show-comp">
					                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="working_at" class="form-control filter-input" placeholder="Working at">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="mobile" class="form-control filter-input" placeholder="Mobile No">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row" style="margin-bottom: 10px;">
					                        <div class="col-md-12 col-sm-12 col-xs-12">
 					                          <div class="footer links-title center-css">              
					                              <button type="submit" class="btn blue "><i class="glyphicon glyphicon-search"></i> Search</button>
					                          		<a class="advance-search">
					                              	<button type="button" class="btn"><i class="glyphicon glyphicon-chevron-left"></i> Back</button>
					                         	  </a>
					                          </div> 
					                        </div>
					                        <!-- <div class="col-md-6 col-sm-6 col-xs-6">
 					                          <div class="footer links-title">              
					                            
					                              <a class="advance-search">
					                              	<button type="button" class="btn"><i class="glyphicon glyphicon-chevron-left"></i> Back</button>
					                         	  </a>
					                          </div> 
					                        </div> -->
					                      </div>
					                    </form>
						          </div>
								<div class="input-icon right normal_search">
									<i class="fa fa-search" style="color: darkcyan;"></i>
									<input type="text" name="keywords" id="search-input" onkeydown="down()" onkeyup="up()" class="form-control" placeholder="Search" style="border: 1px solid darkcyan;margin-bottom:0">
									<a class="advance-search btn" style="position: absolute;right: 30px;top: 5px;">Advance</a>
								</div>	
							</form>
							<!-- END FORM-->
							<div class="col-md-12 links-title" id="search-results" style="background:#f2f2f2;max-height:200px;overflow:auto;margin-bottom:10px">
							</div>	
						</div>

							
				</div>
					
			</div>
	</div>
</div>
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>Manage your Links
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab">
					Linked @if($linksCount > 0)({{ $linksCount }})@endif</a>
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab">
					Link Requests @if($linkrequestCount > 0)({{ $linkrequestCount }})@endif</a>
				</li>
				<li>
					<a href="#tab_5_3" class="label-new" data-toggle="tab">
					Following @if($followCount > 0)({{ $followCount }})@endif</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					@if(count(Auth::user()->induser->friends) > 0)								
					<ul class="media-list">
					@foreach(Auth::user()->induser->friends as $connection)
						@if($connection->pivot->status == 1)													
						  <li class="media ">
						  	
						    <div class="media-left col-md-2 col-sm-2 col-xs-2" style="padding:0">
						      <a href="#">
						        <img class="media-object" 
						        src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
						      alt="DP">
						      </a>
						    </div>
						    <div class="media-body col-md-4 col-sm-8 col-xs-8" style="padding:0;margin: 8px 14px; !important">
						    	<div class="media-body-left">
						    		 
								      <a href="/profile/ind/{{$connection->id}}" data-utype="ind">
								     {{ $connection->fname }} {{ $connection->lname }}</a><br>
								    
								      @if($connection->working_at != null && $connection->city != null)
								     	Working at {{ $connection->working_at }} in {{ $connection->city }}
								      @elseif($connection->working_at == null && $connection->city != null)
								      	{{ $connection->city }}
								      @endif		
						    	</div>
						    <!-- 	<div class="media-body-right">
						    		
						    	</div> -->
						     
						    </div>
							<div class="media-body col-md-4 col-sm-2 col-xs-2" style="padding:0;margin: 10px 0;">
								<form action="{{ url('/connections/destroy', $connection->pivot->id) }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger btn-responsive button-style-del">
											<i class="glyphicon glyphicon-trash icon-style-del"></i>
											</button>
										</form>	
							</div>
						  </li>
						@endif
					@endforeach
					</ul>
					@else
					<ul class="media-list">												
					  <li class="media">
					    <div class="media-lef">
					    </div>
					    <div class="media-body">
					    	<div class="media-body-left">
					    		 <h4 class="media-heading">
							      	<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have no Links
							      </h4>
					    	</div>
					    </div>
					  </li>
					</ul>
				@endif
				</div>
				<div class="tab-pane" id="tab_5_2">
					@if(count(Auth::user()->induser->friendOf) > 0)
						<ul class="media-list">
						@foreach(Auth::user()->induser->friendOf as $conreq)
							@if($conreq->pivot->status == 0)														
							  <li class="media">
							    <div class="media-left">
							      <a href="#">
							        <img class="media-object" src="@if($conreq->profile_pic != null){{ '/img/profile/'.$conreq->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:60px">
							      </a>
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
							    		 	 <a href="/profile/ind/{{$conreq->id}}" data-utype="ind">
							    		 	 	{{ $conreq->fname }} {{ $conreq->lname }}</a>
							    		 </h4>
									     {{ $conreq->working_at }}<br>
										 {{ $conreq->city }} {{ $conreq->state }}
							    	</div>
							    	
							    	<div class="media-body-right">
							    		<span class="input-group-btn btn-right">
											<form action="{{ url('/connections/response', $conreq->pivot->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" name="action" value="accept" class="btn btn-success button-style-add">
													<i class="fa fa-check icon-style-add"  style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Accept
												</button>
												<button type="submit" name="action" value="reject" class="btn btn-danger button-style-del">
													<i class="glyphicon glyphicon-trash icon-style-del" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Reject
												</button>
											</form>
										</span>
							    	</div>
								</div>														     
							  </li>
							  @else							
							  <li class="media">
							    <div class="media-lef">
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
									      	<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have no Link Requests
									      </h4>
							    	</div>
							    </div>
							  </li>
							@endif
						@endforeach		
						</ul>
													
					@endif	
				</div>
				<div class="tab-pane" id="tab_5_3">
						<ul class="media-list">
							@if(count($linkFollow) > 0)
							@foreach($linkFollow as $follow)	
							  <li class="media">
							    <div class="media-left">
							      <a href="#">
							        <img class="media-object" src="@if($follow->logo_status != null){{ '/img/profile/'.$follow->logo_status }}@else{{'/assets/images/ab.png'}}@endif" alt="DP" style="width:60px">
							      </a>
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
							    		 	<a href="/profile/corp/{{$follow->id}}" class="link-label" data-utype="corp">
							    		 		{{ $follow->firm_name }}
							    		 	</a>
							    		 	 <small>{{ $follow->firm_type }}</small>
							    		 </h4>
										<i class="fa fa-clock-o" style="color:darkslategray;font-size:16px;"></i>
										 {{ $follow->operating_since }}
										 <i class="fa fa-users" style="color:darkslategray;"></i>
										 {{ $follow->emp_count }}<br>
										 @if($followNewCount > 0)({{ $followNewCount }})@endif Followers
							    	</div>
							    	
							    	<div class="media-body-right">
							    		<span class="input-group-btn btn-right">
											<form action="{{ url('links/corporate/unfollow', $follow->id) }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" name="action" value="accept" class="btn btn-success button-style-add">
													<i class="icon-user-follow icon-style-add"  style="font-size:12px;color:white;padding-top: 3px;"></i>&nbsp;Unfollow
												</button>
											</form>
										</span>
							    	</div>
								</div>														     
							  </li>	
							  @endforeach
							   @else							
							  <li class="media">
							    <div class="media-lef">
							    </div>
							    <div class="media-body">
							    	<div class="media-body-left">
							    		 <h4 class="media-heading">
									      	<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have not Follow Anyone
									      </h4>
							    	</div>
							    </div>
							  </li>
							@endif									
						</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@elseif(Auth::user()->identifier == 2)
<div class="portlet light bordered col-md-7">
	<div class="portlet-title">
		<div class="caption links-title">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Followers</span>
		</div>
	</div>
	<div class="portlet-body form">
		<div class="form-body">
			<div class="row">
			</div>		
		</div>
	</div>
</div>
<div class="portlet box green col-md-7">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-users"></i>Manage your Followers
		</div>
	</div>
	<div class="portlet-body">
		<div class="tabbable-custom ">
			<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_4" class="label-new" data-toggle="tab">
					Followers @if(count($followers) > 0)({{ count($followers) }})@endif
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_4">
					<ul class="media-list">
						@if(count($followers) > 0)
						@foreach($followers as $follower)
																
						  <li class="media">
						    <div class="media-left">
						      <a href="#">
						        <img class="media-object" src="@if($follower->profile_pic != null){{ '/img/profile/'.$follower->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" alt="DP">
						      </a>
						    </div>
						    <div class="media-body">
						    	<div class="media-body-left"  style="margin: 4px 0;">
						    		 <h4 class="media-heading">
						    		 	<a href="/profile/ind/{{$follower->id}}" data-utype="ind">
						    		 	{{ $follower->fname }} {{ $follower->lname }}
						    		 	</a>
						    		 </h4>
									 {{ $follower->city }}, {{ $follower->state }}
						    	</div>						    	
							</div>														     
						  </li>				 
						@endforeach	
						@else	
						  	<li class="media">
						    <div class="media-left">
						     
						    </div>
						    <div class="media-body">
						    	<div class="media-body-left"  style="margin: 4px 0;">
						    		 <h4 class="media-heading">
						    		 	
						    		 	No Follower
						    		 	
						    		 </h4>
									 
						    	</div>						    	
							</div>														     
						  </li>			
						 @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endif									
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

<script type="text/javascript">
     $(document).ready(function () {
     	$('.show-firm-type').hide();
        $('#id_radio1').click(function () {
           $('.show-comp').show();
           $('.show-firm-type').hide();
    });
    $('#id_radio2').click(function () {
          $('.show-comp').hide();
          $('.show-firm-type').show();
     });
   });

    $(document).ready(function(){

    jQuery('.advance-search').on('click', function(event) {
	    jQuery('.show-adsearch').toggle('show');
	    jQuery('.normal_search').toggle('hide');
    });
});

</script>
@stop
@extends('master')

@section('content')
@if(Auth::user()->identifier == 1)
<div class="portlet light bordered col-md-7 col-xs-12 col-sm-8">
	<div class="portlet-title" style="min-height:0 !important;">
		<div class="caption links-title" style="float:none !important;margin:0 auto; display:table;line-height:0 !important;">
			<span class="caption-subject font-blue-hoki bold uppercase">Manage your Links</span>
		</div>
	</div>
	<div class="portlet-body form">
		
			<div class="form-body" style="padding:0;">
				<div class="normal_search">
					<label style="font-size: 16px;text-align: center;width: 100%;">Invite Your Friends on JobTip & Share Job Information</label>
				</div>
				<div class="row">
					<div class="col-md-12 normal_search" style="margin-bottom:15px;">
						<div class="portlet light col-md-12 clearfix" style="background-color: transparent;">
							<div class="row social" style="margin: 5px auto;display: table;">
								<div class="col-md-4 col-xs-4 ">
									<a  class="btn btn-lg btn-facebook btn-block share-media-icon" href="" style="background: #3b5998;color: white;border-radius: 25px !important;">
									<i class="fa fa-facebook "></i><span class="hidden-xs" style="font-size:14px"> &nbsp;Facebook</span></a>	
								</div>
								<div class="col-md-4 col-xs-4 ">
									  <a  class="btn btn-lg btn-google btn-block share-media-icon" href="" style="background: #c32f10;color: white;border-radius: 25px !important;">
									  <i class="fa fa-google-plus"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Google+</span></a>
								</div>
								<div class="col-md-4 col-xs-4 ">
									  <a class="btn btn-lg btn-linkedin btn-block share-media-icon" style="background: #00aced;color: white;border-radius: 25px !important;">
									  <i class="fa fa fa-linkedin"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Linkedin</span></a>
								</div>
							</div>
						</div>
					</div>	
					<div class="form-group col-md-12 col-sm-12 col-xs-12 clearfix" style="margin-bottom:10px">	
							<!-- BEGIN FORM-->
							<!-- <form action="searchConnections" class="horizontal-form" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">	 -->			
								<!--  <span class="">
						            <a class="advance-search btn">Click for Advance Search</a>
						          </span> -->
						          	<div class="show-adsearch">
						          		<form id="search-profile" action="/search/profile" method="post">
					                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
					                      <div class="row-md-2"></div>
					                      <div class="row-md-6" style="margin-bottom: 20px;margin-top: 10px;">
					                        <div class="col-md-12 col-sm-12 col-xs-12 advance-len" style="margin:10px 0;">
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
					                      <div class="row show-firm-type" style="margin: 0px auto; float: none; display: table;">
					                      	<div class="btn-group col-md-12 col-sm-12 col-xs-12" style="margin:10px;" data-toggle="buttons">
												<label class="btn btn-default color-button check-font-size active" >
												<input type="checkbox" name="firm_type[]" value="Company" class="toggle"> Company </label>
												<label class="btn btn-default color-button check-font-size">
												<input type="checkbox" name="firm_type[]" value="Consultancy" class="toggle"> Consultancy </label>
											</div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="name" class="form-control filter-input group" placeholder="Enter Name or Company name or Email Id">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="city" class="form-control filter-input" placeholder="Location: Pune, Hyderabad">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row">
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="role" class="form-control filter-input" placeholder="Job Role">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="category" class="form-control filter-input" placeholder="Job Category">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row show-comp">
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="working_at" class="form-control filter-input" placeholder="Working at">
					                          </div>  
					                        </div>
					                        <div class="col-md-6 col-sm-6 col-xs-12 advance-len">
					                          <div class="form-group">              
					                              <input type="text" name="mobile" class="form-control filter-input group" placeholder="Mobile No">
					                          </div>  
					                        </div>
					                      </div>
					                      <div class="row" style="margin-bottom: 10px;">
					                        <div class="col-md-12 col-sm-12 col-xs-12">
 					                          <div class="footer links-title center-css">              
					                              <button type="submit" class="btn blue "><i class="glyphicon glyphicon-search"></i> Search</button>
					                          		
					                          </div> 
					                          <div class="advance-search group-back-position">
				                              		<button type="button" class="btn" style="background-color:transparent;"><i class="glyphicon glyphicon-chevron-left"></i> Back</button>
					                          </div>
					                        </div>
					                        
					                      </div>
					                    </form>
						          </div>

							<!-- </form> -->
							<!-- <div class="col-md-1"></div> -->
								
						</div>

							
				</div>
					
			</div>
	</div>
</div>
<div class="row" style="margin:0 !important;">
	<div class="col-md-7" style="padding-left:0 !important;margin:10px 0;">
		<div class=" input-icon right normal_search">
			<i class="fa fa-search" style="color: darkcyan;right:80px;"></i>
			<input type="text" name="keywords" id="search-input" onkeydown="down()" onkeyup="up()" class="form-control" placeholder="Search Name or Email id" style="border: 1px solid darkcyan;margin:0 8px">
			<a class="advance-search btn search-advance-tool">Advance</a>
		</div>	
		<div class="col-md-12 links-title" id="search-results" style="background:#f2f2f2;max-height:200px;overflow:auto;margin:0 8px">
		</div>	
	</div>
</div>
<div class="portlet box green col-md-7 col-xs-12 col-sm-8">
	<div class="portlet-title" style="float:left;">
		
		<ul class="nav nav-tabs" style="padding-left: 0px;">
				<li class="active">
					<a href="#tab_5_1" class="label-new" data-toggle="tab" style="font-size: 12px !important;padding: 11px;">
					Linked 
					@if($linksCount > 0)
						<span class="badge" style="background-color: deepskyblue;">{{$linksCount}} </span>
					@endif</a>
					
				</li>
				<li>
					<a href="#tab_5_2" class="label-new" data-toggle="tab" style="font-size: 12px !important;padding: 11px;">
					Link Requests
					@if($linkrequestCount > 0)
						<span class="badge" style="background-color: lightcoral;">{{$linkrequestCount}} </span>
					@endif</a>
				</li>
				<li>
					<a href="#tab_5_3" class="label-new" data-toggle="tab" style="font-size: 12px !important;padding: 11px;">
					Following
					@if($followCount > 0)
						<span class="badge" style="background-color: dimgrey;">{{$followCount}} </span>
					@endif</a>
				</li>
			</ul>
	</div>
	<div class="portlet-body" style="padding:10px 0;">
		<div class="tabbable-custom ">
			
			<div class="tab-content">
				<div class="tab-pane active" id="tab_5_1">
					@if(count(Auth::user()->induser->friends) > 0)
					@foreach(Auth::user()->induser->friends as $connection)
						 @if($connection->pivot->status == 1)
					<div class="row search-user-tool" style="margin:0;">					
							<div class="col-md-2 col-sm-3 col-xs-3">
								<a href="#">
							        <img class="media-object img-circle" 
							        src="@if($connection->profile_pic != null){{ '/img/profile/'.$connection->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
							      	alt="DP" style="width:100%">
							     </a>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								 <a href="/profile/ind/{{$connection->id}}" data-utype="ind" style="font-size:15px;">
							     {{ $connection->fname }} {{ $connection->lname }}</a><br>
							    <small>
                                
						        @if($connection->working_status == "Student")
                                
                                     {{ $connection->education }} in {{ $connection->branch }}, {{ $connection->city }}
                                
                                @elseif($connection->working_status == "Searching Job")
                                
                                     {{ $connection->working_status }} in {{ $connection->prof_category }}, {{ $connection->city }}
                                
                                @elseif($connection->working_status == "Freelanching")
                                
                                     {{ $connection->role }} {{ $connection->working_status }}, {{ $connection->city }}
                                
                                @elseif($connection->role != null && $connection->working_at !=null && $connection->working_status == "Working")
                                
                                     {{ $connection->role }} @ {{ $connection->working_at }} 
                            
                                @elseif($connection->role != null && $connection->working_at ==null && $connection->working_status == "Working")
                                
                                     {{ $connection->role }}, {{ $connection->city }}
                                
                                @elseif($connection->role == null && $connection->working_at !=null && $connection->working_status == "Working")
                                
                                     {{ $connection->woring_at }}, {{ $connection->city }}
                                
                                @elseif($connection->role == null && $connection->working_at ==null && $connection->working_status == "Working")
                                
                                   {{ $connection->prof_category }}, {{ $connection->city }}
                               
                                @endif
							      </small>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-2" style="margin:7px 0">
								<form action="{{ url('/connections/destroy', $connection->pivot->id) }}" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-success btn-responsive apply-ignore-font" style="padding:2px 5px;">
									Linked
									</button>
								</form>	
							</div>
						 				    
					</div>
					@endif	
					 @endforeach
					@else
						<div class="row">
							<div class="col-md-12">
								<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have no Links
							</div>
						</div>
					@endif								
				</div>
				<div class="tab-pane" id="tab_5_2">
					@if($linkrequestCount > 0)
					@foreach(Auth::user()->induser->friendOf as $conreq)
					@if($conreq->pivot->status == 0)
					<div class="row" style="margin: 0px -35px 0px -9px;">	
						<div class="col-md-2 col-sm-3 col-xs-3">
							<a href="#">
						        <img class="media-object img-circle " 
						        src="@if($conreq->profile_pic != null){{ '/img/profile/'.$conreq->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
						      	alt="DP" style="width:100%">
						     </a>
						</div>
						<div class="col-md-5 col-sm-6 col-xs-6" style="    border-bottom: 1px dotted lightgrey;padding: 0px 7px 7px 2px;">
							 <a href="/profile/ind/{{$conreq->id}}" data-utype="ind" style="font-size:15px;">
						    		 	 	{{ $conreq->fname }} {{ $conreq->lname }}</a><br>
						    <small>
                            
					          @if($conreq->working_status == "Student")
                            
                                 {{ $conreq->education }} in {{ $conreq->branch }}, {{ $conreq->city }}
                            
                            @elseif($conreq->working_status == "Searching Job")
                            
                                 {{ $conreq->working_status }} in {{ $conreq->prof_category }}, {{ $conreq->city }}
                            
                            @elseif($conreq->working_status == "Freelanching")
                            
                                 {{ $conreq->role }} {{ $conreq->working_status }}, {{ $conreq->city }}
                            
                            @elseif($conreq->role != null && $conreq->working_at !=null && $conreq->working_status == "Working")
                            
                                 {{ $conreq->role }} @ {{ $conreq->working_at }} 
                        
                            @elseif($conreq->role != null && $conreq->working_at ==null && $conreq->working_status == "Working")
                            
                                 {{ $conreq->role }}, {{ $conreq->city }}
                            
                            @elseif($conreq->role == null && $conreq->working_at !=null && $conreq->working_status == "Working")
                            
                                 {{ $conreq->woring_at }}, {{ $conreq->city }}
                            
                            @elseif($conreq->role == null && $conreq->working_at ==null && $conreq->working_status == "Working")
                            
                               {{ $conreq->prof_category }}, {{ $conreq->city }}
                           
                            @endif
						      </small>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3" style="margin:4px 0">
							<form action="{{ url('/connections/response', $conreq->pivot->id) }}" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" name="action" value="accept" class="btn apply-ignore-font" style="padding: 0px 3px; background-color: white;">
									<i class="icon-check icon-check-css-new"></i>
								</button>
								<button type="submit" name="action" value="reject" class="btn apply-ignore-font" style="padding: 0px 3px; background-color: white;">
									<i class="icon-close icon-close-css"></i>
								</button>
							</form>
						</div>
					</div>
					@endif
					@endforeach
					@else
						<div class="row" style="margin: 0px -35px 0px -9px;">
							<div class="col-md-12">
								<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have no Link Request
							</div>
						</div>
					@endif				
				</div>
				<div class="tab-pane" id="tab_5_3">
					@if(count($linkFollow) > 0)
					@foreach($linkFollow as $follow)
					<div class="row search-user-tool" style="margin:0;">
								
							<div class="col-md-2 col-sm-2 col-xs-3">
								<a href="#">
							        <img class="media-object" style="width:100%" src="@if($follow->logo_status != null){{ '/img/profile/'.$follow->logo_status }}@else{{'/assets/images/corpnew.jpg'}}@endif" alt="DP" style="width:60px">
							    </a>
							</div>
							<div class="col-md-5 col-sm-6 col-xs-6">
								<a href="/profile/corp/{{$follow->id}}" class="link-label" data-utype="corp">
							    		 		{{ $follow->firm_name }}
							    		 	</a>
							    		 	 <small>{{ $follow->firm_type }}</small><br>

								
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3" style="margin:7px 0">
								<form action="{{ url('links/corporate/unfollow', $follow->id) }}" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" name="action" value="accept" class="btn btn-success apply-ignore-font" style="padding:2px 7px;" >
										Following
									</button>
								</form>
							</div>
					    
					</div>
					@endforeach
					@else
					<div class="row">
						<div class="col-md-12">
							<i class="fa fa-frown-o" style="font-size: 16px !important;"></i> You have not Follow anyone!
						</div>
					</div>
					@endif				
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
									@if($follower->emp_count != null)
									Employees ({{ $follower->emp_count }})@endif 
									@if($follower->followers > 0)Followers ({{ $follower->followers }})@endif 
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
<script src="{{ asset('/assets/ind_validation.js') }}"></script>
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

var timer;
function up(){
	timer=setTimeout(function(){
			var keywords = $('#search-input').val();
			if(keywords.length>2){
				$.post('/searchConnections', {keywords: keywords}, function(markup){
					$('#search-results').html(markup);
				});
			}else{
				$('#search-results').empty();
			}
		}, 500);
}

function down(){
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
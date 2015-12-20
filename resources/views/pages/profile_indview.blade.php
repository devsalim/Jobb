@extends('master')

@section('content')

	<div class="col-md-4">
		<!-- BEGIN PROFILE SIDEBAR -->
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet portlet-light-bar">
				<!-- SIDEBAR USERPIC -->
				@if($utype == 'ind')
				<div class="profile-userpic">
					<img  src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif">
				</div>
				@elseif($utype == 'corp')
				<div class="profile-userpic-corp">
					<img  src="@if($user->logo_status != null){{ '/img/profile/'.$user->logo_status }}@else{{'/assets/images/corpnew.jpg'}}@endif">
				</div>
				@endif
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle usertitle-profile" >
					<div class="profile-usertitle-name text-capitalize" style="font-size: 18px;font-weight: 600;color:#5a7391;">
						 {{ $user->fname }} {{ $user->lname }} {{ $user->firm_name }}
					</div>
					@if($user->working_status == "Student")
					<div class="profile-usertitle-job capitalize individual-detail">
						 {{ $user->education }} in {{ $user->branch }}, {{ $user->city }}
					</div>
					@elseif($user->working_status == "Searching Job")
					<div class="profile-usertitle-job capitalize individual-detail" >
						 {{ $user->working_status }} in {{ $user->prof_category }}, {{ $user->city }}
					</div>
					@elseif($user->working_status == "Freelanching")
					<div class="profile-usertitle-job capitalize individual-detail" >
						 {{ $user->role }} {{ $user->working_status }}, {{ $user->city }}
					</div>
					@elseif($user->role != null && $user->working_at !=null && $user->working_status == "Working")
					<div class="profile-usertitle-job capitalize individual-detail" >
						 {{ $user->role }} @ {{ $user->working_at }} 
					</div>
					@elseif($user->role != null && $user->working_at ==null && $user->working_status == "Working")
					<div class="profile-usertitle-job capitalize individual-detail">
						 {{ $user->role }}, {{ $user->city }}
					</div>
					@elseif($user->role == null && $user->working_at !=null && $user->working_status == "Working")
					<div class="profile-usertitle-job capitalize individual-detail" >
						 {{ $user->woring_at }}, {{ $user->city }}
					</div>
					@elseif($user->role == null && $user->working_at ==null && $user->working_status == "Working")
		            <div class="profile-usertitle-job capitalize individual-detail" >
		               {{ $user->prof_category }}, {{ $user->city }}
		            </div>
					@endif

					@if($user->operating_since != null && $user->operating_since != "Startup")
					<div class="profile-usertitle-job capitalize individual-detail">
						Established Since: {{ $user->operating_since }}  Years, {{ $user->emp_count }} Employee
					</div>
					@elseif($user->operating_since != null && $user->operating_since == "Startup")
					<div class="profile-usertitle-job capitalize individual-detail">
						Established Since: {{ $user->operating_since }}, {{ $user->emp_count }} Employee
					</div>
					@elseif($user->operating_since != null)
					--
					@endif

					<!-- Connection status -->
					@if($connectionStatus == 'friend' && Auth::user()->induser_id != $user->id)
						<a href="/links" class="btn btn-success btn-responsive btn-xs btn-small" style="padding:4px 10px;border-radius:15px !important;">
							<i class="fa fa-link (alias) icon-size"></i> Linked</a>
					@elseif($connectionStatus == 'pendingrequest')
						<a href="/links" class="btn btn-warning btn-responsive btn-xs" style="padding:4px 10px;border-radius:15px !important;">Pending link request</a>
						<form action="{{ url('/connections/response', $connectionId) }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" name="action" value="accept" class="btn btn-success btn-xs" style="padding:4px 10px;border-radius:15px !important;">
								<i class="fa fa-check" ></i>&nbsp;Accept
							</button>
							<button type="submit" name="action" value="reject" class="btn btn-danger btn-xs" style="padding:4px 10px;border-radius:15px !important;">
								<i class="glyphicon glyphicon-trash"></i>&nbsp;Ignore
							</button>
						</form>
					@elseif($connectionStatus == 'requestsent' && Auth::user()->induser_id != $user->id)
						<button class="btn btn-responsive link-request-label">
							<i class="icon-hourglass (alias) icon-size" style="color: chartreuse;"></i> Link requested</button>
						@elseif($connectionStatus == 'add' && Auth::user()->induser_id != $user->id)
						<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post" style="padding:4px 10px;border-radius:15px !important;">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="action" value="accept" class="btn btn-success btn-xs" style="padding:4px 10px;border-radius:15px !important;">
							<i class="fa fa-check" ></i>&nbsp;Add Links
						</button>
						</form>
					@elseif($connectionStatus == 'following')
						<a href="/links" class="btn btn-success btn-responsive btn-xs" style="padding:4px 10px;border-radius:15px !important;">
							<i class="icon-user-following icon-size" style="color: chartreuse;"></i> Following</a>
						<!-- <form action="{{ url('/corporate/unfollow', $connectionId) }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" name="action" value="accept" class="btn btn-danger btn-xs">
								<i class="icon-user-follow"></i>&nbsp;Unfollow
							</button>
						</form> -->
					@endif
					<!-- end Connection status -->

				</div>
				<!-- END SIDEBAR USER TITLE -->
				@if(Auth::user()->induser_id == $user->id)
				<div class="row list-separated profile-stat" style="text-align:center;margin: 13px 0 0px -17px;">
					@if($utype == 'ind')
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'connections'){{'active'}}@endif">
						<a href="/connections/create" class="icon-btn">
							<i class="icon-link"></i>
							<div>
								 Links
							</div>
							<span class="badge badge-danger @if($linksCount > 0) show @else hide @endif" style="background-color: #26a69a;">
							{{$linksCount}} </span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'notify_view'){{'active'}}@endif">
						<a href="/notify/thanks/ind/{{Auth::user()->induser_id}}" data-utype="thank" class="icon-btn">
							<i class="icon-like"></i>
							<div>
								 Thanks
							</div>
							<span class="badge badge-danger  @if($thanks > 0) show @else hide @endif" style="background-color: #3598dc;">
							{{$thanks}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'mypost'){{'active'}}@endif">
						<a href="/postbyuser/ind/{{Auth::user()->induser_id}}" class="icon-btn">
							<i class="icon-note"></i>
							<div>
								 Posts
							</div>
							<span class="badge badge-danger  @if($posts > 0) show @else hide @endif">
							{{$posts}} </span>
						</a>
					</div>
					@elseif($utype == 'corp')
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'connections'){{'active'}}@endif">
						<a href="/connections/friendlink/corp/{{$user->id}}" class="icon-btn">
							<i class="icon-user-following"></i>
							<div>
								 Followers
							</div>
							<span class="badge badge-danger @if($followCount > 0) show @else hide @endif" style="background-color: #26a69a;">
							{{$followCount}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'notify_view'){{'active'}}@endif">
						<a href="/notify/thanks/corp/{{Auth::user()->induser_id}}" data-utype="thank" class="icon-btn">
							<i class="icon-like"></i>
							<div>
								 Thanks
							</div>
							<span class="badge badge-danger  @if($thanks > 0) show @else hide @endif" style="background-color: #3598dc;">
							{{$thanks}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'mypost'){{'active'}}@endif">
						<a href="/postbyuser/corp/{{Auth::user()->induser_id}}" class="icon-btn">
							<i class="icon-note"></i>
							<div>
								 Posts
							</div>
							<span class="badge badge-danger  @if($posts > 0) show @else hide @endif">
							{{$posts}} </span>
						</a>
					</div>
					@endif
					
				</div>
				@else
				<div class="row list-separated profile-stat" style="text-align:center;margin: 13px 0 0px -17px;">
					@if($utype == 'ind')
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'friendLink'){{'active'}}@endif">
						<a href="/connections/friendlink/ind/{{$user->id}}" class="icon-btn">
							<i class="fa fa-link (alias)" ></i>
							<div>
								 Links
							</div>
							<span class="badge badge-danger @if($linksCount > 0) show @else hide @endif" style="background-color: #26a69a;">
							{{$linksCount}} </span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'thanks_view'){{'active'}}@endif">
						<a href="/notify/thanks/ind/{{$user->id}}" class="icon-btn">
							<i class="icon-like"></i>
							<div>
								 Thanks
							</div>
							<span class="badge badge-danger  @if($thanks > 0) show @else hide @endif" style="background-color: #3598dc;">
							{{$thanks}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'mypost'){{'active'}}@endif">
						<a href="/postbyuser/ind/{{$user->id}}" class="icon-btn">
							<i class="icon-note"></i>
							<div>
								 Posts
							</div>
							<span class="badge badge-danger  @if($posts > 0) show @else hide @endif">
							{{$posts}} </span>
						</a>
					</div>
					@elseif($utype == 'corp')
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'friendLink'){{'active'}}@endif">
						<a href="/connections/friendlink/corp/{{$user->id}}" class="icon-btn">
							<i class="icon-user-following"></i>
							<div>
								 Followers
							</div>
							<span class="badge badge-danger @if($followCount > 0) show @else hide @endif" style="background-color: #26a69a;">
							{{$followCount}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'thanks_view'){{'active'}}@endif">
						<a href="/notify/thanks/corp/{{$user->id}}" class="icon-btn">
							<i class="icon-like"></i>
							<div>
								 Thanks
							</div>
							<span class="badge badge-danger  @if($thanks > 0) show @else hide @endif" style="background-color: #3598dc;">
							{{$thanks}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'mypost'){{'active'}}@endif">
						<a href="/postbyuser/corp/{{$user->id}}" class="icon-btn">
							<i class="icon-note"></i>
							<div>
								 Posts
							</div>
							<span class="badge badge-danger  @if($posts > 0) show @else hide @endif">
							{{$posts}} </span>
						</a>
					</div>
					@endif
					
				</div>
				@endif
				<!-- END SIDEBAR BUTTONS -->
				
			</div>
			<!-- END PORTLET MAIN -->
		</div>
		<!-- END BEGIN PROFILE SIDEBAR -->
		<!-- END PROFILE CONTENT -->
	</div>

	<!-- PORTLET MAIN -->
	@if($utype == 'ind' && $user->about_individual != null)
<div class="portlet light bordered col-md-8" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important;margin-top: 30px; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-note font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Profile Summary</span>
			<!-- <span class="caption-helper"></span> -->
		</div>
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="individual/create" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="portlet light">
					<div>
						<p class="form-control-static view-page">
						{{ $user->about_individual}}
						</p>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@elseif($utype == 'corp' && $user->about_firm != null)
<div class="portlet light bordered col-md-8" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important;margin-top: 30px; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-note font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">About Firm</span>
			<!-- <span class="caption-helper"></span> -->
		</div>
		@if(Auth::user()->corpuser_id == $user->id)
		<div class="tools @if($title == 'corpprofile_edit'){{'active'}}@endif">
			<a href="/corporate/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="individual/create" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="portlet light">
					<div>
						<p class="form-control-static view-page">
							{{ $user->about_firm}}
						</p>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@endif
<!-- END PORTLET MAIN -->

@if($utype == 'ind')
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-badge font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Professional Details</span>
		</div>
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
			<div class="form-body">
				<div class="row">
					@if($user->education != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Education:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->education != null && $user->branch != null)
									{{ $user->education }} in {{ $user->branch }} 
									@elseif($user->education == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->education != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Education:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->education != null && $user->branch != null)
									{{ $user->education }} in {{ $user->branch }} 
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->education == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->experience != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Experience:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->experience != null && $user->experience != 0)
									{{ $user->experience }} Years
									@elseif($user->experience == 0 )
									{{ $user->experience }} Year
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->experience != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Experience:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->experience != null && $user->experience != 0)
									{{ $user->experience }} Years
									@elseif($user->experience == 0 )
									{{ $user->experience }} Year
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->experience == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					@if($user->working_status != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Working Status:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->working_status != null)
									{{ $user->working_status }}
									@elseif($user->working_status == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->working_status != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Working Status:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->working_status != null)
									{{ $user->working_status }}
									@elseif($user->working_status == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->working_status == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->working_at != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Working At:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->working_at != null)
									{{ $user->working_at }}
									@elseif($user->working_at == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->working_at != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Working At:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->working_at != null)
									{{ $user->working_at }}
									@elseif($user->working_at == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->working_at == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->	
				</div>
				<!--/row-->
				<div class="row">
					@if($user->prof_category != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Category:</label>							
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->prof_category != null)
									{{ $user->prof_category }}
									@elseif($user->prof_category == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prof_category != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Category:</label>							
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->prof_category != null)
									{{ $user->prof_category }}
									@elseif($user->prof_category == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prof_category == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->role != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Role:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->role != null)
									{{ $user->role }}
									@else
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->role != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Role:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->role != null)
									{{ $user->role }}
									@else
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->role == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->	
				</div>
				<!--/row-->
				<div class="row">
					@if($user->resume != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Resume:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->resume != null)
									 <a href="javascript:;" class="btn btn-xs blue" style="height: 20px;"><i class="icon-eye"></i>&nbsp;View </a>
									 @else
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->resume != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Resume:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->resume != null)
									 <a href="javascript:;" class="btn btn-xs blue" style="height: 20px;"><i class="icon-eye"></i>&nbsp;View </a>
									 @else
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->role == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->linked_skill != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Key Skills:</label>
							<div class="col-md-8 col-xs-6">
								<p class="form-control-static view-page">
									
									@if($user->linked_skill != null)
									{{ $user->linked_skill }}
									@elseif($user->linked_skill == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->linked_skill != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Key Skills:</label>
							<div class="col-md-8 col-xs-6">
								<p class="form-control-static view-page">
									
									@if($user->linked_skill != null)
									{{ $user->linked_skill }}
									@elseif($user->linked_skill == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->linked_skill == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		<!-- END FORM-->
	</div>
</div>
@elseif($utype == 'corp')
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-badge font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Firm Details</span>
		</div>
		@if(Auth::user()->corpuser_id == $user->id)
		<div class="tools @if($title == 'corpprofile_edit'){{'active'}}@endif">
			<a href="/corporate/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
			<div class="form-body">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Firm Name:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->firm_name }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					@if($user->slogan != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Slogan:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->slogan }}
								</p>
							</div>
						</div>
					</div>
					@elseif($user->slogan != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Slogan:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->slogan }}
								</p>
							</div>
						</div>
					</div>
					@elseif($user->slogan == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Firm Type:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->firm_type }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					@if($user->operating_since != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Operating Since:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->operating_since != null && $user->operating_since != "Startup")
									{{ $user->operating_since }} Years
									@elseif($user->operating_since == "Startup")
									{{ $user->operating_since }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->operating_since != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Operating Since:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->operating_since != null && $user->operating_since != "Startup")
									{{ $user->operating_since }} Years
									@elseif($user->operating_since == "Startup")
									{{ $user->operating_since }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->operating_since == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					@if($user->industry != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Industry:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->industry != null)
									 {{ $user->industry }}
									@elseif($user->industry != null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->industry != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Industry:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->industry != null)
									 {{ $user->industry }}
									@elseif($user->industry != null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->industry == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->emp_count != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">No of Employee:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->emp_count != null)
									 {{ $user->emp_count }} Employees
									@elseif($user->emp_count == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->emp_count != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">No of Employee:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->emp_count != null)
									 {{ $user->emp_count }} Employees
									@elseif($user->emp_count == null)
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->emp_count == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<div class="row">
					@if($user->linked_skill != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Work Area:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->linked_skill != null)
									 {{ $user->linked_skill }}
									 @elseif($user->linked_skill == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->linked_skill != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Work Area:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->linked_skill != null)
									 {{ $user->linked_skill }}
									 @elseif($user->linked_skill == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->linked_skill == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->website_url != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Website:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->website_url != null)
									 {{ $user->website_url }}
									 @elseif($user->website_url == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->website_url != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Website:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->website_url != null)
									 {{ $user->website_url }}
									 @elseif($user->website_url == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->website_url == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		<!-- END FORM-->
	</div>
</div>
@endif
@if($utype == 'ind')
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-notebook font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Contact Details</span>
			<span class="caption-helper"></span>
		</div>
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="individual/create" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row" style="margin:0 -35px;">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4" style="font-size:13px;">Email Id:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									{{ $user->email }} 
									@if($user->email_verify == 0)
									<a>
										<i class="fa fa-exclamation-circle" 
										style="color: #cb5a5e;"></i>
									</a>
									@elseif($user->email_verify == 1)
										<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;"></i>
									@endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Mobile:</label>
							<div class="col-md-6 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									{{ $user->mobile }} 
									@if($user->mobile_verify == 0)
									<a>
										<i class="fa fa-exclamation-circle" 
										style="color: #cb5a5e;font-size: 16px;"></i>
									</a>
									@elseif($user->mobile_verify == 1)
										<i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
									@endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<div class="row" style="margin:0 -35px;">
					@if($user->dob != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Date of Birth:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->dob != null)
									{{$user->dob }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->dob != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Date of Birth:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->dob != null)
									{{$user->dob }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->dob == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->gender != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Gender:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->gender != null)
									{{ $user->gender }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->gender != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Gender:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->gender != null)
									{{ $user->gender }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->gender == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<div class="row" style="margin:0 -35px;">
					@if($user->city != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">City:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->city != null)
									{{ $user->city }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->city != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">City:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->city != null)
									{{ $user->city }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->city == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->state != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">State:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->state != null)
									{{ $user->state }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->state != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">State:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->state != null)
									{{ $user->state }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->state == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row" style="margin:0 -35px;">
					@if($user->prefered_location != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Prefered Location:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->prefered_location != null)
									{{ $user->prefered_location }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prefered_location != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Prefered Location:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->prefered_location != null)
									{{ $user->prefered_location }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prefered_location == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->prefered_jobtype != null && Auth::user()->induser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-4">Job Type:</label>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<p class="form-control-static view-page">
									@if($user->prefered_jobtype != null)
									{{ $user->prefered_jobtype }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prefered_jobtype != null && Auth::user()->induser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4  col-xs-4">Job Type:</label>
							<div class="col-md-8  col-xs-8">
								<p class="form-control-static view-page">
									@if($user->prefered_jobtype != null)
									{{ $user->prefered_jobtype }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->prefered_jobtype == null && Auth::user()->induser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@elseif($utype == 'corp')
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-notebook font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Contact Details</span>
			<span class="caption-helper"></span>
		</div>
		@if(Auth::user()->corpuser_id == $user->id)
		<div class="tools @if($title == 'corpprofile_edit'){{'active'}}@endif">
			<a href="/corporate/edit" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@endif
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="individual/create" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					@if($user->firm_address != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Address:</label>
							<div class="col-md-8 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->firm_address != null)
									 {{ $user->firm_address }}
									 @elseif($user->firm_address == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->firm_address != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Address:</label>
							<div class="col-md-8 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->firm_address != null)
									 {{ $user->firm_address }}
									 @elseif($user->firm_address == null)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->firm_address == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">	
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					@if($user->city != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">City:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if($user->city != null)
									{{ $user->city }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->city != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">City:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if($user->city != null)
									{{ $user->city }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->city == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
					@if($user->state != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">State:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if($user->state != null)
									{{ $user->state }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->state != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">State:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if($user->state != null)
									{{ $user->state }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->state == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					@if($user->username != null && $user->working_as != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Profile Handler Name:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">	
									@if($user->username != null && $user->working_as != null)

									I am {{ $user->username }} working as {{ $user->working_as }}

									@elseif($user->username != null && $user->working_as == null)

									{{ $user->username }}

									@elseif($user->username == null && $user->working_as != null)

									I am {{ $user->working_as }}

									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->username != null && $user->working_as != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Profile Handler Name:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">	
									@if($user->username != null && $user->working_as != null)

									I am {{ $user->username }} working as {{ $user->working_as }}

									@elseif($user->username != null && $user->working_as == null)

									{{ $user->username }}

									@elseif($user->username == null && $user->working_as != null)

									I am {{ $user->working_as }}

									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					@elseif($user->username == null && $user->working_as == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<div class="col-md-6 col-sm-6 col-xs-12">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Email Id:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">
									{{ $user->firm_email_id }} <i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					@if($user->firm_phone != null && Auth::user()->corpuser_id == $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Mobile:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->firm_phone }} <i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i>
								</p>
							</div>
						</div>
					</div>
					@elseif($user->firm_phone != null && Auth::user()->corpuser_id != $user->id)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Mobile:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									 {{ $user->firm_phone }} <i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i>
								</p>
							</div>
						</div>
					</div>
					@elseif($user->firm_phone == null && Auth::user()->corpuser_id != $user->id)
					@endif
					<!--/span-->
				</div>

			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@endif
@stop

@javascript
<script src="/assets/admin/pages/scripts/profile.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features\
Profile.init(); // init page demo
});
</script>
@stop
@extends('master')

@section('content')

	<div class="col-md-4">
		<!-- BEGIN PROFILE SIDEBAR -->
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet portlet-light-bar">
				<!-- SIDEBAR USERPIC -->
				@if(Auth::user()->identifier == 1)
				<div class="profile-userpic">
					<img  src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif">
				</div>
				@else
				<div class="profile-userpic-corp">
					<img  src="@if($user->logo_status != null){{ '/img/profile/'.$user->logo_status }}@else{{'/assets/images/corp.png'}}@endif">
				</div>
				@endif
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle usertitle-profile" >
					<div class="profile-usertitle-name" style="font-size: 18px;font-weight: 600;">
						 {{ $user->fname }} {{ $user->lname }} {{ $user->firm_name }}
					</div>
					@if($user->role != null && $user->working_at !=null)
					<div class="profile-usertitle-job" style="font-size: 15px;font-weight: 500;">
						 {{ $user->role }} @ {{ $user->working_at }} 
					</div>
					@endif

					@if($user->operating_since != null)
					<div class="profile-usertitle-job" style="font-size: 15px;font-weight: 500;">
						Since: {{ $user->operating_since }} Years, {{ $user->emp_count }} Employee
					</div>
					@endif

					<!-- Connection status -->
					@if($connectionStatus == 'friend')
						<a href="/links" class="btn btn-success btn-responsive btn-xs">Friend</a>
					@elseif($connectionStatus == 'pendingrequest')
						<a href="/links" class="btn btn-warning btn-responsive btn-xs">Pending link request</a>
					@elseif($connectionStatus == 'requestsent')
						<a href="/links" class="btn btn-danger btn-responsive btn-xs">Link request sent</a>
					@elseif($connectionStatus == 'following')
						<a href="/links" class="btn btn-success btn-responsive btn-xs">Following</a>
					@endif
					<!-- end Connection status -->

				</div>
				<!-- END SIDEBAR USER TITLE -->
				<div class="row list-separated profile-stat" style="text-align:center;margin: 13px 0 0px -17px;">
					@if(Auth::user()->identifier == 1)
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
					@endif
					@if(Auth::user()->identifier == 2)
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'connections'){{'active'}}@endif">
						<a href="/connections/create" class="icon-btn">
							<i class="icon-user-following"></i>
							<div>
								 Following
							</div>
							<!-- <span class="badge badge-danger" style="background-color: #26a69a;">
							</span> -->
						</a>
					</div>
					@endif
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'thanks_view'){{'active'}}@endif">
						<a href="/individual/thanks_view" class="icon-btn">
							<i class="icon-like"></i>
							<div>
								 Thanks
							</div>
							<span class="badge badge-danger  @if($thanks > 0) show @else hide @endif" style="background-color: #3598dc;">
							{{$thanks}}</span>
						</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4 @if($title == 'mypost'){{'active'}}@endif">
						<a href="/mypost" class="icon-btn">
							<i class="icon-note"></i>
							<div>
								 Posts
							</div>
							<span class="badge badge-danger  @if($posts > 0) show @else hide @endif">
							{{$posts}} </span>
						</a>
					</div>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				
			</div>
			<!-- END PORTLET MAIN -->
		</div>
		<!-- END BEGIN PROFILE SIDEBAR -->
		<!-- END PROFILE CONTENT -->
	</div>
	<!-- PORTLET MAIN -->
<div class="portlet light bordered col-md-8" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important;margin-top: 30px; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-note font-green-haze"></i>
			@if(Auth::user()->identifier == 1)
			<span class="caption-subject font-green-haze bold uppercase">Profile Summary</span>
			@else
			<span class="caption-subject font-green-haze bold uppercase">About Firm</span>
			@endif
			<!-- <span class="caption-helper"></span> -->
		</div>
		@if(Auth::user()->induser_id == $user->id && Auth::user()->identifier == 1)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@elseif(Auth::user()->corpuser_id == $user->id && Auth::user()->identifier == 2)
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
						{{ $user->about_individual}} {{ $user->about_firm}}
						</p>
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

			<!-- END PORTLET MAIN -->
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-badge font-green-haze"></i>
			@if(Auth::user()->identifier == 1)
			<span class="caption-subject font-green-haze bold uppercase">Professional Details</span>
			@else
			<span class="caption-subject font-green-haze bold uppercase">Firm Details</span>
			@endif
		</div>
		@if(Auth::user()->induser_id == $user->id && Auth::user()->identifier == 1)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@elseif(Auth::user()->corpuser_id == $user->id && Auth::user()->identifier == 2)
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
							@if(Auth::user()->identifier == 1)
							<label class="control-label col-md-4 col-xs-6">Education:</label>
							@else
							<label class="control-label col-md-4 col-xs-6">Industry:</label>
							@endif
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->education != null && Auth::user()->identifier == 1)
									{{ $user->education }} in {{ $user->branch }}
									@elseif($user->education == null && Auth::user()->identifier == 1)
									--
									@endif
									@if($user->industry != null && Auth::user()->identifier == 2)
									 {{ $user->industry }}
									 @elseif($user->industry == null && Auth::user()->identifier == 2)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							@if(Auth::user()->identifier == 1)
							<label class="control-label col-md-4 col-xs-6">Experience:</label>
							@else
							<label class="control-label col-md-4 col-xs-6">Operating Since:</label>
							@endif
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->experience != null && Auth::user()->identifier == 1)
									{{ $user->experience }} Years
									@elseif($user->experience == null && Auth::user()->identifier == 1)
									--
									@endif
									@if($user->operating_since != null && Auth::user()->identifier == 2)
									 {{ $user->operating_since }} Years
									 @elseif($user->operating_since == null && Auth::user()->identifier == 2)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							@if(Auth::user()->identifier == 1)
							<label class="control-label col-md-4 col-xs-6">Working At:</label>
							@else
							<label class="control-label col-md-4 col-xs-6">Work Area:</label>
							@endif
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->working_at != null && Auth::user()->identifier == 1)
									{{ $user->working_at }}
									@elseif($user->working_at == null && Auth::user()->identifier == 1)
									--
									@endif
									@if($user->linked_skill != null && Auth::user()->identifier == 2)
									 {{ $user->linked_skill }}
									 @elseif($user->linked_skill == null && Auth::user()->identifier == 2)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							@if(Auth::user()->identifier == 1)
							<label class="control-label col-md-4 col-xs-6">Job Category:</label>
							@else
							<label class="control-label col-md-4 col-xs-6">Website:</label>
							@endif
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->prof_category != null && Auth::user()->identifier == 1)
									{{ $user->prof_category }}
									@elseif($user->prof_category == null && Auth::user()->identifier == 1)
									--
									@endif
									@if($user->website_url != null && Auth::user()->identifier == 2)
									 {{ $user->website_url }}
									 @elseif($user->website_url == null && Auth::user()->identifier == 2)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				@if(Auth::user()->identifier == 1)
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Role:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									{{ $user->role }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
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
					<!--/span-->
				</div>
				<!--/row-->
				@endif
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="form-group">
							@if(Auth::user()->identifier == 1)
							<label class="control-label col-md-4 col-xs-6">Key Skills:</label>
							@else
							<label class="control-label col-md-4 col-xs-6">Address:</label>
							@endif
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									
									@if($user->linked_skill != null && Auth::user()->identifier == 1)
									{{ $user->linked_skill }}
									@elseif($user->linked_skill == null && Auth::user()->identifier == 1)
									--
									@endif
									@if($user->firm_address != null && Auth::user()->identifier == 2)
									 {{ $user->firm_address }}
									 @elseif($user->firm_address == null && Auth::user()->identifier == 2)
									 --
									 @endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		<!-- END FORM-->
	</div>
</div>
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-notebook font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Contact Details</span>
			<span class="caption-helper"></span>
		</div>
		@if(Auth::user()->induser_id == $user->id && Auth::user()->identifier == 1)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
			<i class="fa fa-edit"></i> Edit 
			</a>
		</div>
		@elseif(Auth::user()->corpuser_id == $user->id && Auth::user()->identifier == 2)
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
				@if(Auth::user()->identifier == 2)
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
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Profile Holder Name:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">
									I am {{ $user->username }} working as {{ $user->working_as }}
								</p>
							</div>
						</div>
					</div>
				</div>
				@endif
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Email Id:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">
									{{ $user->email }} {{ $user->firm_email_id }} <i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Mobile:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									{{ $user->mobile }} {{ $user->firm_phone }} <i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i>
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">City:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if(Auth::user()->identifier == 1)
									{{ $user->city }}
									@else
									{{ $user->city }}
									@endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">State:</label>
							<div class="col-md-6 col-xs-12">
								<p class="form-control-static view-page">
									@if(Auth::user()->identifier == 1)
									{{ $user->state }}
									@else
									{{ $user->state }}
									@endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>

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
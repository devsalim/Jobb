@extends('master')

@section('content')

	<div class="col-md-4">
		<!-- BEGIN PROFILE SIDEBAR -->
		<div class="profile-sidebar">
			<!-- PORTLET MAIN -->
			<div class="portlet light profile-sidebar-portlet portlet-light-bar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img  src="@if($user->profile_pic != null){{ '/img/profile/'.$user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle usertitle-profile" >
					<div class="profile-usertitle-name" style="font-size: 18px;font-weight: 600;">
						 {{ $user->fname }} {{ $user->lname }}
					</div>
					@if($user->role != null && $user->working_at !=null)
					<div class="profile-usertitle-job" style="font-size: 15px;font-weight: 500;">
						 {{ $user->role }} @ {{ $user->working_at }}
					</div>
					@endif
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<div class="row list-separated profile-stat" style="text-align:center;margin: 13px 0 0px -17px;">
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
			<span class="caption-subject font-green-haze bold uppercase">Profile Summary</span>
			<span class="caption-helper"></span>
		</div>
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
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

			<!-- END PORTLET MAIN -->
<div class="portlet light bordered col-md-12" style="border:1px solid #e1e1e1 !important;border-radius: 5px !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-badge font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Professional Details</span>
			<span class="caption-helper"></span>
		</div>
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
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
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Education:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page text-capitalize">
									@if($user->education != null)
									{{ $user->education }} in {{ $user->branch }}
									@else
									--
									@endif
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Experience:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									@if($user->experience != null)
									 {{ $user->experience }} Years
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
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Working At:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									{{ $user->working_at }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Job Category:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									{{ $user->prof_category }}
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
				
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-6">Key Skills:</label>
							<div class="col-md-6 col-xs-6">
								<p class="form-control-static view-page">
									{{ $user->linked_skill }}
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
		</form>
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
		@if(Auth::user()->induser_id == $user->id)
		<div class="tools @if($title == 'indprofile_edit'){{'active'}}@endif">
			<a href="/individual/edit_view" class="btn btn-xs blue" style="height: 20px;">
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
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label class="control-label col-md-4 col-xs-12">Email Id:</label>
							<div class="col-md-8 col-xs-12">
								<p class="form-control-static view-page">
									{{ $user->email }} <i class="glyphicon glyphicon-ok-circle" style="color: #1EC71E;font-size: 16px;"></i>
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
									{{ $user->mobile }} <i class="fa fa-exclamation-circle" style="color: #cb5a5e;font-size: 16px;"></i>
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
									{{ $user->city }}
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
									{{ $user->state }}
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
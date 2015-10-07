@extends('master')

@section('content')

<div class="portlet light bordered" style="border:1px solid grey !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-equalizer font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Profile</span>
			<span class="caption-helper"></span>
		</div>
		<div class="tools">
			<a href="" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
			<a href="" class="reload">
			</a>
			<a href="" class="remove">
			</a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<h2 class="margin-bottom-10">{{ $user->fname }} {{ $user->lname }} </h2>
				<h3 class="form-section">Personal Info</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">First Name:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->fname }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Last Name:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->lname }} 
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Mobile No:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->mobile }} 
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Email Id:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									 {{ $user->email }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green"><i class="fa fa-pencil"></i> Edit</button>
								<button type="button" class="btn default">Cancel</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>


<div class="portlet light bordered" style="border:1px solid grey !important; ">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-equalizer font-green-haze"></i>
			<span class="caption-subject font-green-haze bold uppercase">Professional Details</span>
			<span class="caption-helper"></span>
		</div>
		<div class="tools">
			<a href="" class="collapse">
			</a>
			<a href="#portlet-config" data-toggle="modal" class="config">
			</a>
			<a href="" class="reload">
			</a>
			<a href="" class="remove">
			</a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="individual/create" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Education:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->education }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Branch:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->branch }} 
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Job Category:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->prof_category }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Working At:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->working_at }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Job Role:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->role }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Experience:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									 {{ $user->experience }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">City:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->city }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">State:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->state }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Key Skills:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									{{ $user->linked_skill }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-4">Resume:</label>
							<div class="col-md-8">
								<p class="form-control-static view-page">
									 {{ $user->resume }}
								</p>
							</div>
						</div>
					</div>
					<!--/span-->
				</div>
				<!--/row-->
			</div>
			<div class="form-actions">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
								<button type="submit" class="btn green"><i class="fa fa-pencil"></i> Edit</button>
								<button type="button" class="btn default">Cancel</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
@stop
@extends('admin')

@section('content')

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
	Dashboard <small>reports & statistics</small>
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="#">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="/home">Dashboard</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->

	<!-- BEGIN DASHBOARD STATS -->
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-comments"></i>
				</div>
				<div class="details">
					<div class="number">
						 {{$feedbackCount}}
					</div>
					<div class="desc">
						 New Feedbacks
					</div>
				</div>
				<a class="more" href="/feedback">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat red-intense">
				<div class="visual">
					<i class="fa fa-bar-chart-o"></i>
				</div>
				<div class="details">
					<div class="number">
						 {{$reportAbuseCount}}
					</div>
					<div class="desc">
						 Report Abuse
					</div>
				</div>
				<a class="more" href="/report-abuse">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat green-haze">
				<div class="visual">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<div class="details">
					<div class="number">
						 549
					</div>
					<div class="desc">
						 New Orders
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat purple-plum">
				<div class="visual">
					<i class="fa fa-globe"></i>
				</div>
				<div class="details">
					<div class="number">
						 +89%
					</div>
					<div class="desc">
						 Brand Popularity
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>-->
	</div>
	<!-- END DASHBOARD STATS -->
	<div class="clearfix">
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="portlet box purple">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-bullhorn"></i>Feedback
					</div>
					<div class="tools">
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="javascript:;" class="reload">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div id="pie_chart_9" class="chart">
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="clearfix">
	</div>
				
@stop

@section('javascript')
@stop
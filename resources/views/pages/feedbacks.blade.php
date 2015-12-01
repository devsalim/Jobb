@extends('admin')

@section('content')

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
	Feedbacks <small>reports & statistics</small>
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="/home">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="/report-abuse">Feedbacks</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-9 col-sm-9">
			<ul class="feeds">
				@foreach($feedbacks as $feed)
				<li>
					<div class="col1">
						<div class="cont">
							<div class="cont-col1">
								<div class="label label-sm label-danger">
									<i class="fa fa-bullhorn"></i>
								</div>
							</div>
							<div class="cont-col2">
								<div class="desc">
									<b>{{$feed->user->fname}}</b> has rated  
									<b>{{$feed->experience}}</b> for his experience with Jobtip &amp; find it  
									<b>{{$feed->usability}}</b> to use. 
									<button class="btn label label-sm label-warning tooltips" data-container="body" 
											data-placement="top" data-original-title="{{$feed->comments}}">
										comment
									</button>									
								</div>
							</div>
						</div>
					</div>
					<div class="col2">
						<div class="date">
							 {{ \Carbon\Carbon::createFromTimeStamp(strtotime($feed->created_at))->diffForHumans() }}
						</div>
					</div>
				</li>
				@endforeach
			</ul>		
		</div>
	</div>
		
	<div class="clearfix">
	</div>
	
@stop

@section('javascript')
@stop
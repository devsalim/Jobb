@extends('admin')

@section('content')

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
	Report Abuse <small>reports & statistics</small>
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="/home">Home</a>
				<i class="fa fa-angle-right"></i>
			</li>
			<li>
				<a href="/report-abuse">Report Abuse</a>
			</li>
		</ul>
		
	</div>
	<!-- END PAGE HEADER-->
	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-7 col-sm-7">
			<ul class="feeds">
				@foreach($reportAbuses as $ra)
				<li>
					<div class="col1">
						<div class="cont">
							<div class="cont-col1">
								<div class="label label-sm label-danger">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="cont-col2">
								<div class="desc">
									<b>{{$ra->user->fname}}</b> has reported 
									<b>{{$ra->reported_for}}</b> on post id 
									<b>{{$ra->post_id}}</b> 
									posted by <b>{{$ra->postuser->induser->fname}}</b>
								</div>
							</div>
						</div>
					</div>
					<div class="col2">
						<div class="date">
							 {{ \Carbon\Carbon::createFromTimeStamp(strtotime($ra->created_at))->diffForHumans() }}
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
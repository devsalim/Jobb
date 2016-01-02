@extends('admin')

@section('content')

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
	Feedbacks <small>reports & statistics</small>
	</h3>
	<!-- END PAGE HEADER-->

	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box grey-cascade">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>Feedback Table
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-toolbar">
						<div class="row">
							<div class="col-md-12">
								<div class="btn-group pull-right">
									<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
									</button>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Print </a>
										</li>
										<li>
											<a href="javascript:;">
											Save as PDF </a>
										</li>
										<li>
											<a href="javascript:;">
											Export to Excel </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
					<tr>
						<th class="table-checkbox">
							<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
						</th>
						<th>
							 Date
						</th>
						<th>
							 Name
						</th>
						<th>
							 User Type
						</th>
						<th>
							 Rating
						</th>
						<th>
							 Usability
						</th>
						<th style="width:35%;">
							 Comments
						</th>
						<th>
							 IP Address
						</th>
					</tr>
					</thead>
					@foreach($feedbacks as $feed)
					<tbody>
					<tr class="odd gradeX">
						<td>
							<input type="checkbox" class="checkboxes" value="1"/>
						</td>
						<td>
							 {{ \Carbon\Carbon::createFromTimeStamp(strtotime($feed->created_at))->diffForHumans() }}
						</td>
						<td>
							@if($feed->user->induser != null)
							{{$feed->user->induser->fname}}
							@elseif($feed->user->corpuser != null)
							{{$feed->user->corpuser->firm_name}}
							@endif
						</td>
						<td>
							 @if($feed->user->induser != null)
							 Individual
							 @elseif($feed->user->corpuser != null)
							 {{$feed->user->corpuser->firm_type}}
							 @endif
						</td>
						<td class="center">
							 {{$feed->experience}}
						</td>
						<td>
							@if($feed->usability == 'Easy')
							<span class="label label-sm label-success">
							{{$feed->usability}} </span>
							@elseif($feed->usability == 'Okay')
							<span class="label label-sm label-warning">
							{{$feed->usability}} </span>
							@elseif($feed->usability == 'Hard')
							<span class="label label-sm label-danger">
							{{$feed->usability}} </span>
							@endif
						</td>
						<td>
							{{$feed->comments}} 
						</td>
						<td>
							
						</td>
					</tr>
					</tbody>
					@endforeach
					</table>
					
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
	<div class="row" style="margin: 15px -15px;">
		<div class="col-md-12 col-sm-12">
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
									
									<b>@if($feed->user->induser != null)
										{{$feed->user->induser->fname}}
										@elseif($feed->user->corpuser != null)
										{{$feed->user->corpuser->firm_name}}
										@endif
									</b> has rated  
									<b>{{$feed->experience}}</b> for his experience with Jobtip &amp; find it  
									<b>{{$feed->usability}}</b> to use
									as commented "{{$feed->comments}}"									
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
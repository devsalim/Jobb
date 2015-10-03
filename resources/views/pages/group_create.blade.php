@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Create Group</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-7" style="">
						<!-- BEGIN FORM-->
						<form action="{{ url('/group/store') }}" class="horizontal-form" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="input-group">
										<div class="input-icon">
											<i class="fa fa-lock fa-fw"></i>
											<input id="" class="form-control" type="text" name="group_name" placeholder="Create Group"/>
										</div>
										<span class="input-group-btn">
											<button id="" class="btn btn-success" type="submit" style=" margin-right: 15px;"><i class="fa fa-arrow-left fa-fw"/></i>Create</button>
											<a href="{{url('/group/')}}" id="" class="btn default" type="button">Cancel</a>
										</span>
									</div>
								</div>
						</form>
						<!-- END FORM-->					

						<div class="row">
							<div class="col-md-12" style="">
								<h4>List of members</h4><br/>
								<ul class="media-list">
								@foreach($users as $user)							
									  <li class="media">
									    <div class="media-left">
									      <a href="#">
									        <img class="media-object" src="/img/profile/{{ $user->profile_pic }}" alt="..." style="width:60px;padding: 3px;border: 1px solid #ddd;">
									      </a>
									    </div>
									    <div class="media-body" style="font-weight:300">
									    <div class="media-body-left">
									      <h4 class="media-heading" style="margin-bottom:0;font-weight:300;margin-bottom:0">
									      	{{ $user->fname }} {{ $user->lname }}
										      @if($user->id == $user->admin_id)
										      	<span class="btn btn-xs btn-warning" style="border-radius:25px !important;margin:0 10px">
										      		Admin
										      	</span>
										      @endif
									      </h4>
									     {{ $user->working_at }}<br>
										 {{ $user->city }}, {{ $user->state }}
										 </div>
										 <div class="media-body-right">
										 	<span class="input-group-btn btn-right">
											<form action="{{ url('/group/deleteuser') }}" method="post">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="id" value="{{$user->id}}">
												<input type="hidden" name="groupid" value="{{$user->group_id}}">
												<button type="submit" class="btn btn-danger">
												<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
												</button>
											</form>								
										</span>								 	
										 </div>
									    </div>
									  </li>								
								@endforeach
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		
	</div>
</div>

@stop
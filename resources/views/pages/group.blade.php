@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Groups</span>
		</div>
		<a href="{{ url('/group/create') }}">
			<span class="btn btn-info btn-sm" style="margin: 5px 20px;border-radius: 25px !important;">Create Group</span>
		</a>
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
					<!--<form action="{{ url('/group/store') }}" class="horizontal-form" method="post">
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
					</form>-->
					<!-- END FORM-->

						<div class="form-group">					
							<div class="input-icon right">
								<i class="fa fa-search" style="color: darkcyan;"></i>
								<input type="text" class="form-control input-circle" placeholder="Search" style="border: 1px solid darkcyan;">
							</div>
						</div>
						@if(count($groups)>0)
						@foreach($groups as $group)
						<div class="form-group form-md-line-input">
							<div class="input-group">
								<div class="input-group-control">
									<label class="col-md-6 control-label" for="form_control_1" >
										<a href="/group/{{ $group->id }}">{{ $group->group_name }}</a><br/>
										<span style="font-size:12px;font-weight:normal">Members: {{count($group->users)}}</span>
									</label>
								</div>
								<span class="input-group-btn btn-right">
									<form action="{{ url('/group/destroy', $group->id) }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-danger">
										<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
										</button>
									</form>
								</span>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		
	</div>
</div>

@stop
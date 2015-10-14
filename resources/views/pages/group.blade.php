@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<!-- <div class="caption">
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

		</div> -->
		<a id="ajax-demo" href="#creat-group" data-toggle="modal" class="config" style="text-decoration: none;">
			<i class="icon-plus" style="font-size:22px;color: salmon;"></i> 
		</a> 
		<label style="font-size: 16px;">Create New Group</label>

	</div>
	<div class="portlet-body form">
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-7" style="">

					<!-- BEGIN FORM-->

					<!-- <form action="{{ url('/group/store') }}" class="horizontal-form" method="post">

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
						@else
						<div class="col-md-12">					
									<h3>Networking</h3>
									<ul class="media-list">
																						
										  <li class="media">
										    <div class="media-left">
										      <a href="#">
										        <img class="media-object" 
										        src="" 
										      alt="DP" style="width:60px">
										      </a>
										    </div>
										    <div class="media-body">
										    	<div class="media-body-left">
										    		 <h4 class="media-heading">
												      	Networking
												      </h4>
												     Friends (10 links)	<br> 

														
										    	</div>
										    	<div class="media-body-right">
										    		<span class="input-group-btn btn-right">
														<form action="" method="post">
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<button type="submit" class="btn btn-danger">
															<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
															</button>
															<button type="submit" class="btn btn-danger">
															<i class="glyphicon glyphicon-trash" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>
															</button>
														</form>													
													</span>
										    	</div>
										     
										    </div>
										  </li>
										
									</ul>
								</div>
						@endif
					</div>
				</div>
			</div>
		
	</div>
</div>

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="creat-group" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="{{ url('/group/store') }}" class="horizontal-form" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">New Group</h4>
      </div>
      <div class="modal-body">
      <div class="form-group">
          <div class="input-group">
          <span class="input-group-addon">
          <i class="icon-call-end" style="color:darkcyan;"></i>
          </span>
          <input type="text" name="group_name" class="form-control" placeholder="Create Group">
          </div>
        </div>
      {!! Form::select('users[]', $connections, null, ['id'=>'connections', 'class'=>'form-control select2', 'multiple']) !!}
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Create</button>
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
@stop

@section('javascript')

<script>
	$('#connections').select2();
</script>
@stop
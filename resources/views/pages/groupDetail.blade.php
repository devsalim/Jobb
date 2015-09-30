@extends('master')

@section('content')

<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Group: {{$group->group_name}}</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form" style="width: 50%;">
		<!-- BEGIN FORM-->
		<form action="{{ url('group/adduser') }}" method="post" class="horizontal-form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Add members</label>
							<input type="hidden" name="id" value="{{$group->id}}" />
							{!! Form::select('users[]', $connections, null, ['id'=>'connections', 'class'=>'form-control', 'multiple']) !!}
						</div>
						<button type="submit" class="btn blue"><i class="fa fa-check"></i> Add</button>
					</div>
				</div>
			</div>
			
		</form>
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-8" style="">
						<h4>List of members</h4><br/>
						@foreach($group->users as $user)
							<div class="form-group form-md-line-input" style="margin-left: -11px;">
								<div class="input-group">
									<div class="input-group-control">
										<label class="col-md-6 control-label" for="form_control_1" >{{$user->fname}}</label>
									</div>

									<span class="input-group-btn btn-right">
										<form action="{{ url('/group/deleteuser') }}" method="post">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="id" value="{{$user->pivot->id}}">
											<input type="hidden" name="groupid" value="{{$group->id}}">
											<button type="submit" class="btn green-haze">
											<i class="fa fa-check" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Remove
											</button>
										</form>								
									</span>
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
			</div>
		
	</div>
</div>

@stop


@section('javascript')
<script>
	jQuery(document).ready(function() { 
	    ComponentsIonSliders.init();
	    ComponentsDropdowns.init();
	    ComponentsEditors.init();
	});   
</script>
<script type="text/javascript">
    $('#connections').select2();
</script>
@stop

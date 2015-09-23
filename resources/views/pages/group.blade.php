<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Create New Group</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form" style="width: 70%;">
		
			<div class="form-body">
				<div class="row">
					<div class="col-md-8" style="">
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
									<button id="" class="btn default" type="button">Cancel</button>
								</span>
							</div>
						</div>
		</form>
		<!-- END FORM-->
						<div class="form-group">					
							<div class="input-icon right">
								<i class="fa fa-search" style="color: darkcyan;"></i>
								<input type="text" class="form-control input-circle" placeholder="Search" style="border: 1px solid darkcyan;">
							</div>
						</div>
						@if(count($groups)>0)
						@foreach($groups as $group)					
						<div class="form-group form-md-line-input" style="margin-left: -11px;">
							<div class="input-group">
								<div class="input-group-control">
									<label class="col-md-6 control-label" for="form_control_1" >{{ $group->group_name }}</label>
								</div>
								<span class="input-group-btn btn-right">
									<form action="{{ url('/group/destroy', $group->id) }}" method="post">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn green-haze">
										<i class="fa fa-check" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Remove
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
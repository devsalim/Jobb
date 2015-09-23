@foreach($users as $user)
<!-- BEGIN FORM-->
<form action="{{ url('/connections/inviteFriend', $user->id) }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group form-md-line-input" style="margin-left: -11px;">
		<div class="input-group">
			<div class="input-group-control">
				<label class="col-md-6 control-label" for="form_control_1" >{{ $user->fname }} {{ $user->lname }}</label>
			</div>
			<span class="input-group-btn btn-right">
				<button type="submit" class="btn green-haze" >
				<i class="fa fa-check" style="font-size: 12px;background-color: white;color: black;border-radius: 10px;width: 20px;height: 20px;padding-top: 3px;"></i>&nbsp;Add 
				</button>
			</span>
		</div>
	</div>
</form>
<br>
@endforeach

@if($linked == 'no' && $utype == 'ind')
<!-- New Link -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> New Links
	</h4>
</div>
<div class="modal-body">
	 Do you want to add him as your new link?
</div>
<div class="modal-footer">		
	<form action="{{ url('/connections/newLink', $puid) }}" method="post">				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">	
		<button type="submit" class="btn btn-sm blue">Yes</button>
		<button type="button" class="btn btn-sm default" data-dismiss="modal">No</button>
	</form>															
</div>
@elseif($linked == 'yes' && $utype == 'ind')
<!-- Remove Link -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> New Links
	</h4>
</div>
<div class="modal-body">
	 Do you want to remove him from your link?
</div>
<div class="modal-footer">		
	<form action="{{ url('/connections/removeLink', $puid) }}" method="post">				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">	
		<button type="submit" class="btn btn-sm blue">Yes</button>
		<button type="button" class="btn btn-sm default" data-dismiss="modal">No</button>
	</form>															
</div>
@elseif($linked == 'no' && $utype == 'corp')
<!-- Follow -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> Follow
	</h4>
</div>
<div class="modal-body">
	 Do you want to Follow?
</div>
<div class="modal-footer">		
	<form action="{{ url('/corporate/follow', $puid) }}" method="post">				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">	
		<button type="submit" class="btn btn-sm blue">Yes</button>
		<button type="button" class="btn btn-sm default" data-dismiss="modal">No</button>
	</form>															
</div>
@elseif($linked == 'yes' && $utype == 'corp')
<!-- UnFollow -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> UnFollow
	</h4>
</div>
<div class="modal-body">
	 Do you want to unfollow?
</div>
<div class="modal-footer">		
	<form action="{{ url('/corporate/unfollow', $puid) }}" method="post">				
		<input type="hidden" name="_token" value="{{ csrf_token() }}">	
		<button type="submit" class="btn btn-sm blue">Yes</button>
		<button type="button" class="btn btn-sm default" data-dismiss="modal">No</button>
	</form>															
</div>
@endif
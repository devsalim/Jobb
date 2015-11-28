@if($linked == 'no' && $utype == 'ind' && $status == 'unknown')
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
@elseif($linked == 'no' && $utype == 'ind' && $status == 'received')
<!-- Remove Link -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> New Links 
	</h4>
</div>
<div class="modal-body">
	 Link request received from this user. 
</div>
<div class="modal-footer">		
		<a href="/links" class="btn btn-sm blue">Go to Links</a>
		<a class="btn btn-sm default" data-dismiss="modal">Close</a>
	</form>															
</div>
@elseif($linked == 'no' && $utype == 'ind' && $status == 'sent')
<!-- Remove Link -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h4 class="modal-title">
		<i class="fa fa-link" style="font-size: 16px;color: firebrick;"></i> New Links 
	</h4>
</div>
<div class="modal-body">
	 You have already sent link request to this user. 
</div>
<div class="modal-footer">		
	<button type="button" class="btn btn-sm default" data-dismiss="modal">Close</button>
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
		<i class="icon-user-follow" style="font-size: 16px;color: firebrick;"></i> Follow
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
		<i class="icon-user-unfollow" style="font-size: 16px;color: firebrick;"></i> UnFollow
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
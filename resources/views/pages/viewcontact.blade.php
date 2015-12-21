<div class="modal-body modal-body-new">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
<div class="row" style="border-bottom:1px dotted lightgrey;margin:10px 0">
	@if($pa->user->induser->email != null)
	<div class="col-md-6 hide-contact show-hide-contact">
		<label style="font-size:13px;font-weight:500;">Email Id: {{ $pa->user->induser->email }}</label>
	</div>
	@endif
	@if($pa->user->induser->mobile != null)
	<div class="col-md-6 hide-contact show-hide-contact">
		<label style="font-size:13px;font-weight:500;">Phone No: {{ $pa->user->induser->mobile }}</label>
	</div>
	@endif
</div>
</div>
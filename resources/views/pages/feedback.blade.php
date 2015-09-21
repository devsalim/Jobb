<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Profile Detail</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form action="{{ url('/individual/basicupdate') }}" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="" style=""></div>
					<div class="col-md-8" style="">
						<div class="btn-group" data-toggle="buttons">
						  <label class="btn btn-primary active">
						    <input type="radio" name="options" id="option1" autocomplete="off"> 1 
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="options" id="option2" autocomplete="off"> 2
						  </label>
						  <label class="btn btn-primary">
						    <input type="radio" name="options" id="option3" autocomplete="off"> 3
						  </label>
						   <label class="btn btn-primary">
						    <input type="radio" name="options" id="option3" autocomplete="off"> 4
						  </label>
						   <label class="btn btn-primary">
						    <input type="radio" name="options" id="option3" autocomplete="off"> 5 <i class="icon-emoticon-smile"></i>
						  </label>
						</div>
						<div class="clearfix">
							<h4 class="block">Tell us about your experience with us</h4>
							<div class="btn-toolbar margin-bottom-10">
								<div class="btn-group" data-placement="left">
									<button type="button" data-toggle="tooltip" data-placement="bottom" title="Very Bad"   class=" btn btn-default">1</button>
									<button type="button" data-toggle="tooltip" data-placement="bottom"  title="Bad" class=" btn btn-default">2</button>
									<button type="button" data-toggle="tooltip" data-placement="bottom" title="Ok" class=" btn btn-default">3</button>
									<button type="button" data-toggle="tooltip" data-placement="bottom" title="Good" class=" btn btn-default">4</button>
									<button type="button" data-toggle="tooltip" data-placement="bottom" title="Excellent" class=" btn btn-default">5&nbsp;<i class="icon-emoticon-smile"></i></button>
								</div>
							</div>
							<div class="clearfix">
								<h4 class="block">Using Jobtip is...</h4>
								<div class="btn-toolbar margin-bottom-10">
									<div class="btn-group ">
										<button type="button" class=" btn btn-circlenew btn-default">Hard</button>
									</div>
									<div class="btn-group ">
										<button type="button" class="btn btn-circlenew1 btn-default">Okay</button>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-circlenew2 btn-default">Easy</button>
									</div>
								</div>
							</div>							
							<h4 class="block">Anything else, you wanted to share with us</h4>
							<textarea class="form-control autosizeme" rows="3" placeholder="Comments..."></textarea>
						</div>
					</div>
				</div>
				<div class="form-actions ">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>
					<button type="button" class="btn default">Cancel</button>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>


<script>
	$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
	});
</script>
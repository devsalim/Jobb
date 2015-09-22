<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class=""></i>
			<span class="caption-subject font-blue-hoki bold uppercase">Invite Friends</span>
		</div>
		<div class="tools">
			<a href="" class="collapse"></a>
			<a href="#portlet-config" data-toggle="modal" class="config"></a>
			<a href="" class="reload"></a>
			<a href="" class="remove"></a>
		</div>
	</div>
	<div class="portlet-body form" style="width: 70%;">
		<!-- BEGIN FORM-->
		<form action="searchConnections" class="horizontal-form" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-body">
				<div class="row">
					<div class="col-md-8" style="">
						<div class="portlet light" style="background-color: transparent;">
							<div class="row social">
								<div class="col-md-4 col-xs-4 " style="padding-right:2px;">
									<a  class="btn btn-lg btn-facebook btn-block" href="" style="background: #3b5998;color: white;border-radius: 25px !important;height: 35px;">
									<i class="fa fa-facebook "></i><span class="hidden-xs" style="font-size:14px"> &nbsp;Facebook</span></a>	
								</div>
								<div class="col-md-4 col-xs-4 " style="padding-left:2px;padding-right:2px;">
									  <a  class="btn btn-lg btn-google btn-block" href="" style="background: #c32f10;color: white;border-radius: 25px !important;height: 35px;">
									  <i class="fa fa-google-plus"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Google+</span></a>
								</div>
								<div class="col-md-4 col-xs-4 " style="padding-left:2px;">
									  <a class="btn btn-lg btn-linkedin btn-block" style="background: #00aced;color: white;border-radius: 25px !important;height: 35px;">
									  <i class="fa fa fa-linkedin"></i><span class="hidden-xs"style="font-size:14px"> &nbsp;Linkedin</span></a>
								</div>
							</div>
						</div>
						<div class="form-group">					
							<div class="input-icon right">
								<i class="fa fa-search" style="color: darkcyan;"></i>
								<input type="text" name="keywords" id="search-input" onkeydown="down()" onkeyup="up()" class="form-control input-circle" placeholder="Search" style="border: 1px solid darkcyan;">
							</div>	
						</div>
						<div class="col-md-12" id="search-results">
						</div>			
					</div>
				</div>
			</div>
		</form>
		<!-- END FORM-->
	</div>
</div>
									
<script type="text/javascript">
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
});

var timer;

function up()
{
	timer=setTimeout(function()
		{
			var keywords = $('#search-input').val();
			if(keywords.length>0)
			{
				$.post('http://jobtip.dev/searchConnections', {keywords: keywords}, function(markup)
				{
					$('#search-results').html(markup);
				});
			}
		}, 500);
}

function down()
{
	clearTimeout(timer);
}
</script>
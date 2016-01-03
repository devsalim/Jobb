@extends('master')

@section('css')
<style type="text/css">
.nav-tabs > li > a, .nav-pills > li > a {font-size: 14px;}
.search-classic h4 {margin-bottom: 3px;}
</style>
@stop

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title" style="margin:15px;">

{{$title}} <small>results</small>
</h3>
<!-- END PAGE HEADER-->

<?php $activeTab = '1' ?>
@if(count($searchResultForInd) > 0)
<?php $activeTab = '1' ?>
@elseif(count($searchResultForCorp) > 0 && count($searchResultForCorp) > count($searchResultForInd))
<?php $activeTab = '2' ?>
@elseif(count($searchResultForJob) > 0 && count($searchResultForJob) > count($searchResultForCorp))
<?php $activeTab = '3' ?>
@elseif(count($searchResultForSkill) > 0 && count($searchResultForSkill) > count($searchResultForJob))
<?php $activeTab = '4' ?>
@endif

<div class="row search-form-default" style="margin:15px;">

	<div class="col-md-6">
		<form class="search-form" action="/search/" method="GET">
			<div class="input-group" style="margin: 0 0 15px 0;">
				<div class="input-cont">
					<input type="text" class="form-control" placeholder="Search..." value="{{$searchQuery}}" 
							name="query" pattern=".{3,}" required title="3 characters minimum"
	                 		autocomplete="off">
				</div>
				<span class="input-group-btn">
				<button type="submit" class="btn green-haze">
				Search &nbsp; <i class="m-icon-swapright m-icon-white"></i>
				</button>
				</span>
			</div>
		</form>
	</div>
</div>

<div class="tabbable-line" style="margin:7px;">

	<ul class="nav nav-tabs " style="padding:0">
		<li>
			<a href="#tab_ind" data-toggle="tab">Individual</a>
		</li>
		<li>
			<a href="#tab_corp" data-toggle="tab">Corporate</a>
		</li>
		<li>
			<a href="#tab_job" data-toggle="tab">Job</a>
		</li>
		<li>
			<a href="#tab_skill" data-toggle="tab">Skill</a>
		</li>
	</ul>
	<div class="tab-content">

		<div class="tab-pane active" id="tab_ind">
			<div class="search-classic">
				<p>About {{count($searchResultForInd)}} results for "{{$searchQuery}}"</p>		
				@foreach($searchResultForInd as $ind)
				<div class="row search-user-tool" style="margin:0;">
				<div class="col-md-7">					
						<div class="col-md-2 col-sm-3 col-xs-3">
							<a href="#">
						        <img class="media-object img-circle" 
						        src="@if($ind->profile_pic != null){{ '/img/profile/'.$ind->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" 
						      	alt="DP" style="width:70%">
						     </a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6">
							 <a href="/profile/ind/{{$ind->id}}" data-utype="ind" style="font-size:15px;">
						     {{ $ind->fname }} {{ $ind->lname }}</a><br>
						    <small>
                            
					        @if($ind->working_status == "Student")
                            
                                 {{ $ind->education }} in {{ $ind->branch }}, {{ $ind->city }}
                            
                            @elseif($ind->working_status == "Searching Job")
                            
                                 {{ $ind->working_status }} in {{ $ind->prof_category }}, {{ $ind->city }}
                            
                            @elseif($ind->working_status == "Freelanching")
                            
                                 {{ $ind->role }} {{ $ind->working_status }}, {{ $ind->city }}
                            
                            @elseif($ind->role != null && $ind->working_at !=null && $ind->working_status == "Working")
                            
                                 {{ $ind->role }} @ {{ $ind->working_at }} 
                        
                            @elseif($ind->role != null && $ind->working_at ==null && $ind->working_status == "Working")
                            
                                 {{ $ind->role }}, {{ $ind->city }}
                            
                            @elseif($ind->role == null && $ind->working_at !=null && $ind->working_status == "Working")
                            
                                 {{ $ind->woring_at }}, {{ $ind->city }}
                            
                            @elseif($ind->role == null && $ind->working_at ==null && $ind->working_status == "Working")
                            
                               {{ $ind->prof_category }}, {{ $ind->city }}
                           
                            @endif
						      </small>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-3" style="margin:7px 0">
								<form action="" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" name="action" value="accept" class="btn btn-success apply-ignore-font" style="padding:2px 7px;" >
										Add Link
									</button>
								</form>
							</div>	    
					</div>
				</div>
				@endforeach

				<?php echo $searchResultForInd->fragment('tab_tab_ind')->render(); ?>

			</div>

		</div>
		<div class="tab-pane" id="tab_corp">
			<div class="search-classic">
				<p>About {{count($searchResultForCorp)}} results for "{{$searchQuery}}"</p>

				@foreach($searchResultForCorp as $corp)
				<div class="row search-user-tool" style="margin:0;">
						<div class="col-md-7">		
							<div class="col-md-2 col-sm-2 col-xs-3">
								<a href="#">
							        <img class="media-object" style="width:100%" src="@if($corp->logo_status != null){{ '/img/profile/'.$corp->logo_status }}@else{{'/assets/images/corpnew.jpg'}}@endif" alt="DP" style="width:60px">
							    </a>
							</div>
							<div class="col-md-5 col-sm-6 col-xs-6">
								<a href="/profile/corp/{{$corp->id}}" class="link-label" data-utype="corp">
							    		 		{{ $corp->firm_name }}
							    		 	</a>
							    		 	 <small>{{ $corp->firm_type }}</small><br>

								
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3" style="margin:7px 0">
								<form action="{{ url('links/corporate/uncorp', $corp->id) }}" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" name="action" value="accept" class="btn btn-success apply-ignore-font" style="padding:2px 7px;" >
										Follow
									</button>
								</form>
							</div>
					   </div> 
					</div>
				@endforeach

				<?php echo $searchResultForCorp->fragment('tab_tab_corp')->render(); ?>
			</div>
		</div>
		<div class="tab-pane" id="tab_job">
			<div class="search-classic">
				<p>About {{count($searchResultForJob)}} results for "{{$searchQuery}}"</p>

				@foreach($searchResultForJob as $job)
				<h4>
					<a href="javascript:;">{{$job->post_title}}</a>
				</h4>
				<p>
					Metronic is a responsive admin dashboard template powered with Twitter Bootstrap Framework for admin and backend applications. Metronic has a clean and intuitive metro style design which makes your next project look awesome and yet user friendly..
				</p>
				@endforeach

				<?php echo $searchResultForJob->fragment('tab_tab_job')->render(); ?>
			</div>

		</div>
		<div class="tab-pane" id="tab_skill">
			<div class="search-classic">
				<p>About {{count($searchResultForSkill)}} results for "{{$searchQuery}}"</p>

				@foreach($searchResultForSkill as $skill)
				<h4>
					<a href="javascript:;">{{$skill->post_title}}</a>
				</h4>
				<p>
					Metronic is a responsive admin dashboard template powered with Twitter Bootstrap Framework for admin and backend applications. Metronic has a clean and intuitive metro style design which makes your next project look awesome and yet user friendly..
				</p>
				@endforeach

				<?php echo $searchResultForSkill->fragment('tab_tab_skill')->render(); ?>
			</div>

		</div>
	</div>
</div>

@stop

@section('javascript')
<script type="text/javascript">
	if (location.hash !== '') {
    	$('.nav-tabs a[href="' + location.hash.replace('tab_','') + '"]').tab('show');
	} else {
	    $('.nav-tabs li:nth-child({{$activeTab}}) a').tab('show');
	}

	$('.nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
	      window.location.hash = 'tab_'+  e.target.hash.substr(1) ; 
	      return false;
	});
</script>
@stop


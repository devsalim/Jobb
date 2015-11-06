@extends('master')

@section('content')

<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-purple-studio"></i>
			@if($utype == 'fav')
			<span class="caption-subject bold font-purple-studio uppercase">
			Favourite </span>
			@elseif($utype == 'app')
			<span class="caption-subject bold font-purple-studio uppercase">
			Applied </span>
			@elseif($utype == 'thank')
			<span class="caption-subject bold font-purple-studio uppercase">
			Thanks </span>
			@endif
		</div>
		<ul class="pagination pagination-circle">
			<li>
				<a href="javascript:;">
				<i class="fa fa-angle-left"></i>
				</a>
			</li>
			<li>
				<a href="javascript:;">
				1 </a>
			</li>
			<li>
				<a href="javascript:;">
				2 </a>
			</li>
			<li>
				<a href="javascript:;">
				3 </a>
			</li>
			<li>
				<a href="javascript:;">
				<i class="fa fa-angle-right"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="portlet-body">
		<div class="" >
			<h4></h4>
			<p>
				@if($utype == 'app')
				<ul class="" data-handle-color="#637283">
                  @foreach($applications as $application)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($application->user->profile_pic != null){{ '/img/profile/'.$application->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$application->user->fname}} </span>
                    <span class="time">{{$application->apply_dtTime}}</span>
                    </span>
                    <span class="message">
                    has applied your Job Post Id: {{$application->unique_id}} </span>
                    </a>
                  </li>
                 @endforeach
                </ul>
                @elseif($utype == 'thank')
                <ul class="" data-handle-color="#637283">
                  @foreach($thanks as $thank)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($thank->user->profile_pic != null){{ '/img/profile/'.$thank->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$thank->user->fname}} </span>
                    <span class="time">{{$thank->thanks_dtTime}}</span>
                    </span>
                    <span class="message">
                    has thanked your Job Post Id: {{$thank->unique_id}} </span>
                    </a>
                  </li>
                 @endforeach
                </ul>
				@elseif($utype == 'fav')
				<ul class="" data-handle-color="#637283">
                  @foreach($favourites as $favourite)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($favourite->user->profile_pic != null){{ '/img/profile/'.$favourite->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$favourite->user->fname}} </span>
                    <span class="time">{{$favourite->fav_post_dtTime}}</span>
                    </span>
                    <span class="message">
                    has favourite  the Post Id: {{$favourite->post_id}} </span>
                    </a>
                  </li>
                 @endforeach
                </ul>
                @endif
			</p>
		</div>
	</div>
</div>


@stop
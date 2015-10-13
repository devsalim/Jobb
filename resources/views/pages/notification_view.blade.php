@extends('master')

@section('content')

<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-settings font-purple-studio"></i>
			<span class="caption-subject bold font-purple-studio uppercase">
			Notification </span>
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
		<div class="scroller" style="height:200px">
			<h4></h4>
			<p>
				<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  @foreach($applications as $application)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($application->user->profile_pic != null){{ '/img/profile/'.$application->user->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" class="img-circle" width="40" height="40">
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$application->user->fname}} </span>
                    <span class="time">{{$application->apply_dtTime}}</span>
                    </span>
                    <span class="message">
                    has applied your Job Post Id: {{$application->post_id}} </span>
                    </a>
                  </li>
                 @endforeach
                </ul>
				 Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. consectetur purus sit amet fermentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
			</p>
		</div>
	</div>
</div>


@stop
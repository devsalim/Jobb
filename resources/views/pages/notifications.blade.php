@extends('master')

@section('content')

<div class="portlet light bg-inverse">
	<div class="portlet-title">
		<div class="caption">
			<i class="icon-like "></i>
			 <span class="caption-subject  uppercase"> {{$title}} Recieved</span>
		</div>
	</div>
	<div class="portlet-body">
		@if($title == 'notification')
            @foreach($notificationList as $not)  
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            @if($not->fromuser->first()->induser != null)                          
                              <img src="@if($not->fromuser->first()->induser->profile_pic != null){{ '/img/profile/'.$not->fromuser->first()->induser->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">        
                            @elseif($not->fromuser->first()->corpuser != null)                             
                              <img src="@if($not->fromuser->first()->corpuser->logo_status != null){{ '/img/profile/'.$not->fromuser->first()->corpuser->logo_status }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                            @endif
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-8">
                            {{$not->fromuser->first()->name}} {{$not->remark}} -
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($not->created_at))->diffForHumans() }}
                        </div>
                    </div>
                </div>   
            @endforeach
        @elseif($title == 'thanks')
             @foreach($notificationList as $thank) 
             @if($thank->user->induser != null)  
                <div class="row" style="border-bottom:1px dotted darkcyan;">
                    <div class="col-md-8" >
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <img src="@if($thank->user->induser->profile_pic != null){{ '/img/profile/'.$thank->user->induser->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-8">
                            {{$thank->user->induser->fname}} has thanked your Job Post Id: {{$thank->unique_id}} -
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thank->thanks_dtTime))->diffForHumans() }}
                        </div>
                    </div>
                </div> 
                @elseif($thank->user->corpuser != null) 
                <div class="row" style="border-bottom:1px dotted darkcyan;">
                    <div class="col-md-8" >
                        <div class="col-md-2 col-sm-2 col-xs-4">
                            <img src="@if($thank->user->corpuser->logo_status != null){{ '/img/profile/'.$thank->user->corpuser->logo_status }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-8">
                            {{$thank->user->corpuser->firm_name}} has thanked your Job Post Id: {{$thank->unique_id}} -
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thank->thanks_dtTime))->diffForHumans() }}
                        </div>
                    </div>
                </div> 
                @endif
            @endforeach
        @endif

	</div>
</div>
@stop
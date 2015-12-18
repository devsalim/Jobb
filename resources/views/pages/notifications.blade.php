@extends('master')

@section('content')

<div class="portlet light bg-inverse col-md-7" style="margin:0 3px;">
	<div class="portlet-title">
        @if($title == 'thanks')
        @if($notificationList != null)
		<div class="caption">
			<i class="icon-like "></i>
			 <span class="caption-subject capitalize"> {{$title}} Recieved</span>
		</div>
        @else
        <div class="caption">
            <i class="icon-like "></i>
             <span class="caption-subject capitalize"> No Thanks Recieved</span>
        </div>
        @endif
        @elseif($title == 'applications')
        @if($notificationList != null)
        <div class="caption">
            <i class="icon-like "></i>
             <span class="caption-subject capitalize"> {{$title}} Recieved</span>
        </div>
        @else
        <div class="caption">
            <i class="icon-like "></i>
             <span class="caption-subject capitalize"> No Application Recieved</span>
        </div>
        @endif
        @endif
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
                  @endif  
            @endforeach
        @elseif($title == 'thanks')
             @foreach($notificationList as $thank) 
             @if($thank->user->induser != null)  
             <a>
                <div class="row" style="border-bottom:1px dotted darkcyan;margin-bottom: 5px;">
                    <div class="" >
                        <div class="col-md-2 col-sm-2 col-xs-3" style="margin-bottom: 5px;">
                            <img src="@if($thank->user->induser->profile_pic != null){{ '/img/profile/'.$thank->user->induser->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="50" height="50">
                        </div>
                        <div class="col-md-7 col-sm-8 col-xs-6" style="font-size:12px;">
                            {{$thank->user->induser->fname}} has thanked your Job Post Id: {{$thank->unique_id}}
                            
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-3" style="font-size:12px;">
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thank->thanks_dtTime))->diffForHumans() }}
                        </div>
                    </div>
                </div> 
            </a>
                @elseif($thank->user->corpuser != null) 
            <a>
                <div class="row" style="border-bottom:1px dotted darkcyan;margin-bottom: 5px;">
                    <div class="" >
                        <div class="col-md-2 col-sm-2 col-xs-3" style="margin-bottom: 5px;">
                            <img src="@if($thank->user->corpuser->logo_status != null){{ '/img/profile/'.$thank->user->corpuser->logo_status }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="50" height="50">
                        </div>
                        <div class="col-md-7 col-sm-8 col-xs-6" style="font-size:12px;">
                            {{$thank->user->corpuser->firm_name}} has thanked your Job Post Id: {{$thank->unique_id}}
                            
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-3" style="font-size:12px;">
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($thank->thanks_dtTime))->diffForHumans() }}
                        </div>
                    </div>
                </div> 
            </a>
                @endif
            @endforeach
        @endif

	</div>
</div>
@stop
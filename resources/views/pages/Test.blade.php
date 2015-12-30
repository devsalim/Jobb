<div class="btn-group" style="float:right;margin:7px;">
    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" style="border: 0;">
    <i class="glyphicon glyphicon-sort"></i> Sort by <i class="fa fa-angle-down"></i>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="javascript:;">
            Date </a>
        </li>
        @if($post->post_type == 'job')
        <li>
            <a href="javascript:;">
            Magic Match </a>
        </li>
        @elseif($post->post_type == 'skill')
        <li>
            <a href="javascript:;">
            Individual Post </a>
        </li>
        <li>
            <a href="javascript:;">
            Company Post </a>
        </li>
        <li>
            <a href="javascript:;">
            Consultancy Post </a>
        </li>
        @endif
    </ul>
</div>















<div class="timeline-body-head-caption" style="width:100%;margin:5px;">
                                                                @if(Auth::user()->induser_id == $post->individual_id && $post->individual_id != null)
                                                                @if(count($post->groupTagged) > 0)
                                                                @if($post->sharedGroupBy->first()->mode == 'shared')
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- Post shared by user -->                        
                                                                        
                                                                            <div class="shared-by">
                                                                                {{$post->sharedGroupBy->first()->mode}} by 
                                                                                <b>{{$post->sharedGroupBy->first()->fname}} 
                                                                                {{$post->sharedGroupBy->first()->lname}}</b>
                                                                                to <b>{{$post->sharedToGroup->first()->group_name}}</b> group<br/>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @endif
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                                    <a href="/profile/ind/{{$post->individual_id}}" class="link-label" data-utype="ind">
                                                                        <small>You</small>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-6 elipsis-code">
                                                                    <i class="fa fa-clock-o" style="font-size: 11px;"></i> 
                                                                    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                                                                </div>
                                                            </div>
                                                            @elseif(Auth::user()->corpuser_id == $post->corporate_id && $post->corporate_id != null)
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-xs-6">
                                                                    <a href="/profile/ind/{{$post->individual_id}}" class="link-label" data-utype="ind">
                                                                        <small>You</small>
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-6 elipsis-code">
                                                                    <i class="fa fa-clock-o" style="font-size: 11px;"></i> 
                                                                    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                                                                </div>
                                                            </div>
                                                            @elseif($post->individual_id != null)
                                                                @if(count($post->groupTagged) > 0)
                                                                @if($post->sharedGroupBy->first()->mode == 'shared')
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- Post shared by user -->                        
                                                                        
                                                                            <div class="shared-by">
                                                                                <small>{{$post->sharedGroupBy->first()->mode}} by {{$post->sharedGroupBy->first()->fname}} {{$post->sharedGroupBy->first()->lname}}</small> to <small>{{$post->sharedToGroup->first()->group_name}}</small> group<br/>
                                                                            </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            @endif
                                                            @if($post->tagged->contains('user_id', Auth::user()->induser_id) && 
                                                                $post->sharedBy->first()->mode == 'shared')
                                                                
                                                            <small> {{$post->sharedBy->first()->mode}} by 
                                                                {{$post->sharedBy->first()->fname}} {{$post->sharedBy->first()->lname}}</small><br/>

                                                            @endif
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                                    <a href="/profile/ind/{{$post->individual_id}}" style="font-size: 13px;text-decoration:none;font-weight:500;">
                                                                        {{ $post->induser->fname}} {{ $post->induser->lname}}
                                                                    </a>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-6 elipsis-code">
                                                                    <i class="fa fa-clock-o" style="font-size: 11px;"></i> 
                                                                    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                                                                </div>
                                                            </div>
                                                            @elseif($post->corporate_id != null)
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-8">
                                                                    <a href="/profile/corp/{{$post->corporate_id}}" style="font-size: 13px;text-decoration:none;">
                                                                        {{ $post->corpuser->firm_name}}
                                                                    </a><span class="label label-sm label-success">{{ $post->corpuser->firm_type}}</span>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-4 elipsis-code">
                                                                    <i class="fa fa-clock-o" style="font-size: 11px;"></i> 
                                                                    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            </div>                                                      
                                                        </div>
                                                        <!--  -->
                                                        <div class="timeline-body-content">
                                                            <div class="row new-hide post-postision" style="cursor:pointer;">
                                                                <div class="col-md-12">
                                                                    <div class="" style="font-weight: 600;color: black;font-size: 13px;">{{ $post->post_title }} </div>
                                                                
                                                                </div>
                                                                @if($post->post_compname != null && $post->post_type == 'job')
                                                                <div class="col-md-12">
                                                                    <div><h4 style="margin: 0 0 4px 0;"><small>Required at {{ $post->post_compname }}</small></h4></div>
                                                                </div>
                                                                 @elseif($post->post_compname != null && $post->post_type == 'skill')
                                                                 <div class="col-md-12">
                                                                    <div><h4 style="margin: 0 0 4px 0;"><small>Working at {{ $post->post_compname }} </small></h4></div>
                                                                </div>   
                                                                @endif
                                                            
                                                            <div class="row" style="margin-left: 0;margin-right: 0;">
                                                                <div class="col-md-4 col-sm-4 col-xs-4 elipsis-code elipsis-city-code" style="padding:0 12px;">
                                                                <small> <i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{ $post->city }}</small>
                                                                </div>
                                                                
                                                                <div class="col-md-4 col-sm-4 col-xs-4 elipsis-code" style="float: none;margin:0;display: table;">
                                                                <small> <i class="glyphicon glyphicon-briefcase"></i>&nbsp;: {{ $post->min_exp}}-{{ $post->max_exp}} Yr</small>
                                                                </div>
                                                                <div id="{{ $post->id }}-{{$var}}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 hide-details" style="float: right;right: -40px;bottom: 16px;">
                                                                    <a><i class="fa fa-angle-double-down" style="font-size:20px;"></i></a>
                                                                </div>
                                                                <div id="{{ $post->id }}-{{$var}}" class="col-md-4 col-sm-4 col-xs-4 show-details" style="float: right;right: -40px;bottom: 16px;">
                                                                    <a><i class="fa fa-angle-double-up" style="font-size:20px;"></i></a>
                                                                </div>
                                                            </div>
                                                            </div>






















elseif($post_type == 'skill'){
            if($role != null){
                $skillPosts->where('role', 'like', '%'.$role.'%');
            }
            if($unique_id != null){
                $skillPosts->where('unique_id', 'like', '%'.$unique_id.'%');
            }
            if($post_title != null){
                $skillPosts->where('post_title', 'like', '%'.$post_title.'%');
            }
            if($city != null){
                $pattern = '/\s*,\s*/';
                $replace = ',';
                $city = preg_replace($pattern, $replace, $city);
                $cityArray = explode(',', $city);
                $skillPosts->whereIn('city', $cityArray);
            }
            if($prof_category != null){
                $skillPosts->where('prof_category', 'like', '%'.$prof_category.'%');
            }
            if($experience != null){
                $skillPosts->whereRaw("$experience between min_exp and max_exp");
            }
            if($time_for != null){
                $skillPosts->where('time_for', '=', $time_for);
            }
            // if(count($post_type) > 0){
            //  if(in_array("job", $post_type)){
            //      $jobPosts->where('post_type', '=', $post_type[0]);
            //  }elseif(in_array("skill", $post_type)){
            //      $jobPosts->where('post_type', '=', $post_type[0]);
            //  }
            // }
            if($post_type == 'skill'){
                $skillPosts->where('post_type', '=', $post_type);
            }
            if(count($posted_by) > 0) {
                if(in_array("individual", $posted_by)) {
                    $skillPosts->where('individual_id', '!=', 0);
                }elseif(in_array("company", $posted_by)) {
                    $skillPosts->where('corporate_id', '!=', 0);
                }
            }

            $skillPosts = $skillPosts->paginate(15);
            if(Auth::user()->identifier == 1){
                $userSkills = Induser::where('id', '=', Auth::user()->induser_id)->first(['linked_skill']);
                $userSkills = array_map('trim', explode(',', $userSkills->linked_skill));
                unset ($userSkills[count($userSkills)-1]); 
            }
            $links = DB::select('select id from indusers
                                    where indusers.id in (
                                            select connections.user_id as id from connections
                                            where connections.connection_user_id=?
                                             and connections.status=1
                                            union 
                                            select connections.connection_user_id as id from connections
                                            where connections.user_id=?
                                             and connections.status=1
                                )', [Auth::user()->induser_id, Auth::user()->induser_id]);
            $links = collect($links);

            $groups = Group::leftjoin('groups_users', 'groups_users.group_id', '=', 'groups.id')                    
                        ->where('groups.admin_id', '=', Auth::user()->induser_id)
                        ->orWhere('groups_users.user_id', '=', Auth::user()->induser_id)
                        ->groupBy('groups.id')
                        ->get(['groups.id as id'])
                        ->lists('id');

            if(Auth::user()->induser_id != null){
                $following = DB::select('select id from corpusers 
                                         where corpusers.id in (
                                            select follows.corporate_id as id from follows
                                            where follows.individual_id=?
                                    )', [Auth::user()->induser_id]);
                $following = collect($following);
            }
            if(Auth::user()->corpuser_id != null){
                $following = DB::select('select id from indusers
                                         where indusers.id in (
                                            select follows.individual_id as id from follows
                                            where follows.corporate_id=?
                                    )', [Auth::user()->corpuser_id]);
                $following = collect($following);
            }

            if(Auth::user()->identifier == 1){
                $share_links=Induser::whereRaw('indusers.id in (
                                                select connections.user_id as id from connections
                                                where connections.connection_user_id=?
                                                 and connections.status=1
                                                union 
                                                select connections.connection_user_id as id from connections
                                                where connections.user_id=?
                                                 and connections.status=1
                                    )', [Auth::user()->induser_id, Auth::user()->induser_id])
                                ->get(['id','fname'])
                                ->lists('fname','id');

                $share_groups = Group::leftjoin('groups_users', 'groups_users.group_id', '=', 'groups.id')                  
                                    ->where('groups.admin_id', '=', Auth::user()->induser_id)
                                    ->orWhere('groups_users.user_id', '=', Auth::user()->induser_id)
                                    ->groupBy('groups.id')
                                    ->get(['groups.id as id', 'groups.group_name as name'])
                                    ->lists('name', 'id');

            }
            $jobPosts = Postjob::orderBy('id', 'desc')
                                     ->with('indUser', 'corpUser', 'postActivity', 'taggedUser', 'taggedGroup')
                                     ->where('post_type', '=', 'job')
                                     ->paginate(15);
        }








->dailyAt('12:00');





<div class="skill-display">Contact Date/Time&nbsp;: {{ $post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view_dtTime }} </div>










@elseif($post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 2)
    <div class="" data-puid="{{$post->corporate_id}}">
        @if($following->contains('id', $post->individual_id))
            <a href="" data-toggle="modal" class="user-link link-follow-icon" data-linked="yes" data-utype="corp">
                <i class="icon-user-following icon-size" style="color:chartreuse;"></i>
            </a>
        @else
            <a href="" data-toggle="modal" class="user-link3 link-follow-icon" data-linked="no" data-utype="corp">
                <i class="icon-user-follow icon-size" style="color:darkslategray;"></i>
            </a>
        @endif                                                      
</div>




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
<<<<<<< HEAD
        @if($title == 'applications')
            @foreach($notificationList as $application)  
            @if($thank->user->induser != null)  
                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <img src="@if($application->user->induser->profile_pic != null){{ '/img/profile/'.$application->user->induser->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="50" height="50">
                        </div>
                        <div class="col-md-7 col-sm-10 col-xs-6">
                            {{$application->user->induser->fname}} has applied your Job Post Id: {{$application->unique_id}}
                            
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-3" style="font-size:12px;">
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($application->apply_dtTime))->diffForHumans() }}
                        </div>
                    </div>
                </div>
                  @elseif($thank->user->corpuser != null)
                  <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-2 col-sm-2 col-xs-3">
                            <img src="@if($application->user->corpuser->logo_status != null){{ '/img/profile/'.$application->user->corpuser->logo_status }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="50" height="50">
                        </div>
                        <div class="col-md-7 col-sm-10 col-xs-6">
                            {{$application->user->corpuser->firm_name}} has applied your Job Post Id: {{$application->unique_id}}
                            
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-3" style="font-size:12px;">
                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($application->apply_dtTime))->diffForHumans() }}
=======
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
>>>>>>> origin/master
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






@if($expired != 1)
<div style="margin:27px 0 0;">
    <!-- if corporate_id not null -->
    @if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)     
        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->website_redirect_url != null)
            <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="apply" value="{{ $post->id }}">
                    <a class="btn apply-btn blue btn-sm apply-contact-btn" target="_blank" 
                        href="{{ $post->website_redirect_url }}" type="button"><i class="icon-globe"></i> Apply
                    </a>    
            </form> 
                
        @elseif($post->website_redirect_url == null && $post->corporate_id != null)
        <form action="/job/apply" method="post" id="post-apply-{{$post->id}}" data-id="{{$post->id}}">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="apply" value="{{ $post->id }}">
            <button class="btn apply-btn blue btn-sm apply-contact-btn" 
                    id="apply-btn-{{$post->id}}" type="button">Apply
            </button>
        </form> 
        @elseif($post->website_redirect_url == null && $post->individual_id != null)
        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="contact" value="{{ $post->id }}">
            <button class="btn contact-btn green btn-sm apply-contact-btn" 
                    id="contact-btn-{{$post->id}}" type="button">Contact
            </button>
        </form> 
        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 && Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url != null) 
            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
                <i class="icon-check icon-check-css"></i> Applied 
            </button>
        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 &&  Auth::user()->identifier == 1 && $expired != 1 && $post->website_redirect_url == null && $post->individual_id != null) 
        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
            <i class="icon-check icon-check-css"></i> Contacted 
        </button>                               
        @endif

    <!-- if corporate_id is null     -->
    @elseif($post->individual_id != null && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)        
        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty() && $post->resume_required == 1)
            <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="contact" value="{{ $post->id }}">
                <button class="btn contact-btn green btn-sm apply-contact-btn" 
                        id="contact-btn-{{$post->id}}" type="button">Contact
                </button>
            </form>     
        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 && Auth::user()->identifier == 1 && $post->resume_required == 1) 
            <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
            <i class="icon-check icon-check-css"></i> Contacted 
        </button>                                     
        @endif   
    @elseif($post->post_type == 'job' && Auth::user()->induser->resume == null && $post->resume_required == 1 && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)
        Resume is Required to Apply this Post

    @endif  
@if($post->post_type == 'skill' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1)       
    @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty())
        <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="contact" value="{{ $post->id }}">
            <button class="btn contact-btn green btn-sm apply-contact-btn" 
                    id="contact-btn-{{$post->id}}" type="button">Contact
            </button>
        </form> 
    @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->contact_view == 1) 
        <button type="button" class="btn btn-sm bg-grey-steel apply-contact-btn" disabled="true">
            <i class="glyphicon glyphicon-ok"></i> Contacted
        </button>
        @else
    <form action="/job/contact" method="post" id="post-contact-{{$post->id}}" data-id="{{$post->id}}">  
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="contact" value="{{ $post->id }}">
        <button class="btn contact-btn green btn-sm apply-contact-btn" 
                id="contact-btn-{{$post->id}}" type="button">Contact
        </button>
    </form>                         
    @endif  
@endif
</div>
@elseif($expired == 1 && $post->post_type == 'job')
<div class="row" style="text-align:center;">
    @if($post->post_type == 'job' && Auth::user()->induser_id != $post->individual_id && Auth::user()->identifier == 1) 
        @if($post->postactivity->where('user_id', Auth::user()->id)->isEmpty()) 
            <div class="col-md-4 col-sm-4 col-xs-4">
            </div>
        @elseif($post->postactivity->where('user_id', Auth::user()->id)->first()->apply == 1 && Auth::user()->identifier == 1) 
            <div class="col-md-4 col-sm-4 col-xs-4">
                <i class="fa fa-check-square-o"></i><span class="hidden-sm hidden-xs"> Applied</span> 
            </div>
        @endif
    <div class="col-md-4 col-sm-4 col-xs-4">
        <i class="glyphicon glyphicon-ban-circle"></i> Expired
    </div>
    @endif
</div>                                      
@endif







	$strNew = $post->post_duration;
                                        $strExt = $post->post_extended;
                                        $strAdd = $strNew + $strExt;
                                        $strAdd = '+'.$strAdd.' day';



    public function store()
    {
        $rules = [
            'fname'		=>	'required',
			'email'		=>	'required_without:mobile|email|unique:indusers',
			'mobile'	=>	'required_without:email|unique:indusers|numeric|min:10',
			'password'	=>	'required|min:6|max:15'
        ];

        $input = Input::only(
            'fname',
            'email',
            'password',
            'password_confirmation'
        );

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $confirmation_code = str_random(30);

        Induser::create([
            'fname' => Input::get('fname'),
            'lname' => Input::get('lname'),
            'email' => Input::get('email'),
            'password' => Hash::make(Input::get('password')),
            'confirmation_code' => $confirmation_code
        ]);

        Mail::send('email.verify', $confirmation_code, function($message) {
            $message->to(Input::get('email')
                ->subject('Verify your email address');
        });

        Flash::message('Thanks for signing up! Please check your email.');

        return Redirect::home();
    }




    public function store()
    {
        $rules = [
            'email' => 'required|exists:indusers',
            'password' => 'required'
        ];

        $input = Input::only('email', 'password');

        $validator = Validator::make($input, $rules);

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];

        if ( ! Auth::attempt($credentials))
        {
            return Redirect::back()
                ->withInput()
                ->withErrors([
                    'credentials' => 'We were unable to sign you in.'
                ]);
        }

        Flash::message('Welcome back!');

        return Redirect::home();
    }




    
    public function corp_indView()
    {
        
        if(Auth::user()->identifier == 1){
                $title = 'indView';
                $user = Induser::where('id', '=', Auth::user()->induser_id)->first();
                $thanks = Postactivity::with('user', 'post')
                              ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
                              ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
                              ->where('postactivities.thanks', '=', 1)
                              ->orderBy('postactivities.id', 'desc')
                                      ->sum('postactivities.thanks');
                 $myActivitys = Postjob::where('individual_id', '=', Auth::user()->induser_id)->count('id');
                $linksCount = Connections::where('user_id', '=', Auth::user()->induser_id)
                                        ->where('status', '=', 1)
                                        ->orWhere('connection_user_id', '=', Auth::user()->induser_id)
                                        ->where('status', '=', 1)
                                        ->count('id');
                $connectionPendingStatus = Connections::where('user_id', '=', Auth::user()->induser_id)
                                         ->where('connection_user_id', '=', Auth::user()->induser_id)
                                         ->first(['status']); 
                $connectionRequestStatus = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
                                       ->where('user_id', '=', Auth::user()->induser_id)
                                       ->first(['status']);

            // connection status
            $connectionStatus = 'unknown';
            if($connectionPendingStatus != null && $connectionPendingStatus->status == 0){
                $connectionStatus = 'requestsent';
            }
            elseif($connectionPendingStatus != null && $connectionPendingStatus->status == 1){
                $connectionStatus = 'friend';
            }
            elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 0){
                $connectionStatus = 'pendingrequest';
            }
            elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 1){
                $connectionStatus = 'friend';
            }
                return view('pages.profile_indview', compact('user','thanks', 'posts', 'connectionStatus', 'linksCount', 'title'));


            }else if(Auth::user()->identifier == 2){
                $title = 'corpView';
                $user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
                $thanks = Postactivity::with('user', 'post')
                              ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
                              ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
                              ->where('postactivities.thanks', '=', 1)
                              ->orderBy('postactivities.id', 'desc')
                                      ->sum('postactivities.thanks');
                 $myActivitys = Postjob::where('individual_id', '=', Auth::user()->induser_id)->count('id');
                $linksCount = Connections::where('user_id', '=', Auth::user()->induser_id)
                                        ->where('status', '=', 1)
                                        ->orWhere('connection_user_id', '=', Auth::user()->induser_id)
                                        ->where('status', '=', 1)
                                        ->count('id');
                                        $connectionPendingStatus = Connections::where('user_id', '=', Auth::user()->induser_id)
                                         ->where('connection_user_id', '=', Auth::user()->induser_id)
                                         ->first(['status']); 
                $connectionRequestStatus = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
                                       ->where('user_id', '=', Auth::user()->induser_id)
                                       ->first(['status']);

            // connection status
            $connectionStatus = 'unknown';
            if($connectionPendingStatus != null && $connectionPendingStatus->status == 0){
                $connectionStatus = 'requestsent';
            }
            elseif($connectionPendingStatus != null && $connectionPendingStatus->status == 1){
                $connectionStatus = 'friend';
            }
            elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 0){
                $connectionStatus = 'pendingrequest';
            }
            elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 1){
                $connectionStatus = 'friend';
            }
                return view('pages.profile_indview', compact('user','thanks', 'posts', 'connectionStatus', 'linksCount', 'title'));
            }

    }



                
            if($followStatus != null){
                $connectionStatus = 'following';
                $connectionId = $followStatus->id;
            }






<div class="portlet light bordered" style="border: none !important;background:transparent">                                     
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                @if (count( $myActivitys) > 0)
                <?php $var = 1; ?>
                @foreach( $myActivitys as  $myActivity)   
                    <div class="timeline" >
                        <!-- TIMELINE ITEM -->
                        <div class="timeline-item time-item">
                            <div class="timeline-badge" style="margin: 10px 0px;">
                                @if( $myActivity->induser != null && !empty( $myActivity->induser->profile_pic))
                                <img class="timeline-badge-userpic userpic-box" src="/img/profile/{{  $myActivity->induser->profile_pic }}" title="{{  $myActivity->induser->fname }}">
                                <a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style="font-size:12px;"></i></a>
                                @elseif( $myActivity->corpuser != null && !empty( $myActivity->corpuser->logo_status))
                                <img class="" src="/img/profile/{{  $myActivity->corpuser->logo_status }}" title="{{  $myActivity->corpuser->firm_name }}">
                                <a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
                                @elseif(empty( $myActivity->corpuser->logo_status) &&  $myActivity->corpuser != null)
                                <img class="" src="/assets/images/corp.png">
                                <a class="icon-userpic"><i class="fa fa-institution (alias)" style="font-size:12px;"></i></a>
                                @elseif(empty( $myActivity->induser->profile_pic) &&  $myActivity->induser != null)
                                <img class="timeline-badge-userpic userpic-box" src="/assets/images/ab.png">
                                <a class="icon-userpic img-circle"><i class="glyphicon glyphicon-user" style=" font-size:12px;"></i></a>
                                @endif

                                <div class="match"><a data-toggle="modal" href="#{{ $myActivity->id}}"><i class="icon-speedometer"></i> 55%</a></div>
                                <div id="oval"></div>
                                <!-- Modal for Matching Percentage -->
                                <div class="modal fade" id="{{ $myActivity->id}}" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style=" padding: 10px !important;">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;right: 15px;top: 15px;"></button>
                                                <div class="modal-body" style=" padding:10px 0 !important;">
                                                    
                                                        <!-- BEGIN BORDERED TABLE PORTLET-->
                                                        <div class="portlet box">
                                                            <div class="portlet-title">
                                                                <div class="caption links-title">
                                                                    <i class="icon-speedometer" style="font-size:16px;"></i> 56% Match
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body" style=" padding: 0 !important;">
                                                                <div class="table-scrollable">
                                                                    <table class="table table-bordered table-hover">
                                                                    <thead>
                                                                    <tr>

                                                                        <th class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                             Required Profile
                                                                        </th>
                                                                        <th class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                             My Profile
                                                                        </th>
                                                                        
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align">
                                                                                <label>Skill</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                                @foreach( $myActivity->skills as $skill)
                                                                                    {{$skill->name}},
                                                                                @endforeach
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 matching-criteria-align">
                                                                                @foreach( $myActivity->skills as $skill)
                                                                                    {{$skill->name}},
                                                                                @endforeach
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i>
                                                                                <label> Job Role</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->role }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->role }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                 <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                 <label> Job Category</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{  $myActivity->prof_category }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                Programmer
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i> 
                                                                                <label>Experience</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->min_exp }}-{{  $myActivity->max_exp }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->min_exp }}-{{  $myActivity->max_exp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                <label> Education</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{  $myActivity->education }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{  $myActivity->education }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align success">
                                                                                <i class="glyphicon glyphicon-ok" style="color:#01b070;font-size:16px;"></i> 
                                                                                <label>Location</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->city }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 success matching-criteria-align">
                                                                                {{  $myActivity->city }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="2" class="col-md-12 col-sm-12 col-xs-12 matching-criteria-align danger">
                                                                                <i class="glyphicon glyphicon-remove" style="color:red;font-size:16px;"></i>
                                                                                <label> Job Type</label>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{  $myActivity->time_for }}
                                                                            </td>
                                                                            <td class="col-md-6 col-sm-6 col-xs-6 danger matching-criteria-align">
                                                                                {{  $myActivity->jobtype }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- END BORDERED TABLE PORTLET-->
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                             <div class="timeline-body" style="">
                                <div class="timeline-body-head">
                                    @if(Auth::user()->induser_id ==  $myActivity->individual_id &&  $myActivity->individual_id != null)
                                        <div class="timeline-body-head-caption">
                                            @if( $myActivity->post_type == 'job')                                                  
                                                <a href="/profile/ind/{{ $myActivity->individual_id}}" class="link-label" data-utype="ind">
                                                    You have
                                                </a>
                                            @else                                                   
                                                <a href="/profile/ind/{{ $myActivity->individual_id}}" class="link-label" data-utype="ind">
                                                    You have
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime( $myActivity->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif(Auth::user()->corpuser_id ==  $myActivity->corporate_id &&  $myActivity->corporate_id != null)
                                        <div class="timeline-body-head-caption">
                                            @if( $myActivity->post_type == 'job')                                                  
                                                <a href="/profile/corp/{{ $myActivity->corporate_id}}" class="link-label" data-utype="corp">
                                                    You have
                                                </a>
                                            @else                                                   
                                                <a href="/profile/corp/{{ $myActivity->corporate_id}}" class="link-label" data-utype="corp">
                                                    You have
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime( $myActivity->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif( $myActivity->individual_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{ $myActivity->individual_id}}">
                                            @if( $myActivity->post_type == 'job')
                                                @if($links->contains('id',  $myActivity->individual_id))
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:salmon;"></i>
                                                </a>
                                                @elseif($following->contains('id',  $myActivity->individual_id))
                                                <a class="user-link2" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:steelblue;"></i>
                                                </a>
                                                @else
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
                                                    <i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
                                                </a>
                                                @endif
                                                
                                                <a href="/profile/ind/{{ $myActivity->individual_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{  $myActivity->induser->fname}} {{  $myActivity->induser->lname}}
                                                </a>
                                            @else
                                                @if($links->contains('id',  $myActivity->individual_id))
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:salmon;"></i>
                                                </a>
                                                @elseif($following->contains('id',  $myActivity->individual_id))
                                                <a class="user-link2" data-linked="yes" data-utype="ind">
                                                    <i class="fa fa-link (alias)" style="color:steelblue;"></i>
                                                </a>
                                                @else
                                                <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="ind">
                                                    <i class="fa fa-unlink (alias)" style="color:lightslategray;"></i>
                                                </a>
                                                @endif
                                                <a href="/profile/ind/{{ $myActivity->individual_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{  $myActivity->induser->fname }} {{  $myActivity->induser->lname }}
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime( $myActivity->created_at)) }}
                                            </span>
                                        </div>
                                    @elseif( $myActivity->corporate_id != null)
                                        <div class="timeline-body-head-caption" data-puid="{{ $myActivity->corporate_id}}">
                                            @if( $myActivity->post_type == 'job')
                                                @if($following->contains('id',  $myActivity->corporate_id))
                                                    <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="yes" data-utype="corp">
                                                        <i class="icon-user-following" style="color:black;"></i>
                                                    </a>
                                                @else
                                                    <a href="#links-follow" data-toggle="modal" class="user-link" data-linked="no" data-utype="corp">
                                                        <i class="icon-user-follow" style="color:lightslategray;"></i>
                                                    </a>
                                                @endif                                                      
                                                <a href="/profile/corp/{{ $myActivity->corporate_id}}" style="padding: 0px 0px 0px 32px;font-size: 15px;text-decoration:none;font-weight:600;">
                                                    {{  $myActivity->corpuser->firm_name}}
                                                </a>
                                            @endif
                                            <span class="timeline-body-time font-grey-cascade">Posted at 
                                                {{ date('M d, Y', strtotime( $myActivity->created_at)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="timeline-body-content">
                                    <span class="font-grey-cascade">
                                        @if( $myActivity->post_type == 'skill')    
                                        <div style="font-weight: 600;color: black;font-size: 16px;">{{  $myActivity->post_title }} </div>
                                    @elseif( $myActivity->post_type == 'job')
                                         <div style="font-weight: 600;color: black;font-size: 16px;">{{  $myActivity->post_title }}  </div>
                                    @endif  
                                    @if( $myActivity->post_compname != null)
                                    <div><h4 style="margin: 0 0 4px 0;"><small>Required at</small> {{  $myActivity->post_compname }}</h4></div>
                                    @endif                                          
                                    </span>
                                    <div class="row">
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="icon-badge"></i>&nbsp;: {{  $myActivity->role }}
                                        </div> -->
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="glyphicon glyphicon-map-marker"></i>&nbsp;: {{  $myActivity->city }}
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="icon-briefcase"></i>&nbsp;: {{  $myActivity->min_exp}}-{{  $myActivity->max_exp}} Years
                                        </div>
                                        <!-- <div class="col-md-4 col-sm-4 col-xs-12">
                                            <i class="fa fa-rupee (alias)"></i>&nbsp;:&nbsp; {{  $myActivity->min_sal }}-{{  $myActivity->max_sal }}/Hours
                                        </div> -->
                                    </div>
                                </div>  
                                
                                <div class="post-job-skill-bar">
                                    <div class="{{  $myActivity->post_type }}">
                                        <a class="post-type-class">{{  $myActivity->post_type }}</a>
                                    </div>
                                    @if(Auth::user()->id !=  $myActivity->individual_id )
                                    <form action="/job/fav" method="post" id="post-fav-{{ $myActivity->id}}" data-id="{{ $myActivity->id}}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="fav_post" value="{{  $myActivity->id }}">

                                        <button class="fav-btn btn btn-icon-only pin-bar btn-circle 
                                                @if(! $myActivity->postactivity->where('user_id', Auth::user()->induser_id)->isEmpty())
                                                @if( $myActivity->postactivity->where('user_id', Auth::user()->induser_id)->first()->fav_post == 1) 
                                                    {{'btn-warning'}} 
                                                @endif
                                                @endif" 
                                                id="fav-btn-{{ $myActivity->id}}" type="button">
                                            <i class="icon-pin" style="font-size: 20px;"></i>
                                        </button>
                                        @endif
                                    </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <?php $var++; ?>
                @endif
             </div>
        </div>
    </div>
</div>












<script type="text/javascript">
function loader(arg){
    if(arg == 'show'){
        $('#loader').show();
    }else{
        $('#loader').hide();
    }
}
function redirect(url){
    window.location = url;
}
$(document).ready(function(){
  $('#individual-login-btn').on('click',function(event){        
    event.preventDefault();

    loader('show');

    var formData = $('#individual-login').serialize(); // form data as string
    var formAction = $('#individual-login').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data == 'login'){            
            $('#ind-msg-box').removeClass('alert alert-success');
            $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text('Invalid user');
        }else{          
            $('#ind-msg-box').removeClass('alert alert-danger');
            $('#ind-msg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-msg').text('Login success');
            redirect(data);
        }
      },
      error: function(data) {
        loader('hide');
        $('#ind-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#ind-msg').text('Some error occured !');
      }
    }); 
    return false;
  }); 

$('#corporate-login-btn').on('click',function(event){       
    event.preventDefault();

    loader('show');

    var formData = $('#corporate-login').serialize(); // form data as string
    var formAction = $('#corporate-login').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data == 'login'){
            $('#corp-msg-box').removeClass('alert alert-success');
            $('#corp-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-msg').text('Invalid user');
        }else{
            $('#corp-msg-box').removeClass('alert alert-danger');
            $('#corp-msg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-msg').text('Login success');
            redirect(data);
        }
      },
      error: function(data) {
        loader('hide');
        $('#corp-msg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#corp-msg').text('Some error occured !');
      }
    }); 
    return false;
  }); 
    
$('#individual-register-btn').on('click',function(event){       
    event.preventDefault();

    loader('show');

    var formData = $('#individual-register').serialize(); // form data as string
    var formAction = $('#individual-register').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data == 'login'){
            $('#ind-msg-reg-box').removeClass('alert alert-danger');
            $('#ind-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#individual-register')[0].reset();
            $('#t-n-c').attr('checked', false); // Unchecks it
            $('#ind-reg-msg').text('Registration successful');
            
        }else{
            $('#ind-msg-reg-box').removeClass('alert alert-success');
            $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#ind-reg-msg').text('Some errors occured during Registration!');
        }
      },
      error: function(data) {
        loader('hide');
        $('#ind-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#ind-reg-msg').text('Some error occured !');
      }
    }); 
    return false;
  });

$('#corporate-register-btn').on('click',function(event){        
    event.preventDefault();

    loader('show');

    var formData = $('#corporate-register').serialize(); // form data as string
    var formAction = $('#corporate-register').attr('action'); // form handler url

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url: formAction,
      type: "post",
      data: formData,
      cache : false,
      success: function(data){
        loader('hide');
        if(data == 'login'){
            $('#corp-msg-reg-box').removeClass('alert alert-success');
            $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-reg-msg').text('Invalid user');
        }else{
            $('#corp-msg-reg-box').removeClass('alert alert-danger');
            $('#corp-msg-reg-box').addClass('alert alert-success').fadeIn(1000, function(){
                $(this).show();
            });
            $('#corp-reg-msg').text('Registration success');
            redirect(data);
        }
      },
      error: function(data) {
        loader('hide');
        $('#corp-msg-reg-box').addClass('alert alert-danger').fadeIn(1000, function(){
                $(this).show();
        });
        $('#corp-reg-msg').text('Some error occured !');
      }
    }); 
    return false;
  });
});

$('#individual-login').bind('keydown', function(e){         
    if (e.which == 13){
       $('#individual-login-btn').trigger('click'); 
       return false;  
   }     
});

$('#corporate-login').bind('keydown', function(e){         
    if (e.which == 13){
       $('#corporate-login-btn').trigger('click'); 
       return false;  
   }     
});

</script>


'email.current_email'           =>  'This is the current email adderess being used',

            'email'     =>  'required_without:mobile|email|unique:indusers',








$(document).ready(function(){
 $('input:submit, input:reset').each(function(){
  $(this).replaceWith('<button type="' + $(this).attr('type') + '">' + $(this).val() + '</button>');
 });
});
$('button:submit').button({
  icons: {
   secondary: 'ui-icon-circle-check'
  }
 });
 $('button:reset').button({
  icons: {
   secondary: 'ui-icon-circle-close'
  }
 });


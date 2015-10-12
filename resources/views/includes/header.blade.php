<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner container">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <img src="{{ asset('/assets/jobtip-new.png') }}" class="big-logo" />
      <img src="{{ asset('/assets/logo-small.png') }}" class="small-logo" />
      
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
      <i class="fa fa-bars"></i>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN PAGE ACTIONS -->
    <!-- DOC: Remove "hide" class to enable the page header actions -->
    <div class="page-actions ">
    
      <div class="top-menu">
        <ul class="nav navbar-nav ">
          <!-- BEGIN NOTIFICATION DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          
          <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="icon-bulb"></i>
            <span class="badge badge-default @if(count($applications) > 0) show @else hide @endif">{{count($applications)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">7 New</span> Messages</h3>
                <a href="page_inbox.html" style="color: darkblue;">view all</a>
              </li>
              <li>
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
              </li>
            </ul>
          </li>
          <!-- END NOTIFICATION DROPDOWN -->
          <!-- BEGIN INBOX DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="icon-like"></i>
            <span class="badge badge-default  @if(count($thanks) > 0) show @else hide @endif">{{count($thanks)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">7 New</span> Messages</h3>
                <a href="page_inbox.html" style="color: darkblue;">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  @foreach($thanks as $thank)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($thank->user->profile_pic != null){{ '/img/profile/'.$thank->user->profile_pic }}@else{{'/assets/images/couple.png'}}@endif" class="img-circle" width="40" height="40">
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$thank->user->fname}} </span>
                    <span class="time">{{$thank->thanks_dtTime}}</span>
                    </span>
                    <span class="message">
                    has thanked for Job Post Id: {{$thank->post_id}} </span>
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN TODO DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
              <i class="icon-pin"></i>
              
              <span class="badge badge-default @if(count($favourites) > 0) show @else hide @endif" id="myfavcount" style="right: -14px;">{{count($favourites)}}</span>
              
            </a>            
          </li>
          <!-- END TODO DROPDOWN -->
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        
      </div>
      <div class="btn-group hide">
        <button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a class="ajaxify" href="postjobupdate">
            <i class="icon-user"></i> Job</a>
          </li>
          <li>
            <a href="javascript:;">
            <i class="icon-present"></i>Skills <span class="badge badge-success">4</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
            <i class="icon-basket"></i> Services </a>
          </li>
          
        </ul>
      </div>
      
      <div class="btn-group" style="margin: 3px 5px;">
        <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-sm hidden-xs">Post</span> <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li>
            <a href="/job/create">
            <i class="icon-user"></i> Job</a>
          </li>
           @if (Auth::user()->identifier == 1)
          <li>
            <a href="/skill/create">
            <i class="icon-basket"></i> Skill</a>
          </li>
          @endif
        </ul>
      </div>

      </div>
    <!-- END PAGE ACTIONS -->
    <!-- BEGIN PAGE TOP -->
    <div class="page-top">
      <!-- BEGIN HEADER SEARCH BOX -->
      <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
      
      <!-- END HEADER SEARCH BOX -->
      <!-- BEGIN TOP NAVIGATION MENU -->
    
      <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END PAGE TOP -->
  </div>
  <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
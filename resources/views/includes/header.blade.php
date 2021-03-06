<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top nav-disp" id="nav-display">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner container nav-fixed-css" style="">
    <!-- BEGIN LOGO -->
      <div class="page-logo @if($title == 'home'){{'active'}}@endif">
      <a class="" href="/home"><img src="{{ asset('/assets/new_big_logo.png') }}" class="big-logo" />
      <img src="{{ asset('/assets/new_sm_logo.png') }}" class="small-logo" />  </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler toggle-display" data-toggle="collapse" data-target=".navbar-collapse">
      <i class="fa fa-bars"></i>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN PAGE ACTIONS -->
    <!-- DOC: Remove "hide" class to enable the page header actions -->
    <div class="page-actions ">
      <!-- <form class="search-form search-form-expanded" action="extra_search.html" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search..." name="query">
          <span class="input-group-btn">
          <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form> -->
      
      <div class="top-menu">
        <ul class="nav navbar-nav ">
          <!-- BEGIN NOTIFICATION DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          
          <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="fa fa-bell icon-color"></i>
            <span class="badge badge-default @if($notificationsCount > 0) show @else hide @endif" style="background-color: darkseagreen !important;">{{$notificationsCount}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                @if($notificationsCount > 0)
                <h3 style="color: darkblue;font-weight: 500;">You have {{$notificationsCount}} Messages</h3>
                @else
                <h3 style="color: darkblue;font-weight: 500;">You have no New Messages</h3>
                @endif
                <a class="@if($title == 'notify_view'){{'active'}}@endif" 
                    href="/notify/notification/@if(Auth::user()->identifier==1){{'ind'}}@elseif(Auth::user()->identifier==2){{'corp'}}@endif/{{Auth::user()->induser_id}}{{Auth::user()->corpuser_id}}" 
                    data-utype="app" style="color: darkblue;">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="notification-list">
                  @foreach($notifications as $not)
                  
                  <li>

                    @if($not->operation == 'link request' || $not->operation == 'link response')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="links" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @elseif($not->operation == 'job contact')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="mypost" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @elseif($not->operation == 'group')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="group" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @elseif($not->operation == 'user tagging')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="home" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @elseif($not->operation == 'post sharing')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="home" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @elseif($not->operation == 'job expire')
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="home" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @else
                    <a href="#" data-nid="{{$not->id}}" data-lnkt="notification" data-anchor="home" 
                      @if($not->view_status == 0)style="background:#f8f9fa"@endif>
                    @endif

                      <span class="photo">
                      @if($not->fromuser != null)
                        @if($not->fromuser->first()->induser != null)
                          
                          <img src="@if($not->fromuser->first()->induser->profile_pic != null){{ '/img/profile/'.$not->fromuser->first()->induser->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">                        
                          
                        @elseif($not->fromuser->first()->corpuser != null)
                          
                          <img src="@if($not->fromuser->first()->corpuser->logo_status != null){{ '/img/profile/'.$not->fromuser->first()->corpuser->logo_status }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                          {{-- <div class=""><i class="icon-speedometer"></i> 55%</div> --}}
                         
                        @endif
                      @else
                        <img src="/assets/images/ab.png" class="img-circle" width="40" height="40">                 
                      @endif
                      </span>
                      <span class="subject">
                        @if($not->fromuser != null && $not->touser != null)
                        <span class="from">
                          {{$not->fromuser->first()->name}} 
                        </span>
                        @else
                          Jobtip
                        @endif
                        <span class="time">
                          {{ \Carbon\Carbon::createFromTimeStamp(strtotime($not->created_at))->diffForHumans() }}
                        </span>
                      </span>
                      <span class="message">
                      {{$not->remark}} </span>
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
          <li class="dropdown dropdown-extended dropdown-inbox thank-fav-icon" id="header_inbox_bar">
            <a class="dropdown-toggle @if($title == 'notify_view'){{'active'}}@endif" href="/notify/thanks/@if(Auth::user()->identifier==1){{'ind'}}@elseif(Auth::user()->identifier==2){{'corp'}}@endif/{{Auth::user()->induser_id}}{{Auth::user()->corpuser_id}}" data-utype="thank">
            <i class="fa fa-thumbs-up icon-color"></i>
            <span class="badge badge-default  @if($thanksCount > 0) show @else hide @endif" id="like-count" style="background-color:lightcoral !important;">{{$thanksCount}}</span>
            </a>
          </li>
         
          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN TODO DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended dropdown-tasks thank-fav-icon" id="header_task_bar">
            <a href="/favourite" data-utype="fav" class="dropdown-toggle @if($title == 'notify_view'){{'active'}}@endif"  data-close-others="true">
              <i class="fa fa-star icon-color"></i>              
              <span class="badge badge-default @if(count($favourites) > 0) show @else hide @endif" 
                    id="myfavcount">{{count($favourites)}}
              </span>              
            </a>            
          </li>
           <!-- <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
            
          </li> -->
          <!-- END TODO DROPDOWN -->
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <div class="btn-group" style="margin: 0px 17px;float:right">
        <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
        <span class="">Post</span>
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
      <!-- Search -->
      <form class="search-form search-form-expanded" action="/search/" method="GET">
        <div class="input-group search-input-box">
          <input type="text" class="form-control search-field" 
                 placeholder="Search..." name="query" pattern=".{3,}" required title="3 characters minimum"
                 autocomplete="off">
          <!-- <span class="input-group-btn as-span">
            <a class="advance-search btn" data-toggle="modal" href="#advance">Advance</a>
          </span> -->
          <span class="input-group-btn">
            <a class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form>
      <!-- end Search -->
      
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


<div class="modal fade" id="myactivity-post" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog-new">
    <div class="modal-content">
      <div id="myactivity-post-content">
        My Activity Post 
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- BEGIN SIDEBAR1 -->
<div class="page-sidebar-wrapper">
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

  <div class="page-sidebar navbar-collapse collapse " >
   <div class="navigation-bar"><a href="javascript:;" class="menu-toggler responsive-toggler toggle-disp" data-toggle="collapse" data-target=".navbar-collapse">
      <i class="fa fa-bars" style="font-size: 18px;"></i>
    </a>
  </div>
   <div class="row  nav-thank-fav" id="nav-than-fav">
      <div class="col-md-4 col-sm-4 col-xs-4">
        <a href="/notify/thanks/@if(Auth::user()->identifier==1){{'ind'}}@elseif(Auth::user()->identifier==2){{'corp'}}@endif/{{Auth::user()->induser_id}}{{Auth::user()->corpuser_id}}" data-utype="thank"
         class="icon-btn @if($title == 'notify_view'){{'active'}}@endif" style="border: 0 !important;background-color: transparent !important;min-width:55px !important;">
          <i class="fa fa-thumbs-up" style="color: white;font-size:20px;"></i>
          <div style="color: whitesmoke;">
             Thanks
          </div>
          <span class="badge badge-danger @if($thanksCount > 0) show @else hide @endif" style="background-color: #3598dc;right:8px !important;">
          {{$thanksCount}}</span>
        </a>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
        <a href="/favourite" class="icon-btn" style="border: 0 !important;background-color: transparent !important;">
          <i class="fa fa-star" style="color:yellow;font-size:20px"></i>
          <div style="color: whitesmoke;">
           Favourites
          </div>
          <span id="myfavcount" class="badge badge-danger @if(count($favouritesCount) > 0) show @else hide @endif" style="background-color: #26a69a;right:15px !important;">
          {{count($favouritesCount)}} </span>
        </a>
      </div>
    </div>
    <!-- BEGIN SIDEBAR MENU1 -->
    <ul class="page-sidebar-menu page-sidebar-menu-compact page-sidebar-menu-hover-submenu thank-fav-icon-disp" data-slide-speed="200"  data-auto-scroll="false" data-slide-speed="200">
      
          <!-- BEGIN USER LOGIN DROPDOWN -->
      <li >
        <div class="user-short-detail-container">
           @if(Auth::user()->identifier == 1)
          <div class="profile-userpic user-image">
            @if($session_user->reg_via == 'facebook')
              <img src="{{ $session_user->avatar }}" style="width:150px"/>
            @elseif($session_user->reg_via == 'google')
              <img src="{{ $session_user->avatar }}0" style="width:150px"/>
            @elseif($session_user->reg_via == 'linkedin')
              <img src="{{ $session_user->avatar }}" style="width:150px"/>
            @else
            <a id="ajax-demo" href="#profile-pic" data-toggle="modal" class="config">
                @if($session_user->profile_pic == null && $session_user->fname != null)
                  <div class="hover-image">Add</div>
                @endif      
                @if($session_user->profile_pic != null)
                  <img src="/img/profile/{{ $session_user->profile_pic }}">
                  <div class="hover-image"><i class="glyphicon glyphicon-edit"></i>Change</div>
                @endif
            </a>
            @endif
          </div>
          @else
          <div class="profile-userpic-corp user-image">
            <a id="ajax-demo" href="#profile-pic" data-toggle="modal" class="config">
                @if($session_user->logo_status == null && $session_user->firm_name != null)
                  <div class="hover-image">Add</div>
                @endif
                @if($session_user->logo_status != null)
                  <img src="/img/profile/{{ $session_user->logo_status }}">
                  <div class="hover-image"><i class="glyphicon glyphicon-edit"></i>Change</div>
                @endif       
            </a>
          </div>
          @endif
          <h3 class="form-title user-name">
            @if(Auth::user()->identifier == 1)
           <a style="color: deepskyblue;text-decoration:none;" href="/profile/ind/{{$session_user->id}}" data-utype="ind"> 
            {{ $session_user->fname }} {{ $session_user->lname }} </a>
            <a style="color: white;text-decoration:none;" href="/individual/edit" data-utype="ind"> 
              <i class="fa fa-edit (alias)"></i>
            </a>
            @else
            <a style="color: deepskyblue;text-decoration:none;font-size:14px;" class="" href="/profile/corp/{{$session_user->id}}" data-utype="corp"> 
             {{ $session_user->firm_name }} <i class="fa fa-edit (alias)"></i>
            </a>
            <br>
           <div> <label style="font-size:12px;">
             <span class="badge badge-default @if($followCount > 0) show @else hide @endif" style="font-weight:500;background-color: darkseagreen !important;">
              {{$followCount}} Followers </span></label></div>
            @endif
          </h3>
          @if(Auth::user()->identifier == 1)
            @if($session_user->working_status == "Student")
            <div class="profile-usertitle-job">
               {{ $session_user->education }} in {{ $session_user->branch }}, {{ $session_user->city }}
            </div>
            @elseif($session_user->working_status == "Searching Job")
            <div class="profile-usertitle-job">
               {{ $session_user->working_status }} in {{ $session_user->prof_category }}, {{ $session_user->city }}
            </div>
            @elseif($session_user->working_status == "Freelanching")
            <div class="profile-usertitle-job">
               {{ $session_user->role }} {{ $session_user->working_status }}, {{ $session_user->city }}
            </div>
            @elseif($session_user->role != null && $session_user->working_at !=null && $session_user->working_status == "Working")
            <div class="profile-usertitle-job">
               {{ $session_user->role }} @ {{ $session_user->working_at }} 
            </div>
            @elseif($session_user->role != null && $session_user->working_at ==null && $session_user->working_status == "Working")
            <div class="profile-usertitle-job">
               {{ $session_user->role }}, {{ $session_user->city }}
            </div>
            @elseif($session_user->role == null && $session_user->working_at !=null && $session_user->working_status == "Working")
            <div class="profile-usertitle-job">
               {{ $session_user->woring_at }}, {{ $session_user->city }}
            </div>
            @elseif($session_user->role == null && $session_user->working_at ==null && $session_user->working_status == "Working")
            <div class="profile-usertitle-job">
               {{ $session_user->prof_category }}, {{ $session_user->city }}
            </div>
            @endif
          @endif
        </div>
      </li>
      @if (Auth::user()->identifier == 1 || Auth::user()->identifier == 2)
      <li class="@if($title == 'home'){{'active'}}@endif">
        <a class="" href="/home">
        <i class=" icon-home"></i>
        <span class="title">
        Home</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li class="@if($title == 'mypost'){{'active'}}@endif">
        <a class="" href="/mypost">
        <i class=" icon-note"></i>
        <span class="title">
        My Activity</span>
        <span class="selected">
        </span>
        </a>
      </li>
      @endif
      @if (Auth::user()->identifier == 1)
      <li class="@if($title == 'connections'){{'active'}}@endif">
        <a class="" href="/links">
        <i class="icon-link"></i>
        <span class="title">
        Links</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li class="@if($title == 'group'){{'active'}}@endif">
        <a class="" href="/group">
        <i class="icon-users"></i>
        <span class="title">
        Groups</span>
        <span class="selected">
        </span>
        </a>
      </li>
      @endif
      
      @if (Auth::user()->identifier == 1 || Auth::user()->identifier == 2)
      <li>
        <a href="javascript:;">
        <i class="icon-eye"></i>
        <span class="title">
        Related Jobs </span>
        <span class="selected">
        </span>
        
        </a>
        <ul class="sub-menu">
          <li>
            <a class="ajaxify" href="layout_ajax_content_2.html">
            Ajax Link Sample 1 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_3.html">
            Ajax Link Sample 2 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_2.html">
            Ajax Link Sample 3 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_3.html">
            Ajax Link Sample 4 </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
        <i class="icon-shuffle"></i>
        <span class="title">
        Community </span>
        <span class="selected">
        </span>
        
        </a>
        <ul class="sub-menu">
          <li>
            <a class="ajaxify" href="layout_ajax_content_2.html">
            Ajax Link Sample 1 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_3.html">
            Ajax Link Sample 2 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_2.html">
            Ajax Link Sample 3 </a>
          </li>
          <li>
            <a class="ajaxify" href="layout_ajax_content_3.html">
            Ajax Link Sample 4 </a>
          </li>
        </ul>
      </li>
      @endif
      <li>
        <a href="javascript:;">
        <i class="icon-settings"></i>
        <span class="title">
        Setting </span>
        <span class="selected">
        </span>
        
        </a>
        <ul class="sub-menu">
          <li>
            <a href="#change-password" data-toggle="modal">
              <i class="icon-user"></i>&nbsp;Change password 
            </a>
          </li>
          <li>
            <a class="ajaxify" href="accountsetting.html">
              <i class="icon-user"></i>&nbsp;Account 
            </a>
          </li>
          <li>
            <a class="ajaxify" href="notification.html">
              <i class="icon-bulb"></i>&nbsp;Notification 
            </a>
          </li>
          <li>
            <a href="/feedback/create">
              <i class="icon-star"></i>&nbsp;Feedback
            </a>
          </li>
          
        </ul>
      </li>
      @if (Auth::guest())
      @else
          <li class="last">
            <a href="{{ url('/auth/logout') }}">
              <i class="icon-logout"></i>
              <span class="title">Log Out</span>
              <span class="selected">
            </span>        
            </a>
          </li>
      @endif
    </ul>
    <!-- END SIDEBAR MENU1 -->
  </div>
</div>
<!-- END SIDEBAR1-->

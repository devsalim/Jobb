<!-- BEGIN SIDEBAR1 -->
<div class="page-sidebar-wrapper">
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU1 -->
    <ul class="page-sidebar-menu page-sidebar-menu-compact page-sidebar-menu-hover-submenu" data-slide-speed="200"  data-auto-scroll="false" data-slide-speed="200">
      <li >
        <div class="user-short-detail-container">
          <div class="profile-userpic user-image">
            <a id="ajax-demo" href="#profile-pic" data-toggle="modal" class="config">
                @if($user->profile_pic == null && $user->fname != null)
                  <div class="hover-image">Add</div>
                @endif
                @if($user->logo_status == null && $user->firm_name != null)
                  <div class="hover-image">Add</div>
                @endif
                @if($user->logo_status != null)
                  <img src="/img/profile/{{ $user->logo_status }}">
                  <div class="hover-image"><i class="glyphicon glyphicon-edit"></i>Change</div>
                @endif       
                @if($user->profile_pic != null)
                  <img src="/img/profile/{{ $user->profile_pic }}">
                  <div class="hover-image"><i class="glyphicon glyphicon-edit"></i>Change</div>
                @endif
            </a>
          </div>
          <h3 class="form-title user-name">
            {{ $user->fname }} {{ $user->lname }}
            {{ $user->firm_name }}
          </h3>
          <h3 class="form-title user-company">
            {{ $user->working_at }}
          </h3>
          @if($user->city!=null || $user->state!=null)
          <h3 class="form-title user-location">
            {{ $user->city }}, {{ $user->state }} 
          </h3>
          @endif          
        </div>
      </li>
      <li class="@if($title == 'home'){{'active'}}@endif">
        <a class="" href="/home">
        <i class=" icon-note"></i>
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
        My Post</span>
        <span class="selected">
        </span>
        </a>
      </li>
      @if (Auth::user()->identifier == 1)
      <li class="@if($title == 'profile'){{'active'}}@endif">
        <a class="" href="/individual/create">
        <i class=" icon-note"></i>
        <span class="title">
        Profile</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li class="@if($title == 'connections'){{'active'}}@endif">
        <a class="" href="/connections/create">
        <i class="glyphicon glyphicon-link"></i>
        <span class="title">
        Connections</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li class="@if($title == 'group'){{'active'}}@endif">
        <a class="" href="/group/create">
        <i class=" icon-note"></i>
        <span class="title">
        Groups</span>
        <span class="selected">
        </span>
        </a>
      </li>
      @endif
      @if (Auth::user()->identifier == 2)
      <li class="@if($title == 'profile'){{'active'}}@endif">
        <a class="" href="/corporate/create">
        <i class=" icon-note"></i>
        <span class="title">
        Profile</span>
        <span class="selected">
        </span>
        </a>
      </li>
      @endif
      <li class="@if($title == 'indview'){{'active'}}@endif">
        <a class="" href="/individual_view/create">
        <i class=" icon-note"></i>
        <span class="title">
        Profile</span>
        <span class="selected">
        </span>
        </a>
      </li>
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
            <a class="ajaxify" href="feedback/create">
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
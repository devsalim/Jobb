<!-- BEGIN SIDEBAR1 -->
<div class="page-sidebar-wrapper">
  <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
  <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
  <div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU1 -->
    <ul class="page-sidebar-menu page-sidebar-menu-compact page-sidebar-menu-hover-submenu" data-slide-speed="200"  data-auto-scroll="false" data-slide-speed="200">
      <li >
        <div class="profile-userpic">
          <img src="../../assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="" style="
float: none;margin:18px auto;width:60%;height: 60%;-webkit-border-radius: 50% !important;-moz-border-radius: 50% !important;border-radius: 50% !important;">
          @if (Auth::guest())
            <h3 class="form-title" style="font-size: 20px;text-align:center;">John Cena</h3>
            <h3 class="form-title" style="font-size: 14px;text-align:center;margin-top: -25px;">ABC Company</h3>
            <h3 class="form-title" style="font-size: 14px;text-align:center;margin-top: -25px;">City: California</h3>
          @else
            <h3 class="form-title" style="font-size: 20px;text-align:center;">{{ Auth::user()->name }}</h3>
            <h3 class="form-title" style="font-size: 14px;text-align:center;margin-top: -25px;">{{ $user->working_at }}</h3>
            <h3 class="form-title" style="font-size: 14px;text-align:center;margin-top: -25px;">{{ $user->city }}, {{ $user->state }} 
            </h3>             
            
          @endif
          
        </div>
      </li>
      <li class="start">
        <a class="ajaxify start" href="home">
        <i class=" icon-note"></i>
        <span class="title">
        Home</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li class="">
        <a class="ajaxify" href="mypost">
        <i class=" icon-note"></i>
        <span class="title">
        My Post</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li >
        <a class="ajaxify" href="job/create">
        <i class=" icon-note"></i>
        <span class="title">
        Post Job</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li >
        <a class="ajaxify" href="skill/create">
        <i class=" icon-note"></i>
        <span class="title">
        Post Skill</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li >
        <a class="ajaxify" href="individual/create">
        <i class=" icon-note"></i>
        <span class="title">
        Professional Page</span>
        <span class="selected">
        </span>
        </a>
      </li>
      <li >
        <a class="ajaxify" href="corporate/create">
        <i class=" icon-note"></i>
        <span class="title">
        Firm Update</span>
        <span class="selected">
        </span>
        </a>
      </li>
      
      <li>
        <a href="javascript:;">
        <i class="fa fa-chain (alias)"></i>
        <span class="title">
        Connections</span>
        <span class="selected">
        </span>
        
        </a>
        <ul class="sub-menu">
          <li>
            <a class="ajaxify" href="postjobupdate.html">
            Post Jobs</a>
          </li>
          <li>
            <a class="ajaxify" href="invitefriend.html">
            Invite Friends </a>
          </li>
          <li>
            <a class="ajaxify" href="creategroup.html">
            Create Group</a>
          </li>
          <li>
            <a class="ajaxify" href="professional_page.html">
            Professional Page </a>
          </li>
          <li>
            <a class="ajaxify" href="firm_detailsupdate.html">
            Firm Details </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="javascript:;">
        <i class="icon-magnet"></i>
        <span class="title">
        Groups </span>
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-user"></i>&nbsp;Account </a>
          </li>
          <li>
            <a class="ajaxify" href="notification.html">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-bulb"></i>&nbsp;Notification </a>
          </li>
          <li>
            <a class="ajaxify" href="feedback.html">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-star"></i>&nbsp;Feedback</a>
          </li>
          
        </ul>
      </li>
      <li class="last">
        <a href="javascript:;">
        <i class="icon-logout"></i>
        <span class="title">
        Log Out </span>
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
    </ul>
    <!-- END SIDEBAR MENU1 -->
  </div>
</div>
<!-- END SIDEBAR1 -->
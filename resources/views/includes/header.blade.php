<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top nav-disp" id="nav-display">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner container">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <img src="{{ asset('/assets/new_big_logo.png') }}" class="big-logo" />
      <img src="{{ asset('/assets/new_sm_logo.png') }}" class="small-logo" />
      
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
            <i class="icon-bulb icon-color"></i>
            <span class="badge badge-default @if($applicationsCount > 0) show @else hide @endif" style="background-color: darkorchid !important;">{{$applicationsCount}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">{{$applicationsCount}}</span> Messages</h3>
                <a class="@if($title == 'notify_view'){{'active'}}@endif" href="/notification_view" style="color: darkblue;">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  @foreach($applications as $application)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($application->user->profile_pic != null){{ '/img/profile/'.$application->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                    <div class="match"><i class="icon-speedometer"></i> 55%</div>
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$application->user->fname}} </span>
                    <span class="time">{{$application->apply_dtTime}}</span>
                    </span>
                    <span class="message">
                    has applied your Job<br> Post Id: {{$application->unique_id}} </span>
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
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="icon-like icon-color"></i>
            <span class="badge badge-default  @if($thanksCount > 0) show @else hide @endif" style="background-color:lightcoral !important;">{{$thanksCount}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">{{$thanksCount}}</span> Messages</h3>
                <a class="@if($title == 'notify_view'){{'active'}}@endif" href="/notification_view" style="color: darkblue;">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  @foreach($thanks as $thank)
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="@if($thank->user->profile_pic != null){{ '/img/profile/'.$thank->user->profile_pic }}@else{{'/assets/images/ab.png'}}@endif" class="img-circle" width="40" height="40">
                    <div class="match"><i class="icon-speedometer"></i> 55%</div>
                    </span>
                    <span class="subject">
                    <span class="from">
                    {{$thank->user->fname}} </span>
                    <span class="time">{{$thank->thanks_dtTime}}</span>
                    </span>
                    <span class="message">
                    has thanked for Job<br> Post Id: {{$thank->unique_id}} </span>
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
          <li class="dropdown dropdown-extended dropdown-tasks thank-fav-icon" id="header_task_bar">
            <a href="/notification_view" class="dropdown-toggle @if($title == 'notify_view'){{'active'}}@endif"  data-close-others="true">
              <i class="icon-pin icon-color"></i>
              
              <span class="badge badge-default @if(count($favourites) > 0) show @else hide @endif" id="myfavcount">{{count($favourites)}}</span>
              
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
      <form class="search-form search-form-expanded" method="GET">
        <div class="input-group search-input-box">
          <input type="text" class="form-control search-field" placeholder="Search..." name="query">
          <span class="input-group-btn as-span">
            <a class="advance-search btn" data-toggle="modal" href="#advance">Advance</a>
          </span>
          <span class="input-group-btn">
            <a class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form>
      <!-- <form class="search-form" action="extra_search.html" method="GET">
        <div class="input-group">
          <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
          <span class="input-group-btn">
          <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
          </span>
        </div>
      </form> -->
      
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

<div class="modal fade" id="advance" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-width">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #3598dc; height: 40px;padding: 8px;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute;right: 15px;top: 15px;"></button>
        <h4 class="modal-title links-title" style="color:white;">
          <i class="icon-magnifier"></i> Advance Search
        </h4>
      </div>
      <div class="modal-body links-title" style="padding:0;">
        <div class="portlet box" style="border: 0;">
              <div class="portlet-body">
                <div class="tabbable-line">
                  <ul class="nav nav-tabs nav-tab-new">
                    <li class="active">
                      <a href="#tab_15_1" data-toggle="tab" style="font-size:15px;font-weight:600;">
                      Post </a>
                    </li>
                    <li>
                      <a href="#tab_15_2" data-toggle="tab" style="font-size:15px;font-weight:600;">
                      Profile </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_15_1">
                      <form id="search-post" action="/home" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="row links-title" style="margin-bottom: 20px;margin-top: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12 advance-len">
                          <div class="input-group">
                            <div class="icheck-inline">
                              <label style="font-weight:500;">
                              <input type="radio" name="post_type[]" class="icheck"> Job</label>
                              <label style="font-weight:500;">
                              <input type="radio" name="post_type[]" class="icheck"> Skill </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2 col-sm-1 col-xs-1 advance-len "></div>
                        <div class="col-md-4 col-sm-5 col-xs-5 advance-len ">
                          <div class="input-group">
                            <div class="icheck-inline">
                              <label>
                              <input type="checkbox" class="icheck">Magic Match</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 advance-len">
                          <div class="form-group">              
                              <select name="time_for" class="form-control" style="border-top: 0px;border-left: 0;border-right: 0;">
                                <option value="30%+">30% +</option>
                                <option value="40%+">40% +</option>
                                <option selected value="50%+">50% +</option>
                                <option value="60%+">60% +</option>
                                <option value="70%+">70% +</option>
                                <option value="80%+">80% +</option>
                                <option value="90%+">90% +</option>
                                <option value="All">All</option>
                              </select>
                          </div>  
                        </div>
                        <div class="col-md-2 col-sm-1 col-xs-1 advance-len "></div>
                      </div>
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8 advance-len">
                          <div class="form-group">              
                              <input type="text" name="post_title" class="form-control filter-input" placeholder="Enter Title">
                          </div>  
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 advance-len">
                          <div class="form-group">              
                              <input type="text" name="unique_id" class="form-control filter-input" placeholder="Post Id">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="prof_category" class="form-control filter-input" placeholder="Job Category">
                          </div>  
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="role" class="form-control filter-input" placeholder="Job Role">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" class="form-control filter-input" placeholder="Enter Name who posted Job">
                          </div>  
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="city" class="form-control filter-input" placeholder="Location: Pune, Hyderabad, Bangalore">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
                          <div class="form-group">              
                              <input type="text" class="form-control filter-input" placeholder="Exp">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
                          <div class="form-group">              
                              <select name="time_for" class="form-control" >
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Freelancer">Freelancer</option>
                              </select>
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" class="form-control filter-input" placeholder="Enter Skills: Painter, Delievery Boy...">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class=" links-title">              
                              <label>Posted By</label>
                          </div>  
                        </div>
                      </div>
                      <div class="row links-title">
                        <div class="btn-group col-md-12 col-sm-12 col-xs-12" data-toggle="buttons">
                          <label class="btn btn-default  check-font-size active">
                          <input type="checkbox" name="posted_by[]" class="toggle"> Individual </label>
                          <label class="btn btn-default  check-font-size">
                          <input type="checkbox" name="posted_by[]" class="toggle"> Company </label>
                          <label class="btn btn-default  check-font-size">
                          <input type="checkbox" name="posted_by[]" class="toggle"> Consultancy </label>
                        </div>
                      </div>
                      <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="footer links-title">              
                              <button type="submit" class="btn blue links-title"><i class="glyphicon glyphicon-search"></i> Search</button>
                          </div>  
                        </div>
                      </div>
                    </form>
                    </div>
                    <div class="tab-pane" id="tab_15_2">
                      <form id="search-profile" action="/search/profile" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="row links-title" style="margin-bottom: 20px;margin-top: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12 advance-len">
                          <div class="input-group">
                            <div class="icheck-inline">
                              <label>
                              <input type="radio" name="type" value="people" class="icheck">People</label>
                              <label>
                              <input id="hide-comp" type="radio" value="company" name="type" class="icheck">Company</label>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
                          <div class="form-group">              
                              <input type="text" name="name" class="form-control filter-input" placeholder="Enter Name or Email Id">
                          </div>  
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 advance-len">
                          <div class="form-group">              
                              <input type="text" name="city" class="form-control filter-input" placeholder="Location: Pune, Hyderabad">
                          </div>  
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="role" class="form-control filter-input" placeholder="Job Role">
                          </div>  
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="category" class="form-control filter-input" placeholder="Job Category">
                          </div>  
                        </div>
                      </div>
                      <div class="row show-comp">
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="working_at" class="form-control filter-input" placeholder="Working at">
                          </div>  
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 advance-len">
                          <div class="form-group">              
                              <input type="text" name="mobile" class="form-control filter-input" placeholder="Mobile No">
                          </div>  
                        </div>
                      </div>
                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="footer links-title">              
                              <button type="submit" class="btn blue links-title"><i class="glyphicon glyphicon-search"></i> Search</button>
                          </div>  
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn blue links-title"><i class="glyphicon glyphicon-search"></i> Search</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


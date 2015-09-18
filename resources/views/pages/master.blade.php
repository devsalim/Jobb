<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>JobTip</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/simple-tooltip/index.html" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-summernote/summernote.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/typeahead/typeahead.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css') }}"/>

<script src="{{ asset('/assets/global/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('/assets/global/plugins/pace/themes/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('/assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/admin/layout2/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{ asset('/assets/admin/layout2/css/themes/grey.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/admin/layout2/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/admin/pages/css/timeline.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/custom.css') }}" rel="stylesheet"/>
<link href="{{ asset('/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet"/>
<link href="{{ asset('/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.Metronic.css') }}" rel="stylesheet"/>

<style type="css/text" rel="stylesheet">
body.page-boxed{
  background-attachment: fixed !important;
}
.segmented-button {
  padding: 12px !important;
}
.segmented-button input[type="radio"] {
  width: 0px !important;
  height: 0px !important;
  display: none !important;
}
.segmented-button label {
  display: -moz-inline-box !important;
  -moz-box-orient: vertical !important;
  display: inline-block !important;
  vertical-align: middle !important;
  *vertical-align: auto !important;
  -moz-border-radius: 4px !important;
  -webkit-border-radius: 4px !important;
  -o-border-radius: 4px !important;
  -ms-border-radius: 4px !important;
  -khtml-border-radius: 4px !important;
  border-radius: 4px !important;
  text-shadow: white !important;
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #e4e4e4)) !important;
  background: -webkit-linear-gradient(#ffffff, #e4e4e4) !important;
  background: -moz-linear-gradient(#ffffff, #e4e4e4) !important;
  background: -o-linear-gradient(#ffffff, #e4e4e4) !important;
  background: -ms-linear-gradient(#ffffff, #e4e4e4) !important;
  background: linear-gradient(#ffffff, #e4e4e4) !important;
  border: 1px solid #b2b2b2 !important;
  color: #666666 !important;
  padding: 5px 24px !important;
  padding-bottom: 3px !important;
  font-size: 12px !important;
  cursor: pointer !important;
  font-family: Helvetica !important;
  -moz-border-radius: 0px;
  -webkit-border-radius: 0px !important;
  -o-border-radius: 0px !important;
  -ms-border-radius: 0px !important;
  -khtml-border-radius: 0px !important;
  border-radius: 0px !important;
  margin-right: -5px !important;
}
.segmented-button label {
  *display: inline !important;
}
.segmented-button label:hover {
  -moz-box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.1) !important;
  -webkit-box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.1) !important;
  -o-box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.1) !important;
  box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.1) !important;
  color: #333333 !important;
}
.segmented-button label:active, .segmented-button label.active {
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #e4e4e4), color-stop(100%, #ffffff)) !important;
  background: -webkit-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -moz-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -o-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -ms-linear-gradient(#e4e4e4, #ffffff) !important;
  background: linear-gradient(#e4e4e4, #ffffff) !important;
}
.segmented-button label:disabled, .segmented-button label.disabled {
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #efefef));
  background: -webkit-linear-gradient(#ffffff, #efefef) !important;
  background: -moz-linear-gradient(#ffffff, #efefef) !important;
  background: -o-linear-gradient(#ffffff, #efefef) !important;
  background: -ms-linear-gradient(#ffffff, #efefef) !important;
  background: linear-gradient(#ffffff, #efefef) !important;
  cursor: default !important;
  color: #b2b2b2 !important;
  border-color: #cccccc !important;
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  -o-box-shadow: none !important;
  box-shadow: none !important;
}
.segmented-button label.first {
  -moz-border-radius-topleft: 4px !important;
  -webkit-border-top-left-radius: 4px !important;
  -o-border-top-left-radius: 4px !important;
  -ms-border-top-left-radius: 4px !important;
  -khtml-border-top-left-radius: 4px !important;
  border-top-left-radius: 4px !important;
  -moz-border-radius-bottomleft: 4px !important;
  -webkit-border-bottom-left-radius: 4px !important;
  -o-border-bottom-left-radius: 4px !important;
  -ms-border-bottom-left-radius: 4px !important;
  -khtml-border-bottom-left-radius: 4px !important;
  border-bottom-left-radius: 4px !important;
}
.segmented-button label.last {
  -moz-border-radius-topright: 4px !important;
  -webkit-border-top-right-radius: 4px !important;
  -o-border-top-right-radius: 4px !important;
  -ms-border-top-right-radius: 4px !important;
  -khtml-border-top-right-radius: 4px !important;
  border-top-right-radius: 4px !important;
  -moz-border-radius-bottomright: 4px !important;
  -webkit-border-bottom-right-radius: 4px !important;
  -o-border-bottom-right-radius: 4px !important;
  -ms-border-bottom-right-radius: 4px !important;
  -khtml-border-bottom-right-radius: 4px !important;
  border-bottom-right-radius: 4px !important;
}
.segmented-button input:checked + label, .segmented-button label.selected {
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #e4e4e4), color-stop(100%, #ffffff)) !important;
  background: -webkit-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -moz-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -o-linear-gradient(#e4e4e4, #ffffff) !important;
  background: -ms-linear-gradient(#e4e4e4, #ffffff) !important;
  background: linear-gradient(#e4e4e4, #ffffff) !important;
}
.segmented-button input:disabled + label {
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #efefef)) !important;
  background: -webkit-linear-gradient(#ffffff, #efefef) !important;
  background: -moz-linear-gradient(#ffffff, #efefef) !important;
  background: -o-linear-gradient(#ffffff, #efefef) !important;
  background: -ms-linear-gradient(#ffffff, #efefef) !important;
  background: linear-gradient(#ffffff, #efefef) !important;
  cursor: default !important;
  color: #b2b2b2!important;
  border-color: #cccccc !important;
  -moz-box-shadow: none !important;
  -webkit-box-shadow: none !important;
  -o-box-shadow: none !important;
  box-shadow: none !important;
}
</style>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-boxed page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner container">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <img src="{{ asset('/assets/logo-jobtip.png') }}" class="big-logo" />
      <img src="{{ asset('/assets/logo-small.png') }}" class="small-logo" />
      <div class="menu-toggler sidebar-toggler">
        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
        <i class="fa fa-bars"></i>
      </div>
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
          <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="icon-bulb"></i>
            <span class="badge badge-default">
            7 </span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3><span class="bold">12 pending</span> notifications</h3>
                <a href="extra_profile.html">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                  <li>
                    <a href="javascript:;">
                    <span class="time">just now</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-success">
                    <i class="fa fa-plus"></i>
                    </span>
                    New user registered. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">3 mins</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-danger">
                    <i class="fa fa-bolt"></i>
                    </span>
                    Server #12 overloaded. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">10 mins</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-warning">
                    <i class="fa fa-bell-o"></i>
                    </span>
                    Server #2 not responding. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">14 hrs</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-info">
                    <i class="fa fa-bullhorn"></i>
                    </span>
                    Application error. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">2 days</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-danger">
                    <i class="fa fa-bolt"></i>
                    </span>
                    Database overloaded 68%. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">3 days</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-danger">
                    <i class="fa fa-bolt"></i>
                    </span>
                    A user IP blocked. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">4 days</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-warning">
                    <i class="fa fa-bell-o"></i>
                    </span>
                    Storage Server #4 not responding dfdfdfd. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">5 days</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-info">
                    <i class="fa fa-bullhorn"></i>
                    </span>
                    System Error. </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="time">9 days</span>
                    <span class="details">
                    <span class="label label-sm label-icon label-danger">
                    <i class="fa fa-bolt"></i>
                    </span>
                    Storage server failed. </span>
                    </a>
                  </li>
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
            <span class="badge badge-default">
            4 </span>
            </a>
            <ul class="dropdown-menu">
              <li class="external">
                <h3>You have <span class="bold">7 New</span> Messages</h3>
                <a href="page_inbox.html">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="{{ asset('/assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
                    </span>
                    <span class="subject">
                    <span class="from">
                    Lisa Wong </span>
                    <span class="time">Just Now </span>
                    </span>
                    <span class="message">
                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="{{ asset('/assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                    </span>
                    <span class="subject">
                    <span class="from">
                    Richard Doe </span>
                    <span class="time">16 mins </span>
                    </span>
                    <span class="message">
                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="{{ asset('/assets/admin/layout3/img/avatar1.jpg') }}" class="img-circle" alt="">
                    </span>
                    <span class="subject">
                    <span class="from">
                    Bob Nilson </span>
                    <span class="time">2 hrs </span>
                    </span>
                    <span class="message">
                    Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="{{ asset('/assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
                    </span>
                    <span class="subject">
                    <span class="from">
                    Lisa Wong </span>
                    <span class="time">40 mins </span>
                    </span>
                    <span class="message">
                    Vivamus sed auctor 40% nibh congue nibh... </span>
                    </a>
                  </li>
                  <li>
                    <a href="inbox.html?a=view">
                    <span class="photo">
                    <img src="{{ asset('/assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                    </span>
                    <span class="subject">
                    <span class="from">
                    Richard Doe </span>
                    <span class="time">46 mins </span>
                    </span>
                    <span class="message">
                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- END INBOX DROPDOWN -->
          <!-- BEGIN TODO DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
            <i class="icon-star"></i>
            <span class="badge badge-default">
            3 </span>
            </a>
            <ul class="dropdown-menu extended tasks">
              <li class="external">
                <h3>You have <span class="bold">12 pending</span> tasks</h3>
                <a href="page_todo.html">view all</a>
              </li>
              <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">New release v1.2 </span>
                    <span class="percent">30%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">Application deployment</span>
                    <span class="percent">65%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">Mobile app release</span>
                    <span class="percent">98%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">Database migration</span>
                    <span class="percent">10%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">Web server upgrade</span>
                    <span class="percent">58%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">Mobile development</span>
                    <span class="percent">85%</span>
                    </span>
                    <span class="progress">
                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                    </span>
                    </a>
                  </li>
                  <li>
                    <a href="javascript:;">
                    <span class="task">
                    <span class="desc">New UI release</span>
                    <span class="percent">38%</span>
                    </span>
                    <span class="progress progress-striped">
                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                    </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- END TODO DROPDOWN -->
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
          
          <!-- END USER LOGIN DROPDOWN -->
        </ul>

        @if (Auth::guest())
      @else
          <a href="{{ url('/auth/logout') }}" class="btn btn-sm btn-danger pull-right" style="text-decoration: none;margin: 5px 0 0;border-radius: 4px !important;">Logout</a>
      @endif
        
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
        <span class="hidden-sm hidden-xs">Post&nbsp;</span>
        </button>
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
<div class="clearfix">
</div>
<div class="container">




<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
  <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
           Widget settings form goes here
        </div>
        <div class="modal-footer">
          <button type="button" class="btn blue">Save changes</button>
          <button type="button" class="btn default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
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
          <a class="ajaxify" href="mypostnew">
          <i class=" icon-note"></i>
          <span class="title">
          My Post</span>
          <span class="selected">
          </span>
          </a>
        </li>
        <li >
          <a class="ajaxify" href="postjobupdate">
          <i class=" icon-note"></i>
          <span class="title">
          Post Job</span>
          <span class="selected">
          </span>
          </a>
        </li>
        <li >
          <a class="ajaxify" href="professional_page">
          <i class=" icon-note"></i>
          <span class="title">
          Professional Page</span>
          <span class="selected">
          </span>
          </a>
        </li>
        <li >
          <a class="ajaxify" href="firm_details">
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
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN STYLE CUSTOMIZER -->
      <div class="theme-panel">
        <div class="toggler tooltips" data-container="body" data-placement="left"  data-original-title="Click to open advance theme customizer panel">
          <i class="icon-settings"></i>
        </div>
        <div class="toggler-close">
          <i class="icon-close"></i>
        </div>
        <div class="theme-options">
          <div class="theme-option theme-colors clearfix">
            <span>
            THEME COLOR </span>
            <ul>
              <li class="color-default tooltips" data-style="default" data-container="body" data-original-title="Default">
              </li>
              <li class="color-grey current tooltips" data-style="grey" data-container="body" data-original-title="Grey">
              </li>
              <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
              </li>
              <li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark">
              </li>
              <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
              </li>
            </ul>
          </div>
          <div class="theme-option">
            <span>
            Theme Style </span>
            <select class="layout-style-option form-control input-small">
              <option value="square" selected="selected">Square corners</option>
              <option value="rounded">Rounded corners</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Layout </span>
            <select class="layout-option form-control input-small">
              <option value="fluid" selected="selected">Fluid</option>
              <option value="boxed">Boxed</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Header </span>
            <select class="page-header-option form-control input-small">
              <option value="fixed" selected="selected">Fixed</option>
              <option value="default">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Top Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-small">
              <option value="light" selected="selected">Light</option>
              <option value="dark">Dark</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Mode</span>
            <select class="sidebar-option form-control input-small">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Style</span>
            <select class="sidebar-style-option form-control input-small">
              <option value="default" selected="selected">Default</option>
              <option value="compact" >Compact</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-small"> 
              <option value="hover" selected="selected">Hover</option>
              <option value="accordion">Accordion</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-small">
              <option value="left" selected="selected">Left</option>
              <option value="right">Right</option>
            </select>
          </div>
          <div class="theme-option">
            <span>
            Footer </span>
            <select class="page-footer-option form-control input-small">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
        </div>
      </div>
      <!-- END STYLE CUSTOMIZER -->
      <div class="page-content-body">
        <!-- HERE WILL BE LOADED AN AJAX CONTENT -->
      </div>
    </div>
    <!-- BEGIN CONTENT -->
  </div>
  <!-- END CONTENT -->
  <!-- BEGIN QUICK SIDEBAR -->
  <!--Cooming Soon...-->
  <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->




  <!-- BEGIN FOOTER -->
  <div class="page-footer">
    <div class="page-footer-inner">
       2015 &copy; Jobtip.in
    </div>
    <div class="scroll-to-top">
      <i class="icon-arrow-up"></i>
    </div>
  </div>
  <!-- END FOOTER -->
</div>




<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ asset('/assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
<script src="{{ asset('/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('/assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script type="text/javascript" src="{{ asset('/assets/global/plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('/assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/layout2/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/layout2/scripts/demo.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('/assets/admin/pages/scripts/components-dropdowns.js') }}"></script>

<script type="text/javascript" src="{{ asset('/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/global/scripts/datatable.js') }}"></script>
<script src="{{ asset('/assets/admin/pages/scripts/table-ajax.js') }}"></script>

<script src="{{ asset('/assets/admin/pages/scripts/components-editors.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>

<script src="{{ asset('/assets/admin/pages/scripts/form-wizard.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/assets/global/plugins/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/jquery.mockjax.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-editable/inputs-ext/address/address.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/global/plugins/bootstrap-editable/inputs-ext/wysihtml5/wysihtml5.js') }}"></script>
<script src="{{ asset('/assets/admin/pages/scripts/form-editable.js') }}"></script>
<script src="{{ asset('/assets/admin/pages/scripts/components-jqueryui-sliders.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/admin/pages/scripts/login.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   Demo.init(); // init demo features
   $('.page-sidebar .ajaxify.start').click() // load the content for the dashboard page.
});
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
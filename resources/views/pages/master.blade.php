<!DOCTYPE html>
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
<!-- csrf_token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
<link href="{{ asset('/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet"/>
<link href="{{ asset('/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.Metronic.css') }}" rel="stylesheet"/>
<link href="{{ asset('/assets/custom.css') }}" rel="stylesheet"/>
<!-- END PAGE LEVEL STYLES -->
<link href="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet"/>

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

@include('includes.header')

<div class="clearfix"></div>

<div class="container">

  <!-- BEGIN CONTAINER -->
  <div class="page-container">
    
    @include('includes.modal')
    
    @include('includes.sidebar')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <div class="page-content">

        <!-- customizer -->

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

  @include('includes.footer')
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
<script src="{{ asset('/assets/admin/pages/scripts/components-form-tools.js') }}" type="text/javascript"></script>
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
<script src="{{ asset('/assets/admin/pages/scripts/components-ion-sliders.js') }}" type="text/javascript"></script>

<script src="{{ asset('/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/global/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/admin/pages/scripts/components-jqueryui-sliders.js') }}" type="text/javascript"></script>


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
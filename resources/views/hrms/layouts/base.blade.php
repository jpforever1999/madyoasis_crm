<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title> Human Resource Management System </title>
    <meta name="description" content="HRMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">
    

   
    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">
    
    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/widget.css">

    <link rel="stylesheet" type="text/css" href="assets/js/plugins/select2/css/core.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="/assets/img/favicon.png">
	
    <!----------jp new themes---------->	
    <!-- Plugins css -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/skin/default_skin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="/assets/skin/default_skin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!----------end new themes---------->	




@stack('styles')

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .blink {
            color:mediumblue;
        }

        .blink_second {
            color:red;
        }

        .blink_third {
            color:yellow;
        }
    </style>

</head>

<body class="dashboard-page">

<!-- -------------- Customizer -------------- -->
<div id="customizer" class="hidden-xs">
    <div class="panel">

        <div class="panel-body pn">
            <ul class="nav nav-list nav-list-sm" role="tablist">
                <li class="active">
                    <a href="customizer-header" role="tab" data-toggle="tab">Navbar</a>
                </li>
                <li>
                    <a href="customizer-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                </li>
                <li>
                    <a href="customizer-settings" role="tab" data-toggle="tab">Misc</a>
                </li>
            </ul>
            <div class="tab-content p20 ptn pb15">
                <div role="tabpanel" class="tab-pane active" id="customizer-header">
                    <form id="customizer-header-skin">
                        <h6 class="mv20">Header Skins</h6>

                        <div class="customizer-sample">
                            <table>
                                <tr>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-dark mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin5" checked
                                                   value="bg-dark">
                                            <label for="headerSkin5">Dark</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-warning mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin2" value="bg-warning">
                                            <label for="headerSkin2">Warning</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-danger mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin3" value="bg-danger">
                                            <label for="headerSkin3">Danger</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-success mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin4" value="bg-success">
                                            <label for="headerSkin4">Success</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-primary mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin6" value="bg-primary">
                                            <label for="headerSkin6">Primary</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-info mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin7" value="bg-info">
                                            <label for="headerSkin7">Info</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-alert mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin8" value="bg-alert">
                                            <label for="headerSkin8">Alert</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-system mb10">
                                            <input type="radio" name="headerSkin" id="headerSkin9" value="bg-system">
                                            <label for="headerSkin9">System</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="checkbox-custom checkbox-disabled fill mb10">
                                <input type="radio" name="headerSkin" id="headerSkin1" value="bgc-light">
                                <label for="headerSkin1">Light</label>
                            </div>
                        </div>
                    </form>
                    <form id="customizer-footer-skin">
                        <h6 class="mv20">Footer Skins</h6>

                        <div class="customizer-sample">
                            <table>
                                <tr>
                                    <td>
                                        <div class="checkbox-custom fill checkbox-dark mb10">
                                            <input type="radio" name="footerSkin" id="footerSkin1" checked value="">
                                            <label for="footerSkin1">Dark</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox-custom checkbox-disabled fill mb10">
                                            <input type="radio" name="footerSkin" id="footerSkin2" value="footer-light">
                                            <label for="footerSkin2">Light</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="customizer-sidebar">
                    <form id="customizer-sidebar-skin">
                        <h6 class="mv20">Sidebar Skins</h6>

                        <div class="customizer-sample">
                            <div class="checkbox-custom fill checkbox-dark mb10">
                                <input type="radio" name="sidebarSkin" checked id="sidebarSkin2" value="">
                                <label for="sidebarSkin2">Dark</label>
                            </div>
                            <div class="checkbox-custom fill checkbox-disabled mb10">
                                <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                <label for="sidebarSkin1">Light</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="customizer-settings">
                    <form id="customizer-settings-misc">
                        <h6 class="mv20 mtn">Layout Options</h6>

                        <div class="form-group">
                            <div class="checkbox-custom fill mb10">
                                <input type="checkbox" checked="" id="header-option">
                                <label for="header-option">Fixed Header</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb10">
                                <input type="checkbox" checked="" id="sidebar-option">
                                <label for="sidebar-option">Fixed Sidebar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb10">
                                <input type="checkbox" id="breadcrumb-option">
                                <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom fill mb10">
                                <input type="checkbox" id="breadcrumb-hidden">
                                <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-group mn pb35 pt25 text-center">
                <a href="#" id="clearAll" class="btn btn-primary btn-bordered btn-sm">Clear All</a>
            </div>
        </div>
    </div>
</div>
<!-- -------------- /Customizer -------------- -->

<!-- -------------- Body Wrap  -------------- -->
<div id="main">

    <!-- -------------- Header  -------------- -->
    @include('hrms.layouts.header')
    <!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header">

                <!-- -------------- Sidebar - Author -------------- -->
            @include('hrms.layouts.sidebar')

            <!-- -------------- Sidebar Hide Button -------------- -->
            <!--<div class="sidebar-toggler">
                <a href="#">
                    <span class="fa fa-arrow-circle-o-left"></span>
                </a>
            </div>-->
            <!-- -------------- /Sidebar Hide Button -------------- -->

        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>

    <!-- -------------- /Sidebar -------------- -->

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <!-- -------------- Topbar Menu Wrapper -------------- -->
        <div id="topbar-dropmenu-wrapper">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-danger">
                        <span class="fa fa-music"></span>
                        <span class="service-title">Audio</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-success">
                        <span class="fa fa-picture-o"></span>
                        <span class="service-title">Images</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-primary">
                        <span class="fa fa-video-camera"></span>
                        <span class="service-title">Videos</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-alert">
                        <span class="fa fa-envelope"></span>
                        <span class="service-title">Messages</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-system">
                        <span class="fa fa-cog"></span>
                        <span class="service-title">Settings</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-dark">
                        <span class="fa fa-user"></span>
                        <span class="service-title">Users</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- -------------- /Topbar Menu Wrapper -------------- -->

        <!-- YIELD CONTENT -->

        @yield('content')

        <!-- /YIELD CONTENT -->

        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Right -------------- -->
            <aside class="chute chute-right chute270 pn hidden" data-chute-height="match">

                <!-- -------------- Activity Timeline -------------- -->
                <ol class="timeline-list pl5 mt5">
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Genry</b> Added a new item to his store:
                            <a href="#">Ipod</a>
                        </div>
                        <div class="timeline-date">1:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Lion</b> Added a new item to his store:
                            <a href="#">Notebook</a>
                        </div>
                        <div class="timeline-date">3:05am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Admin</b> created a new invoice for:
                            <a href="#">Software</a>
                        </div>
                        <div class="timeline-date">4:15am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-warning">
                            <span class="fa fa-pencil"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Laura</b> edited her work experience
                        </div>
                        <div class="timeline-date">5:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Admin</b> created a new invoice for:
                            <a href="#">Apple Inc.</a>
                        </div>
                        <div class="timeline-date">7:45am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Genry</b> Added a new item to his store:
                            <a href="#">Ipod</a>
                        </div>
                        <div class="timeline-date">8:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Lion</b> Added a new item to his store:
                            <a href="#">Watch</a>
                        </div>
                        <div class="timeline-date">9:35am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-system">
                            <span class="fa fa-fire"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Admin</b> created a new invoice for:
                            <a href="#">Software</a>
                        </div>
                        <div class="timeline-date">4:15am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-warning">
                            <span class="fa fa-pencil"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Laura</b> edited her work experience
                        </div>
                        <div class="timeline-date">5:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Admin</b> created a new invoice for:
                            <a href="#">Software</a>
                        </div>
                        <div class="timeline-date">4:15am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-warning">
                            <span class="fa fa-pencil"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Laura</b> edited her work experience
                        </div>
                        <div class="timeline-date">5:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Admin</b> created a new invoice for:
                            <a href="#">Apple Inc.</a>
                        </div>
                        <div class="timeline-date">7:45am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Genry</b> Added a new item to his store:
                            <a href="#">Ipod</a>
                        </div>
                        <div class="timeline-date">8:25am</div>
                    </li>
                    <li class="timeline-item">
                        <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                        </div>
                        <div class="timeline-desc">
                            <b>Lion</b> Added a new item to his store:
                            <a href="#">Watch</a>
                        </div>
                        <div class="timeline-date">9:35am</div>
                    </li>
                </ol>

            </aside>
            <!-- -------------- /Column Right -------------- -->

        </section>
        <!-- -------------- /Content -------------- -->

       
        <!-- -------------- Page Footer -------------- -->
        <footer id="content-footer" class="affix">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-legal">Madyoasis © 2022 All rights reserved. By <a
                                href="#" target="_blank">Madyoasis</a></span>
                </div>
                <div class="col-md-6 text-right">
                    <span class="footer-meta"></span>
                    <a href="#content" class="footer-return-top">
                        <span class="fa fa-angle-up"></span>
                    </a>
                </div>
            </div>
        </footer>
        <!-- -------------- /Page Footer -------------- -->

      

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

    <!-- -------------- Sidebar Right -------------- -->
    <aside id="sidebar_right" class="nano affix">

        <!-- -------------- Sidebar Right Content -------------- -->
        <div class="sidebar-right-wrapper nano-content">

            <div class="sidebar-block br-n p15">

                <h6 class="title-divider text-muted mb20"> Visitors Stats
                <span class="pull-right"> 2015
                  <i class="fa fa-caret-down ml5"></i>
                </span>
                </h6>

                <div class="progress mh5">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 34%">
                        <span class="fs11">New visitors</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="66"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 66%">
                        <span class="fs11 text-left">Returnig visitors</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45"
                         aria-valuemin="0"
                         aria-valuemax="100" style="width: 45%">
                        <span class="fs11 text-left">Orders</span>
                    </div>
                </div>
h
                <h6 class="title-divider text-muted mt30 mb10">New visitors</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">350</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-warning mn">
                            <i class="fa fa-caret-down"></i> 15.7% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt25 mb10">Returnig visitors</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">660</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success-dark mn">
                            <i class="fa fa-caret-up"></i> 20.2% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt25 mb10">Orders</h6>

                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">153</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success mn">
                            <i class="fa fa-caret-up"></i> 5.3% </h3>
                    </div>
                </div>

                <h6 class="title-divider text-muted mt40 mb20"> Site Statistics
                    <span class="pull-right text-primary fw600">Today</span>
                </h6>
            </div>
        </div>
    </aside>
    <!-- -------------- /Sidebar Right -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['German',  5.85],
          ['French',  1.66],
          ['Italian', 0.316],
          ['Romansh', 0.0791]
        ]);

      var options = {
        legend: 'none',
        pieSliceText: 'label',
        title: 'Swiss Language Use (100 degree rotation)',
        pieStartAngle: 100,
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>



<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="/assets/js/jquery/jquery-1.11.3.min.js"></script>
{{--<script src="/assets/js/jquery/jquery-2.2.4.min.js"></script>--}}
<script src="/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- -------------- HighCharts Plugin -------------- -->
<script src="/assets/js/plugins/highcharts/highcharts.js"></script>
<script src="/assets/js/plugins/c3charts/d3.min.js"></script>
<script src="/assets/js/plugins/c3charts/c3.min.js"></script>

<!-- -------------- Simple Circles Plugin -------------- -->
<script src="/assets/js/plugins/circles/circles.js"></script>

<!-- -------------- Maps JSs -------------- -->
<script src="/assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

<!-- -------------- FullCalendar Plugin -------------- -->
<script src="/assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<!-- -------------- Date/Month - Pickers -------------- -->
<script src="/assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="/assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

<!-- -------------- Magnific Popup Plugin -------------- -->
<script src="/assets/js/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="/assets/js/utility/utility.js"></script>
<script src="/assets/js/demo/demo.js"></script>
<script src="/assets/js/main.js"></script>

<!-- -------------- Widget JS -------------- -->
<script src="/assets/js/demo/widgets.js"></script>
<script src="/assets/js/demo/widgets_sidebar.js"></script>
<!--<script src="/assets/js/pages/dashboard1.js"></script>-->


<!---------- jp new theme----------->

<!-- Vendor js -->
 <script src="/assets/js/vendor.min.js"></script>

 @if(\Route::getFacadeRoot()->current()->uri() == 'dashboard')
<!-- Plugins js-->
<script src="/assets/js/libs/flatpickr/flatpickr.min.js"></script>
<script src="/assets/js/libs/apexcharts/apexcharts.min.js"></script>
<!-- Dashboar 1 init js-->
<script src="/assets/js/pages/dashboard-4.init.js"></script>

@endif

<script src="/assets/js/libs/selectize/js/standalone/selectize.min.js"></script>
<!-- App js
<script src="/assets/js/app.min.js"></script>-->
<script src="/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
   function exportTasks(_this) {
      var _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
<script>
   $(document).ready(function() {
    $( "#emp_manager_DOB" ).datepicker( {format: 'yyyy-mm-dd'} );
    $( "#emp_manager_DOH" ).datepicker( {format: 'yyyy-mm-dd'} );
    $( "#emp_manager_DOR" ).datepicker( {format: 'yyyy-mm-dd'} );
  } );

/************Unit check validation*************** */
(function() {
    var hasError = false;
    
    function changed(checkbox) {
      return function() { 
        if (checkbox.checked) {
          $('#error_message').html('');
          hasError = false;
        }
      }
}

function checkBoxes() {  
    var hobbies = $('.hobbies').val();
    if ($('.hobbies:checked').length === 0) {
        $("#error_message").html('Please choose at least one.');
        hasError = true;
    } else {
        $("#error_message").html('');
        hasError = false;
    } 
}
   
function setup() {
    var checkboxes = document.querySelectorAll('.hobbies')
    for (var i=0; i<checkboxes.length; ++i) {
        checkboxes[i].onchange = changed(checkboxes[i]);
    } 
    var btn = document.getElementById('clickme');
        btn.onclick = checkBoxes;
    }

    $(document).ready(setup);
})();

/***********End Unit check validation************* */

$('.btn-info').click(function(){
        
	if(document.getElementById('site_mobile_no').value != ""){
        	
       var y = document.getElementById('site_mobile_no').value;
       if(isNaN(y)||y.indexOf(" ")!=-1)
       {         
		   $("#phone-error").html('Invalid Mobile No.');
          document.getElementById('site_mobile_no').focus();
          return false;
       }

       if (y.length>10 || y.length<10)
       {          
			$("#phone-error").html('Mobile No. should be 10 digit');
            document.getElementById('site_mobile_no').focus();
            return false;
       }
       if (!(y.charAt(0)=="9" || y.charAt(0)=="8" || y.charAt(0)=="7" || y.charAt(0)=="6"))
       {          
			$("#phone-error").html('Mobile No. should start with 6,7,8 or 9');
		
            document.getElementById('site_mobile_no').focus();
            return false
       }
	}
});



/*$(function() {
    $('#emp_manager_zone_id').change(function() {
        this.form.submit();
    });
});*/

$(document).ready(function() {

    /***********get City *********/
    $('#emp_manager_zone_id').on('change', function() {
        
        var zone_id = $(this).val();               
        if(zone_id) {                   		
            $.ajax({
                url: '/get_city/'+zone_id,
                type: "post",
                dataType: "json",
                data: { 
                    zone_id: zone_id,
                    _token: '{{csrf_token()}}' 
                },
                success: function (data) {
                    console.log(data);                           
                    $('#emp_manager_city_id').empty();
                    $('#emp_manager_city_id').append('<option value="">Select city</option>');
                    $.each(data, function(key, obj) {
                        $('#emp_manager_city_id').append('<option value="'+ obj.id +'">'+ obj.city_name+'</option>');
                    });

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);

                },
            });

        }else{
            $('select[name="emp_manager_city_id"]').empty();
        }


    });

    /***********get unit *********/
    $('#emp_manager_city_id').on('change', function() {
        //alert('pp');
        var city_id = $(this).val();          
        var zone_id = $('#emp_manager_zone_id').val();

        if(city_id) {                   		
            $.ajax({
                url: '/get_unit/'+city_id+'/'+zone_id,
                type: "post",
                dataType: "json",
                data: { 
                    city_id: city_id,
                    zone_id: zone_id,
                    _token: '{{csrf_token()}}' 
                },
                success: function (data) {
                    console.log(data);                           
                    $('#unit_list').empty();                  
                    $.each(data, function(key, obj) {                                              
                       $("#unit_list").append('<input class="hobbies" name="unit_name[]" type="checkbox" value="'+ obj.id+'" id="customckeck-'+ obj.id+'">&nbsp; <label class="form-check-label" for="customckeck-'+ obj.id+'"> '+ obj.unit_name+'</label>&nbsp;&nbsp;'); 
                    });  

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    $('#unit_list').html('<div class="text-info">No data found!</div>');     
                },
            });

        }else{
            $('select[name="emp_manager_city_id"]').empty();
        }


    });
    

});
</script>
<!----------end new theme----------->



<!-- Sweet alert -->
<script src="/assets/js/sweetalert.min.js"></script>

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'assign-asset')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'assign-project')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'assign-award')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-award-assignment/{id}')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'add-expense')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'attendance-manager')--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'total-leave-list')--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'apply-leave')--}}
    {{--<script src="/assets/js/function.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
    {{--@endif--}}

{{--<script src="/assets/js/function.js"></script>--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-asset-assignment/{id}')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'promotion')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

@if(\Route::getFacadeRoot()->current()->uri() == 'edit-promotion/{id}')
    <script src="/assets/js/pages/forms-widgets.js"></script>
    <script src="/assets/js/custom.js"></script>
@endif

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'add-training-invite')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-training-invite/{id}')--}}
    {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--<script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'add-training-invite')--}}
    {{--<script src="/assets/allcp/forms/js/bootstrap-select.js"></script>--}}
{{--@endif--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-training-invite/{id}')--}}
    {{--<script src="/assets/allcp/forms/js/bootstrap-select.js"></script>--}}
{{--@endif--}}



<!-- -------------- /Scripts -------------- -->

{{--@if(\Route::getFacadeRoot()->current()->uri() == 'add-employee' )--}}
{{--<script src="/assets/js/custom_form_wizard.js"></script>--}}
    {{--@endif--}}

    {{--@if(\Route::getFacadeRoot()->current()->uri() == 'attendance-upload' )--}}
        {{--<script src="/assets/js/pages/forms-widgets.js"></script>--}}
    {{--@endif--}}

    {{--@if(\Route::getFacadeRoot()->current()->uri() == 'add-team')--}}
        {{--<script src="/assets/allcp/forms/js/bootstrap-select.js"></script>--}}
    {{--@endif--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-team/{id}')--}}
    {{--<script src="/assets/allcp/forms/js/bootstrap-select.js"></script>--}}
{{--@endif--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'create-event')--}}
        {{--<!-- -------------- DateTime JS -------------- -->--}}
    {{--<script src="/assets/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--@endif--}}
{{--@if(\Route::getFacadeRoot()->current()->uri() == 'create-meeting')--}}
    {{--<!-- -------------- DateTime JS -------------- -->--}}
    {{--<script src="/assets/js/plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--@endif--}}
    <script>
        (function($) {
            $.fn.blink = function(options) {
                var defaults = {
                    delay: 3000
                };
                var options = $.extend(defaults, options);

                return this.each(function() {
                    var obj = $(this);
                    setInterval(function() {
                        if ($(obj).css("visibility") == "visible") {
                            $(obj).css('visibility', 'hidden');
                        }
                        else {
                            $(obj).css('visibility', 'visible');
                        }
                    }, options.delay);
                });
            }
        }(jQuery))

        /////////////////////////////////////////////

        $(document).ready(function() {
            $('.blink').blink(); // default is 500ms blink interval.
            $('.blink_second').blink({
                delay: 100
            }); // causes a 100ms blink interval.
            $('.blink_third').blink({
                delay: 1500
            }); // causes a 1500ms blink interval.
        });

        /////////////////////////////////////////////

</script>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108812473-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108812473-2');
</script>


<script src="/assets/js/pages/allcp_forms-elements.js"></script>

@stack('scripts')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
      <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- Font Icons -->
        <link href="{{ asset('frontend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('frontend/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('frontend/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
        <!-- animate css -->
        <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet" />
        <!-- Waves-effect -->
        <link href="{{ asset('frontend/css/waves-effect.css') }}" rel="stylesheet">
        <!-- Custom Files -->
        <link href="{{ asset('frontend/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('frontend/js/modernizr.min.js') }}"></script>
          <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
          <!-- DataTables -->
        <link href="{{ asset('frontend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" /> 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
 <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
    
                        @guest
                        @else
                            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img style="width:80px;height:70px;" src="{{ URL::to('frontend/images/iiuc.png') }}" alt="iiuc"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                                </div>
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown hidden-xs">
                                    <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-lg">
                                        <li class="text-center notifi-title">Notification</li>
                                        <li class="list-group">
                                           <!-- list item-->
                                           <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New user registered</div>
                                                    <p class="m-0">
                                                       <small>You have 10 unread messages</small>
                                                    </p>
                                                 </div>
                                              </div>
                                           </a>
                                           <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">New settings</div>
                                                    <p class="m-0">
                                                       <small>There are new settings available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                            <!-- list item-->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <div class="media">
                                                 <div class="pull-left">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                 </div>
                                                 <div class="media-body clearfix">
                                                    <div class="media-heading">Updates</div>
                                                    <p class="m-0">
                                                       <small>There are
                                                          <span class="text-primary">2</span> new updates available</small>
                                                    </p>
                                                 </div>
                                              </div>
                                            </a>
                                           <!-- last list item -->
                                            <a href="javascript:void(0);" class="list-group-item">
                                              <small>See all notifications</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                <li class="hidden-xs">
                                    <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="/{{ Auth::user()->photo }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('my-profile') }}"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                        <li><a href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


           <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="/{{ Auth::user()->photo }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('my-profile') }}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">{{ Auth::user()->student_id }}</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.html" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('all-joined-class') }}" class="waves-effect"><i class="md md-event"></i><span> Manage Joined Classes </span></a>
                            </li>
                           
                            <li>
                                <a href="{{ route('join-class') }}" class="waves-effect"><i class="md md-event"></i><span> Join New Class </span></a>
                            </li>
                            <li>
                                <a href="{{ route('notice-board') }}" class="waves-effect"><i class="md md-event"></i><span>Notice Board</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Elements </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="typography.html">Typography</a></li>
                                    <li><a href="buttons.html">Buttons</a></li>
                                    <li><a href="panels.html">Panels</a></li>
                                    <li><a href="checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="modals.html">Modals</a></li>
                                    <li><a href="bootstrap-ui.html">BS Elements</a></li>
                                    <li><a href="progressbars.html">Progress Bars</a></li>
                                    <li><a href="notification.html">Notification</a></li>
                                    <li><a href="sweet-alert.html">Sweet-Alert</a></li>
                                </ul>
                            </li>

                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 

        @endguest
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
           <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/js/waves.js') }}"></script>
        <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('frontend/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('frontend/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('frontend/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('frontend/assets/jquery-blockui/jquery.blockUI.js') }}"></script>



        <!-- flot Chart -->
   {{--      <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('frontend/assets/flot-chart/jquery.flot.crosshair.js') }}"></script> --}}

        <!-- Counter-up -->
        <script src="{{ asset('frontend/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('frontend/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('frontend/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
{{--         <script src="{{ asset('frontend/js/jquery.chat.js') }}"></script> --}}

        <!-- Todo -->
        {{-- <script src="{{ asset('frontend/js/jquery.todo.js') }}"></script> --}}
        <script src="{{ asset('frontend/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/datatables/dataTables.bootstrap.js') }}"></script>


       
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
         <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
         <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


        <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
      @endif
    </script>
     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });

         $(document).on("click", "#deletecomment", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Do you Want to delete the Comment?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } 
                });
            });
    </script>
</body>
</html>


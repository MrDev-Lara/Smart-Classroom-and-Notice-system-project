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
        <!-- Dropzone css -->
        <link href="{{ asset('frontend/assets/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
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
    
                        @guest('teacher')
                        @else
                            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('home') }}" class="logo"><img style="width:80px;height:70px;" src="{{ URL::to('frontend/images/iiuc.png') }}" alt="iiuc"></a>
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
                            

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="/{{ Auth::guard('teacher')->user()->photo }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        
                                        <li><a href="{{ route('teacher.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
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
                           <img src="/{{ Auth::guard('teacher')->user()->photo }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::guard('teacher')->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                   
                                    <li><a href="{{ route('teacher.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Teacher Panel</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('home') }}" class="{{ (request()->is('teacher/home')) ? 'active' : '' }}"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('create-class') }}" class="{{ (request()->is('teacher/create-class')) ? 'active' : '' }}"><i class="md md-add-box"></i><span> Create Class </span></a>
                            </li>
                           
                            <li>
                                <a href="{{ route('manage-class') }}" class="{{ (request()->is('teacher/manage-class')) ? 'active' : '' }}"><i class="md md-event"></i><span> Manage class </span></a>
                            </li>

                             <li>
                                <a href="{{ route('post-notice') }}" class="{{ (request()->is('teacher/post-notice')) ? 'active' : '' }}"><i class="md md-mail"></i><span> Post a Notice </span></a>
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
        <!-- Page Specific JS Libraries -->
         <script src="{{ asset('frontend/assets/dropzone/dropzone.min.js') }}"></script>
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

         $(document).on("click", "#deletepost", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Do you Want to delete the Post?",
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
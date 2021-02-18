@extends('admin.layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Admin Dashboard</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="">Admin</a></li>
                        <li class="active">Admin Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                         <!-- Start Widget -->
                        
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-muted" style="margin-top:10px;">
                                        <span class="counter">{{ $user }}</span>
                                        Total Students
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Students</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-android-social"></i></span>
                                    <div class="mini-stat-info text-right text-muted" style="margin-top:10px;">
                                        <span class="counter">{{ $teacher }}</span>
                                        Total Teachers
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Teachers</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-success"><i class="ion-loading-b"></i></span>
                                    <div class="mini-stat-info text-right text-muted" style="margin-top:10px;">
                                        <span class="counter">{{ $notice }}</span>
                                        Total Notices
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Notices</h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-warning"><i class="ion-university"></i></span>
                                    <div class="mini-stat-info text-right text-muted" style="margin-top:10px;">
                                        <span class="counter">{{ $class }}</span>
                                        Total Classes
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Classes</h5>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div> 
                        <!-- End row-->
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div> <!-- container -->         
    </div> <!-- content -->
</div>

@endsection
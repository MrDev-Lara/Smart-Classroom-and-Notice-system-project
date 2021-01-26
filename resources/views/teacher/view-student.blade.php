@extends('teacher.layouts.app')
@section('content')

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('/frontend/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="/{{ $student->photo }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white">{{ $student->name }}</h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs">
                            <li class="active tab">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">About</span> 
                                </a> 
                            </li> 
                        <div class="indicator"></div></ul> 
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                            <div class="pull-right">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Following <span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">Poke</a></li>
                                        <li><a href="#">Private message</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Unfollow</a></li>
                                    </ul>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                        
                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $student->name }}</p>
                                                </div>
                                                 <div class="about-info-p">
                                                    <strong>Student Id</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $student->student_id }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $student->phone }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $student->email }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Semester</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ $student->semester }}</p>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                        

                                    </div>


                                    <div class="col-md-8">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Biography</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                               @php
                                                $valid = DB::table('userdetails')->where('user_id',$student->id)->first();
                                                if($valid){
                                                @endphp
                                                <p>{{ $valid->biography }}</p>
                                                @php
                                                    }else{
                                                @endphp
                                                <p>No Biography Set</p>
                                                  @php
                                                    }
                                                @endphp
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                        <!-- About -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">About</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                @php
                                                    $valid = DB::table('userdetails')->where('user_id',$student->id)->first();
                                                    if($valid){
                                                @endphp
                                                    <p>{{ $valid->about }}</p>
                                                @php
                                                    }else{
                                                @endphp
                                                    <p>No About Set</p>
                                                  @php
                                                    }
                                                @endphp
                                            </div> 
                                        </div>
                                        <!-- About -->

                                            </div> 
                                        </div>

                                    </div>

                                </div>
                            </div> 



                            </div>
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection
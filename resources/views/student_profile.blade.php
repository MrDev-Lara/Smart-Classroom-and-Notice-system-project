@extends('layouts.app')

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
                            <div class="bg-picture text-center" style="background-image:url('frontend/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="{{ Auth::user()->photo }}" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white">{{ Auth::user()->name }}</h3>
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
                                    <span class="hidden-xs">About Me</span> 
                                </a> 
                            </li> 
                            <li class="tab"> 
                                <a href="#information-2" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                    <span class="hidden-xs">Set Info</span> 
                                </a> 
                            </li> 
                            
                            <li class="tab" > 
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Settings</span> 
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
                                                    <p class="text-muted">{{ Auth::user()->name }}</p>
                                                </div>
                                                 <div class="about-info-p">
                                                    <strong>Student Id</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ Auth::user()->student_id }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Mobile</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ Auth::user()->phone }}</p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Semester</strong>
                                                    <br/>
                                                    <p class="text-muted">{{ Auth::user()->semester }}</p>
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
                                                $id = Auth::user()->id;
                                                $valid = DB::table('userdetails')->where('user_id',$id)->first();
                                                if($valid){
                                                @endphp
                                                <p>{{ Auth::user()->userdetail->biography }}</p>
                                                @php
                                                    }else{
                                                @endphp
                                                <p>Nothing Set. Set your Biography Now.</p>
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
                                                $id = Auth::user()->id;
                                                $valid = DB::table('userdetails')->where('user_id',$id)->first();
                                                if($valid){
                                                @endphp
                                                <p>{{ Auth::user()->userdetail->about }}</p>
                                                @php
                                                    }else{
                                                @endphp
                                                <p>Nothing Set. Set your About Now.</p>
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



                            <div class="tab-pane" id="information-2">
                                 @php
                                    $id = Auth::user()->id;
                                    $valid = DB::table('userdetails')->where('user_id',$id)->first();
                                    if($valid){
                                 @endphp
                                  <form role="form" action="{{ url('update-information/'.Auth::user()->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Biography</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="7" name="biography" required >{{ $valid->biography }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">About</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="5" name="about" required>{{ $valid->about }}</textarea>
                                        </div>
                                    </div>
                                   
                                  
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update Details</button>
                                    </form>
                                 @php
                                    }else{
                                 @endphp
                                    <form role="form" action="{{ url('/add-information') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Biography</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="7" name="biography" required placeholder="Describe about Your Biography"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">About</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="5" name="about" required placeholder="A short description about you"></textarea>
                                        </div>
                                    </div>
                                   
                                  
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Details</button>
                                    </form>
                                @php 
                                    }
                                @endphp
                            </div> 


                            


                            <div class="tab-pane" id="settings-2">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <form role="form" method="post" action="{{ url('update-privacy/'.Auth::user()->id) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="FullName">Full Name</label>
                                                <input type="text" value="{{ Auth::user()->name }}" id="FullName" class="form-control" required name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" value="{{ Auth::user()->email }}" id="Email" class="form-control" required name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="Username">Phone</label>
                                                <input type="text" value="{{ Auth::user()->phone }}" id="Username" class="form-control" required name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">New Password</label>
                                                <input type="password" placeholder="New Password" id="RePassword" class="form-control" name="newpass">
                                            </div>
                                            
                                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update</button>
                                        </form>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
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

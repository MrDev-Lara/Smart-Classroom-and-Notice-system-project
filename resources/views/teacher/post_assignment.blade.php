@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <?php
                    date_default_timezone_set("Asia/Dhaka");
                    $bd_time = date("h : i A");
                ?>
                <div class="col-sm-12">
                    <p>Today's Date : <b style="color:red;font-size:17px;">{{ date('d M, Y') }} ({{ date('d/m/Y') }})</b></p>
                    <p>Current Time : <b style="color:red;font-size:17px;">{{ $bd_time }}</b></p>
                    <p style="float:right;margin-top:-60px;"><a href="{{ URL::to('teacher/all-assignments/'.$room_id->id) }}" class="btn btn-danger" >All Assignments</a></p>
                    <ol class="breadcrumb pull-right">
                        <li><a href="">Assignments</a></li>
                        <li class="active">Add Assignment</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Assignment</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form role="form" action="{{ url('teacher/post-assignment') }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <!--Default date and time picker -->
                                <input type="hidden" name="room_id" value="{{ $room_id->id }}"/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Assignment Title</label>
                                    <input required type="text" class="form-control" name="assignment_title" placeholder="Write the Assignment Title" >
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Assignment Description</label>
                                     <textarea required class="form-control" rows="5" name="assignment_description" required placeholder="Write the Assignment Description"></textarea>
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1">Assignment File</label>
                                     <input required type="file" class="form-control" name="assignment_file" />
                                </div>

                                <input type="hidden" name="assignment_post_date" value="{{ date('d M, Y') }}"/>
                                <input type="hidden" name="assignment_post_time" value="{{ $bd_time }}"/>

                                <div class="form-group">
                                    <label for="exampleInputPassword21"> Assignment Due Date </label>
                                    <input required type="date" class="form-control" name="assignment_due_date" />
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword21"> Assignment Due Time </label>
                                    <input required type="time" class="form-control" name="assignment_due_time" />
                                </div>
                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Post Assignment</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>



@endsection
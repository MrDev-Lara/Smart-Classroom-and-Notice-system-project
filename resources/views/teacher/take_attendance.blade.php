@extends('teacher.layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Attendance Management</h4>

                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Attendance</a></li>
                        <li class="active">Take Attendance</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><b>{{ $students->course_name }}</b></h3>
                                        <h2 style="color:red;">{{ date('d-m-Y') }}</h2>
                                        <a href="{{ URL::to('teacher/view-attendance/'.$students->id) }}" class="btn btn-danger" style="float:right;margin-top:-60px;">View All Attendance for this Course</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 @php
                                                    $valid = DB::table('room_user')->where('room_id',$students->id)->first();
                                                    if($valid){
                                                @endphp
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Student Name</th>
                                                            <th>Student ID</th>
                                                            <th>Attendance</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                         <form role="form" action="{{ url('teacher/insert-class-attendance/'.$students->id) }}" method="post" >
                                                        @csrf
                                                        @php 
                                                        $i=0;
                                                        foreach($students->users as $user){
                                                             $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->student_id }}</td>
                                                            <input type="hidden" name="room_id" value="{{ $students->id }}" />
                                                            <input type="hidden" name="user_id[]" value="{{ $user->id }}" />
                                                            <td>
                                                                <input type="radio" required name="attend[{{ $user->id }}]" value="present" /> Present
                                                                <input type="radio" required name="attend[{{ $user->id }}]" value="absent" /> Absent
                                                            </td>
                                                            <input type="hidden" name="attend_date" value="{{ date('d-m-y') }}" />
                                                        </tr>
                                                       @php }
                                                       @endphp

                                                    </tbody>
                                                </table>
                                                    <button type="submit" class="btn btn-primary">Take Attendance</button>
                                                </form>
                                                @php }else{ @endphp
                                                <p class="text-center" style="padding:30px;font-size:18px;"><b>Oops!!! Cannot Take Attendance. It Seems no students have joined this Classroom Yet.</b></p>
                                                @php } @endphp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div> <!-- container -->         
    </div> <!-- content -->
</div>

@endsection
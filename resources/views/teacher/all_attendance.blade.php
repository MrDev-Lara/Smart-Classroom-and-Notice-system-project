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
                        <li class="active">All Attendances</li>
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
                                        <h3 class="panel-title">Attendance by Date</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                        $i=0; 
                                                        foreach($students as $student){
                                                        $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td><b>{{ $student->attend_date }}</b></td>
                                                            <td>
                                                                <a href="{{ URL::to('teacher/view-student-attendance',['room_id'=>$details->id,'attend_date'=>$student->attend_date]) }}" class="btn btn-sm btn-info">View</a>
                                                                <a href="{{ URL::to('teacher/edit-student-attendance',['room_id'=>$details->id,'attend_date'=>$student->attend_date]) }}" class="btn btn-sm btn-danger">Edit</a>
                                                                <a href="{{ URL::to('teacher/delete-student-attendance',['room_id'=>$details->id,'attend_date'=>$student->attend_date]) }}" class="btn btn-sm btn-warning" id="delete">Delete</a> 
                                                            </td>
                                                    
                                                        </tr>
                                                       @php }
                                                       @endphp
                                                    </tbody>
                                                </table>

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
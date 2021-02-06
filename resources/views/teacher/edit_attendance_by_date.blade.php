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
                        <li><a href="#">Edit Attendance</a></li>
                        <li class="active">Student Attendance</li>
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
                                        <h4>Edit Attendance : <b style="color:red;">{{ $date->attend_date }}</b></h4>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Student Name</th>
                                                            <th>Student Id</th>
                                                            <th>Attendance</th>
                                                          
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                         <form role="form" action="{{ url('teacher/update-student-attendance',['room_id'=>$date->room_id,'attend_date'=>$date->attend_date]) }}" method="post" >
                                                        @csrf
                                                        @php 
                                                        $i=0;
                                                        foreach($edit as $edits){
                                                             $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $edits->name }}</td>
                                                            <td>{{ $edits->student_id }}</td>
                                                            <input type="hidden" name="user_id[]" value="{{ $edits->user_id }}" />
                                                            <td>
                                                                <input type="radio" name="attend[{{ $edits->user_id }}]" value="present" <?php if($edits->attend == 'present'){echo 'checked';} ?> /> Present
                                                                <input type="radio" name="attend[{{ $edits->user_id }}]" value="absent" <?php if($edits->attend == 'absent'){echo 'checked';} ?> /> Absent
                                                            </td>
                                                            <input type="hidden" name="attend_date" value="{{ $edits->attend_date }}"/>
                                                        </tr>
                                                       @php }
                                                       @endphp

                                                    </tbody>
                                                </table>
                                                    <button type="submit" class="btn btn-primary">Update Attendance</button>
                                                </form>
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
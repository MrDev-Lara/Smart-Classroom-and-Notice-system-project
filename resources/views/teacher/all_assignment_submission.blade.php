@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
        
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                        <div class="row">
    
                    
                                <div class="col-lg-12">

                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading"> 
                                            @php
                                                $due_date = $allassignmentanswers->assignment_due_date;
                                                $new_due_date = date('d M, Y', strtotime($due_date));
                                                $due_time = $allassignmentanswers->assignment_due_time;
                                                $new_due_time = date('h : i A', strtotime($due_time));
                                            @endphp
                                            <h3 class="panel-title" style="font-size:19px;margin-bottom:10px;">{{ $allassignmentanswers->assignment_title }}</h3> 
                                            <p>Posted at : {{ $allassignmentanswers->assignment_post_date }} {{ $allassignmentanswers->assignment_post_time }}</p>
                                            <p style="margin-top:-10px;">Due On : {{ $new_due_date }} {{ $new_due_time }}</p>
                                        </div> 
                                        <div class="panel-body"> 
                                            <p>{{ $allassignmentanswers->assignment_description }}</p> 
                                            <h5><b>Attachments</b></h5>

                                            <a type="button" target="_blank" class="btn btn-default btn-sm" href="/{{ $allassignmentanswers->assignment_file }}">
                                                <span class="glyphicon glyphicon-book"></span> {{ $allassignmentanswers->assignment_file }}
                                            </a>
                                        </div> 
                                    </div>
                                </div>      
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Assignment Submission List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Student Name</th>
                                                            <th>Student Id</th>
                                                            <th>Answer</th>
                                                            <th>Date of Submission</th>
                                                            <th>Time of Submission</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php
                                                           $students =  DB::table('room_user')->where('room_id',$allassignmentanswers->room_id)->get();
                                                        @endphp
                                                        @php 
                                                        $i=0;
                                                        foreach($students as $student){
                                                             $i++;
                                                             $valid = DB::table('assignmentanswers')->where('user_id',$student->user_id)->where('assignment_id',$allassignmentanswers->id)->first();
                                                             if($valid){
                                                        @endphp
                                                        <tr>
                                                            
                                                            @php
                                                                $student_details = DB::table('users')->where('id',$valid->user_id)->first();
                                                            @endphp
                                                            <td>{{ $student_details->name }}</td>
                                                            <td>{{ $student_details->student_id }}</td>
                                                            <td>
                                                                <a type="button" target="_blank" class="btn btn-default btn-sm" href="/{{ $valid->assignment_file }}">
                                                                <span class="glyphicon glyphicon-book"></span> {{ $valid->assignment_file }}
                                                                </a>
                                                            </td>
                                                            @php
                                                                $submit_date = $valid->assignment_submit_date;
                                                                $submit_time = $valid->assignment_submit_time;

                                                                $new_submit_date = date('d M, Y', strtotime($submit_date));
                                                                $new_submit_time = date('h : i A', strtotime($submit_time));
                                                            @endphp
                                                            <td>{{ $new_submit_date }}</td>
                                                            <td>{{ $new_submit_time }}</td>
                                                            @php

                                                                $submit_date = $valid->assignment_submit_date;
                                                                $due_date = $allassignmentanswers->assignment_due_date;
                                                                
                                                                $new_submit_date = strtotime($submit_date);
                                                                $new_due_date = strtotime($due_date);

                                                                $submit_time = $valid->assignment_submit_time;
                                                                $due_time = $allassignmentanswers->assignment_due_time;
                                                               
                                                                if ($new_due_date > $new_submit_date){
                                                            @endphp
                                                            <td><p style="float:right;padding:10px;background-color:green;" class="badge badge-success">On Time</p></td>
                                                            @php } 
                                                            elseif($new_due_date == $new_submit_date){ 
                                                                if($due_time >= $submit_time){
                                                            @endphp
                                                                <td><p style="float:right;padding:10px;background-color:green;" class="badge badge-success">On Time</p></td>
                                                            @php }else{ @endphp
                                                                <td><p style="float:right;padding:10px;background-color:red;" class="badge badge-warning">Late</p></td>
                                                            @php }
                                                            }else{
                                                            @endphp
                                                            <td><p style="float:right;padding:10px;background-color:red;" class="badge badge-warning">Late</p></td>
                                                            @php } @endphp
                                                        </tr>
                                                       @php }else{ 
                                                            $student_information = DB::table('users')->where('id',$student->user_id)->first();
                                                       @endphp

                                                            <tr>
                                                            
                                                        
                                                                <td>{{ $student_information->name }}</td>
                                                                <td>{{ $student_information->student_id }}</td>
                                                                <td><p>None</p></td>
                                                                <td>None</td>
                                                                <td>None</td>
                                                                <td><p style="float:right;padding:10px;background-color:orange;" class="badge badge-warning">No Submission</p></td>
                                                             </tr>
                                                             @php } } @endphp
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div> <!-- container -->         
    </div> <!-- content -->
</div>



@endsection

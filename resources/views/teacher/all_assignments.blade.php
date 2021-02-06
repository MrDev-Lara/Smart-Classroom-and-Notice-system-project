@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
             <div class="row">
                 <div class="col-lg-offset-1 col-lg-10">
                    <div class="panel panel-border panel-danger">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">{{ $allassignments->course_name }}</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <p>{{ $allassignments->course_code }}</p> 
                            <p>{{ $allassignments->class_section }}</p> 
                            <p>{{ $allassignments->course_session }}</p> 
                        </div> 
                    </div>
                </div>
             </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                        <div class="row">
                            @php 
                                foreach($allassignments->assignments as $assignment){
                             @endphp
                            <a href="{{ URL::to('teacher/view-assignment-submission/'.$assignment->id) }}">
                    
                                <div class="col-lg-12">

                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading"> 
                                            @php
                                                $due_date = $assignment->assignment_due_date;
                                                $new_due_date = date('d M, Y', strtotime($due_date));
                                                $due_time = $assignment->assignment_due_time;
                                                $new_due_time = date('h : i A', strtotime($due_time));
                                            @endphp
                                            <h3 class="panel-title" style="font-size:19px;margin-bottom:10px;">{{ $assignment->assignment_title }}</h3> 
                                            <p>Posted at : {{ $assignment->assignment_post_date }} {{ $assignment->assignment_post_time }}</p>
                                            <p style="margin-top:-10px;">Due On : {{ $new_due_date }} {{ $new_due_time }}</p>
                                            @php
                                                $today = date("Y-m-d");
                                                $due_date = $assignment->assignment_due_date;

                                                $new_today = strtotime($today);
                                                $new_due_date = strtotime($due_date);

                                                
                                                date_default_timezone_set("Asia/Dhaka");
                                                $bd_time = date("H:i");
                                                $due_time = $assignment->assignment_due_time;
                                               
                                                if ($new_today > $new_due_date){
                                            @endphp
                                            <p style="float:right;margin-top:-55px;padding:10px;background-color:green;" class="badge badge-success">Completed</p>
                                            @php } 
                                            elseif($new_today == $new_due_date){ 
                                                if($bd_time >= $due_time){
                                            @endphp
                                                <p style="float:right;margin-top:-55px;padding:10px;background-color:green;" class="badge badge-success">Completed</p>
                                            @php }else{ @endphp
                                                <p style="float:right;margin-top:-55px;padding:10px;background-color:red;" class="badge badge-warning">Ongoing</p>
                                            @php }
                                            }else{
                                            @endphp
                                            <p style="float:right;margin-top:-55px;padding:10px;background-color:red;" class="badge badge-warning">Ongoing</p>
                                            @php } @endphp
                                        </div> 
                                        <div class="panel-body"> 
                                            <p>{{ $assignment->assignment_description }}</p> 
                                            <h5><b>Attachments</b></h5>

                                            <a type="button" target="_blank" class="btn btn-default btn-sm" href="/{{ $assignment->assignment_file }}">
                                                <span class="glyphicon glyphicon-book"></span> {{ $assignment->assignment_file }}
                                            </a>
                                        </div> 
                                    </div>
                                </div>
                            </a>
                                @php } @endphp
                                 
                        </div>
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

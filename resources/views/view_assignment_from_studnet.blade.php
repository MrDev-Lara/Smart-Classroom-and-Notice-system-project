@extends('layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-border panel-danger">
                        <div class="panel-heading"> 
                             @php
                                $teacher = DB::table('teachers')->where('id',$roomassignments->teacher_id)->first();
                             @endphp
                            <h1 class="panel-title">{{ $roomassignments->course_name }}<span style="float:right;">{{ $teacher->name }}</span></h1> 
                            
                        </div> 
                        <div class="panel-body"> 
                            <p><b>Course Code:</b> {{ $roomassignments->course_code }}</p> 
                            <p><b>Course Session:</b> {{ $roomassignments->course_session }}</p> 
                            <p><b>Class Session:</b> {{ $roomassignments->class_section }}</p> 
                        </div>
                    </div> 
                </div>

                @foreach($roomassignments->assignments as $assignment)
                 <a href="{{ URL::to('submit-assignment/'.$assignment->id) }}">
                    <div class="col-lg-12">
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
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
                                @php
                                    $teacher = DB::table('teachers')->where('id',$roomassignments->teacher_id)->first();
                                @endphp

                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $assignment->assignment_post_date }}</p>
                                <p class="badge badge-success" style="float:right;margin-top:-50px;background-color: red;padding:10px;">Completed</p>
                                 @php } 
                                    elseif($new_today == $new_due_date){ 
                                        if($bd_time >= $due_time){
                                @endphp
                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $assignment->assignment_post_date }}</p>
                                <p class="badge badge-success" style="float:right;margin-top:-50px;background-color: red;padding:10px;">Completed</p>
                                @php }else{ @endphp
                                    <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $assignment->assignment_post_date }}</p>
                                <p class="badge badge-success" style="float:right;margin-top:-50px;background-color: green;padding:10px;">In Progress</p> 
                                @php }
                                }else{
                                @endphp
                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $assignment->assignment_post_date }}</p>
                                <p class="badge badge-success" style="float:right;margin-top:-50px;background-color: green;padding:10px;">In Progress</p>
                                @php } @endphp
                            </div> 
                   
                            <div class="panel-body"> 
                                <p><b>New Assignments :</b> {{ $assignment->assignment_title }}</p> 
                                @php
                                   $number_of_attachemnts = DB::table('assignments')->where('id',$assignment->id)->count();
                                @endphp
                                <p><i class="fa fa-bookmark"></i> {{ $number_of_attachemnts }} Attachment</p>
                               
                            </div> 
                        </div>
                    </div>
                </a>
                
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
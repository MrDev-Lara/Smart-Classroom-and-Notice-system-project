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
                                $teacher = DB::table('teachers')->where('id',$room_details->teacher_id)->first();
                             @endphp
                            <h1 class="panel-title">{{ $room_details->course_name }}<span style="float:right;">{{ $teacher->name }}</span></h1> 
                            <a class="btn btn-danger" style="float:right;" href="{{ URL::to('view-assignments/'.$room_details->id) }}">View Assignments</a>
                        </div> 
                        <div class="panel-body"> 
                            <p><b>Course Code:</b> {{ $room_details->course_code }}</p> 
                            <p><b>Course Session:</b> {{ $room_details->course_session }}</p> 
                            <p><b>Class Session:</b> {{ $room_details->class_section }}</p> 
                        </div>
                    </div> 
                </div>

                @foreach($roomposts->roomposts as $roompost)
                <a href="{{ URL::to('view-post-attachments-by-student/'.$roompost->id) }}">
                    <div class="col-lg-12">
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
                                @php
                                    $teacher = DB::table('teachers')->where('id',$roomposts->teacher_id)->first();
                                @endphp
                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $roompost->date }}</p>
                            </div> 
                            <div class="panel-body"> 
                                <p>{{ $roompost->posts }}</p> 
                                @php
                                    $attachments = $roompost->id;
                                    $number_of_attachemnts = DB::table('roompostfiles')->where('roompost_id',$attachments)->count();
                                @endphp
                                <p><i class="fa fa-bookmark"></i> {{ $number_of_attachemnts }} Attachment</p>
                                @php
                                    $count_comment = DB::table('roompostcomments')->where('roompost_id',$roompost->id)->count();
                                @endphp
                                <p style="border:1px solid  #ccccb3; padding:10px;">{{ $count_comment }} Class Comments</p>
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
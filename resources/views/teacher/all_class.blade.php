@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                @php
                    $id = Auth::guard('teacher')->user()->id;
                    $valid = DB::table('rooms')->where('teacher_id',$id)->first();
                    if($valid){
                @endphp
                @php
                    $panelheader = ['panel-success','panel-danger','panel-info','panel-purple','panel-inverse','panel-primary'];
                    $added =[];
                
                @endphp

                @foreach (Auth::guard('teacher')->user()->rooms as $key=>$room)
                @php
                shuffle($panelheader);

                if(!in_array($panelheader[0], $added)){
                        $current_panel = $panelheader[0];
                        array_push($added, $panelheader[0] );
                }elseif(!in_array($panelheader[1], $added)){
                        $current_panel = $panelheader[1];
                        array_push($added, $panelheader[1] );
                }
                elseif(!in_array($panelheader[2], $added)){
                        $current_panel = $panelheader[2];
                        array_push($added, $panelheader[2] );
                }
                elseif(!in_array($panelheader[3], $added)){
                        $current_panel = $panelheader[3];
                        array_push($added, $panelheader[3] );
                }
                elseif(!in_array($panelheader[4], $added)){
                        $current_panel = $panelheader[4];
                        array_push($added, $panelheader[4] );
                }
                elseif(!in_array($panelheader[5], $added)){
                        $current_panel = $panelheader[5];
                        array_push($added, $panelheader[5] );
                }
                else{
                        $current_panel = $panelheader[0];
                }
                

                @endphp
                <div class="col-lg-10">
                    <div class="panel panel-color <?= $current_panel ?>">
                        <div class="panel-heading"> 
                            @php
                                $data = DB::table('room_user')->where('room_id',$room->id)->count();
                            @endphp
                            <h1 class="panel-title">{{ $room->course_name }}<span style="float:right">students joined : {{ $data }} </span></h1> 
                        </div> 
                        <div class="panel-body"> 
                            <p><b>Course Code:</b> {{ $room->course_code }}</p> 
                            <p><b>Course Session:</b> {{ $room->course_session }}</p> 
                            <p><b>Class Session:</b> {{ $room->class_section }}</p> 
                            <p><b>Class Code: </b><b> {{ $room->class_code }}</b> (Share this code with the CR of Specfic section to join the class and get access to it.)</p> 
                            <div style="margin-top:20px;">
                                <a href="{{ URL::to('teacher/view-class-student/'.$room->id) }}" class="btn btn-danger">View Joined Student</a>
                                <a href="{{ URL::to('teacher/post-class/'.$room->id) }}" class="btn btn-info">Post</a>
                                <a href="{{ URL::to('teacher/take-attendance/'.$room->id) }}" class="btn btn-primary">Take today's Attendance</a>
                                <a href="{{ URL::to('teacher/assignments/'.$room->id) }}" class="btn btn-success">Assignments</a>
                                <a href="{{ URL::to('teacher/edit-class/'.$room->id) }}" class="btn btn-danger">Edit CLass</a>
                            </div>
                        </div> 
                    </div>
                </div>
                @endforeach
                @php }else{ @endphp
                <div class="col-md-10">
                    <!-- Dismissable Alert -->
                    <div class="panel panel-default">
                         <div class="alert alert-info fade in">
                                
                                <h4>No Class!!!</h4>
                                <p>You do not have any class yet now since you do not have created any class. Create your class now by clicking the button below.Get acees to the class by creating one.</p>
                                <p style="margin-top:20px;">
                                  <a href="{{ route('create-class') }}" class="btn btn-info waves-effect waves-light">Add Class Now</a>
                                </p>
                          </div>
                        </div> <!-- Panel-body -->
                    </div> <!-- panel -->
                @php } @endphp
            </div>
        </div>
    </div>
</div>


@endsection
@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                @php
                    $id = Auth::user()->id;
                    $valid = DB::table('room_user')->where('user_id',$id)->first();
                    if($valid){
                @endphp
                @php
                    $panelheader = ['panel-success','panel-danger','panel-info','panel-purple','panel-inverse','panel-primary'];
                    $added =[];
                
                @endphp

                @foreach ($classes->rooms as $key=>$room)
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
                <a href="{{ URL::to('access-to-classroom/'.$room->id) }}">
                    <div class="col-lg-10">
                        <div class="panel panel-border <?= $current_panel ?>">
                            <div class="panel-heading"> 
                                @php
                                    $teacher = DB::table('teachers')->where('id',$room->teacher_id)->first();
                                @endphp
                                <h1 class="panel-title">{{ $room->course_name }}<span style="float:right;">{{ $teacher->name }}</span></h1> 

                            </div> 
                            <div class="panel-body"> 
                                <p><b>Course Code:</b> {{ $room->course_code }}</p> 
                                <p><b>Course Session:</b> {{ $room->course_session }}</p> 
                                <p><b>Class Session:</b> {{ $room->class_section }}</p> 
                            </div> 
                        </div>
                    </div>
                </a>
                @endforeach
                @php }else{ @endphp
                <div class="col-md-10">
                    <!-- Dismissable Alert -->
                    <div class="panel panel-default">
                         <div class="alert alert-info fade in">
                                
                                <h4>No Class Joined!!!</h4>
                                <p>Oops!! It Seems you do not have access to any class yet now since you do not have joined any class. Join your class now by clicking the button below.</p>
                                <p style="margin-top:20px;">
                                  <a href="{{ route('join-class') }}" class="btn btn-info waves-effect waves-light">Join Class Now</a>
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
@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">

                @foreach (Auth::guard('teacher')->user()->rooms as $room)
                <div class="col-lg-10">
                    <div class="panel panel-color panel-danger">
                        <div class="panel-heading"> 
                            <h1 class="panel-title">{{ $room->course_name }}</h1> 
                        </div> 
                        <div class="panel-body"> 
                            <p>{{ $room->course_code }}</p> 
                            <p>{{ $room->course_session }}</p> 
                            <p>{{ $room->class_section }}</p> 
                            <p>Class Code: {{ $room->class_code }} (Share this code with the CR of Specfic section to join the class and get access to it.)</p> 
                        </div> 
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
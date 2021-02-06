@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-color panel-danger">
                        <div class="panel-heading"> 
                            <h1 class="panel-title">{{ $room_details->course_name }}</h1> 
                        </div> 
                        <div class="panel-body"> 
                            <p><b>Course Code:</b> {{ $room_details->course_code }}</p> 
                            <p><b>Course Session:</b> {{ $room_details->course_session }}</p> 
                            <p><b>Class Session:</b> {{ $room_details->class_section }}</p> 
                            </div>
                        </div> 
                    </div>
                </div>
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                @endif

                <a class="btn" style="background-color:white;width:950px;padding:20px;margin-bottom:30px;" data-toggle="modal" data-target="#full-width-modal"><img class="thumb-md img-circle" src="/{{ Auth::guard('teacher')->user()->photo }}"/><span style="color:black;margin-left:20px;font-size:17px;"><b>Post in your Class...</b></span></a>

            @foreach($roomposts->roomposts as $roompost)
                <a href="{{ URL::to('teacher/view-post-attachments/'.$roompost->id) }}">
                    <div class="col-lg-12">
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ Auth::guard('teacher')->user()->photo }}"/><span style="margin-left:20px;">{{ Auth::guard('teacher')->user()->name }}</span>
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

            
            <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="full-width-modalLabel">{{ $room_details->course_name }}</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="{{ url('teacher/insert-post-by-class-id') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="room_id" value="{{ $room_details->id }}"/>
                                    <div class="form-group">
                                         <textarea class="form-control" rows="4" name="posts" required placeholder="Share Something with Your Class"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="fallback">
                                            <input name="file[]" type="file" multiple />
                                        </div>
                                    </div>
                                    <input type="hidden" name="date" value="{{ date('d M, Y') }}"/>
                                    <button type="Submit" class="btn btn-danger btn-lg btn-center waves-effect waves-light">Post</button>
                                </form>
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>

  

@endsection
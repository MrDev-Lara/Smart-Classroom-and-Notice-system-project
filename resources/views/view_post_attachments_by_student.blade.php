@extends('layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
                                @php
                                    $valid = DB::table('roomposts')->where('id',$roomposts->id)->first();
                                    $room_id = $valid->room_id;
                                    $valid = DB::table('rooms')->where('id',$room_id)->first();
                                    $teacher_id = $valid->teacher_id;
                                    $teacher = DB::table('teachers')->where('id',$teacher_id)->first();
                                @endphp
                                <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                </h3> 
                                <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $roomposts->date }}</p>
                            </div> 
                            <div class="panel-body"> 
                                <p style="margin-bottom:30px;">{{ $roomposts->posts }}</p> 
                                <h5><b>Attachments</b></h5>
                                @php
                                    $valid = DB::table('roompostfiles')->where('roompost_id',$roomposts->id)->first();
                                    if($valid){
                                @endphp
                                @foreach($roomposts->roompostfiles as $roompostfile)
                                    
                                        <a type="button" class="btn btn-default btn-sm" href="/{{ $roompostfile->file }}">
                                            <span class="glyphicon glyphicon-book"></span> {{ $roompostfile->file }}
                                        </a>
                                   
                                @endforeach
                                @php }else{ @endphp
                                <p>No Attachments for this Post</p>
                                @php } @endphp
                                <h5 style="margin-top:40px;margin-bottom:20px;"><b>Class Comments</b></h5>

                                @foreach($roompostcomments->roompostcomments as $roompostcomment)
                                    @php
                                    if($roompostcomment->user_id == null){
                                    @endphp
                                    <div style="margin-bottom:20px;">
                                        <h4 class="panel-title"><img style="width:35px;height:35px;" class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:10px;font-size:12px;font-color:black;">{{ $teacher->name }} <span style="font-size:9px;margin-left:9px;"> {{ $roompostcomment->date }} (teacher) </span></span>
                                        </h4> 
                                        <p style="margin-left: 45px;margin-top: -10px;">{{ $roompostcomment->comment }}</p>
                                    </div>
                                    @php }else{ 
                                        $student_id = $roompostcomment->user_id;
                                        $student = DB::table('users')->where('id',$student_id)->first();
                                    @endphp
                                     <div style="margin-bottom:20px;">
                                        <h4 class="panel-title"><img style="width:35px;height:35px;" class="thumb-md img-circle" src="/{{ $student->photo }}"/><span style="margin-left:10px;font-size:12px;font-color:black;">{{ $student->name }} <span style="font-size:9px;margin-left:9px;"> {{ $roompostcomment->date }} (student)</span></span>
                                            <a id="deletecomment" href="{{ URL::to('deletecomment/'.$roompostcomment->id) }}"><span style="float:right;margin-top:20px;" class="glyphicon glyphicon-trash"></span></a>
                                        </h4> 
                                        <p style="margin-left: 45px;margin-top: -10px;">{{ $roompostcomment->comment }}</p>
                                    </div>
                                    @php } @endphp
                                @endforeach
                             <form style="margin-top:30px;" role="form" action="{{ url('insert-comment-by-post') }}" method="post" >
                                @csrf
                                <input type="hidden" name="roompost_id" value="{{ $roomposts->id }}"/>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                <div class="input-group">
                                    <input type="text" class="form-control" required name="comment" placeholder="Add Class Comment" />
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-comment"></i></button>
                                    </div>
                                </div>
                                <input type="hidden" name="date" value="{{ date('d M, Y') }}"/>
                            </form>
                            </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
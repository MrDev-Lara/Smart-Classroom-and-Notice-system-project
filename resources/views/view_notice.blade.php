@extends('layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
               
                                
                            @php
                                $teacher = DB::table('teachers')->where('id',$viewnotices->teacher_id)->first();
                            @endphp
                                        <div class="col-lg-12">
                                            <div class="panel panel-inverse panel-fill">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                                    </h3> 
                                                    <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $viewnotices->notice_post_date }} {{ $viewnotices->notice_post_time }}</p>
                                                </div> 
                                                <div class="panel-body"> 
                                                    <h3 style="color:white;">{{ $viewnotices->notice_title }}</h3> 


                                                    <p>{{ $viewnotices->notice_description }}</p>


                                                    
                                                    <h4 style="margin-top:30px;color:white;"><b>Attachments</b></h4> 
                                                    @php
                                                        $attachments = $viewnotices->notice_file;
                                                        if($attachments == null){
                                                    @endphp
                                                    <p><i class="fa fa-bookmark"></i> No Attachment Attached</p>
                                                    @php }else{ @endphp
                                                    <p><a target="_blank" href="/{{ $viewnotices->notice_file }}"><img style="width:200px;height:100px;" src="/{{ $viewnotices->notice_file }}"/></a></p>
                                                    @php } @endphp
                                                </div> 
                                            </div>
                                        </div>
                                        
                           
            </div>
        </div>
    </div>
</div>


@endsection
@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                           @php
                            $valid = DB::table('notices')->where('teacher_id',Auth::guard('teacher')->user()->id)->first();
                            if($valid){
                           @endphp  
                                @foreach($notices as $notice)
                                        <div class="col-lg-12">
                                            <div class="panel panel-inverse panel-fill">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ Auth::guard('teacher')->user()->photo }}"/><span style="margin-left:20px;">{{ Auth::guard('teacher')->user()->name }}</span>
                                                    </h3> 
                                                    <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $notice->notice_post_date }} {{ $notice->notice_post_time }}</p>
                                                    <a id="deletepost" href="{{ URL::to('teacher/deletenotice/'.$notice->id) }}"><span style="float:right;margin-top:-40px;color:white;" class="glyphicon glyphicon-trash"></span></a>
                                                </div> 
                                                <div class="panel-body"> 
                                                    <h3 style="color:white;">{{ $notice->notice_title }}</h3> 


                                                    <?php $string = $notice->notice_description;
                                                    if (strlen($string) > 500) {
                                                    $trimstring = substr($string, 0, 470). "<a style='color:white;text-decoration:underline;font-size:18px;margin-left:10px;' href='/teacher/view-notice/$notice->id' >Read More ...</a>";
                                                    } else {
                                                    $trimstring = $string;
                                                    }
                                                    echo $trimstring;
                                                    //Output : Lorem Ipsum is simply dum [readmore...][1]
                                                    ?>


                                                    
                                                    <h4 style="margin-top:30px;color:white;"><b>Attachments</b></h4> 
                                                    @php
                                                        $attachments = $notice->notice_file;
                                                        if($attachments == null){
                                                    @endphp
                                                    <p><i class="fa fa-bookmark"></i> No Attachment</p>
                                                    @php }else{ @endphp
                                                    <p><i class="fa fa-bookmark"></i> 1 Attachment</p>
                                                    @php } @endphp
                                                </div> 
                                            </div>
                                        </div>
                                        
                                @endforeach
                                    <div style="float:right;">{{ $notices->links() }}</div>
                            @php }else{ @endphp
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">

                                <!-- Dismissable Alert -->
                                <div class="panel panel-default">

                                        <div class="alert alert-info fade in">
                                           
                                            <h4>No Notices from You!!!</h4>
                                            <p>It Seems you Haven't posted any Notice yet.Want to post a Notice?</p>
                                            <p>
                                              <a style="margin-top: 20px;" href="{{ route('post-notice') }}" class="btn btn-info waves-effect waves-light">Post Notice Now</a>
                                             
                                            </p>
                                        </div>
                                    </div> <!-- Panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->
                            @php } @endphp
            </div>
        </div>
    </div>
</div>

@endsection
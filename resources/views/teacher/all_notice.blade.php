@extends('teacher.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
               
                                
                                @foreach($allnotices as $allnotice)
                                        <div class="col-lg-12">
                                            <div class="panel panel-inverse panel-fill">
                                                <div class="panel-heading"> 
                                                    @php
                                                        $teacher = DB::table('teachers')->where('id',$allnotice->teacher_id)->first();
                                                    @endphp
                                                    <h3 class="panel-title"><img class="thumb-md img-circle" src="/{{ $teacher->photo }}"/><span style="margin-left:20px;">{{ $teacher->name }}</span>
                                                    </h3> 
                                                    <p style="margin-left: 68px;margin-top: -13px;">Posted at : {{ $allnotice->notice_post_date }} {{ $allnotice->notice_post_time }}</p>
                                                </div> 
                                                <div class="panel-body"> 
                                                    <h3 style="color:white;">{{ $allnotice->notice_title }}</h3> 


                                                    <?php $string = $allnotice->notice_description;
                                                    if (strlen($string) > 500) {
                                                    $trimstring = substr($string, 0, 470). "<a style='color:white;text-decoration:underline;font-size:18px;margin-left:10px;' href='/teacher/view-notice/$allnotice->id' >Read More ...</a>";
                                                    } else {
                                                    $trimstring = $string;
                                                    }
                                                    echo $trimstring;
                                                    //Output : Lorem Ipsum is simply dum [readmore...][1]
                                                    ?>


                                                    
                                                    <h4 style="margin-top:30px;color:white;"><b>Attachments</b></h4> 
                                                    @php
                                                        $attachments = $allnotice->notice_file;
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
                                    <div style="float:right;">{{ $allnotices->links() }}</div>
                           
            </div>
        </div>
    </div>
</div>

@endsection
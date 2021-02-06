@extends('layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            @php 
                $due_date = $assignment_details->assignment_due_date;
                $due_time = $assignment_details->assignment_due_time;
            @endphp
            <div class="col-md-12" >
                <div class="panel panel-default" >
                    <div class="alert alert-info fade in" style="padding:50px;">
                        <div class="text-center" style="font-size:35px;color:red;" id="demo"></div>
                    </div>
                </div>
            </div>
            <!-- Page-Title -->
             @php
                $due_date = $assignment_details->assignment_due_date;
                $new_due_date = date('d M, Y', strtotime($due_date));
                $due_time = $assignment_details->assignment_due_time;
                $new_due_time = date('h : i A', strtotime($due_time));
            @endphp
            <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
                               
                                <h3 class="panel-title"><b style="font-size:20px;">{{ $assignment_details->assignment_title }}</b>
                                </h3> 
                               
                                <p>Due : {{ $new_due_date }} {{ $new_due_time }}</p>
                                 @php
                                    $today = date("Y-m-d");
                                    $due_date = $assignment_details->assignment_due_date;

                                    $new_today = strtotime($today);
                                    $new_due_date = strtotime($due_date);

                                    
                                    date_default_timezone_set("Asia/Dhaka");
                                    $bd_time = date("H:i");
                                    $due_time = $assignment_details->assignment_due_time;
                                   
                                    if ($new_today > $new_due_date){
                                @endphp
                                <p></p>
                                 @php } 
                                    elseif($new_today == $new_due_date){ 
                                        if($bd_time > $due_time){
                                @endphp
                                   
                                <p></p>
                                @php }else{ @endphp
                                
                                <p></p>
                                @php }
                                }else{
                                @endphp
                                <p></p>
                                 @php } @endphp
                            </div> 
                            <div class="panel-body"> 
                                <p style="margin-bottom:30px;">{{ $assignment_details->assignment_description }}</p> 
                                <h5><b>Attachments</b></h5>

                                    <a type="button" target="_blank" class="btn btn-default btn-sm" href="/{{ $assignment_details->assignment_file }}">
                                        <span class="glyphicon glyphicon-book"></span> {{ $assignment_details->assignment_file }}
                                    </a>
                            
                            </div> 
                        </div>

                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading"> 
                               
                                <h3 class="panel-title"><b style="font-size:17px;">Your Work</b>
                                </h3> 
                                @php
                                    $attachment = DB::table('assignmentanswers')->where('assignment_id',$assignment_details->id)->where('user_id',Auth::user()->id)->first();
                                    if($attachment){
                                 @endphp
                                    <p><span class="badge badge-success" style="float:right;background-color: green;padding: 10px;margin-top: -25px;">Assignment Submitted</span></p>
                                 @php }else{ @endphp
                                    <p><span class="badge badge-danger" style="float:right;background-color: red;padding: 10px;margin-top: -25px;">Assignment Missing</span></p>
                                @php } @endphp
                            </div> 
                            <div class="panel-body"> 
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h5><b>Your Attachments</b></h5>
                                     @php
                                        $attachment = DB::table('assignmentanswers')->where('assignment_id',$assignment_details->id)->where('user_id',Auth::user()->id)->first();
                                        if($attachment){
                                     @endphp
                                        <a type="button" target="_blank" class="btn btn-default btn-sm" href="/{{ $attachment->assignment_file }}">
                                            <span class="glyphicon glyphicon-book"></span> {{ $attachment->assignment_file }}
                                        </a>
                                        <a id="delete" href="{{ URL::to('delete-assignment/'.$attachment->id) }}"><span style="float:right;margin-top:12px;" class="glyphicon glyphicon-trash"></span></a>
                                    @php }else{ @endphp
                                        <p>No attachments Submitted yet</p>
                                    
                                <form style="margin-top:40px;"role="form" action="{{ url('submit-assignment-answer') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="assignment_id" value="{{ $assignment_details->id }}"/>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Assignment File</label>
                                         <input required type="file" class="form-control" name="assignment_file" />
                                     </div>
                                     <input type="hidden" name="assignment_submit_date" value="{{ date('Y-m-d') }}"/>
                                     <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        $bd_time = date("H:i");
                                     ?>
                                     <input type="hidden" name="assignment_submit_time" value="{{ $bd_time }}"/>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit Assignment</button>
                                </form>
                             @php } @endphp
                             
                            </div> 
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
 var countDownDate = <?php 
echo strtotime("$due_date $due_time" ) ?> * 1000;
var now = <?php echo time() ?> * 1000;

// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);
// Output the result in an element with id="demo"
document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
minutes + "m " + seconds + "s left only";
// If the count down is over, write some text 
if (distance < 0) {
clearInterval(x);
 document.getElementById("demo").innerHTML = "SUBMISSION TIME FINISHED";

}  
}, 1000);
    </script>


@endsection
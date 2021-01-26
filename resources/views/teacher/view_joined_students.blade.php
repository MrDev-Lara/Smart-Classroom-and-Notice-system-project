@extends('teacher.layouts.app')
@section('content')
@php
    $teacher_id = Auth::guard('teacher')->user()->id;
    $acess = $students->teacher_id;
    if($teacher_id == $acess){
@endphp
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
             <div class="row">
                 <div class="col-lg-offset-1 col-lg-10">
                    <div class="panel panel-border panel-danger">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">{{ $students->course_name }}</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <p>{{ $students->course_code }}</p> 
                            <p>{{ $students->class_section }}</p> 
                            <p>{{ $students->course_session }}</p> 
                            <p>Below are the Joined student for the Course.</p> 
                        </div> 
                    </div>
                </div>
             </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Joined Students</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Name</th>
                                                            <th>Joined At</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php 
                                                        $i=0;
                                                        foreach($students->users as $user){
                                                             $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->pivot->created_at }}</td>
                                                            <td><a href="{{ URL::to('teacher/view-student/'.$user->id) }}" class="btn btn-sm btn-info">View Student Details</a> |
                                                                <a href="{{ URL::to('teacher/remove-student',['user_id'=>$user->pivot->user_id,'room_id'=>$user->pivot->room_id]) }}" class="btn btn-sm btn-warning" id="delete">Remove Student</a> 
                                                            </td>
                                                        </tr>
                                                       @php }
                                                       @endphp
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div> <!-- container -->         
    </div> <!-- content -->
</div>

@php }else{ @endphp
<div class="content-page">
  <div class="content">
        <div class="container">
     <div class="row">
                 <div class="col-lg-offset-1 col-lg-10">
                    <div class="panel panel-border panel-danger">
                        <div class="panel-heading"> 
                            <h3 class="panel-title">Error Occured :(</h3> 
                        </div> 
                        <div class="panel-body"> 
                            <p><b>You are trying to access other teachers room. You dont have the permission to access other teachers room. Try accessing your Created Room. Or Create a New Class by Clicking the button below.</b></p> 
                            <a style="margin-top:20px" href="{{ route('create-class') }}" class="btn btn-danger">Create CLass</a>
                        </div> 
                    </div>
                </div>
             </div>
         </div>
     </div>
 </div>
    @php } @endphp
@endsection
@extends('teacher.layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Class Management</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="">Classes</a></li>
                        <li class="active">Add New Class</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add New Class</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form role="form" action="{{ url('teacher/insert-class') }}" method="post" >
                            	@csrf
                                <input type="hidden" class="form-control" name="teacher_id" value="{{ Auth::guard('teacher')->user()->id }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Name</label>
                                    <input type="text" class="form-control" name="course_name" placeholder="Ex: Discrete Mathematics" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code</label>
                                    <input type="text" class="form-control" name="course_code" placeholder="Ex: CSE-1203" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Course Session</label>
                                    <input type="text" class="form-control" name="course_session" placeholder="Ex: Spring 2020" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Class Section</label>
                                    <input type="text" class="form-control" name="class_section" placeholder="Ex: 2BM" >
                                </div>
                                
                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Add Class</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>


@endsection
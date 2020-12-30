@extends('admin.layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Student Management</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('all-student') }}">Student</a></li>
                        <li class="active">All Students</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                     

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Student List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Name</th>
                                                            <th>Student ID</th>
                                                            <th>Email Address</th>
                                                            <th>Phone</th>
                                                            <th>Semester</th>
                                                            <th>Photo</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php 
                                                        $i=0;
                                                        foreach($students as $student){
                                                             $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{ $student->student_id }}</td>
                                                            <td>{{ $student->email }}</td>
                                                            <td>{{ $student->phone }}</td>
                                                            <td>{{ $student->semester }}</td>
                                                            <td><img src="/{{ $student->photo }}" style="height:60px;width:60px;"/></td>
                                                            <td><a href="{{ URL::to('admin/editstudent/'.$student->id) }}" class="btn btn-sm btn-info">Edit</a> |
                                                                <a href="{{ URL::to('admin/deletestudent/'.$student->id) }}" class="btn btn-sm btn-warning" id="delete">Delete</a> 
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

@endsection
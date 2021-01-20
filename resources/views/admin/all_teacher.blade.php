@extends('admin.layouts.app')
@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Teacher Management</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('all-teacher') }}">Teacher</a></li>
                        <li class="active">All Teachers</li>
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
                                        <h3 class="panel-title">All Teacher List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Serial No</th>
                                                            <th>Name</th>
                                                            <th>Email Address</th>
                                                            <th>Phone</th>
                                                            <th>Department</th>
                                                            <th>Photo</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @php 
                                                        $i=0;
                                                        foreach($teachers as $teacher){
                                                             $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td>{{ $teacher->name }}</td>
                                                            <td>{{ $teacher->email }}</td>
                                                            <td>{{ $teacher->phone }}</td>
                                                            <td>{{ $teacher->department }}</td>
                                                            <td><img src="/{{ $teacher->photo }}" style="height:60px;width:60px;"/></td>
                                                            <td><a href="{{ URL::to('admin/editteacher/'.$teacher->id) }}" class="btn btn-sm btn-info">Edit</a> |
                                                                <a href="{{ URL::to('admin/deleteteacher/'.$teacher->id) }}" class="btn btn-sm btn-warning" id="delete">Delete</a> 
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
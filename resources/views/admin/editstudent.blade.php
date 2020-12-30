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
                        <li><a href="#">Student</a></li>
                        <li class="active">Edit Student</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Student</h3></div>
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
                            <form role="form" action="{{ url('admin/update-student/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Student Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $edit->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword20">Student ID</label>
                                    <input type="text" class="form-control" name="student_id" value="{{ $edit->student_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword21">Student Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $edit->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword18">Student Phone Number</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $edit->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword17">Semester</label>
                                    <input type="text" class="form-control" name="semester" value="{{ $edit->semester }}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword12">Previous image</label>
                                    <img style="width:80px;height:80px;" src="{{URL::to($edit->photo) }}" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword11">Update Image</label>
                                	<img id="image" src="#" />
                                    <input type="file"  name="photo" accept="image/*" onchange="readURL(this);">
                                </div>
                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
@endsection
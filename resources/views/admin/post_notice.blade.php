@extends('admin.layouts.app')
@section('content')

<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <?php
                    date_default_timezone_set("Asia/Dhaka");
                    $bd_time = date("h : i A");
                ?>
                <div class="col-sm-12">
                    <p style="float:right;margin-bottom: 30px;"><a href="{{ URL::to('admin/my-notices/'.Auth::guard('admin')->user()->id) }}" class="btn btn-danger" >My Notices</a> <a href="{{ URL::to('admin/all-notices') }}" class="btn btn-info" >All Notices</a></p>
                    
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Post Notice</h3></div>
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
                            <form role="form" action="{{ url('admin/submit-notice') }}" method="post" enctype="multipart/form-data">
                            	@csrf
                                <!--Default date and time picker -->
                                <input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}"/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Notice Title</label>
                                    <input required type="text" class="form-control" name="notice_title" placeholder="Write the Notice Title" >
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Notice Description</label>
                                     <textarea required class="form-control" rows="10" name="notice_description" required placeholder="Write the Notice Description"></textarea>
                                </div>

                                <div class="form-group">
                                     <label for="exampleInputEmail1">Notice File</label>
                                     <input type="file" class="form-control" name="notice_file" />
                                </div>

                                <input type="hidden" name="notice_post_date" value="{{ date('d M, Y') }}"/>
                                <input type="hidden" name="notice_post_time" value="{{ $bd_time }}"/>


                              
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Post Notice</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>



@endsection
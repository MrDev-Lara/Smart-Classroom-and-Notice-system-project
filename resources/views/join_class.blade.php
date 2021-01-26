@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Classes</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="">Student</a></li>
                        <li class="active">Join Classes</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
	           <!-- Basic example -->
	           <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Join Class</h3></div>
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
                            <form role="form" action="{{ url('join-room') }}" method="post">
                            	@csrf
                            	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Code</label>
                                    <input type="text" class="form-control" name="course_code" placeholder="Enter the course code here" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Class Code</label>
                                    <input type="text" class="form-control" name="class_code" placeholder="Enter class code here" required>
                                </div>
                              
                                <button type="submit" class="btn btn-danger">Join Class</button>
                            </form>
                        </div><!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col-->

            </div>
        </div> <!-- container -->
                   <div class="col-md-offset-1 col-md-10" >

                                <!-- Dismissable Alert -->
                                <div class="panel panel-default" >
     								<div class="alert alert-info fade in" style="padding:40px;">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4>Dont Have the class Code?</h4>
	                                            <ul>
	                                            	<li>Place the Correct Course Code Using '-'. Example: 'CSE-1111'</li>
	                                            	<li>Ask your teacher for the class code and place it in above Class Code Section.</li>
	                                            	<li>Make sure to use authorised Account</li>
	                                            	<li>If You Still Facing any diffiulties.Contact with the Admin</li>
	                                            </ul>
                                             
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </div> <!-- content -->
    						
</div>

</script>
@endsection
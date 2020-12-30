@extends('teacher.layouts.app')

@section('content')
   <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white">Teacher Reset Password </h3>
                </div> 

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <form method="post" action="{{ route('teacher.password.email') }}" role="form" class="text-center"> 
                    @csrf

                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        Enter your <b>Email</b> and instructions will be sent to you!
                    </div>
                    <div class="form-group m-b-0"> 
                        <div class="input-group"> 
                            <input type="email" id="email" class="form-control input-lg @error('email') is-invalid @enderror" placeholder="Enter Email" required="" name="email" value="{{ old('email') }}" autofocus autocomplete="email"> 

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <span class="input-group-btn"> <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Reset</button> </span> 
                        </div> 
                    </div> 
                    
                </form>

                </div>                                 
                
            </div>
        </div>
@endsection

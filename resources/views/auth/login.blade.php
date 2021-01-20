@extends('layouts.app')

@section('content')
<div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Student <strong>Log In</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control input-lg{{ $errors->has('student_id') ? ' is-invalid' : '' }}" id="student_id" type="text" required="" autofocus placeholder="Student ID" name="student_id" value="{{ old('student_id') }}">

                            @if ($errors->has('student_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" class="form-control input-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required="" placeholder="Password">

                             @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>



                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-danger" style="margin-top:10px;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                        @endif
                    </div>
                </form> 
                </div>                                 
                
            </div>
</div>
@endsection

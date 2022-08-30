@extends('master')
@section('title','Register')
@section('content')
    {{ Form::open(['route'=>'register','method'=>'POST']) }}
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Register</h2>
		    </div>
	    </section>
        <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingName', 'Name') }}
                    {{ Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'Name','required' => true,'autofocus' => true]) }}
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingEmail', 'Email address') }} 
                   {{ Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'name@example.com','required' => true,'autofocus' => true]) }}
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
        
                <div class="form-group form-floating mb-3">
                    {{ Form::label('floatingUserName', 'Username') }}
                    {{ Form::text('username', old('username'), ['class' => 'form-control','placeholder' => 'Username','required' => true,'autofocus' => true]) }}
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                
                <div class="form-group form-floating mb-3">
                    {!! Form::label('floatingPassword', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Password','required' => true]) !!}
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
        
                <div class="form-group form-floating mb-3">
                    {!! Form::label('floatingConfirmPassword', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'Confirm Password','required' => true]) !!}
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                {!! Form::submit('Register',['class'=>'w-100 btn btn-lg btn-primary'])!!}
            </div>
        </section>
    {{Form::close()}}   
@endsection
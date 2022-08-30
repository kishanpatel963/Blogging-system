@extends('master')
@section('title','Login')
@section('content')
    {{ Form::open(['route'=>'login','method'=>'POST']) }}
     @csrf
        <section class="cta-section theme-bg-light py-5">
		    <div class="container text-center">
			    <h2 class="heading">Login</h2>
		    </div>
	    </section>
        <section class="blog-list px-3 py-5 p-md-5">
            @include('include.partials.messages')
		    <div class="container">
                <div class="form-group form-floating mb-3">
                    {!! Form::label('floatingName', 'Email or Username') !!}
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
                {!! Form::submit('Login',['class'=>'w-100 btn btn-lg btn-primary'])!!}
            </div>
        </section>
    {{Form::close()}}   
@endsection
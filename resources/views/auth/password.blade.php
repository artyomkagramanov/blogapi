
@extends('layouts/form')
@section('title')
    Reset Password
@stop
@section('content')

    {!! Form::open(array('url' => '/password/email', 'method' => 'POST')) !!}
        @include('alerts.messages')
        <div class="form-group">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Send Password Reset Link', array('class'=>'btn btn-primary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
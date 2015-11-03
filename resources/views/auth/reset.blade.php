@extends('layouts/form')
@section('title')
    Reset Password
@stop
@section('content')

    {!! Form::open(array('url' => '/password/reset', 'method' => 'POST')) !!}
        @include('alerts.messages')

        <div class="form-group">
            {!! Form::label('Your E-mail Address') !!}
            {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
        </div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', array('required', 'class'=>'form-control','placeholder'=>'Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Confirm Password') !!}
            {!! Form::password('password_confirmation', array('required', 'class'=>'form-control','placeholder'=>'Confirm Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Reset Password', array('class'=>'btn btn-primary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
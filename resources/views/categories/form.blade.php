
@extends('layouts.main')

@section('title')

    {{$title}}

@stop

@section('header')

    <div class="jumbotron" style="margin-bottom:0; padding-bottom:10px;">
        <div class="container">
            <h2 class="text-center"> 
               {{$title}}
            </h2>
        </div>
    </div>

@stop

@section('content')

    @if(isset($category))
        {!! Form::model($category,array('url' => 'category/'.$category['id'], 'method' => 'PUT', 'role' => 'form', 'style' => 'max-width:350px; padding:10px;', 'class' => 'center-block img-thumbnail')) !!}
    @else
        {!! Form::open(array('url' => 'category/', 'method' => 'POST', 'role' => 'form', 'style' => 'max-width:350px; padding:10px;', 'class' => 'center-block img-thumbnail')) !!}
    @endif
            <div class="form-group">
                {!! Form::label('Title') !!}
                {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter title', 'id' => 'title')) !!}
            </div>
            <div class="form-group text-center">
                {!! Form::submit('Save!', array('class'=>'btn btn-default')) !!}
            </div>
        {!! Form::close() !!}

@stop
   
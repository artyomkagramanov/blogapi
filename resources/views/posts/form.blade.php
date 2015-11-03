
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

    @if(isset($post))
        {!! Form::model($post,array('url' => '/post/'.$post['id'], 'method' => 'PUT', 'role' => 'form', 'style' => 'max-width:350px; padding:10px;', 'class' => 'center-block img-thumbnail' ,'files' => true)) !!}
    @else
        {!! Form::open(array('url' => '/post/', 'method' => 'POST', 'role' => 'form', 'style' => 'max-width:350px; padding:10px;', 'class' => 'center-block img-thumbnail' , 'files' => true)) !!}
    @endif
            <div class="form-group">
                {!! Form::label('Title:') !!}
                {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Enter title', 'id' => 'title')) !!}
            </div>
             <div class="form-group">
                {!! Form::label('Description:') !!}
                {!! Form::textarea('description', null, array('required', 'class'=>'form-control', 'rows'=>'5', 'id' => 'description')) !!}
            </div> 
             <div class="form-group">
                {!! Form::label('Choose Categories:') !!}
                <div style="height:100px; overflow:scroll;">
                    @if(isset($post))
                        @foreach($categories as $category)
                            <div class="checkbox">
                                 <label>{!! Form::checkbox('categories_ids[]', $category['id'], in_array( $category['id'] , $post['categories'])) !!} {{{$category['title']}}}</label>
                            </div>
                        @endforeach
                    @else
                        @foreach($categories as $category)
                            <div class="checkbox">
                                
                                <label>{!! Form::checkbox('categories_ids[]', $category['id']) !!} {{{$category['title']}}}</label>
                                <!-- <label><input type="checkbox" value="">Option 1</label> -->
                            </div>                       
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('Choose Image:') !!}
                {!! Form::file('image', null, array('id' => 'post_image')) !!}
            </div> 
            <div class="form-group text-center">
                {!! Form::submit('Save!', array('class'=>'btn btn-default')) !!}

            </div>
        {!! Form::close() !!}

@stop

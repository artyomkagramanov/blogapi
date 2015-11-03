@extends('layouts.main')

@section('title')

	{{$title}}

@stop

@section('header')

	@include('posts._header')

@stop

@section('content')
<div class="row">
	<div class="col-md-12" style="border-bottom:1px solid #EEEEEE;">
		<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;font-weight:bold;font-size:170%;">
			{{{$post['title']}}} 
		</p>
		<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;">
			{{{$post['updated_at']}}} by
				<a href="#">User</a>
		</p>
		<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;">
			Categories: 
			@if(count($post['categories']))
				@foreach($post['categories'] as $category)
            		<a href="{!!url('/category/'.$category['id'])!!}">{{{$category['title']}}}</a>,	
            	@endforeach
			<a href="#">...</a>
			@else 
				Single Post
			@endif
		</p>
			<img src="{!!url('/images/'.$post['image'])!!}" class="img-thumbnail center-block" alt="{{{$post['title']}}}" width="304" height="236" > 
		<p class="text-center">
			{{{$post['description']}}}
		</p>
		<p class="text-center">	
				<a class="btn btn-warning btn-sm" href="{{url('/post/'.$post['id'].'/edit')}}" role="button">Edit »</a>
		</p>
			<div class="text-center" onclick="return confirm('Are you sure')">
				{!! Form::open(array('url' => '/post/'.$post['id'], 'method' => 'DELETE')) !!}
					{!! Form::submit('Delete!', array('class'=>'btn btn-danger btn-sm')) !!}
				{!! Form::close() !!}
			</div>
	</div>
</div>
@stop
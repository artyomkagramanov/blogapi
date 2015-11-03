@extends('layouts.main')

@section('title')

	{{$title}}

@stop

@section('header')

	@include('categories._header')

@stop

@section('content')
<div class="row">
	<div class="col-md-12" style="border-bottom:1px solid #EEEEEE;">
		<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;font-weight:bold;font-size:170%;">
			{{{$category['title']}}} 
		</p>
		<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;">
			{{{$category['updated_at']}}} by
				<a href="#">User</a>
		</p>

		<p class="text-center">	
				<a class="btn btn-warning btn-sm" href="{{url('/category/'.$category['id'].'/edit')}}" role="button">Edit »</a>
		</p>
			<div class="text-center" onclick="return confirm('Are you sure')">
				{!! Form::open(array('url' => '/category/'.$category['id'], 'method' => 'DELETE')) !!}
					{!! Form::submit('Delete!', array('class'=>'btn btn-danger btn-sm')) !!}
				{!! Form::close() !!}
			</div>
	</div>
</div>
@stop
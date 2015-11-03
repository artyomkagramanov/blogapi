@extends('layouts.main')

@section('title')

	{{$title}}

@stop

@section('header')

	@include('categories._header')

@stop

@section('content')
    
    @if(count($categories))
    		<div class="row">
	    @foreach($categories as $category)  
				<div class="col-md-2" style="border-bottom:1px solid #EEEEEE;padding-bottom:10px;">
					<h3 class="text-center">
						{{{$category['title']}}}
					</h3>
					<p class="text-center" style="font-family: Georgia, Times New Roman, Times, serif;">
						{{{$category['updated_at']}}} by 
							<a href="#">User</a>

					</p>
					<p class="text-center">
						<a class="btn btn-info btn-xs" href="{{url('/category/'.$category['id'])}}" role="button">Show »</a>
							<a class="btn btn-warning btn-xs" href="{{url('/category/'.$category['id'].'/edit')}}" role="button">Edit »</a>

					</p>	
					<div class="text-center" onclick="return confirm('Are you sure')">
						{!! Form::open(array('url' => '/category/'.$category['id'], 'method' => 'DELETE')) !!}
							{!! Form::submit('Delete!', array('class'=>'btn btn-danger btn-xs')) !!}
						{!! Form::close() !!}
					</div>
				</div>
		@endforeach
				</div>
	@else
		<h3 class="text-center">
			Empty Records
		</h3>
	@endif



@stop
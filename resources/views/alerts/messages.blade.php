@if( session('success') )
	<div class="alert alert-success" style="text-align:center;">{{ session('success') }}</div>
@endif
@if( session('status') )
	<div class="alert alert-success" style="text-align:center;">{{ session('status') }}</div>
@endif
@if( session('warning') )
	<div class="alert alert-warning" style="text-align:center;">{{ session('warning') }}</div>
@endif
@if( session('danger') )
	<div class="alert alert-danger" style="text-align:center;">{{ session('danger') }}</div>

@endif

@if( $errors->has() )
    <div class="alert alert-danger"> 
        @foreach ($errors->all() as $error )
            <p style="text-align:center;"> 
                {{{$error}}}
            </p>
        @endforeach
    </div>
@endif

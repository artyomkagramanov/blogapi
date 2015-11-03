 @extends('layouts.form')

@section('title')

	Register

@stop



@section('content') 
@include('alerts.messages')   	
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
						<a href="#" class="active" id="login-form-link">Login</a>
					</div>
					<div class="col-xs-6">
						<a href="#" id="register-form-link">Register</a>
					</div>
				</div>
				<hr>
			</div>
			<div class="panel-body">
				<div class="row">
					
				        
				        
    				
					<div class="col-lg-12">
						{!! Form::open(array('url' => '/auth/login', 'method' => 'POST','role' => 'form', 'style' => 'display:block;', 'id' => 'login-form')) !!}
						<form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
							<div class="form-group">
								{!! Form::label('') !!}
				            	{!! Form::email('email', null, array('required','id' => 'username' ,'tabindex' => '1','class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
							</div>
							<div class="form-group">
								
					            {!! Form::label('') !!}
				            	{!! Form::password('password', array('required','id' => 'password' ,'tabindex' => '2', 'class'=>'form-control', 'placeholder'=>'Your Password')) !!}
							</div>
							<div class="form-group text-center">
								{!! Form::label('Remember Me') !!}
				            	{!! Form::checkbox('remember',null,array('tabindex' => '3' ,'id' =>'remember')) !!}
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										{!! Form::submit('Login!', array('class'=>'form-control btn btn-login','id' => 'login-submit')) !!}
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											<a href="{!!url('/password/email/')!!}" tabindex="5" class="forgot-password">Forgot Password?</a>
										</div>
									</div>
								</div>
							</div>
						{!! Form::close() !!}

						
					    

					    {!! Form::open(array('url' => '/auth/register', 'method' => 'POST','role' => 'form', 'style' => 'display:block;', 'id' => 'register-form')) !!}
						<form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
							<div class="form-group">
								
								{!! Form::label('') !!}
				            	{!! Form::text('name', null, array('required','id' => 'username' ,'tabindex' => '1','class'=>'form-control', 'placeholder'=>'Your name')) !!}								
							</div>
							<div class="form-group">
								{!! Form::label('') !!}
				            	{!! Form::email('email', null, array('required','id' => 'email' ,'tabindex' => '1','class'=>'form-control', 'placeholder'=>'Your e-mail address')) !!}
							</div>
							<div class="form-group">
								{!! Form::label('') !!}
					            {!! Form::password('password', array('required','id' => 'password' ,'tabindex' => '2','class'=>'form-control','placeholder'=>'Password')) !!}
							</div>
							<div class="form-group">
							    {!! Form::label('') !!}
					            {!! Form::password('password_confirmation', array('required', 'id' => 'password_confirmation','tabindex' => '2','class'=>'form-control','placeholder'=>'Confirm Password')) !!}
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-3">
										 {!! Form::submit('Register Now!', array('class'=>'form-control btn btn-register','tabindex' => '4','id' => 'register-submit')) !!}
									</div>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
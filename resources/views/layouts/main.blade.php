<!DOCTYPE html>
<html lang="en" ng-app="app">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="shortcut icon" href="http://bootstrap-3.ru/assets/ico/favicon.ico">
		<link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
	    <title>Angular</title>
	      	

	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script src="{{ url('/js/bootstrap.js') }}"></script>


			<script src="{{ url('/angular/app/bower_components/angular/angular.js') }}"></script>
			<script src="{{ url('/angular/app/bower_components/angular-animate/angular-animate.js') }}"></script>
			<script src="{{ url('/angular/bower_components/angular-route/angular-route.js') }}"></script>
			<script src="{{ url('/angular/bower_components/angular-resource/angular-resource.js') }}"></script>
			<script src="{{ url('/angular/app/app.js') }}"></script>

			<script src="{{ url('/angular/app/controllers/HomeController.js') }}"></script>
			<script src="{{ url('/angular/app/controllers/CategoriesController.js') }}"></script>
			<script src="{{ url('/angular/app/controllers/PostsController.js') }}"></script>
			<script src="{{ url('/angular/app/services/Categoriesservice.js') }}"></script>
			<script src="{{ url('/angular/app/services/PostsService.js') }}"></script>

	</head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#/">Blog.dev</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="#/posts">Posts</a></li>
					<li><a href="#/categories">Categories</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					
						<li class="dropdown ">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="glyphicon glyphicon-user"></span> 
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">View Profile</a></li>
								<li><a href="#">View Posts</a></li>
								<li><a href="#">View Categories</a></li>
							</ul>
						</li>
						<li>
							<a href="{!!url('/auth/logout')!!}"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
						</li>

						<li>
							<a href="{!!url('/auth/register')!!}"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
						</li>
						<li>
							<a href="{!!url('/auth/login')!!}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
						</li>

				</ul>
			</div>
  		</div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    

    <div class="container" style="padding-bottom:0; margin-top:15px; ">

    	<ng-view></ng-view>

      	<hr>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    
	
  
</body>

</html>
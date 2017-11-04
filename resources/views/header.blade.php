<!DOCTYPE html>
<html>
    <head>
        <title>URL Shortener</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
       		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
			<!-- Latest compiled JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    		<!-- Custom CSS -->
 	 		<link rel="stylesheet" href="{{ URL::to('css/custom.css') }} ">

    </head>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Link Shortener Service</a>
    </div>
    <ul class="nav navbar-nav navbar-right">

    @if (Auth::check())
     <li> <a href="#"> Hi {{{ isset(Auth::user()->FirstName) ? Auth::user()->FirstName : Auth::user()->FirstName }}} </a> </li>
      <li>
      <a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout </a>
      </li>
    @else
      <li>
      <a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Sign Up /Login</a>
      </li>
    @endif
    </ul>
  </div>
</nav>

</div>
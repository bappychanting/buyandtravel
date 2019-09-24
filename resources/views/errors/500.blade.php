<!DOCTYPE html>
<html lang="en">

  <!-- Header -->
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{!! asset('favicon.png') !!}"/>

    <title>Error || Buy &#38; Travel || Trade Items From Overseas</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap core CSS -->
    {{ Html::style('css/bootstrap.min.css') }}

    <!-- Material Design Bootstrap -->
    {{ Html::style('css/mdb.min.css') }}

    <!-- Custom styles for this template -->
    {{ Html::style('css/style.css') }}
  </head>
  <!-- #ENDS# Header -->

  <body class="blue-gradient">
  	<div class="text-center">
	  	<h3 class="my-4">
	  		<a href="{{ route('buyandtravel') }}" class="white-text">
	        	<i class="fa fa-shopping-bag  fa-sm pr-2" aria-hidden="true"></i>Buy &#38; Travel
	    	</a>
		</h3>
	    <p class="cyan-text display-1 my-4">
	    	<i class="fa fa-frown-o  fa-sm pr-2"></i>oops..
	    </p>
  		<p class="white-text display-4 my-4">
  			Something went wrong!</span>
  		</p>
  	</div>

    <!-- Javascript -->

    <!-- Bootstrap core JavaScript -->
 	{{Html::script('js/jquery.min.js')}}
    {{Html::script('js/jquery.form.js')}}

    <!-- MDB core JavaScript -->
 	{{Html::script('js/mdb.min.js')}}

    <!-- Custom JavaScript -->
 	{{Html::script('js/script.js')}}

  </body>

</html>

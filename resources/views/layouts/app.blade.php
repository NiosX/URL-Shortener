<!DOCTYPE html>
<html>
<head>
	<title>URL Shortener @yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />

</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="d-flex order-0">
			 	<a class="navbar-brand mr-0" href="/">URL Shortener</a>	
			</div>
		</nav>
	</header>

	<div class="container my-3">
	    <div class="row justify-content-center">
	    	@yield('content')
	    </div>
	</div>

	<footer class="fixed-bottom bg-dark mt-3">
	    <div class="text-center py-3 text-white" >© {{date('Y')}} Copyright: 
	      <a href="#"> Guillermo Suazo </a>
	    </div>		
	</footer>

	@yield('script')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset='UTF-8'/>
		<title>@yield('title')</title>
                
	    @section('head')
	    	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
                		
	    @show
	    @section('libraryCSS')
	    @show
	</head>
	<body>
        @yield('body')
            @section('footer')
                    <script src="{{URL::asset('assets/js/jquery-1.11.1.min.js')}}"></script>
                    <script src="{{URL::asset('assets/js/bootstrap.js')}}"></script>
            @show
            @yield('libraryJquery')
            
        
	</body>
</html>
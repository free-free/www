<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>APP NAME @yield('title')</title>
</head>
<body>
	@section('sidebar')
		This is a master side
	@show
	
	<div class="container">
            @yield('container')
    </div>
</body>
</html>
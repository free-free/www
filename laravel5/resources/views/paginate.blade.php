<html>
<head>
<style type="text/css">
	a{
		text-decoration: none;
	}
	.pagination{
		height: 50px;
		line-height: 40px;
	}
	.pagination li{
			list-style: none;
			width: 25px;
			height: 25px;
			line-height: 25px;
			margin: 2px 2px;
			border-radius: 3px;
			background: #55aaff;
			border: 1px solid #5500ff;
			display: inline-block;
	}
	.pagination li a{
		display: inline-block;
		width: 25px;
		height: 25px;
		line-height: 25px;
		text-align: center;
		color: #ffffff;
	}
	.pagination .active{
		display: inline-block;
		width: 25px;
		height: 25px;
		line-height: 25px;
		text-align: center;	
		color: #aa0000;
	}
	.pagination .disabled{
		display: inline-block;
		width: 25px;
		height: 25px;
		line-height: 25px;
		text-align: center;
		background: #9999ff;
	}
</style>
</head>
<body>
<div class="container">
    @foreach ($users as $user)
        {{ $user->user_name }}
    @endforeach
</div>
{!! $page !!}
</body>
</html>

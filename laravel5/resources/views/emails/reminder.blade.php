<html>
<head>
	<style type="text/css">
		.img-box{
			width: 80%;
			height: 400px;
			border: 1px solid gray;
			border-radius: 5px;
			background: #f2f2f2;

		}
		.message-box{
			line-height: 200px;
			font-size: 100px;
			color: #aaa;
			font-family: 'Arial' sans-serif;
			width: 80%;
			height: 200px;
			margin-top: 50px;
			text-align: center;
			border: 1px solid #ccc;
			border-radius: 5px;
			background: #fff4f5;
		}
	</style>
</head>
<body>
	<div class="img-box">
		{{--<!-- Embedding inline images into your e-mails -->--}}
		<img src="{{$message->embed('/var/www/laravel5/bg.jpg')}}">
		{{--<!--  embed a raw data  into an e-mail message -->--}}
		{{--<img src="{{ $message->embedData(, $name) }}">--}}
	</div>
	<div class="message-box">
		{{$msg}}
	</div>
</body>
</html>

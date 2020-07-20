<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>URL Shorter</title>
</head>
<body>
<form method="POST" action="{{route('store')}}">
	@csrf
	<label>
		Long URL:* <input type="text" name="long_url" placeholder="Enter URL">
	</label>
	<label>
		Custom URL: <input type="text" name="custom_url" placeholder="Enter Custom URL">
	</label>
	<input type="submit" name="short_url">
	<ul>
		@if($errors->any())
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif
	</ul>
</form>
@isset($url)
	<label>Shorted URL:
		<input type="text" value="{{ route('show', $url->short_url) }}">
	</label>
@endisset
</body>
</html>
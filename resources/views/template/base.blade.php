<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" href={{ asset('/css/app.css') }}>
	</head>
	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-10">
					@yield('content')
				</div>
			</div>
		</div>

		<script src={{ asset('/js/app.js') }}></script>
	</body>
</html>

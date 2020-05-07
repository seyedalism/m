<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>

		@yield('title')

	</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

</head>
<body>

	@include('header')

	@yield('content')

	@include('footer')

</body>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@if(isset($loggedIn) && $loggedIn)

<script type="text/javascript">
	swal({
	  title: "با موفقیت وارد شدید!",
	  icon: "success",
	  button: "ok",
	});
</script>

@elseif(isset($loggedIn) && !$loggedIn)

<script type="text/javascript">

	swal({
	  title: "ورود ناموفق!",
	  icon: "warning",
	  button: "ok",
	});
</script>

@endif

</html>
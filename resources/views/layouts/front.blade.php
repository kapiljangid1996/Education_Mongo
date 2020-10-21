<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('page_title', 'Education')</title>
	<meta name="description" content="Education Website">
	<meta name="keywords" content="Education Website">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontDesign/css/styles-merged.css')}}">
	<link rel="stylesheet" href="{{asset('frontDesign/css/style.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontDesign/css/custom.css')}}">
	<!--[if lt IE 9]>
	    <script src="{{asset('frontDesign/js/vendor/html5shiv.min.js')}}"></script>
	    <script src="{{asset('frontDesign/js/vendor/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="probootstrap-search" id="probootstrap-search">
	<a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
	<form action="#">
		<input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
	</form>
</div>
<div class="probootstrap-page-wrapper">

	<!-- Header -->

	@include('pages.header')

	<!-- End Header -->

	<!-- Content -->
	
	<div>
		@yield('content')
	</div>

	<!-- End Content -->

	<!-- Footer -->

	@include('pages.footer')

	<!-- End Footer -->
</div>
	<script src="{{asset('frontDesign/js/scripts.min.js')}}"></script>
	<script src="{{asset('frontDesign/js/main.min.js')}}"></script>
	<script src="{{asset('frontDesign/js/custom.js')}}"></script>
</body>
</html>
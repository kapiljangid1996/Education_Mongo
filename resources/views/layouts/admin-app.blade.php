<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="utf-8" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminDesign/img/apple-icon.png')}}">

	<link rel="icon" type="image/png" href="{{asset('adminDesign/img/favicon.png')}}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('page_title')</title>

	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<link href="{{asset('adminDesign/css/material-dashboard.min1c51.css?v=2.1.2')}}" rel="stylesheet" />

	<link href="{{asset('adminDesign/demo/demo.css')}}" rel="stylesheet" />

	<style>
		.stylishdiv {
		  	margin-top: 7.5%;
		}
	</style>
</head>

<body>

	<div class="container stylishdiv">
        <div>
            @include('elements.flash')
        </div>
        @yield('content')
    </div>
	
	<script src="{{asset('adminDesign/js/core/jquery.min.js')}}"></script>

	<script src="{{asset('adminDesign/js/core/popper.min.js')}}"></script>

	<script src="{{asset('adminDesign/js/core/bootstrap-material-design.min.js')}}"></script>

	<script src="{{asset('adminDesign/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

	<script async defer src="https://buttons.github.io/buttons.js"></script>

	<script src="{{asset('adminDesign/js/plugins/chartist.min.js')}}"></script>

	<script src="{{asset('adminDesign/js/plugins/bootstrap-notify.js')}}"></script>

	<script src="{{asset('adminDesign/js/material-dashboard.min1c51.js?v=2.1.2')}}" type="text/javascript"></script>

	<script src="{{asset('adminDesign/demo/demo.js')}}"></script>

	<script type="text/javascript">
    	$("document").ready(function(){
   	   		setTimeout(function(){
       			$("div.alert").remove();
    		}, 3000 ); // 3 secs
    	});
  	</script>
</body>

</html>
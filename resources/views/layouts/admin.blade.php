<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
	<meta charset="utf-8" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminDesign/img/apple-icon.png')}}">

	<link rel="icon" type="image/png" href="{{asset('adminDesign/img/favicon.png')}}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('page_title', 'Admin Dashboard')</title>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<link href="{{asset('adminDesign/css/material-dashboard.min1c51.css?v=2.1.2')}}" rel="stylesheet" />

	<link href="{{asset('adminDesign/demo/demo.css')}}" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">

		<!-- Sidebar -->

		@include('elements.sidebar')

		<!-- End Sidebar -->

		<div class="main-panel">

			<!-- Header -->

			@include('elements.header')

			<!-- End Header -->

			<div class="content">
				<div class="content">
					<div class="container-fluid">
						@yield('breadcrumb')
						<div>
                  			@include('elements.flash')   
                		</div> 
                		@yield('content')
					</div>
				</div>
			</div>

			<!-- Footer -->

			@include('elements.footer')

			<!-- End Footer -->
		</div>
	</div>

	<!-- End Design Switch -->

	@include('elements.switch')

	<!-- End Design Switch -->

<!-- Admin Script -->	

<script src="{{asset('adminDesign/js/core/jquery.min.js')}}"></script>

<script src="{{asset('adminDesign/js/core/popper.min.js')}}"></script>

<script src="{{asset('adminDesign/js/core/bootstrap-material-design.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/moment.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/sweetalert2.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/jquery.validate.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/jquery.bootstrap-wizard.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/bootstrap-selectpicker.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/bootstrap-tagsinput.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/jasny-bootstrap.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/fullcalendar.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/jquery-jvectormap.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/nouislider.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<script src="{{asset('adminDesign/js/plugins/arrive.min.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="{{asset('adminDesign/js/plugins/chartist.min.js')}}"></script>

<script src="{{asset('adminDesign/js/plugins/bootstrap-notify.js')}}"></script>

<script src="{{asset('adminDesign/js/material-dashboard.min1c51.js?v=2.1.2')}}" type="text/javascript"></script>

<script src="{{asset('adminDesign/demo/demo.js')}}"></script>

<script src="{{asset('js/adminSwitch.js')}}"></script>	

<!-- Admin Script Close -->	

<!-- Extra Script -->

<script src="https://cdn.jsdelivr.net/npm/jquery-slugify@1.2.5/dist/slugify.min.js"></script>

<script type="text/javascript">
    $("#name").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'_');
        $("#slug").val(Text);
    });
</script>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
        });
    });
</script>	

<script type="text/javascript">
    $("document").ready(function(){
    setTimeout(function(){
    $("div.alert").remove();
    }, 3000 ); // 3 secs
});
</script>

<!-- Extra Script Close -->	
</body>

</html>
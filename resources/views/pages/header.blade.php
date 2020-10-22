<div class="probootstrap-header-top">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
				<span><i class="icon-location2"></i>Brooklyn, NY 10036, United States</span>
				<span><i class="icon-phone2"></i>+1-123-456-7890</span>
				<span><i class="icon-mail"></i>info@uicookies.com</span>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
				<ul>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook2"></i></a></li>
					<li><a href="#"><i class="icon-instagram2"></i></a></li>
					<li><a href="#"><i class="icon-youtube"></i></a></li>
					<li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-default probootstrap-navbar">
	<div class="container">
		<div class="navbar-header">
			<div class="btn-more js-btn-more visible-xs">
				<a href="#"><i class="icon-dots-three-vertical "></i></a>
			</div>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url('/')}}" title="uiCookies:Enlight">Enlight</a>
		</div>
		<div id="navbar-collapse" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="{{url('/')}}">Home</a></li>
				@foreach ($categories as $category)
				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle">{{ $category->cat_name }}</a>
					@if ($category->children)
						<ul class="dropdown-menu">
							@foreach ($category->children as $child)
								<li class="dropdown-submenu dropdown">
									<a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ $child->cat_name }}</a>
									@if ($child->exam)
										@foreach ($child->exam as $exams)
										<ul class="dropdown-menu">
											<li><a href="{{url('/exam/'.$exams->exam_slug)}}">{{ $exams->exam_name }}</a></li>
										</ul>
										@endforeach
									@endif
									@if($child->course)
										@foreach ($child->course as $courses)
										<ul class="dropdown-menu">
											<li><a href="{{url('/course/'.$courses->course_slug)}}">{{ $courses->course_name }}</a></li>
										</ul>
										@endforeach
									@endif
									@if($child->college)
										@foreach ($child->college as $colleges)
										<ul class="dropdown-menu">
											<li><a href="{{url('/college/'.$colleges->colleges_slug)}}">{{ $colleges->college_name }}</a></li>
										</ul>
										@endforeach
									@endif
								</li>
							@endforeach
						</ul>
					@endif
				</li>
				@endforeach
				<li><a href="{{url('/contact')}}">Contact</a></li>
			</ul>
		</div>
	</div>
</nav>
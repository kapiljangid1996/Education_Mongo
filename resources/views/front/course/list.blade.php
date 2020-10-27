@extends('layouts.front')

@section('page_title')
Courses
@stop

@section('content')
<section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{ URL::asset('frontDesign/img/1.jpg') }})">	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center section-heading probootstrap-animate">
				<h2 class="mb0">Our Courses</h2>
			</div>
		</div>
	</div>
	<div class="probootstrap-tab-style-1">
		<ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
			<li class="active"><a data-toggle="tab" href="#all-course">All Course</a></li>
			@foreach ($categories as $category)
				<li><a data-toggle="tab" href="#course-{{ $category->cat_slug }}">{{ $category->cat_name }}</a></li>
			@endforeach
		</ul>
</section>
<section class="probootstrap-section probootstrap-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content">
					<div id="all-course" class="tab-pane fade in active">
						<div class="row">
							<div class="col-md-12">
								<div class="owl-carousel" id="owl1">
								@foreach($courses as $course)
								<div class="item">						
									<a href="{{url('/course/'.$course->course_slug)}}" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="/Uploads/Course/{{$course->course_image}}" class="img-responsive"></figure>
										<div class="probootstrap-text">
											<h3>{{$course->course_name}}</h3>
											<p>{{$course->course_short_description}}</p>
											<span class="probootstrap-date"><i class="icon-calendar"></i>{{ $course->created_at->format('M d, Y') }}</span>
										</div>
									</a>
								</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
					@foreach ($categories as $category)
					<div id="course-{{ $category->cat_slug }}" class="tab-pane fade">
						<div class="row">
							<div class="col-md-12">
								@foreach($courses as $course)
								@if($category->cat_name == $course->category->parent->cat_name)
									<div class="col-md-4">
									<div class="item">						
										<a href="{{url('/course/'.$course->course_slug)}}" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="/Uploads/Course/{{$course->course_image}}" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>{{$course->course_name}}</h3>
												<p>{{$course->course_short_description}}</p>
												<span class="probootstrap-date"><i class="icon-calendar"></i>{{ $course->created_at->format('M d, Y') }}</span>
											</div>
										</a>
									</div></div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@stop
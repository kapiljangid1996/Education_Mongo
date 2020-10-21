@extends('layouts.front')

@section('page_title')
Courses
@stop

@section('content')
<section class="probootstrap-section probootstrap-section-colored probootstrap-bg probootstrap-custom-heading probootstrap-tab-section" style="background-image: url({{ URL::asset('frontDesign/img/1.jpg') }})">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center section-heading probootstrap-animate">
				<h2 class="mb0">Highlights</h2>
			</div>
		</div>
	</div>
	<div class="probootstrap-tab-style-1">
		<ul class="nav nav-tabs probootstrap-center probootstrap-tabs no-border">
			<li class="active"><a data-toggle="tab" href="#all-courses">All Courses</a></li>
			@foreach ($categories as $category)
				<li><a data-toggle="tab" href="#course-{{ $category->cat_slug }}">{{ $category->cat_name }}</a></li>
			@endforeach
		</ul>
	</div>
</section>
<section class="probootstrap-section probootstrap-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content">
					<div id="all-courses" class="tab-pane fade in active">
						<div class="row">
							<div class="col-md-12">
								<div class="owl-carousel" id="owl1">
									@foreach($courses as $course)
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="/Uploads/Course/{{$course->course_image}}" class="img-responsive"></figure>
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
								<div class="owl-carousel" id="owl1-{{ $category->cat_slug }}">
									@foreach($courses as $course)
									@if($category->cat_name == $course->category->parent->cat_name)
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="/Uploads/Course/{{$course->course_image}}" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>{{$course->course_name}}</h3>
												<p>{{$course->course_short_description}}</p>
												<span class="probootstrap-date"><i class="icon-calendar"></i>{{ $course->created_at->format('M d, Y') }}</span>
											</div>
										</a>
									</div>
									@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@stop
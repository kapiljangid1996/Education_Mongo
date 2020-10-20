@extends('layouts.front')

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left section-heading probootstrap-animate">
				<h2>Welcome to School of Excellence</h2>
			</div>
		</div>
	</div>
</section>
<section class="probootstrap-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="probootstrap-flex-block">
					<div class="probootstrap-text probootstrap-animate">
						<h3>About School</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis explicabo veniam labore ratione illo vero voluptate a deserunt incidunt odio aliquam commodi blanditiis voluptas error non rerum temporibus optio accusantium!</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="probootstrap-image probootstrap-animate" style="background-image: url({{ URL::asset('frontDesign/img/slider_3.jpg') }})">
						<a href="https://vimeo.com/45830194" class="btn-video popup-vimeo"><i class="icon-play3"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="probootstrap-section" id="probootstrap-counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
				<div class="probootstrap-counter-wrap">
					<div class="probootstrap-icon">
						<i class="icon-users2"></i>
					</div>
					<div class="probootstrap-text">
						<span class="probootstrap-counter"><span class="js-counter" data-from="0" data-to="20203" data-speed="5000" data-refresh-interval="50">1</span></span>
						<span class="probootstrap-counter-label">Students Enrolled</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
				<div class="probootstrap-counter-wrap">
					<div class="probootstrap-icon">
						<i class="icon-user-tie"></i>
					</div>
					<div class="probootstrap-text">
						<span class="probootstrap-counter"><span class="js-counter" data-from="0" data-to="139" data-speed="5000" data-refresh-interval="50">1</span></span>
						<span class="probootstrap-counter-label">Certified Teachers</span>
					</div>
				</div>
			</div>
			<div class="clearfix visible-sm-block visible-xs-block"></div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
				<div class="probootstrap-counter-wrap">
					<div class="probootstrap-icon">
						<i class="icon-library"></i>
					</div>
					<div class="probootstrap-text">
						<span class="probootstrap-counter"><span class="js-counter" data-from="0" data-to="99" data-speed="5000" data-refresh-interval="50">1</span>%</span>
						<span class="probootstrap-counter-label">Passing to Universities</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 probootstrap-animate">
				<div class="probootstrap-counter-wrap">
					<div class="probootstrap-icon">
						<i class="icon-smile2"></i>
					</div>
					<div class="probootstrap-text">
						<span class="probootstrap-counter"><span class="js-counter" data-from="0" data-to="100" data-speed="5000" data-refresh-interval="50">1</span>%</span>
						<span class="probootstrap-counter-label">Parents Satisfaction</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
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
			<li class="active"><a data-toggle="tab" href="#featured-news">Featured News</a></li>
			<li><a data-toggle="tab" href="#upcoming-events">Courses</a></li>
		</ul>
	</div>
</section>
<section class="probootstrap-section probootstrap-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="tab-content">
					<div id="featured-news" class="tab-pane fade in active">
						<div class="row">
							<div class="col-md-12">
								<div class="owl-carousel" id="owl1">
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, ut.</p>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
											</div>
										</a>
									</div>
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, ut.</p>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
											</div>
										</a>
									</div>
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, ut.</p>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p><a href="#" class="btn btn-primary">View all news</a></p>
							</div>
						</div>
					</div>
					<div id="upcoming-events" class="tab-pane fade">
						<div class="row">
							<div class="col-md-12">
								<div class="owl-carousel" id="owl2">
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
												<span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
											</div>
										</a>
									</div>
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
												<span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
											</div>
										</a>
									</div>
									<div class="item">
										<a href="#" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="{{asset('frontDesign/img/2.jpg')}}" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></figure>
											<div class="probootstrap-text">
												<h3>Tempora consectetur unde nisi</h3>
												<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
												<span class="probootstrap-location"><i class="icon-location2"></i>White Palace, Brooklyn, NYC</span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<p><a href="#" class="btn btn-primary">View all news</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="probootstrap-section probootstrap-bg-white probootstrap-border-top">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
				<h2>Our Featured Courses</h2>
				<p class="lead">Sed a repudiandae impedit voluptate nam Deleniti dignissimos perspiciatis nostrum porro nesciunt</p>
			</div>
		</div>
		<div class="row">
			@foreach($courses as $course)
			<div class="col-md-4">
				<div class="" id="">
					<div class="item">
						<a href="{{url('/course/'.$course->course_slug)}}" class="probootstrap-featured-news-box"><figure class="probootstrap-media"><img src="/Uploads/Course/{{$course->course_image}}" class="img-responsive"></figure>
							<div class="probootstrap-text">
								<h3>{{$course->course_name}}</h3>
								<span class="probootstrap-date"><i class="icon-calendar"></i>July 9, 2017</span>
								<p>{{$course->course_short_description}}</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@stop
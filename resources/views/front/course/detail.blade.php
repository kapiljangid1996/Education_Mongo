@extends('layouts.front')

@section('page_title')
@foreach ($courses as $course)
	{{ $course->course_name }}
@endforeach
@stop

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left section-heading probootstrap-animate">
				@foreach ($courses as $course)
					<h1>{{ $course->course_name }}</h1>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="probootstrap-section probootstrap-section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row probootstrap-gutter0">
					<div class="col-md-4" id="probootstrap-sidebar">
						<div class="probootstrap-sidebar-inner probootstrap-overlap probootstrap-animate">
							<h3>
								@foreach ($courses as $course)
									{{ $course->category->parent->cat_name }} Courses
								@endforeach
							</h3>
							<ul class="probootstrap-side-menu">
								@foreach ($categories as $category)
								@foreach ($courses as $course)
									@if($category->cat_name == $course->category->parent->cat_name)
										@if ($category->children)
											@foreach ($category->children as $child)
												@if ($child->course)
													@foreach ($child->course as $coursess)
														<li><a href="{{url('/course/'.$coursess->course_slug)}}">{{$coursess->course_name}}</a></li>
													@endforeach
												@endif
											@endforeach
										@endif									
									@endif									
								@endforeach
								@endforeach
							</ul>
						</div>
						<div style="margin-top: 45%">
							
						</div>
					</div>
					<div class="col-md-7 col-md-push-1  probootstrap-animate" id="probootstrap-content">
						<h2>Description</h2><hr>
						@foreach ($courses as $course)
							<p>{!! $course->course_description !!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
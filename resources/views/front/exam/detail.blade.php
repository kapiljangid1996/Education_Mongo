@extends('layouts.front')

@section('page_title')
@foreach ($exams as $exam)
	{{ $exam->exam_name }}
@endforeach
@stop

@section('content')
<section class="probootstrap-section probootstrap-section-colored">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left section-heading probootstrap-animate">
				@foreach ($exams as $exam)
					<h1>{{ $exam->exam_name }}</h1>
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
								@foreach ($exams as $exam)
									{{ $exam->category->parent->cat_name }} Exams
								@endforeach
							</h3>
							<ul class="probootstrap-side-menu">
								@foreach ($categories as $category)
								@foreach ($exams as $exam)
									@if($category->cat_name == $exam->category->parent->cat_name)
										@if ($category->children)
											@foreach ($category->children as $child)
												@if ($child->exam)
													@foreach ($child->exam as $examss)
														<li><a href="{{url('/exam/'.$examss->exam_slug)}}">{{$examss->exam_name}}</a></li>
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
						@foreach ($exams as $exam)
							<p>{!! $exam->exam_description !!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop
@extends('layouts.admin')

@section('page_title')
Add Course
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ url('/admin/course') }}">Course</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Course</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-rose card-header-text">
				<div class="card-text">
					<h4 class="card-title">Add Course</h4>
				</div>
			</div>
			<hr>
			<div class="card-body">
				<form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<label class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="course_name" id="name" placeholder="Here.."value="{{ old('course_name') }}" required>
								{!! $errors->first('course_name', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="course_slug" id="slug" placeholder="Here.."value="{{ old('course_slug') }}" required>
								{!! $errors->first('course_slug', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-10">
							<div class="form-group">
								<select class="form-control selectpicker" data-style="btn btn-link" title="Choose Category" data-size="7" name="category_id" required>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" disabled>{{ $category->cat_name }}</option>
										@if ($category->children)
											@foreach ($category->children as $child)
												<option value="{{ $child->id }}">&nbsp;&nbsp;&nbsp;{{ $child->cat_name }}</option>
											@endforeach
										@endif
									@endforeach
								</select>
								{!! $errors->first('category_id', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Exam</label>
						<div class="col-sm-10">
							<div class="form-group">
								<select class="form-control selectpicker" data-style="btn btn-link" title="Choose Exam" data-size="7" name="exam_id[]" multiple="" required>
									@foreach ($categories as $category)
										<option value="{{ $category->id }}" disabled="disabled">{{ $category->cat_name }}</option>
										@if ($category->children)
											@foreach ($category->children as $child)
												@if ($child->exam)
													@foreach ($child->exam as $exams)
														<option value="{{ $exams->id }}">&nbsp;&nbsp;&nbsp;{{ $exams->exam_name }}</option>
													@endforeach
												@endif
											@endforeach
										@endif
									@endforeach
								</select>
								{!! $errors->first('exam_id', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="course_description" required>{{ old('course_description') }}</textarea>
								{!! $errors->first('course_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Short Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="course_short_description" rows="3" placeholder="Here.." required>{{ old('course_short_description') }}</textarea>
								{!! $errors->first('course_short_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Image</label>
						<div class="col-sm-10">
							 <input type="file" class="form-control" name="course_image" required>
							 {!! $errors->first('course_image', '<small class="text-danger">:message</small>') !!}
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="meta_name" placeholder="Here.." placeholder="Here.." value="{{ old('meta_name') }}" required>
								{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="meta_description" rows="3" placeholder="Here.." required>{{ old('meta_description') }}</textarea>
								{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="meta_keyword" rows="3" placeholder="Here.." required>{{ old('meta_keyword') }}</textarea>
								{!! $errors->first('meta_keyword', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<div class="form-group">
								<div class="togglebutton">
									<label>
										<input type="hidden" name="status" value="0">
									    <input type="checkbox" name="status" checked="" value="1">			    
									      <span class="toggle"></span>
									      Status
									</label>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-fill btn-rose">Add</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Script -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'course_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop
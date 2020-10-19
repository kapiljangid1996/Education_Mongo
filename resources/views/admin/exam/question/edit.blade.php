@extends('layouts.admin')

@section('page_title')
Edit Question
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ url('/admin/exam') }}">Exam</a></li>
		<li class="breadcrumb-item"><a href="{{url('/admin/exam/question/'.$questions->exams_id)}}">Question</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit Question</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-rose card-header-text">
				<div class="card-text">
					<h4 class="card-title">Edit Question</h4>
				</div>
			</div>
			<hr>
			<div class="card-body">
				<form action="{{url('admin/exam/question/edit_question/'.$questions->id)}}" method="POST">
					@csrf
					<div class="row">
						<label class="col-sm-2 col-form-label">Content</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="question_name" id="name" value="{{$questions->question_name}}" required>
								{!! $errors->first('question_name', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="question_slug" id="slug" value="{{$questions->question_slug}}" required>
								{!! $errors->first('question_slug', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="question_description" required>{{$questions->question_description}}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Short Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="question_short_description" rows="3" required>{{$questions->question_short_description}}</textarea>
								{!! $errors->first('question_short_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Name</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="meta_name" value="{{$questions->meta_name}}" required>
								{!! $errors->first('meta_name', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="meta_description" rows="3" required>{{$questions->meta_description}}</textarea>
								{!! $errors->first('meta_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Meta Keyword</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="meta_keyword" rows="3" required>{{$questions->meta_keyword}}</textarea>
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
									    <input type="checkbox" name="status" value="1" @if(old('status', $questions->status)) checked @endif>			    
									      <span class="toggle"></span>
									      Status
									</label>
								</div>
							</div>
						</div>
					</div>
					<input type="hidden"  name="exams_id" value="{{$questions->exams_id}}">
					<hr>
					<div class="row">
						<label class="col-sm-2 col-form-label"></label>
						<div class="col-md-9">
							<button type="submit" class="btn btn-fill btn-rose">Edit</button>
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
  CKEDITOR.replace( 'question_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script Close -->
@stop
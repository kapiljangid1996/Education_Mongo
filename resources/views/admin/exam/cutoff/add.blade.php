@extends('layouts.admin')

@section('page_title')
Add Cut Off
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ url('/admin/exam') }}">Exam</a></li>
		<li class="breadcrumb-item"><a href="{{url('/admin/exam/cutoff/'.$id)}}">Cut Off</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add Cut Off</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-rose card-header-text">
				<div class="card-text">
					<h4 class="card-title">Add Cut Off</h4>
				</div>
			</div>
			<hr>
			<div class="card-body">
				<form action="{{url('admin/exam/cutoff/add_cutoff')}}" method="POST">
					@csrf
					<div class="row">
						<label class="col-sm-2 col-form-label">Content</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="cutoff_name" id="name" placeholder="Here.." value="{{ old('cutoff_name') }}" required>
								{!! $errors->first('cutoff_name', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Slug</label>
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="cutoff_slug" id="slug" placeholder="Here.." value="{{ old('cutoff_slug') }}" required>
								{!! $errors->first('cutoff_slug', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="cutoff_description" required>{{ old('cutoff_description') }}</textarea>
								{!! $errors->first('cutoff_description', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-2 col-form-label">Short Description</label>
						<div class="col-sm-10">
							<div class="form-group">
								<textarea class="form-control" name="cutoff_short_description" rows="3" placeholder="Here.." required>{{ old('cutoff_short_description') }}</textarea>
								{!! $errors->first('cutoff_short_description', '<small class="text-danger">:message</small>') !!}
							</div>
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
					<input type="hidden"  name="exams_id" value="{{$id}}">
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
  CKEDITOR.replace( 'cutoff_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop
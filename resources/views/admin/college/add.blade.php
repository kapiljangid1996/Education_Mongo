@extends('layouts.admin')

@section('page_title')
Add College
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ url('/admin/college') }}">College</a></li>
		<li class="breadcrumb-item active" aria-current="page">Add College</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-rose card-header-text">
				<div class="card-text">
					<h4 class="card-title">Add College</h4>
				</div>
				<hr>
				<div class="card-body">
					<form action="{{ route('college.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
						<div class="row">
							<label class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="college_name" id="name" placeholder="Here.."value="{{ old('college_name') }}" required>
									{!! $errors->first('college_name', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Slug</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="college_slug" id="slug" placeholder="Here.."value="{{ old('college_slug') }}" required>
									{!! $errors->first('college_slug', '<small class="text-danger">:message</small>') !!}
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
							<label class="col-sm-2 col-form-label">Ownership</label>
							<div class="col-sm-10">
								<div class="form-group">
									<select class="form-control selectpicker" data-style="btn btn-link" title="Choose Ownership" name="ownership" required>
										<option value="Private">Private</option>
                                        <option value="Public / Government">Public / Government</option>
										<option value="Public Private">Public Private</option>
									</select>
									{!! $errors->first('category_id', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Location</label>
							<div class="col-sm-10">
								<div class="">
									<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="form-control selectpicker" data-live-search="true" data-style="btn btn-link" required></select>
									<select id ="state" name="city" class="form-control" data-style="btn btn-link" required></select>
									{!! $errors->first('state', '<small class="text-danger">:message</small>') !!}
									{!! $errors->first('city', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Street</label>
							<div class="col-sm-10">
								<div class="form-group">
									<textarea class="form-control" name="street" rows="2" placeholder="Here.." required>{{ old('street') }}</textarea>
									{!! $errors->first('street', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Post Code</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="post_code" placeholder="Here.." value="{{ old('post_code') }}" required>
									{!! $errors->first('post_code', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Contact</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="contact" placeholder="Here.." value="{{ old('contact') }}" required>
									{!! $errors->first('contact', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="Here.." value="{{ old('email') }}" required>
									{!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Website</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="website" placeholder="Here.." value="{{ old('website') }}" required>
									{!! $errors->first('website', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Description</label>
							<div class="col-sm-10">
								<div class="form-group">
									<textarea class="form-control" name="college_description" required>{{ old('college_description') }}</textarea>
									{!! $errors->first('college_description', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Short Description</label>
							<div class="col-sm-10">
								<div class="form-group">
									<textarea class="form-control" name="college_short_description" rows="3" placeholder="Here.." required>{{ old('college_short_description') }}</textarea>
									{!! $errors->first('college_short_description', '<small class="text-danger">:message</small>') !!}
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Image</label>
							<div class="col-sm-10">
								 <input type="file" class="form-control" name="college_image" required>
								 {!! $errors->first('college_image', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 col-form-label">Logo</label>
							<div class="col-sm-10">
								 <input type="file" class="form-control" name="college_logo" required>
								 {!! $errors->first('college_logo', '<small class="text-danger">:message</small>') !!}
							</div>
						</div>						
						<div class="row">
							<label class="col-sm-2 col-form-label">Meta Name</label>
							<div class="col-sm-10">
								<div class="form-group">
									<input type="text" class="form-control" name="meta_name" placeholder="Here.." value="{{ old('meta_name') }}" required>
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
</div>

<!-- Script -->

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script src="{{asset('js/cities.js')}}"></script>

<script language="javascript">print_state("sts");</script>	

<script>
  CKEDITOR.replace( 'college_description', {
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });
</script>

<!-- Script -->
@stop
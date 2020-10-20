@extends('layouts.admin')

@section('page_title')
Category
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Category</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon"><i class="material-icons">assignment</i></div>
				<h4 class="card-title">Category</h4>
			</div>
			<div class="card-body">				
				<div class="material-datatables">
					<div class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-1">
								<div class="toolbar">
									<button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addCategoryModal">Add</button>
								</div>
							</div>
							<div class="col-sm-12 col-md-2">
								<div class="toolbar">
									<div class="dropdown">
										<button type="button" class="dropdown-toggle btn btn-primary btn-round btn-block" data-toggle="dropdown">Export</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="{{url('/admin/category/export/xlsx')}}">Excel</a>
											<a class="dropdown-item" href="{{url('/admin/category/export/xls')}}">Csv</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-9">
								<div class="dataTables_filter">
									<label>
										<span class="bmd-form-group bmd-form-group-sm">
											<input type="search" class="form-control form-control-sm" placeholder="Search records" id="myInput">
										</span>
									</label>
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<table id="file_export" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Parent</th>
											<th>Slug</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="myTable">
										<?php
											$index = 0;
											foreach ($categories as $category){
												$index++;
										?>
										<tr>
											<td><?php echo $index; ?></td>
											<td>{{ $category->cat_name }}</td>
											<td>{{ $category->parent ? $category->parent->cat_name : ''}}</td>
											<td>{{ $category->cat_slug }}</td>
											<td class="td-actions text-left">
												<div class="input-group"> 
												<button type="button" class="btn btn-success btn-link edit-category" data-target="#editCategoryModal" data-toggle="modal" data-id="{{ $category->id }}" data-name="{{ $category->cat_name }}">
                              						<span class="material-icons">edit</span>
                            					</button>
                            					<form action="{{ url('/admin/category', $category->id) }}" method="POST">
                            					@csrf
                      							@method('DELETE')
	                            					<button type="submit" class="btn btn-danger btn-link" onclick="return confirm('Are you sure you want to delete')">
	                              						<span class="material-icons">close</span>
	                            					</button>
                            					</form>
                            					</div>
											</td>
										</tr>
										<?php  } ?> 
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<ul class="pagination">
								{!! $categories->links("pagination::bootstrap-4") !!}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Category Model -->

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="">
	<div class="modal-dialog modal-login" role="document">
		<div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
					<div class="card-header card-header-primary text-center">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                      	<i class="material-icons">clear</i>
	                    </button>
	                    <h4 class="card-title">Add Category</h4>
					</div>
				</div>
				<div class="modal-body">
					<form class="form" action="{{ route('category.store') }}" method="POST">
					@csrf
						<div class="card-body">
							<div class="form-group bmd-form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="material-icons">dynamic_feed</i></div>
									</div>
									<div style="width: 82%;">
									<select class="form-control selectpicker" data-style="btn btn-link" name="parent_id" title="Choose Parent Category">
										@foreach ($categories as $category)
											@if($category->parent == null)
												<option value="{{ $category->id }}">{{ $category->cat_name }}</option>
											@endif
										@endforeach
									</select>
									</div>
								</div>
							</div>
							<div class="form-group bmd-form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="material-icons">article</i></div>
									</div>
									<input type="text" class="form-control" name="cat_name" id="name" placeholder="Name..." value="{{ old('cat_name') }}" required>
								</div>
							</div>
							<div class="form-group bmd-form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="material-icons">article</i></div>
									</div>
									<input type="text" class="form-control" name="cat_slug" id="slug" placeholder="Slug..." value="{{ old('cat_slug') }}" required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-primary" type="submit">Add</button>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add Category Model Close -->

<!-- Edit Category Model -->

<div class="modal fade" id="editCategoryModal" tabindex="-1" role="">
	<div class="modal-dialog modal-login" role="document">
		<div class="modal-content">
			<div class="card card-signup card-plain">
				<div class="modal-header">
					<div class="card-header card-header-primary text-center">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                      	<i class="material-icons">clear</i>
	                    </button>
	                    <h4 class="card-title">Edit Category</h4>
					</div>
				</div>
				<div class="modal-body">
					<form action="" method="POST">
					@csrf
					@method('PUT')
						<div class="card-body">
							<div class="form-group bmd-form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="material-icons">article</i></div>
									</div>
									<input type="text" class="form-control" name="cat_name" id="edit_name" placeholder="Name..." required>
								</div>
							</div>
							<div class="form-group bmd-form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="material-icons">article</i></div>
									</div>
									<input type="text" class="form-control" name="cat_slug" id="edit_slug" placeholder="Slug..." required>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button class="btn btn-primary" type="submit">Edit</button>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Edit Category Model Close -->

<!-- Script -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>

<script type="text/javascript">
	$('.edit-category').on('click', function() {
		var id = $(this).data('id');
		var name = $(this).data('cat_name');
		var slug = $(this).data('cat_slug');
		var url = "{{url('/admin/category') }}/" + id;
		$('#editCategoryModal form').attr('action', url);
		$('#editCategoryModal form input[name="cat_name"]').val(name);
		$('#editCategoryModal form input[name="cat_slug"]').val(slug);
	});
</script>

<script type="text/javascript">
	$("#edit_name").keyup(function(){
		var Text = $(this).val();
		Text = Text.toLowerCase();
		Text = Text.replace(/[^a-zA-Z0-9]+/g,'_');
		$("#edit_slug").val(Text);
	});
</script>

<!-- Script Close -->
@stop
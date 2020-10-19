@extends('layouts.admin')

@section('page_title')
Course
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Course</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon"><i class="material-icons">assignment</i></div>
				<h4 class="card-title">Course</h4>
			</div>
			<div class="card-body">				
				<div class="material-datatables">
					<div class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="toolbar">
									<a href="{{route('course.create')}}" class="btn btn-primary btn-round">Add</a>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
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
											<th>Category</th>
											<th>Slug</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="myTable">
										<?php
											$index = 0;
											foreach ($courses as $course){
												$index++;
										?>
										<tr>
											<td><?php echo $index; ?></td>
											<td>{{ $course->course_name }}</td>
											<td>{{ $course->category->parent->cat_name}}</td>
											<td>{{ $course->course_slug }}</td>
											<td>
												@if($course->status == 1)
			                                      	Active
			                                  	@else
			                                      	Inactive
			                                  	@endif
											</td>
											<td class="td-actions text-left">
												<div class="input-group"> 
													<a href="{{route('course.edit', $course->id)}}" class="btn btn-success btn-link">
	                              						<i class="material-icons">edit</i>
	                            					</a>
	                            					<form action="{{ url('/admin/course', $course->id) }}" method="POST">
	                            					@csrf
	                      							@method('DELETE')
		                            					<button type="submit" class="btn btn-danger btn-link" onclick="return confirm('Are you sure you want to delete')">
		                              						<i class="material-icons">close</i>
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
								{!! $courses->links() !!}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Style -->

<style>
    .dropdown-menu {
      	width: 100%;
    }
    .scrollable-menu {
	    height: auto;
	    max-height: 200px;
	    overflow-x: hidden;
    }
</style>

<!-- Style Close -->
@stop
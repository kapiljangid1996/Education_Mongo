@extends('layouts.admin')

@section('page_title')
Exam
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Exam</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon"><i class="material-icons">assignment</i></div>
				<h4 class="card-title">Exam</h4>
			</div>
			<div class="card-body">				
				<div class="material-datatables">
					<div class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="toolbar">
									<a href="{{route('exam.create')}}" class="btn btn-primary btn-round">Add</a>
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
											foreach ($exams as $exam){
												$index++;
										?>
										<tr>
											<td><?php echo $index; ?></td>
											<td>{{ $exam->exam_name }}</td>
											<td>{{ $exam->category->parent->cat_name}}</td>
											<td>{{ $exam->exam_slug }}</td>
											<td>
												@if($exam->status == 1)
			                                      	Active
			                                  	@else
			                                      	Inactive
			                                  	@endif
											</td>
											<td class="td-actions text-left">
												<div class="input-group"> 
													<a href="{{route('exam.edit', $exam->id)}}" class="btn btn-success btn-link">
	                              						<i class="material-icons">edit</i>
	                            					</a>
	                            					<form action="{{ url('/admin/exam', $exam->id) }}" method="POST">
	                            					@csrf
	                      							@method('DELETE')
		                            					<button type="submit" class="btn btn-danger btn-link" onclick="return confirm('Are you sure you want to delete')">
		                              						<i class="material-icons">close</i>
		                            					</button>
	                            					</form>
	                            					<div class="dropdown">
	                            						<button type="button" class="btn btn btn-dark btn-link" data-toggle="dropdown">
	                            							<i class="material-icons">arrow_drop_down</i>
	                            						</button>
	                            						<div class="dropdown-menu scrollable-menu">
															<a class="dropdown-item" href="{{ url('/admin/exam/overview', $exam->id) }}">Overviews</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/date', $exam->id) }}">Dates</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/syllabus', $exam->id) }}">Syllabus</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/appform', $exam->id) }}">Application Form</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/pattern', $exam->id) }}">Pattern</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/preparation', $exam->id) }}">Preparation</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/question', $exam->id) }}">Question Papers</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/answer', $exam->id) }}">Answer Key</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/result', $exam->id) }}">Results</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/cutoff', $exam->id) }}">Cut Off</a>
														    <a class="dropdown-item" href="{{ url('/admin/exam/counselling', $exam->id) }}">Counselling</a>
														</div>
	                            					</div>
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
								{!! $exams->links() !!}
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
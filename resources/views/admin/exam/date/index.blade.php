@extends('layouts.admin')

@section('page_title')
Date
@stop

@section('breadcrumb')
<nav aria-label="breadcrumb" role="navigation">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="{{ url('/admin/exam') }}">Exam</a></li>
		<li class="breadcrumb-item active" aria-current="page">Date</li>
	</ol>
</nav>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon"><i class="material-icons">assignment</i></div>
				<h4 class="card-title">Date</h4>
			</div>
			<div class="card-body">				
				<div class="material-datatables">
					<div class="dataTables_wrapper dt-bootstrap4">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<div class="toolbar">
									<a href="{{url('admin/exam/date/add_date/'.$id)}}" class="btn btn-primary btn-round">Add</a>
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
											<th>Heading</th>
											<th>Slug</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="myTable">
										<?php
											$index = 0;
											foreach ($dates as $date){
												$index++;
										?>
										<tr>
											<td><?php echo $index; ?></td>
											<td>{{ $date->date_name }}</td>
											<td>{{ $date->date_slug }}</td>
											<td>
												@if($date->status == 1)
			                                      	Active
			                                  	@else
			                                      	Inactive
			                                  	@endif
											</td>
											<td class="td-actions text-left">
												<div class="input-group"> 
													<a href="/admin/exam/date/edit_date/{{ $date->id }}" class="btn btn-success btn-link">
	                              						<i class="material-icons">edit</i>
	                            					</a>
	                            					<button type="button" class="btn btn-danger btn-link" onclick="return confirm('Are you sure you want to delete')">
	                              						<a href="/admin/exam/date/delete_date/{{ $date->id }}">
	                              							<i class="material-icons">close</i>
	                            						</a>
	                            					</button>
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
								{!! $dates->links() !!}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
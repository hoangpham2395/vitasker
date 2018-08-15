@extends('layouts.main')
@section('title_page', 'List of Jobs')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Jobs <small>List of Jobs</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-suitcase"></i> Jobs</a></li>
    	<li class="active">List of Jobs</li>
	</ol>
</section>
<!-- Show notification -->
@if (Session::has('success'))
<div class="row padding no-padding-bottom">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	        <ul>
	        	<li>{{ Session::get('success') }}</li>
	        </ul>
		</div>
	</div>
</div>
@endif
<!-- Search -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Search job</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'jobs.index', 'method' => 'GET']) !!}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								{!! Form::label('job_name', 'Job:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-suitcase"></i>
									</div>
									{!! Form::text('job_name', Request::get('job_name'), ['placeholder' => 'Job name', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							{!! Form::submit('Search', ['class' => 'btn btn-danger']) !!}
							{!! Form::button('Reset', ['type' => 'reset', 'class' => 'btn btn-default']) !!}
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">List of Jobs</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6 padding-top">
							<a href="{{ asset('jobs') }}" class="btn btn-success">Reload</a>
						</div>	
						<div class="col-sm-6">
							@php 
							$listPerPage = [10, 20, 50];
							@endphp
							<span class="select-per-page pull-right">
								Show 
								<select id="select_per_page" name="per_page" class="form-control">
									@foreach ($listPerPage as $perPage)
									<option value="{{ $perPage }}" {{ ($perPage == $limit) ? 'selected' : ''}}>{{ $perPage }}</option>
									@endforeach
								</select>
								entities.
							</span>
						</div>		
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered table-hover my-table">
		        					<thead>
										<th width="5%" class="text-center">No.</th>
										<th>Job</th>
										<th width="10%" class="text-center">Edit</th>
										<th width="10%" class="text-center">Delete</th>
		        					</thead>
		        					<tbody>
		        						@php $no = 1 + $limit * ($page - 1); @endphp
		        						@foreach ($jobs as $job)
											<tr>
												<td class="text-center">{{ $no }}</td>
												<td>{{ $job->job_name }}</td>
												<td class="text-center"><a href='{{ asset("jobs/$job->job_id/edit") }}' class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
												<td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete-{{ $job->job_id }}"><i class="fa fa-trash"></i></button></td>
												<div class="modal fade" id="modalDelete-{{ $job->job_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  													<div class="modal-dialog" role="document">
    													<div class="modal-content">
    														{!! Form::open(['route' => ['jobs.destroy', $job->job_id], 'method' => 'DELETE']) !!}
      														<div class="modal-header my-modal-header">
        														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        														<h4 class="modal-title" id="myModalLabel">Delete job</h4>
      														</div>
      														<div class="modal-body">
        														<span>Are you sure delete this job?</span>
      														</div>
      														<div class="modal-footer">
														        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
														        <button type="submit" class="btn btn-primary">Save</button>
      														</div>
      														{!! Form::close() !!}
    													</div>
  													</div>
												</div>
											</tr>
											@php $no++; @endphp
		        						@endforeach
		        					</tbody>
		        				</table>
							</div>
						</div>
					</div>
					<div class="row show-pagination">
						<div class="col-sm-4">Show {{ $count }} of {{ $total }} entities</div>
						<div class="col-sm-8">{{ $jobs->appends(Request::except('page'))->render() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@extends('layouts.main')
@section('title_page', 'List of Fboders')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Fboders <small>List of Fboders</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-comment"></i> Fboders</a></li>
    	<li class="active">List of Fboders</li>
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
					<h3 class="box-title">Search fboder</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'fboders.index', 'method' => 'GET']) !!}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('category_id', 'Category:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-align-center"></i>
									</div>
									{!! Form::select('category_id', $categories, Request::get('category_id'), ['placeholder' => '--- Select category ---', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('job_id', 'Job:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-suitcase"></i>
									</div>
									{!! Form::select('job_id', $jobs, Request::get('job_id'), ['placeholder' => '--- Select job ---', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('postBy', 'Post By:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									{!! Form::text('postBy', Request::get('postBy'), ['placeholder' => 'Post By', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('phoneNumber', 'Phone number:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									{!! Form::text('phoneNumber', Request::get('phoneNumber'), ['placeholder' => 'Phone number', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('email', 'Email:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</div>
									{!! Form::text('email', Request::get('email'), ['placeholder' => 'Email', 'class' => 'form-control']) !!}
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								{!! Form::label('address', 'Address:') !!}
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-map-marker"></i>
									</div>
									{!! Form::text('address', Request::get('address'), ['placeholder' => 'Address', 'class' => 'form-control']) !!}
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
					<h3 class="box-title">List of Fboders</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6 padding-top">
							<a href="{{ asset('fboders') }}" class="btn btn-success">Reload</a>
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
										<th>Message</th>
										<th>Category</th>
										<th>Job</th>
										<th>Post By</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Address</th>
										<th class="text-center">Edit</th>
										<th class="text-center">Delete</th>
		        					</thead>
		        					<tbody>
		        						@php $no = 1 + $limit * ($page - 1); @endphp
		        						@foreach ($fboders as $fboder)
											<tr>
												<td class="text-center">{{ $no }}</td>
												<td>{{ $fboder->message }}</td>
												<td>{{ ($fboder->category) ? $fboder->category->category_name : '' }}</td>
												<td>{{ ($fboder->job) ? $fboder->job->job_name : '' }}</td>
												<td>{{ $fboder->postBy }}</td>
												<td>{{ $fboder->phoneNumber }}</td>
												<td>{{ $fboder->email }}</td>
												<td>{{ $fboder->address }}</td>
												<td class="text-center"><a href='{{ asset("fboders/$fboder->oder_id/edit") }}' class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a></td>
												<td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete-{{ $fboder->oder_id }}"><i class="fa fa-trash"></i></button></td>
												<div class="modal fade" id="modalDelete-{{ $fboder->oder_id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  													<div class="modal-dialog" role="document">
    													<div class="modal-content">
    														{!! Form::open(['route' => ['fboders.destroy', $fboder->oder_id], 'method' => 'DELETE']) !!}
      														<div class="modal-header my-modal-header">
        														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        														<h4 class="modal-title" id="myModalLabel">Delete fboder</h4>
      														</div>
      														<div class="modal-body">
        														<span>Are you sure delete this fboder?</span>
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
						<div class="col-sm-8">{{ $fboders->appends(Request::except('page'))->render() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
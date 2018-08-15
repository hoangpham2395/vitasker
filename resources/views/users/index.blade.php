@extends('layouts.main')
@section('title_page', 'List of Users')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Users <small>List of Users</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-users"></i> Users</a></li>
    	<li class="active">List of Users</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">List of Users</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6 padding-top">
							<a href="{{ asset('users') }}" class="btn btn-success">Reload</a>
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
										<th>No.</th>
										<th>Username</th>
										<th>Facebook</th>
										<th>Phone</th>
										<th>City</th>
										<th>Email</th>
										<th>Kind</th>
										<th>Job</th>
										<th>Sex</th>
										<th>Birthday</th>
		        					</thead>
		        					<tbody>
		        						@php $no = 1 + $limit * ($page - 1); @endphp
		        						@foreach ($users as $user)
											<tr>
												<td>{{ $no }}</td>
												<td>{{ $user->user_name }}</td>
												<td>{{ $user->url_facebook }}</td>
												<td>{{ $user->user_phone }}</td>
												<td>{{ $user->user_city }}</td>
												<td>{{ $user->user_email }}</td>
												<td>{{ $user->user_kind }}</td>
												<td>{{ $user->user_job }}</td>
												<td>{{ $user->user_sex }}</td>
												<td>{{ $user->user_birth }}</td>
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
						<div class="col-sm-8">{{ $users->appends(Request::except('page'))->render() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
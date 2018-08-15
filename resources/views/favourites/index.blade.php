@extends('layouts.main')
@section('title_page', 'List of Favourites')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Favourites <small>List of Favourites</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-thumbs-up"></i> Favourites</a></li>
    	<li class="active">List of Favourites</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">List of Favourites</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-sm-6 padding-top">
							<a href="{{ asset('favourites') }}" class="btn btn-success">Reload</a>
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
										<th width="5%">No.</th>
										<th width="25%">Username</th>
										<th width="55%">Message</th>
										<th width="15%">Time Favourite</th>
		        					</thead>
		        					<tbody>
		        						@php $no = 1 + $limit * ($page - 1); @endphp
		        						@foreach ($favourites as $favourite)
											<tr>
												<td class="text-center">{{ $no }}</td>
												<td>{{ $favourite->user_name }}</td>
												<td>{{ ($favourite->fboder) ? $favourite->fboder->message : '' }}</td>
												<td class="text-center">{{ $favourite->time_favorite }}</td>
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
						<div class="col-sm-8">{{ $favourites->appends(Request::except('page'))->render() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@extends('layouts.main')
@section('title_page', 'Edit job')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Jobs <small>List of Jobs</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-suitcase"></i> Jobs</a></li>
    	<li class="active">List of Jobs</li>
	</ol>
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
					{!! Form::model($job, ['route' => ['jobs.update', $job->job_id], 'method' => 'PATCH']) !!}
						@include('jobs._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@extends('layouts.main')
@section('title_page', 'Add new job')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Jobs <small>Add new job</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-suitcase"></i> Jobs</a></li>
    	<li class="active">Add new job</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Add new job</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'jobs.store', 'method' => 'POST']) !!}
						@include('jobs._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@extends('layouts.main')
@section('title_page', 'Add new fboder')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Fboders <small>Add new fboder</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-comment"></i> Fboders</a></li>
    	<li class="active">Add new fboder</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Add new fboder</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'fboders.store', 'method' => 'POST']) !!}
						@include('fboders._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
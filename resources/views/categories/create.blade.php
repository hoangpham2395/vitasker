@extends('layouts.main')
@section('title_page', 'Add new category')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Categories <small>List of Categories</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-align-center"></i> Categories</a></li>
    	<li class="active">List of Categories</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">List of Categories</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
						@include('categories._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@extends('layouts.main')
@section('title_page', 'Edit category')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Categories <small>Edit category</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-align-center"></i> Categories</a></li>
    	<li class="active">Edit category</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Edit category</h3>
				</div>
				<div class="box-body">
					{!! Form::model($category, ['route' => ['categories.update', $category->category_id], 'method' => 'PATCH']) !!}
						@include('categories._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
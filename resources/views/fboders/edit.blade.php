@extends('layouts.main')
@section('title_page', 'Edit fboder')
@section('content')
<!-- Content header -->
<section class="content-header">
	<h1>Fboders <small>List of Fboders</small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-comment"></i> Fboders</a></li>
    	<li class="active">List of Fboders</li>
	</ol>
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
					{!! Form::model($fboder, ['route' => ['fboders.update', $fboder->oder_id], 'method' => 'PATCH']) !!}
						@include('fboders._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
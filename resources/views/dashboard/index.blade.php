@extends('layouts.main')
@section('title_page', 'Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Dashboard</h3>
				</div>
				<div class="box-body">
					<div class="row">
				        <div class="col-lg-3 col-xs-6">
				          <!-- small box -->
				          <div class="small-box bg-aqua">
				            <div class="inner">
				              <h3>{{ $users }}</h3>

				              <p>Users</p>
				            </div>
				            <div class="icon">
				              <i class="fa fa-users"></i>
				            </div>
				            <a href="{{ asset('users') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				          </div>
				        </div>
				        <!-- ./col -->
				        <div class="col-lg-3 col-xs-6">
				          <!-- small box -->
				          <div class="small-box bg-green">
				            <div class="inner">
				              <h3>{{ $jobs }}</h3>

				              <p>Jobs</p>
				            </div>
				            <div class="icon">
				              <i class="fa fa-suitcase"></i>
				            </div>
				            <a href="{{ asset('jobs') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				          </div>
				        </div>
				        <!-- ./col -->
				        <div class="col-lg-3 col-xs-6">
				          <!-- small box -->
				          <div class="small-box bg-yellow">
				            <div class="inner">
				              <h3>{{ $categories }}</h3>

				              <p>Categories</p>
				            </div>
				            <div class="icon">
				              <i class="fa fa-align-center"></i>
				            </div>
				            <a href="{{ asset('categories') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				          </div>
				        </div>
				        <!-- ./col -->
				        <div class="col-lg-3 col-xs-6">
				          <!-- small box -->
				          <div class="small-box bg-red">
				            <div class="inner">
				              <h3>{{ $fboders }}</h3>

				              <p>Fboders</p>
				            </div>
				            <div class="icon">
				              <i class="fa fa-comment"></i>
				            </div>
				            <a href="{{ asset('fboders') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				          </div>
				        </div>
				        <!-- ./col -->
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
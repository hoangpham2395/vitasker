<input type="hidden" name="user_token" value="{{ csrf_token() }}">

<!-- Errors -->
@if ($errors->any())
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	        </button>
	        <ul>
	        	@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
	        	@endforeach
	        </ul>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label('message', 'Message:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			{!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Message']) !!}	
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('category_id', 'Category:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-align-center"></i></div>
				{!! Form::select('category_id', $categories, null, ['placeholder' => '--- Select category ---', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('job_id', 'Job:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
				{!! Form::select('job_id', $jobs, null, ['placeholder' => '--- Select job ---', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('postLink', 'Post Link:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-link"></i></div>
				{!! Form::text('postLink', null, ['placeholder' => 'Post Link', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('postBy', 'Post By:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				{!! Form::text('postBy', null, ['placeholder' => 'Post By', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('postWall', 'Post Wall:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-comment-o"></i></div>
				{!! Form::text('postWall', null, ['placeholder' => 'Post Wall', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('phoneNumber', 'Phone number:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-phone"></i></div>
				{!! Form::text('phoneNumber', null, ['placeholder' => 'Phone number', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
				{!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('address', 'Address:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
				{!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('linkGroup', 'Link Group:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-link"></i></div>
				{!! Form::text('linkGroup', null, ['placeholder' => 'Link Group', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('byGroup', 'By Group:') !!} 
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-users"></i></div>
				{!! Form::text('byGroup', null, ['placeholder' => 'By Group', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group text-center">
			{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
			{!! Form::button('Cancel', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>
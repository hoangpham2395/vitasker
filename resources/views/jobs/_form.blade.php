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
			{!! Form::label('job_name', 'Job:') !!} <span style="color: red;"><b>[<i class="fa fa-asterisk"></i>]</b></span>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
				{!! Form::text('job_name', null, ['class' => 'form-control']) !!}
			</div>
		</div>
		<div class="form-group text-center">
			{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
			{!! Form::button('Cancel', ['class' => 'btn btn-primary']) !!}
		</div>
	</div>
</div>
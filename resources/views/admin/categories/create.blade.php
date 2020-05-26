@extends('layouts.admin2')



@section('content')



	<div class="col-sm-9">
		<h1>Create Category</h1>

		<div class="col-sm-9">
			{!! Form::open(array('method'=>'POST','action'=>'AdminCategoriesController@store')) !!}

				<div class="form-group">
					{!! Form::label('name',' Name of category : ') !!}
					{!! Form::text('name',null,['class'=>'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Valider',['class'=>'btn-primary']) !!}
				</div>


			{!! Form::close() !!}
		</div>

	</div>


	@include('includes.form_error')





@stop
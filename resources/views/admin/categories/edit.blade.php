@extends('layouts.admin2')



@section('content')


	
	<div class="col-sm-12">
		<h1>Edit Category</h1>

		<div class="col-sm-9">
			
			{!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id] ]) !!}

				<div class="form-group">
					
					{!! Form::label('name','Name of category :') !!}
					{!! Form::text('name',null,['class'=>'form-control']) !!}

				</div>

				<div class="form-group">
					{!! Form::submit('Valider',["class"=>"btn-primary col-sm-3"]) !!}
				</div>

			{!! Form::close() !!}

			{!! Form::open(array('method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id])) !!}
				<div class="form-group">
					{!! Form::submit('Supprimer',["class"=>"btn-danger col-sm-3"]) !!}
				</div>
			{!! Form::close() !!}
		</div>

		@include('includes.form_error')

	</div>






@stop
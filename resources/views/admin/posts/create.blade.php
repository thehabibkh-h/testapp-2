@extends('layouts.admin2')





@section('content')

	<h1>Create Post</h1>

	{!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">

		{!! Form::label('Title','Title : ') !!}
		{!! Form::text('title',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photos_id','File : ') !!}
		{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('Category','Category : ') !!}
		{!! Form::select('category_id', [''=>"Choose Category"] + $categories_list, null,['class'=>'form-control']); !!}
	</div>

	<div class="form-group">
		{!! Form::label('Body','Body : ') !!}
		{!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
	</div>
	
	

	

	<div class='form-group'>

		{!! Form::submit('Create Post',['class'=>'btn-primary']) !!}
		
	</div>

		{!! Form::close() !!}


	@include('includes.form_error')
@stop
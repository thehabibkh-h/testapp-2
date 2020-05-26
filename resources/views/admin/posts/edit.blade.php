@extends('layouts.admin2')





@section('content')

	
	<div class="col-sm-3">
		<img src="{{$post->photo ? $post->photo->file : 'http://placeholder.it/400x400'}} " class="img-responsive img-rounded">
	</div>


	<div class="col-sm-9">
		<h1>Edit Post</h1>

		{!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id], 'enctype'=>'multipart/form-data']) !!}
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

			{!! Form::submit('Update Post',['class'=>'btn-primary col-sm-3']) !!}
			
		</div>

			{!! Form::close() !!}

		
			{!! Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@update',$post->id], 'enctype'=>'multipart/form-data']) !!}
				<div class='form-group'>
					{!! Form::submit('Delete Post',['class'=>'btn-danger col-sm-3']) !!}
				</div>
			{!! Form::close() !!}
		

	</div>

	@include('includes.form_error')


@stop
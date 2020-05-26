@extends('layouts.admin2')




@section('content')


	<h1>Create user</h1>

	{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'enctype'=>'multipart/form-data']) !!}
	<div class="form-group">

		{!! Form::label('name','Name : ') !!}
		{!! Form::text('name',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('email','Email : ') !!}
		{!! Form::text('email',null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id','Role : ') !!}
		{!! Form::select('role_id', $roles_list, 3,['class'=>'form-control']); !!}
	</div>

	<div class="form-group">
		{!! Form::label('is_active','Is_Active : ') !!}
		{!! Form::select('is_active', [0 => 'Not Active' , 1=> 'Active'], 0,['class'=>'form-control']); !!}
	</div>

	<div class="form-group">
		{!! Form::label('photos_id','File : ') !!}
		{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
	</div>
		
	<div class="form-group">
		{!! Form::label('password','Password : ') !!}
		{!! Form::text('password',null,['class'=>'form-control']) !!}
	</div>

	

	<div class='form-group'>

		{!! Form::submit('Create User',['class'=>'btn-primary']) !!}
		
	</div>

		{!! Form::close() !!}



	@include('includes.form_error')

@endsection
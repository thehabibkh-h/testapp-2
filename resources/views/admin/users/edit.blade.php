@extends('layouts.admin2')




@section('content')


	<h1>Edit user</h1>

	<div class='col-sm-3'>

		<img src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}" class="img-responsive img-rounded"></img>

	</div>

	<div class='col-sm-9'>

		{!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id], 'enctype'=>'multipart/form-data']) !!}
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
						{!! Form::select('role_id', $roles, null,['class'=>'form-control']); !!}
					</div>

					<div class="form-group">
						{!! Form::label('is_active','Is_Active : ') !!}
						{!! Form::select('is_active', [0 => 'Not Active' , 1=> 'Active'], null,['class'=>'form-control']); !!}
					</div>

					<div class="form-group">
						{!! Form::label('photos_id','File : ') !!}
						{!! Form::file('photo_id',null,['class'=>'form-control']) !!}
					</div>
						
					<div class="form-group">
						{!! Form::label('password','Password : ') !!}
						{!! Form::password('password',['class'=>'form-control']) !!}
					</div>

			
		

					<div class='form-group'>

						{!! Form::submit('Edit User',['class'=>'btn-primary col-sm-3']) !!}
						
						
					</div>

			{!! Form::close() !!}


			{!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id]]) !!}
				{!! Form::submit('Delete this User?', ['class' => 'btn-danger col-sm-3']) !!}
		    {!! Form::close() !!}

					



		</div>
	</div>
	

	@include('includes.form_error')


	
	   
	    
	

	


@endsection
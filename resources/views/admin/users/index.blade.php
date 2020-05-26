@extends('layouts.admin2')


@section('content')

@if(Session::has('deleted_user'))
    
    <div class="alert alert-danger">

        {{session('deleted_user')}}

    </div>

@endif

<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Photo</th>
        <th>Role</th>
        <th>is_active</th>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
      </tr>
    </thead>
    <tbody>
    	@foreach ($users as $user)
    		<tr>
		    	<td> {{ $user->id }}</td>
                <td> <img height='50' src="{{ $user->photo ? $user->photo->file : 'No Photo' }}"> </td>
		    	<td>  {{ $user->role->name }} </td>
		    	<td> {{ $user->is_active == 1 ? "Active" : "Not Acive" }}</td>
		    	<td> <a href='{{ route("admin.users.edit", $user->id ) }}'>{{ $user->name }} </a></td>
		    	<td> {{ $user->email }}</td>
		    	<td> {{ $user->created_at->diffForHumans()}}</td>
		    	<td> {{ $user->updated_at->diffForHumans()}}</td>
		    </tr>
		@endforeach
    </tbody>
  </table>


@endsection
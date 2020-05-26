@extends('layouts.admin2')



@section('content')

	@if(Session::has('deleted_category'))
    
    <div class="alert alert-danger">

        {{session('deleted_category')}}

    </div>

	@endif

	<div class="col-sm-9">
		<h1>Categories</h1>

		<table class="table">
			<thead>
				<th>id</th>
				<th>name</th>
			</thead>
			<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>






@stop
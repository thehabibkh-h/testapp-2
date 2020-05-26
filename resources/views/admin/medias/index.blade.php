@extends('layouts.admin2')


@section('content')



	<div class="col-sm-12">
		
		@if(Session::has('deleted_photo'))

			<div class="alert alert-danger">
				{{session('deleted_photo')}}
			</div>

		@endif

		<table class="table">
			
			<thead>
				<th>id</th>
				<th>Media</th>
				<th>created Date</th>
			</thead>

			<tbody>
					
				@foreach($photos as $photo)
					<tr>

						<td>{{ $photo->id }}</td>
						<td> <img height=50 src="{{ $photo->file }}"></td>
						<td> {{$photo->created_at->diffForHumans()}} </td>

						{!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
							
							<td> {!! Form::submit('Delete',['class'=>'btn-danger']) !!} </td>

						{!! Form::close() !!}


					</tr>
				@endforeach

			</tbody>




		</table>

		


	</div>


@stop
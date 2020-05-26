@extends('layouts.admin2')





@section('content')

	
	@if(count($comments)>0)
		<h1 class="text-center">Comments</h1>

		<table class="table">
			
			<thead>
				<th>id</th>
				<th>post</th>
				<th>body</th>
				<th>author</th>
				<th>photo</th>
				<th>email</th>
				<th>is_active</th>
				<th>Delete</th>
				<th>comment date</th>
			</thead>
			<tbody>
				@foreach($comments as $comment)

					<tr>
							<td>{{$comment->id}}</td>
							<td><a href="/post/{{$comment->post->id}}">View Post<a></td>
							<td>{{$comment->body}}</td>
							<td>{{$comment->author}}</td>
							<td><img height='50' src="{{$comment->file}}"></td>
							<td>{{$comment->email}}</td>
							<td>
							
							@if($comment->is_active == 1)
								{!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

									<input type="hidden" name="is_active" value="0">
									<div class="form-group">
										{!! Form::submit('Un-approve',["class"=>"btn btn-success"]) !!}
									</div>

								{!! Form::close() !!}


							@else
														
								{!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}

									<input type="hidden" name="is_active" value="1">
									<div class="form-group">
										{!! Form::submit('approve',["class"=>"btn btn-info"]) !!}
									</div>

								{!! Form::close() !!}
							@endif

							</td>
							<td>

								{!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}

									<div class="form-group">
										{!! Form::submit('Delete',["class"=>"btn btn-danger"]) !!}
									</div>

								{!! Form::close() !!}

							</td>
							<td>{{$comment->created_at->diffForHumans()}}</td>
					</tr>

				@endforeach
			</tbody>


		</table>

	@else

		<h1 class="text-center">No Comments</h1>

	@endif



@stop


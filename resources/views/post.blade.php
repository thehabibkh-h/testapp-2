@extends('layouts.blog-post')


@section('content')

	  <!-- Blog Post -->

                <!-- Title -->
                <h1>Blog Post Title</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <hr>

                {{$post->body}}

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}

                        <input type='hidden' name="post_id" value="{{ $post->id }}">

                    	<div class="form-group">
							{!! Form::label('Body','Body : ') !!}
							{!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
						</div>

						<div class="form-group">
							{!! Form::submit('Submit comment',['class'=>'btn-primary']) !!}
						</div>

                    {!! Form::close() !!}

                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                 @foreach($comments as $comment)
                    
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="50" class="media-object" src="{{$comment->file}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                
                                {{$comment->body}}

                                <!-- Nested Comment -->
                                <div class="media">

                                    @foreach($comment->replies as $reply)
                                        <a class="pull-left" href="#">
                                            <img height='50' class="media-object" src="{{$reply->photo}}" alt="">
                                        </a>

                                        <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}

                                    @endforeach

                                    {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                                        <input type='hidden' name="comment_id" value="{{ $comment->id }}">

                                        <div class="form-group">
                                            {!! Form::label('Body','Body : ') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::submit('Submit comment',['class'=>'btn-primary']) !!}
                                        </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                                <!-- End Nested Comment -->
                        </div>      

                @endforeach

                

@stop
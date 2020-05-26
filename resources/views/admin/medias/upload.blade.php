@extends('layouts.admin2')


@section('styles')

	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css'></style>

@stop

@section('content')

	<h1>UPLOAD Media</h1>

	{!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>"dropzone"]) !!}




	{!! Form::close() !!}


@stop

@section('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

@stop
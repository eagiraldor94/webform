@extends('base')

@section('title','Unexpected error')

@section('headIncludes')
	<link href="https://{{$_SERVER['HTTP_HOST']}}/css/form.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row">
			<div class="alert alert-danger"> {{$message}} </div>
	</div>
	<div class="row justify-content-center">
		<a class="btn btn-warning w-25" href="https://{{$_SERVER['HTTP_HOST']}}">Go to home</a>
	</div>
@endsection
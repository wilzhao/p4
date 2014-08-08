@extends('_master')

@section('title')
Placeholder
@stop

@section('content')
{{ Form::open(array('url'=>'/user/login','method'=>'POST')) }}

Username: {{Form::text('username')}}
<br>
Password: {{Form::password('password')}}
<br>
{{ Form::submit('Sign in') }}

{{ Form::close() }}
@stop
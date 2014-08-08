@extends('_master')

@section('title')
Placeholder
@stop
@section('content')

{{ Form::open(array('url'=>'/user/create','method'=>'POST')) }}

Username: {{Form::text('username')}}
<br>
Password: {{Form::password('password')}}
<br>
Email: {{Form::text('email')}}
<br>
{{ Form::submit('Sign up') }}

{{ Form::close() }}
@stop
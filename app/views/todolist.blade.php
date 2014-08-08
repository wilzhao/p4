@extends('_master')

@section('title')
Placeholder
@stop
@section('content')
{{ Form::open(array('url'=>'/todolist/create','method'=>'POST')) }}

Name:{{Form::text('name')}}
<br>
To Do List:
<br>{{Form::textarea('description')}}

{{ Form::submit('Submit') }}
@stop
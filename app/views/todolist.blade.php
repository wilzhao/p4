@extends('_master')

@section('title')
Placeholder
@stop
@section('content')
{{ Form::open(array('url'=>'/todolist/create','method'=>'POST')) }}

Name:{{Form::text('name')}}
<br>
To Do List:
<br>
Each entry should end with a semicolon, for example:
<br>
Submitting:
<br> 
Clean the garage
<br>
Clean the kitchen
<br>
Clean the bathroom
<br>
Would result in the following numbered list:
<br>
1. Clean the garage Clean the kitchen Clean the bathroom
<br>
<br>
Submitting:
<br>
Clean the garage;
<br>
Clean the kitchen;
<br>
Clean the bathroom;
<br>
Would result in the following numbered list:
<br>
1. Clean the garage
<br>
2. Clean the kitchen
<br>
3. Clean the bathroom
<br>
<br>{{Form::textarea('description')}}
<br>{{Form::select('type',array('ol' => 'numbered',
								'ul' => 'bullet-points'))}}

{{ Form::submit('Submit') }}
@stop
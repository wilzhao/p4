@extends('_master')

@section('title')
Placeholder
@stop
@section('content')
<?php 
try{
	echo $text;
} catch (Exception $e){

}
?>
<?php
	try{
		echo Form::open(array('url'=>'/todolist/edit/'.$listname,'method'=>'POST'));
		echo Form::textarea('description',$listdescription);
		echo "<br>";
		echo Form::submit('Edit');
		echo Form::close();
	} catch (Exception $e){

	}
?>

{{Form::close()}}
@stop
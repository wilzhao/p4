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
		$thisshouldcauseanexception = $listname;
		echo "Are you sure you want to delete this list?<br>";
		echo Form::open(array('url'=>'/todolist/delete/'.$listname,'method'=>'POST'));
		echo "<br>";
		echo Form::submit('Confirm');
		echo Form::close();
	} catch (Exception $e){

	}
?>

@stop
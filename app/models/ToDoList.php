<?php

class Todolist extends Eloquent{

	public function user(){
		return $this->belongsTo('User');
	}

}
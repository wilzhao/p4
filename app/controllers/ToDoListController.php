<?php

class ToDoListController extends BaseController{

	public function getCreate(){
		if (Auth::check()){
			return View::make('todolist');
		} else {
			return Redirect::to('user/create');
		}
	}


	public function postCreate(){
		$todolist = new ToDolist;
		$todolist->name = Input::get('name');
		$todolist->description = Input::get('description');
		$todolist->type = Input::get('type');

		$todolist->user_id = Auth::user()->id;
		
		$todolist->save();

		$text = 'Your new list has been created';

		return View::make('result',array('text'=>$text));
	}

	public function getView(){	
		
		$id = Auth::user()->id;

		$lists = ToDolist::where('user_id','=',$id)->get();
		
		$text = "";
		foreach ($lists as $list)
		{
			$description = $list->description;
			$descriptionarray = explode(";",$description);
			$type = $list->type;
			//either ul or ol
			$text = $text.$list->name."<br>";
    		$text = $text."<".$type.">";
			foreach ($descriptionarray as $desc){
				if (!(ctype_space($desc) || $desc == "")){
					$text = $text."<li>".$desc."</li>";
    			}
    		}
    		$text = $text."</".$type.">";
		}	

		return View::make('todolist-view',array('text'=>$text));
	}

	//the function that generates the page that contains lists to edit
	public function getEdit(){
		$id = Auth::user()->id;
		//var_dump($id);
		$lists = ToDolist::where('user_id','=',$id)->get();
		
		//var_dump($lists);
		$text = "";
		foreach ($lists as $list)
		{
    		$text = $text."<a href = '/todolist/edit/".$list->name."'>".$list->name;
    		$text =	$text."</a><br>";
		}	

		return View::make('todolist-edit',array('text'=>$text));
	}

	//the function that generates the page that contains the form to edit the list
	public function getEditList($listname){
		$id = Auth::user()->id;

		$list = ToDolist::where('user_id','=',$id)
			->where('name','=',$listname)
			->first();

		$listdescription = $list->description;
		return View::make('todolist-edit',array('listdescription'=>$listdescription,
												'listname'=>$listname));
	}
	//edits the list
	public function postEditList($listname){
		$id = Auth::user()->id;

		$list = ToDolist::where('user_id','=',$id)
			->where('name','=',$listname)
			->first();

		$list->description = Input::get('description');
		$list->type = Input::get('type');

		$list->save();

		$text = "One of your to-do lists have been updated";

		return View::make('result',array('text'=>$text));
	}

	//generates the page
	public function getDelete(){
		$id = Auth::user()->id;
		//var_dump($id);
		$lists = ToDolist::where('user_id','=',$id)->get();
		
		$text = "";

		foreach ($lists as $list)
		{
			$description = $list->description;
			$descriptionarray = explode(";",$description);
			$type = $list->type;
			//either ul or ol
			$text = $text."<a href = '/todolist/delete/".$list->name."'>".$list->name;
			$text = $text."</a><br>";
    		$text = $text."<".$type.">";
			foreach ($descriptionarray as $desc){
				if (!(ctype_space($desc) || $desc == "")){
					$text = $text."<li>".$desc."</li>";
    			}
    		}
    		$text = $text."</".$type.">";
		}	


		return View::make('todolist-delete',array('text'=>$text));
	}

	//generates the page with the form to confirm deletion
	public function getDeleteList($listname){
		$id = Auth::user()->id;

		return View::make('todolist-delete',array('listname'=>$listname));
	}

	public function postDeleteList($listname){
		$id = Auth::user()->id;

		$list = ToDolist::where('user_id','=',$id)
			->where('name','=',$listname)
			->first();

		$list->delete();
		$text = "One of your lists has been deleted";
		return View::make('result',array('text'=>$text));
	}
}
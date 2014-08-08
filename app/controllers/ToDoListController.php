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

		$todolist->user_id = Auth::user()->id;
		//try{
			$todolist->save();
		//} catch (Exception $e){
			//return Redirect::to('/todolist/create')->withInput();
		//}
	}

	public function getView(){	
		
		$id = Auth::user()->id;
		//var_dump($id);
		$lists = ToDolist::where('user_id','=',$id)->get();
		
		//var_dump($lists);
		$text = "";
		foreach ($lists as $list)
		{
    		$text = $text.$list->name."<br>".$list->description."<br><br>";	
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

		$list->save();

		return "One of your to-do lists have been updated";
	}

	//generates the page
	public function getDelete(){
		$id = Auth::user()->id;
		//var_dump($id);
		$lists = ToDolist::where('user_id','=',$id)->get();
		
		//var_dump($lists);
		$text = "";
		foreach ($lists as $list)
		{
    		$text = $text."<a href = '/todolist/delete/".$list->name."'>".$list->name;
    		$text =	$text."</a><br>";
    		$text = $text.$list->description;
    		$text = $text."<br>";
		}	

		return View::make('todolist-delete',array('text'=>$text));
	}

	//generates the page with the form to confirm deletion
	public function getDeleteList($listname){
		$id = Auth::user()->id;

		//$list = ToDolist::where('user_id','=',$id)
			//->where('name','=',$listname)
			//->first();

		//$listdescription = $list->description;
		return View::make('todolist-delete',array('listname'=>$listname));
	}

	public function postDeleteList($listname){
		$id = Auth::user()->id;

		$list = ToDolist::where('user_id','=',$id)
			->where('name','=',$listname)
			->first();

		$list->delete();
		return "One of your lists has been deleted";
	}
}
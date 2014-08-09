<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('landing');
});

Route::get('/user/create','UserController@getCreate');
Route::post('/user/create','UserController@postCreate');
Route::get('/user/login','UserController@getLogin');
Route::post('/user/login','UserController@postLogin');
Route::get('/user/logout','UserController@getLogout');

Route::get('mysql-test', function() {

    $results = DB::select('SHOW DATABASES;');

    print_r($results);

});
/*
Route::get('practice-creating',function(){
	$user = new User();

	$user->username = "Bob";
	$user->password = "Bobarooney";
	$user->email = "Bob@bob.com";

	$user->save();

	$todolist = new Todolist();

	$todolist->name = "What to do when getting up in the morning";

	$todolist->save();
	return 'A new user has been added...';
});
*/
Route::get('/todolist/create','ToDoListController@getCreate');
Route::post('/todolist/create','ToDoListController@postCreate');

Route::get('/todolist/view','ToDoListController@getView');

Route::get('/todolist/edit','ToDoListController@getEdit');
Route::get('/todolist/edit/{listname}','ToDoListController@getEditList');
Route::post('/todolist/edit/{listname}','ToDoListController@postEditList');

Route::get('/todolist/delete','ToDoListController@getDelete');
Route::get('/todolist/delete/{listname}','ToDoListController@getDeleteList');
Route::post('/todolist/delete/{listname}','ToDoListController@postDeleteList');

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

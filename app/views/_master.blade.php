<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{HTML::style('stylesheets/style.css');}}
	<title>2List</title>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

@yield('head')
</head>
<body>
	<div id = "maincontainer">
		<div id = "titlebar">
			<h1>2List</h1>
		</div>
		<div id = "sidebar">
			<a href = '/'>Home</a><br>
			@if(Auth::check())
				Welcome, {{Auth::user()->username;}}
				<br>
				<a href = '/todolist/create'>Create a new List</a>
				<br>
				<a href = '/todolist/view'>View Your Lists</a>
				<br>
				<a href = '/todolist/edit'>Edit Your Lists</a>
				<br>
				<a href = '/todolist/delete'>Delete Your Lists</a>
				<br>
				<a href = '/user/logout'>Logout</a><br>
			@else
				<a href = '/user/login'>Log in</a><br>
				<a href = '/user/create'>Sign up</a>
			@endif
				
		</div>
		<div id = "content">
			@yield('content')
		</div>
	</div>
</body>
</html>

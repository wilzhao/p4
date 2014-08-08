<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{HTML::style('stylesheets/style.css');}}
	<title>@yield('title')</title>
	
@yield('head')
</head>
<body>
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
	<a href = '/user/create'>Sign up</a><br>
@endif
	<a href = '/'>Home</a>
<br>
<br>
@yield('content')

</body>
</html>
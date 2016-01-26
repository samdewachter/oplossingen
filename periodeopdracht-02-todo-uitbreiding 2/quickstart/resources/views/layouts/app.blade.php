<!DOCTYPE html>
<html>
<head>

	<title>Periode opdracht todo</title>

	<link rel="stylesheet" type="text/css" href="{{{ asset('/css/style.css') }}}">
    <!--<link rel="stylesheet" type="text/css" href="{{{ asset('/css/normalize.css') }}}">-->

</head>

<body>
	<div class="navcontainer">
		<nav class="navigation">
			<div class="">
				
				<a href="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding 2/quickstart/public">Todo</a>

				<div class="navright">

					@if (Auth::guest())
						<a href="auth/register">Registreer</a>
						|
						<a href="auth/login">Login</a>
					@else
						<a href="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding 2/quickstart/public/tasks/add">Maak een todo</a>
						|
						{{ Auth::user()->name }}
						|
						<a href="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding 2/quickstart/public/auth/logout">Logout</a>
					@endif

				</div>
			</div>
		</nav>
	</div>

	@yield('content')
</body>
</html>

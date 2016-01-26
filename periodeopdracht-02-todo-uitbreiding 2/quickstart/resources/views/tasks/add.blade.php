@extends('layouts.app')

@section('content')
	<div class="container">

		<h2>Nieuwe todo</h2>

		<div>
			@include('common.errors')

			<form action="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding 2/quickstart/public/task" method="POST">
				{{ csrf_field() }}

				<div class="field">
					<label for="task-name">Todo:</label>

					<div>
						<input type="text" name="name" autofocus>
					</div>
				</div>

				<div>
					<div class="field">
						<button type="submit">
							Voeg todo toe
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop
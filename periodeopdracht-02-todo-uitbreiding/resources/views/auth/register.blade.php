@extends('layouts.app')

@section('content')
	<div class="container">
		<div>
			<div>
					Register

				<div>

					@include('common.errors')

					<form action="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding/public/auth/register" method="POST">
						{{ csrf_field() }}

						<div class="field">
							<label for="name">Name:</label>

							<div>
								<input type="text" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="field">
							<label for="email">Email:</label>

							<div>
								<input type="email" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="field">
							<label for="password">Password:</label>

							<div>
								<input type="password" name="password">
							</div>
						</div>

						<div class="field">
							<label for="password_confirmation">Confirm Password:</label>

							<div>
								<input type="password" name="password_confirmation">
							</div>
						</div>

						<div class="field">
							<div>
								<button type="submit">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

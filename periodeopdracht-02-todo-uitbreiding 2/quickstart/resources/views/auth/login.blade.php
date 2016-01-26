@extends('layouts.app')

@section('content')
	<div class="container">
		<div>
			<div>
				<div>
					Login
				</div>

				<div>

					@include('common.errors')

					<form action="http://oplossingen.web-backend.local/periodeopdracht-02-todo-uitbreiding 2/quickstart/public/auth/login" method="POST">
						{{ csrf_field() }}

						<div class="field">
							<label for="email">E-Mail</label>

							<div>
								<input type="email" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="field">
							<label for="password">Password</label>

							<div>
								<input type="password" name="password">
							</div>
						</div>

						<div class="field">
							<div>
								<button type="submit">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@extends('layouts.app')

@section('content')
	<div class="container">
		@if(Session::has('message'))

				<p style="color: green;">{{ Session::get('message') }}</p>

		@endif
		<div class="welkom">

			<p>Welkom bij de todo applicatie</p>

		</div>
	</div>
@endsection

@extends('layouts.app')

@section('content')
	<div class="container">
		<div>

			@if(Session::has('message'))

				<p style="color: green;">{{ Session::get('message') }}</p>

			@endif

			@if (Session::has('flash_notification.message'))

				<p style="color: green;">{{ Session::get('flash_notification.message') }}</p>

			@endif

			@if (count($tasks) > 0)

				<div class="tasks">

					<h2>Huidige todo's</h2>


					<div>
						<table>
							<tbody>
								@foreach ($tasks as $task)
								@if(!$task->done)
									<tr>
										<td><a class="notdone"href="tasks/done/{{ $task->id }}">{{ $task->name }}</a></td>

										<td>
											<form action="task/{{ $task->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button class="delete" type="submit">
													<img src="{{{ asset('/css/img/icon-delete.png') }}}">
												</button>
											</form>
										</td>
									</tr>
								@endif
								@endforeach
							</tbody>
						</table>
					</div>

					<div>

						<div class="line"></div>

						<h2>Gedaan</h2>
						<table>
							<tbody>
								@foreach ($tasks as $task)
									@if($task->done)

									<tr>
										<td><a class="done" href="tasks/notDone/{{ $task->id }}">{{ $task->name }}</a></td>

										<td>
											<form action="task/{{ $task->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button class="delete" type="submit">
													<img src="{{{ asset('/css/img/icon-delete.png') }}}">
												</button>
											</form>
										</td>
									</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			@else

				<p>Nog geen todo-items.</p> <a href="tasks/add">Maak een todo</a>
			@endif
		</div>
	</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Users</h2>
			{!! HTML::linkRoute("user.create", "Maak gebruiker aan") !!}
			<table class="table table-striped">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Gecreeerd op</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->created_at}}</td>
							<td>
								<a href="{{route("user.destroy", array($user->id)) }}"
								 onclick="confirm('Weet u zeker dat uw de volgende gebruiker wilt verwijderen? {{$user->name}} ')">
									Delete gebruiker
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
@endsection
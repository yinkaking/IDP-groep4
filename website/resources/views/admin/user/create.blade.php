@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>User aanmaken</h2>
			<div class="col-md-8">
				{!! Form::open(array("route"=>"user.store", "method"=>"post")) !!}

				<div class="form-group">
					<label for="email">Email address</label>
					{!! Form::text("email", null, array("class"=>"form-control")) !!}
				</div>
				<div class="form-group">
					<label for="name">Naam</label>
					{!! Form::text("name", null, array("class"=>"form-control")) !!}
				</div>
				<div class="form-group">
					<label for="password">Wachtwoord</label>
					{!! Form::password("password", array("class"=>"form-control")) !!}
				</div>
				<div class="form-group">
					<label for="repeat_password">Herhaal Wachtwoord</label>
					{!! Form::password("repeat_password", array("class"=>"form-control")) !!}
				</div>

				{!! Form::submit("Opslaan", array("class"=>"btn btn-primary")) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
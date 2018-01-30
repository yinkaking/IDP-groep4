@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Waterdata</h2>
			<table class="table table-striped">
				<thead>
					<th>Hoog water</th>
					<th>Laag water</th>
					<th>Datum</th>
				</thead>
				<tbody>
					@foreach($waterdatas as $waterdata)
						<tr>
							<td>{{ $waterdata->hoog ? "Hoog water" : "Lager dan hoog water" }}</td>
							<td>{{ $waterdata->laag ? "Laag water" : "Lager dan 'laag' water" }}</td>
							<td>{{ $waterdata->created_at }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
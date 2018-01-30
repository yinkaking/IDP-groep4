@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Controle paneel Waterkering</h2>
			<h3>Status deuren: <span id="status">Onbekend</span></h3>

			<table id="control-table">
				<td><h4>Deuren sluiten</h4></td>
				<td>
					<label class="switch">
						<input type="checkbox" onchange="updateDb(this.checked)">
						<span class="slider"></span>
					</label>
				</td>
				<td><h4>Deuren openenen</h4></td>
			</table>

		</div>
	</div>
</div>

@endsection

@section("style")
<style type="text/css">
	#control-table td{
		padding-right:15px;
	}
</style>

@endsection

@section("script")

<script type="text/javascript">
	
var url = "{{ route("control.waterkering.ajax") }}";
var commands = ["close", "open"];

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function updateDb(checked) {
	var data = {
		command: commands[checked],
	};
	// console.log(commands[checked ? 1 : 0])

	$.post( url, data, function( data ) {
		console.log( "Data Loaded: " + data );
	});
}

</script>

@endsection
@extends("layouts.app")

@section("content")

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Controle paneel Waterkering</h2>
			<h3>Status deuren: <span id="status">Onbekend</span></h3>
			<h3>Onderhouds modus: <span id="status">{{$onderhoud ? "aan": "uit"}}</span></h3>

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

			<div class="col-md-3">
			@if(!$onderhoud)
				{{ Form::open(array("route"=>"control.waterkering.onderhoud", "method"=>"post")) }}
				{{ Form::hidden("onderhoud", 1)}}
				{{ Form::submit("Start onderhouds modus", array("class"=>"form-control btn btn-primary"))}}
				{{ Form::close()}}
			@else
				{{ Form::open(array("route"=>"control.waterkering.onderhoud", "method"=>"post")) }}
				{{ Form::hidden("onderhoud", 0)}}
				{{ Form::submit("Beeindig onderhouds modus", array("class"=>"form-control btn btn-primary"))}}
				{{ Form::close()}}
			@endif
			</div>
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
	
var updateUrl = "{{ route("control.waterkering.ajax") }}";
var statusUrl = "{{ route("control.waterkering.getstatus") }}";
var commands = ["close", "open"];

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function updateDb(checked) {
	var data = {
		command: commands[checked ? 1 : 0],
	};
	// console.log(commands[checked ? 1 : 0])

	$.post(updateUrl, data, function( data ) {
		// console.log(data);
	});
}
getStatusDoors();
var timerID = setInterval(function() {
    getStatusDoors();
}, 60 * 1000); 

function getStatusDoors(){
	$.post(statusUrl, function( data ) {
		document.getElementById("status").innerHTML = data;
		// console.log(data);
	});
}

</script>

@endsection
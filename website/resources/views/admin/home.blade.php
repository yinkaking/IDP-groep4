@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h2>Dashboard</h2>
           
           <ul class="list-group">
               <li class="list-group-item">{!! HTML::linkRoute("user.index", "Alle gebruikers") !!}</li>
               <li class="list-group-item">{!! HTML::linkRoute("waterdata.index", "Alle waterdata") !!}</li>
               <li class="list-group-item">{!! HTML::linkRoute("control.index", "Controle over de waterkering") !!}</li>
           </ul>

        </div>
    </div>
</div>
@endsection

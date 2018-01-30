@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <h2>Dashboard</h2>
           
           <ul>
               <li>{!! HTML::linkRoute("user.index", "Alle gebruikers") !!}</li>
               <li>{!! HTML::linkRoute("waterdata.index", "Alle waterdata") !!}</li>
               <li>{!! HTML::linkRoute("control.index", "Controle over de waterkering") !!}</li>
           </ul>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>Hoog water</th>
                    <th>Laag water</th>
                    <th>Datum</th>
                </thead>
                <tbody>
                    @foreach($waters as $water)
                        <tr>
                            <td>{{ $water->hoog ? "Hoog water" : "Lager dan hoog water" }}</td>
                            <td>{{ $water->laag ? "Laag water" : "Lager dan 'laag' water" }}</td>
                            <td>{{ $water->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@extends('layout')
@section('content')
<div class="container">
    <h2>Favorited Bills</h2>
    <div class="table-responsive">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="10%">ID</th>
                <th width=40%">Title</th>
                <th>Author</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
@foreach ($favorites as $favs) 
            <tr>
                <td><a href=' {{ "/bill/".$favs->id }} ' class="btn btn-info btn-small" role="button">Detail</a></td>
                <td>{{ $favs->ext_id }}</td>
                <td>{{ $favs->title }}</td>
                <td>{{ $favs->author }}</td>

                <td>{{ $favs->introduced_date }}</td>
            </tr>
@endforeach
        </tbody>
    </table>
</div>
@stop

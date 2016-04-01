@extends('layout')
@section('content')
<div class="container">
    <h2>Favorites</h2>
    <div class="table-responsive">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="5%">State</th>
                <th width="10%">ID</th>
                <th width=40%">Title</th>
                <th>Author</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
@foreach ($results as $item)
<h3> {{item->type}} : {{item->item}}</h3>
    @foreach ($item->results as $favs) 
                <tr>
                    <td><a href=' {{ "/bill/".$favs->id }} ' class="btn btn-info btn-small" role="button">Detail</a></td>
                    <td>{{ substr($favs->ext_id,0,2) }}</td>
                    <td>{{ substr($favs->ext_id,2) }}</td>
                    <td>{{ $favs->title }}</td>
                    <td>{{ $favs->author }}</td>
                    <td>{{ $favs->introduced_date }}</td>
                </tr>
    @endforeach
@endforeach
        </tbody>
    </table>
</div>
@stop

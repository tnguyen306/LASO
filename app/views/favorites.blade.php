@extends('layout')
@section('content')
<div class="container">
    <h2>Favorites</h2>
@foreach ($results as $item)
<h3> <b>{{$item['type']}} : {{$item['item']}}</b></h3><a href="/favrm/{{$item['id']}}/" class="btn btn-danger btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Remove from Favorites</a>
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
    @foreach ($item['result'] as $favs) 
                <tr>
                    <td><a href=' {{ "/bill/".$favs->id }} ' class="btn btn-info btn-small" role="button">Detail</a></td>
                    <td>{{ substr($favs->ext_id,0,2) }}</td>
                    <td>{{ substr($favs->ext_id,2) }}</td>
                    <td>{{ $favs->title }}</td>
                    <td>{{ $favs->author }}</td>
                    <td>{{ $favs->introduced_date }}</td>
                </tr>
    @endforeach
        </tbody>
    </table>
</div>
@endforeach

@stop

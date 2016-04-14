@extends('layout')
@section('content')
<div class="container">
    <h2>Favorites</h2>
@foreach ($results as $item)
<h3> <b>{{$item['type']}} : {{$item['display']}}</b></h3>
@if ($item['type']=="legislator")

<a href="/legislator/{{$item['item']}}"><button class="btn btn-info btn-small">See More...</button></a>
</br>
@elseif ($item['type']=="search")
<form action="/find" method="post">
     <input type="hidden" name="state" id="state" value="{{$item['item'][1]}}">
      <input type="hidden" name="search" id="search" value="{{$item['item'][0]}}">
    <button class="btn btn-info btn-small">See More...</button>
</form>
@else
<form action="/find" method="post">
     <input type="hidden" name="state" id="state" value="{{substr($item['display'],0,2)}}">
      <input type="hidden" name="search" id="search" value="{{substr($item['display'],2)}}">
    <button class="btn btn-info btn-small">See More...</button>
</form>
@endif
<a href="/favrm/{{$item['id']}}/" class="btn btn-danger btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Remove from Favorites</a>
    <div class="table-responsive">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="5%">State</th>
                <th width="10%">ID</th>
                <th width=40%">Title</th>
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
                    <td>{{ $favs->introduced_date }}</td>
                </tr>
    @endforeach
        </tbody>
    </table>
</div>
@endforeach

@stop

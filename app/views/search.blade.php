@extends('layout')
@section('content')
<div class="container">
<h2>Live Search</h2>
<div class="form-group">
<input type="text" id="search" class="form-control input-lg"><br>
</div>



    <h2>Results for {{$query}}</h2><a href="/qadd/{{$query}}~~{{$state}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Add to Favorites</a></p>
    <div class="table-responsive">
    <table id="table" class="table table-hover" style="background-color:#FFFFF5;">
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
@foreach ($results as $favs) 
            <tr class="searchable">
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
</body>
<script>
var $rows = $('#table .searchable');
$('#search').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});</script>
@stop


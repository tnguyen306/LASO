@extends('layout')
@section('content')
<div class="container">
<h2>Live Comparison Search</h2>
@if (Session::get('uid', 'guest')=='guest')
<p>This feature only avaliable for registered users</p>
@else
<div class="form-group">
<input type="text" id="search" class="form-control input-lg"><br></div>


    <h2>Results</h2>
    <div class="table-responsive">
    <table id="table" class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="10%">ID</th>
                <th width=40%">Title</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
@foreach ($results as $favs) 
            <tr class="searchable">
                <td><a href=' {{ "/diff/".$parent."/".$favs->id }} ' class="btn btn-info btn-small" role="button">Compare</a></td>
                <td>{{ substr($favs->ext_id,2) }}</td>
                <td>{{ $favs->title }}</td>
                <td>{{ $favs->status }}</td>
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
</html>
@endif
@stop

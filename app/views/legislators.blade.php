@extends('layout')
@section('content')
<div class="container">
<h2>Live Search</h2>
<div class="form-group">
<input type="text" id="search" class="form-control input-lg"><br>
</div>



    <h2>Results</h2>
    <div class="table-responsive">
    <table id="table" class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="40%">Name</th>
                <th width=20%">District</th>
                <th width=20%">State</th>
            </tr>
        </thead>
        <tbody>
@foreach ($results as $favs) 
            <tr class="searchable">
                <td><a href=' {{ "/legislator/".str_pad($favs->id,6,"0",STR_PAD_LEFT) }} ' class="btn btn-info btn-small" role="button">Page</a></td>
                <td>{{ $favs->first_name }} {{ $favs->last_name }}</td>
                <td>{{ $favs->district }}</td>
                <td>{{ $favs->state }}</td>
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


@extends('layout')
@section('content')
<div class="container">
<h2> Compare your own Documents </h2>
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
                <th width="40%">Title</th>
                <th width=20%">Author ID</th>
                <th width=20%">Sharing</th>
            </tr>
        </thead>
        <tbody>
@foreach ($docs as $doc) 
            <tr class="searchable">
                <td><a href="{{'/docs/'.$doc->id}}" class="btn btn-info btn-small" role="button">Go</a></td>
                <td>{{ $favs->title}}</td>
                <td>{{ $favs->user_id }}</td>
                <td>{{ $favs->sharing }}</td>
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


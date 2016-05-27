@extends('layout')
@section('content')
<div class="container">
<a href="/mdc" class="btn btn-info btn-small" role="button"><h2>Compare Without Saving</h2></a>
<h2> Compare your own Documents </h2> <a href="/docs/new" class="btn btn-info btn-small" role="button">New</a>
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
                <td><a href="{{'/docs/show/'.$doc->id}}" class="btn btn-info btn-small" role="button">Go</a></td>
                <td>{{ $doc->title}}</td>
                <td>{{ $doc->user_id }}</td>
                <td>{{ $doc->sharing }}</td>
            </tr>
@endforeach
@foreach ($shared as $doc) 
            <tr class="searchable">
                <td><a href="{{'/docs/show/'.$doc->id}}" class="btn btn-info btn-small" role="button">Go</a></td>
                <td>{{ $doc->title}}</td>
                <td>{{ $doc->user_id }}</td>
                <td>{{ $doc->sharing }}</td>
            </tr>
@endforeach
@foreach ($public as $doc) 
            <tr class="searchable">
                <td><a href="{{'/docs/show/'.$doc->id}}" class="btn btn-info btn-small" role="button">Go</a></td>
                <td>{{ $doc->title}}</td>
                <td>{{ $doc->user_id }}</td>
                <td>{{ $doc->sharing }}</td>
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


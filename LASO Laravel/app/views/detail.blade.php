@extends('layout')
@section('content')
<div class="container">
    <h2>{{ $eid }} <a href="/compare/{{$id}}" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-eye-open"></span> Compare Revisions</a> 
@if (Session::get('uid', 'guest')=='guest')
@else
<a href="/billrm/{{Session::get('uid', '1')}}/{{$id}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Remove From Favorites</a><a href="/billadd/{{Session::get('uid', '1')}}/{{$id}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Add to Favorites</a></h2>
@endif
    <h3>{{ $title }}</h3>
    <div class="table">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <tbody>
            <tr>
                <th width="25%">Author</th>
                <td width="75%"><a href="/legislator/{{$author_id }}">{{ $author }}</a></td>
            </tr>
            <tr>
                <th width="20%">Co-Author</th>
                <td width="80%"><a href="/legislator/{{$coauthor_id }}">{{ $coauthor }}</a></td>
            </tr>
            <tr>
                <th>Status and Vote</th>
                <td>{{ $status }}</td>
            </tr>
            <tr>
                <th>Date Introduced</th>
                <td>{{ $idate }}</td>
            </tr>
            <tr>
                <th>Date of Last Status</th>
                <td>{{ $pdate }}</td>
            </tr>
            <tr>
                <th>Document</th>
                <td><a href="{{$doc_path}}">PDF</a></td>
            </tr>
        </tbody>
    </table>

    <h3>Bill Text</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#full_text">Hide/Show Full Text</button>
        <div class="collapse in" id ="full_text" style="background-color:#FFFFF5;">
            <div class="container"><p>
{{ $text }}
</p>
        </div>    
    </div>
</div>
@stop

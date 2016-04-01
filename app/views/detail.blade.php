@extends('layout')
@section('content')
<div class="container">
    <h2>{{ $eid }} <a href="/compare/{{$id}}" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-eye-open"></span> Compare Revisions</a> 
@if (Session::get('uid', 'guest')=='guest')
@else
<a href="/billadd/{{Session::get('uid', '1')}}/{{$eid}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Add to Favorites</a></h2>
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
@if (Session::get('uid', 'guest')=='guest');
                <td>Log in or Register to See</td>
@else
                <td><a href="{{$doc_path}}" target="_blank">Document</a></td>
@endif
            </tr>
        </tbody>
    </table>
@if($description=="")
<p>No Description has been entered for this bill</p>
@else
<h3> LASO Bill Summary</h3>
<div class="container" style="background-color:#FFFFF5;"><p>
{{{$description}}}
</p>
</div>
@endif
    <h3>Bill Text</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#full_text">Hide/Show Full Text</button>
        <div class="collapse in" id ="full_text" style="background-color:#FFFFF5;">
            <div class="container"><p>
{{{ $text }}}
</p>
        </div>    
    </div>
</div>
@if (Session::get('admin', 'false')=='true')
<p><a href="/edit/{{$id}}">Edit this bill</a></p>
@endif
@stop

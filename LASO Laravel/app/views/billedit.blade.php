@extends('layout')
@section('content')
<div class="container">
    <h2>Editing {{ $eid }}</h2>

<form action="" method="post">
    <h3><input type="text" class="form-control input-lg" id="title" name="title" placeholder="Title" value="{{ $title }}"></h3>
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
                <td><input type="text" class="form-control input-lg" id="status" name="status" placeholder="Status" value="{{ $status }}"></td>
            </tr>
            <tr>
                <th>Date Introduced</th>
                <td><input type="text" class="form-control input-lg" id="idate" name="idate" placeholder="Introduced Date" value="{{ $idate }}"></td>
            </tr>
            <tr>
                <th>Date of Last Status</th>
                <td><input type="text" class="form-control input-lg" id="pdate" name="pdate" placeholder="Updated Date" value="{{ $pdate }}"></td>
            </tr>
            <tr>
                <th>Document</th>
                <td>URL or Path: <a href="{{$doc_path}}">PDF</a><input type="text" class="form-control input-lg" id="doc_path" name="doc_path" placeholder="Document Path" value="{{$doc_path}}"> </td>
            </tr>
        </tbody>
    </table>

    <h3>Bill Text</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#full_text">Hide/Show Full Text</button>
        <div class="collapse in" id ="full_text" style="background-color:#FFFFF5;">
            <div class="container"> <textarea class="form-control" rows="5" name="billtext">{{ $text }}</textarea>
</p>
        </div>    
    </div>
<input class="btn btn-large btn-primary" type="submit" value="Change Text">
</form>
</div>
@stop

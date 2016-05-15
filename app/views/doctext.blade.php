@extends('layout')
@section('content')
<style>
.noshow ins{
    background-color:transparent !important;
    opacity:0 !important;
}
.noshow del{
    background-color:transparent !important;
    text-decoration:none !important;
}
</style>
<div class="container">
    <h2>{{$doc->title }}</h2>
@if (Session::get('uid', 'guest')=='guest')
<p>This feature only avaliable for registered users</p>
@else
    <div class="table">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                 <th width="26%">Attribute</th>
                 <th width="37%">Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Description</th>
                <td>{{$doc->description }}</td>
            </tr>
            <tr>
                <th>Author's User ID</th>
                <td>{{$doc->user_id }}</td>
            </tr>
            <tr>
                <th>Sharing Settings</th>
                <td>{{$doc->sharing }}</td>
            </tr>

        </tbody>
    </table>
    <h3>Document Text</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#textbox">Hide/Show Document Text</button>
<div class="collapse in" id="textbox">
  <blockquote style="background-color:#FFFFF5;">
    <p id="orig1">{{$doc->text}}</p>
  </blockquote>
</div>
@endif
@stop

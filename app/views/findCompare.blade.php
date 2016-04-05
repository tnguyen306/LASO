@extends('layout')
@section('content')
<form method="post" action='/compare/{{$parent}}'>
<div class="container">
<div class="form-group">
<h2>Search For Bills To Compare with {{$parent}}</h2>
<div class="form-group">
<input type="text" id="search" name="search" class="form-control input-lg"><br>
<label for="sel1">Select list:</label>
  <select class="form-control" id="state" name="state">
    <option value="%">All</option>
    <option value="ga">Georgia</option>
    <option value="fl">Florida</option>
    <option value="nh">New Hampshire</option>
    <option value="tx">Texas</option>
    <option value="tn">Tennessee</option>
    <option value="ca">California</option>
    <option value="or">Oregon</option>
    <option value="wa">Washington</option>
    <option value="ma">Massachusetts</option>
    <option value="me">Maine</option>
  </select>
  <input type="hidden" name="parent" id="parent" value="{{$parent}}">
<label for="sel1">Number of Results to Show:</label>
<select class="form-control" id="limit" name="limit">
    <option value="50">50</option>
    <option value="fl">100</option>
    <option value="fl">200</option>
    <option value="fl">400</option>
</select>
</div>
</div>
<button type="submit" class="btn btn-primary btn-lg">Search</button>
</form>
@stop


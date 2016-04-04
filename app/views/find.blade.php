@extends('layout')
@section('content')
<form method="post" action="/find">
<div class="container">
<div class="form-group">
<h2>Search For Bills</h2>
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
  </select>
</div>
</div>
<button type="submit" class="btn btn-primary btn-lg">Search</button>
</form>
@stop


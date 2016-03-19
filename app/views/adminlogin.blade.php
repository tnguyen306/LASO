@extends('layout')
@section('content')
<div class="container">
<form class="form-signin form-horizontal" method="post" action="/adminlogin">
      <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" value="">
    <button class="btn btn-large btn-primary" type="submit">Sign in</button>
  </form>
</div>
@stop

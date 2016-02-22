@extends('layout')
@section('content')
<div class="container">

      <form class="form-signin form-horizontal" method="post" action="/register">
        <h2 class="">Register</h2>
        <div class="control-group ">
          <label class="control-label" for="name">Name:</label>
          <div class="controls">
            <input type="text" class="form-control input-lg" id="name" name="name" placeholder="Name" value="">
          </div>
          <label class="control-label" for="email">Email:</label>
          <div class="controls">
            <input type="text" class="form-control input-lg" id="email" name="email" placeholder="Email address" value="">
          </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
              <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" value="">
            </div>
          <label class="control-label" for="photo">Photo URL:</label>
          <div class="controls">
            <input type="text" class="form-control input-lg" id="photo" name="photo" placeholder="Photo URL" value="">
          </div><br>
        </div>
        <button class="btn btn-large btn-primary" type="submit">Sign up</button>
      </form>
    </div>
</div>
@stop

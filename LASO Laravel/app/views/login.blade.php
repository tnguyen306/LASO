<html lang="en">

<head>
    <title>LASO: Legislation Made Easy</title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <!-- Get jQuery, Bootstrap -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Bootstrap Imported, my JS/CSS -->

    <style>

    body {

        background-color:#F5F5EB;

    }

    </style>



</head>

<body>



<nav class="navbar navbar-inverse">

    <div class="container-fluid">

        <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>                        

            </button>

            <a class="navbar-brand" href="/search">LASO Bill Search</a>

    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav">

            <li><a href="/search">Home</a></li>
@if (Session::get('uid', 'guest')=='guest');
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><span class="glyphicon glyphicon-userg"></span> Register</a></li>

                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
@else
            <li><a href="/fav/{{Session::get('uid', 'guest')}}">Favorites</a></li>

            

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="/login"><span class="glyphicon glyphicon-user"></span> Switch User</a></li>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@endif
            </ul>

        </div>

    </div>

</nav>
<div class="container">

      <form class="form-signin form-horizontal" method="post" action="/login">
        <h2 class="">Log in</h2>
        <div class="control-group ">
          <label class="control-label" for="email">Email:</label>
          <div class="controls">
            <input type="text" class="form-control input-lg" id="email" name="email" placeholder="Email address" value="">
          </div>
        </div>
        <div class="control-group ">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
              <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" value="">
            </div><br>
        </div>
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>
    </div>
</div>
</body>

</html>

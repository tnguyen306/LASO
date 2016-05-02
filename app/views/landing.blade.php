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
    del {
        background-color:red;
    }
    ins {
        background-color:yellowgreen;
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
            <li><a href="/mdc">Compare other Docs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register"><span class="glyphicon glyphicon-userg"></span> Register</a></li>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="/mdc">Compare other Docs</a></li>
@else
                <li><a href="/legislators"><span class="glyphicon glyphicon-userg"></span> Legislators</a></li>
                <li><a href="/fav/{{Session::get('uid', 'guest')}}">Favorites</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">User ID: {{Session::get('uid', 'guest')}}</a></li>
                <li><a href="/login"><span class="glyphicon glyphicon-user"></span> Switch User</a></li>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
@endif
@if (Session::get('admin', 'false')=='true');
                <li><a href="/admin"><span class="glyphicon glyphicon-menu-hamburger"></span> Admin Menu</a></li>
@endif
            </ul>
        </div>
    </div>
</nav>
@if (Session::get('message', 'none')=='none');
@else
<div style="padding:1% 5% 1% 5%;">
<div class="alert alert-info"><strong>{{Session::get('message', 'No Message')}}</strong></div><br>
</div>
@endif
<center>
<img src="/images/logo_m.png" style="height:25%;max-width:300px;max-height:300px;"/>
<h1>Welcome to <b>L</b>egislative <b>A</b>ide <b>S</b>ervices <b>O</b>nline</h1>
<h3>About LASO</h3>
<p>Keep tabs on United States State Legislation with ease, by seeing bills, comparing bill revisions, and looking at legislators' history.</p>
<p>Legislators, Special Interest Groups, and Concerned Citizens, understand your state today!</p>
<h3>States Supported So Far</h3>
<p><b>Georgia</b></p>
<p><b>Florida</b></p>
<p><b>New Hampshire</b></p>
<p><b>Tennessee</b></p>
<p><b>Texas</b></p>
<p><b>California</b></p>
<p><b>Washington</b></p>
<p><b>Maine</b></p>
<br>
@if (Session::get('uid', 'guest')=='guest');
<h2>Begin Your Search</h2>
<a href="/register"><button class="btn btn-default btn-primary" ><h1>Sign Up</h1></button></a>
@else
<a href="/search"><button class="btn btn-default btn-primary" ><h1>Begin Your Search</h1></button></a>
@endif
<br><br>
<small>LASO is currently in BETA, and registrations may be reset periodically. Contact birm@rbirm.us with questions or concerns.</small>
</center>
</body>

</html>

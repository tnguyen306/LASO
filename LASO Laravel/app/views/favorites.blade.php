<!DOCTYPE html>
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
            <li class="active"><a href="#">Favorites</a></li>
            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2>Favorited Bills</h2>
    <div class="table-responsive">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                <th width="15px"></th>
                <th width="10%">ID</th>
                <th width=40%">Title</th>
                <th>Author</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
@foreach ($favorites as $favs) 
            <tr>
                <td><a href=' {{ "/bill/".$favs->id }} ' class="btn btn-info btn-small" role="button">Detail</a></td>
                <td>{{ $favs->ext_id }}</td>
                <td>{{ $favs->title }}</td>
                <td>{{ $favs->author }}</td>

                <td>{{ $favs->introduced_date }}</td>
            </tr>
@endforeach
        </tbody>
    </table>
</div>
</body>

</html>

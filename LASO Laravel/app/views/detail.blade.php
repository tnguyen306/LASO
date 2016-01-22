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
            <li><a href="/fav/1">Favorites</a></li>
            
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2>{{ $eid }} <a href="/compare/{{$id}}" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-eye-open"></span> Compare Revisions</a> <a href="/billrm/1/{{$id}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Remove From Favorites</a><a href="/billadd/1/{{$id}}/" class="btn btn-default btn-small" role="button"><span class="glyphicon glyphicon-pencil"></span> Add to Favorites</a></h2>
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
                <td><a href="{{$doc_path}}">PDF</a></td>
            </tr>
        </tbody>
    </table>

    <h3>Bill Text</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#full_text">Hide/Show Full Text</button>
        <div class="collapse in" id ="full_text" style="background-color:#FFFFF5;">
            <div class="container"><p>
{{ $text }}
</p>
        </div>    
    </div>
</div>
</body>

</html>

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
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>>
@endif
            </ul>

        </div>

    </div>

</nav>
<div class="container">
    <h2>Comparing: {{$d1->ext_id }} with {{$d2->ext_id}} </h2>
    <h3>{{$d1->title }} <b><i>AND</i></b> {{$d2->title}} </h3>
@if (Session::get('uid', 'guest')=='guest')
<p>This feature only avaliable for registered users</p>
@else
    <div class="table">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                 <th width="26%">Attribute</th>
                 <th width="37%">Current</th>
                 <th width="37%">Submitted<th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th >Author</th>
                <td><a href="/legislator/{{$d1->author_id }}">{{$d1->author }}</a></td>
                <td><a href="/legislator/{{$d2->author_id }}">{{$d2->author}}</a></td>
            </tr>
            <tr>
                <th >Co-Authors</th>
                <td><a href="/legislator/{{$d1->coauthor_id }}">{{$d1->coauthor }}</a></td>
                <td><a href="/legislator/{{$d2->coauthor_id }}">{{$d2->coauthor}}</a></td>
            </tr>
            <tr>
                <th>Date of Last Status</th>
                <td>{{$d1->introduced_date }}</td>
                <td>{{$d2->introduced_date}}</td>
            </tr>
            <tr>
                <th>Document</th>
                <td><a href="{{$d1->doc_path }}">PDF</a></td>
                <td><a href="{{$d2->doc_path }}">PDF</a></td>
            </tr>

        </tbody>
    </table>

    <h3>Bill Text Differences</h3>
  <blockquote style="background-color:#FFFFF5;">
    {{ $diff }}
  </blockquote>


    </div>
</div>
</body>

</html>
@endif

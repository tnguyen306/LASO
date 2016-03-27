@extends('layout')
@section('content')
<br>
<div class="container">
<img src="{{$leg->photo_path}}" style="max-width:200px;max-height:200px;" align="left" style="padding:10 px;">
<h1>&nbsp;{{$leg->first_name." ".$leg->last_name}}</h1>
<p>&nbsp;&nbsp;&nbsp;<b>{{"District ".$leg->district}}</b><br>&nbsp;&nbsp;&nbsp;<b>{{"Party: ".$leg->bio}}</b><br>&nbsp;&nbsp;&nbsp;<b>{{"ID: ".$leg->id}}<b></p>
</div>
<br>

<div class="container">

<h2>Live Search</h2>

<div class="form-group">

<input type="text" id="search" class="form-control input-lg"><br>

</div>





    

    <h2>Bills</h2>

    <div class="table-responsive">

    <table id="table" class="table table-hover" style="background-color:#FFFFF5;">

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

@foreach ($results1 as $favs) 

            <tr class="searchable">

                <td><a href=' {{ "/bill/".$favs->id }} ' class="btn btn-info btn-small" role="button">Detail</a></td>

                <td>{{ $favs->ext_id }}</td>

                <td>{{ $favs->title }}</td>

                <td>{{ $favs->author }}</td>

                <td>{{ $favs->introduced_date }}</td>

            </tr>

@endforeach
@foreach ($results2 as $favs) 

            <tr class="searchable">

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

<script>

var $rows = $('#table .searchable');

$('#search').keyup(function() {



    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',

        reg = RegExp(val, 'i'),

        text;



    $rows.show().filter(function() {

        text = $(this).text().replace(/\s+/g, ' ');

        return !reg.test(text);

    }).hide();

});</script>
@stop

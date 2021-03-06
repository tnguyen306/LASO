@extends('layout')
@section('content')
<div class="container">
    <h2>Create New Document</h2>

<form action="/docs/edit/{{$doc->id}}" method="post">
    <h3>Title: <input type="text" class="form-control input-lg" id="title" name="title" value="{{$doc->title}}"></h3>
    <div class="table">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <tbody>
                <th>Sharing Options</th>
                <td><input type="text" class="form-control input-lg" id="sharing" name="sharing" placeholder="Sharing Options" value='{{$doc->sharing}}'></td>
            </tr>
        </tbody>
    </table>
<h3>Description</h3>
<div class="container"> <textarea class="form-control" rows="5" name="description">{{$doc->description}}</textarea>
    <h3>Text</h3>

        <div id ="text" style="background-color:#FFFFF5;">
            <div class="container"> <textarea class="form-control" rows="5" id="text" name="text">{{$doc->text}}</textarea>
</p>
        </div>    
    </div>
<input class="btn btn-large btn-primary" type="submit" value="Change Text">
</form>
</div>
@stop

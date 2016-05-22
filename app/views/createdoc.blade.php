@extends('layout')

@section('content')

<div class="container">

    <h2>Create New Document</h2>

<p> (optional) Create from plain text (*.txt) file:
<input type='file' accept='text/plain' onchange='getText(event)'><br>
<img id='output'>
<script>
  var getText = function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
      var text = reader.result;
      $("#text").text(text);
    };
    reader.readAsText(input.files[0]);
  };
</script>



<form action="/docs/new" method="post">

    <h3><input type="text" class="form-control input-lg" id="title" name="title" placeholder="Title"></h3>

    <div class="table">

    <table class="table table-hover" style="background-color:#FFFFF5;">

        <tbody>

                <th>Sharing Options</th>

                <td><input type="text" class="form-control input-lg" id="sharing" name="sharing" placeholder="Sharing Options"><small>Please use asterisks (*) on both sides of each user id number desired.</td>

            </tr>

        </tbody>

    </table>

<h3>Description</h3>

<div class="container"> <textarea class="form-control" rows="5" name="description"></textarea>

    <h3>Text</h3>



        <div id ="textdiv" style="background-color:#FFFFF5;">

            <div class="container"> <textarea class="form-control" rows="5" id="text" name="text"></textarea>

</p>

        </div>    

    </div>

<input class="btn btn-large btn-primary" type="submit" value="Create">

</form>

</div>

@stop

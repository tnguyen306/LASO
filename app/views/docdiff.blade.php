@extends('layout')
@section('content')
<style>
.noshow ins{
    background-color:transparent !important;
    opacity:0 !important;
}
.noshow del{
    background-color:transparent !important;
    text-decoration:none !important;
}
</style>
<div class="container">
    <h2>Comparing: {{$doc1->title }} with {{$doc2->title}} </h2>
@if (Session::get('uid', 'guest')=='guest')
<p>This feature only avaliable for registered users</p>
@else
    <div class="table">
    <table class="table table-hover" style="background-color:#FFFFF5;">
        <thead>
            <tr>
                 <th width="26%">Attribute</th>
                 <th width="37%">First Document</th>
                 <th width="37%">Second Document<th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th >Description</th>
                <td>{{$doc1->description }}</td>
                <td>{{$doc2->description}}</td>
            </tr>
            <tr>
                <th>Author's User ID</th>
                <td>{{$doc1->user_id }}</td>
                <td>{{$doc2->user_id}}</td>
            </tr>
            <tr>
                <th>Sharing Settings</th>
                <td>{{$doc1->sharing }}</td>
                <td>{{$doc2->sharing }}</td>
            </tr>
        </tbody>
    </table>
<p style="display: none;" id="origin">{{$doc1->text}}</p>
<p style="display: none;" id="revin">{{$doc2->text}}</p>
<script src="http://ejohn.org/files/jsdiff.js"></script>
<script>
function docompare(){
    var origt = jQuery('#origin').text();
    var revt = jQuery('#revin').text();
    var difft = diffString(origt,revt);
    $('#diff1').html(difft);
    $('#diff2').html(difft);
    $('#diff3').html(difft);
    $('#orig1').html(origt);
}
window.onload = docompare;
</script>



    <h3>Document Text Differences</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#sides">Hide/Show Side By Side</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_diff">Hide/Show Large Difference Panel</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_orig">Hide/Show Large Original Panel</button>
<div class="collapse in" id="sides">
<table style="table-layout: fixed;width: 100%;">
<tr>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    <div class="noshow">
      <p id="diff1"></p>
    </div>
  </blockquote>
</td>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    <p id="diff2"></p>
  </blockquote>
</td>
</tr>
</table>
</div>

<div class="collapse out" id="just_diff">
  <blockquote style="background-color:#FFFFF5;">
    <p id="diff3"></p>
  </blockquote>
</div>
<div class="collapse out" id="just_orig">
  <blockquote style="background-color:#FFFFF5;">
    <p id="orig1"></p>
  </blockquote>
</div>
    </div>
</div>
</div>
@endif
@stop

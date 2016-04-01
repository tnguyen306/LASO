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
                <td><a href="{{$d1->doc_path }}" target="_blank">Document</a></td>
                <td><a href="{{$d2->doc_path }}" target="_blank">Document</a></td>
            </tr>

        </tbody>
    </table>

    <h3>Bill Text Differences</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#sides">Hide/Show Side By Side</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_diff">Hide/Show Large Difference Panel</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_orig">Hide/Show Large Original Panel</button>
<div class="collapse in" id="sides">
<table style="table-layout: fixed;width: 100%;">
<tr>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    <div class="noshow">
{{$diff}}
    </div>
  </blockquote>
</td>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    {{ $diff }}
  </blockquote>
</td>
</tr>
</table>
</div>

<div class="collapse out" id="just_diff">
  <blockquote style="background-color:#FFFFF5;">
    {{ $diff }}
  </blockquote>
</div>
<div class="collapse out" id="just_orig">
  <blockquote style="background-color:#FFFFF5;">
    {{ $d1->text }}
  </blockquote>
</div>
    </div>
</div>
@endif
@stop

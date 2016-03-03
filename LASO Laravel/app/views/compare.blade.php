@extends('layout')
@section('content')
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
<table>
<tr>
<td>
  <blockquote style="background-color:#FFFFF5;">
{{$d1->text}}
  </blockquote>
</td>
<td>
  <blockquote style="background-color:#FFFFF5;">
    {{ $diff }}
  </blockquote>
</td>
</tr>
</table>

    </div>
</div>
@endif
@stop

@extends('layout')
@section('content')
<!-- Difference Code, for special thing -->

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
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script src="http://ejohn.org/files/jsdiff.js"></script>
<div id="diffframe" style="padding:5%">
<h1> Compare your own documents, LASO style!</h1>
@if (Session::get('uid', 'guest')=='guest')
<p>This feature only avaliable for registered users</p>
@else
<textarea id="origin">Copy and paste your original document here!</textarea>
<textarea id="revin">Copy and paste your revision here!</textarea>
<script>
function compareit(){
    tinyMCE.triggerSave();
    var origt = $('#origin').val();
    var revt = $('#revin').val();
    var difft = diffString($(origt).text(),$(revt).text());
    $('#diff1').html(difft);
    $('#diff2').html(difft);
    $('#diff3').html(difft);
    $('#orig1').html(origt);
    return 0;
}
</script>
<button class="btn btn-primary btn-lg" onclick="compareit()">Compare</button>


    <h3>Text Differences</h3>
<button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#sides">Hide/Show Side By Side</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_diff">Hide/Show Large Difference Panel</button><button data-toggle="collapse" class="btn btn-default btn-xs" data-target="#just_orig">Hide/Show Large Original Panel</button>
<div class="collapse in" id="sides">
<table style="table-layout: fixed;width: 100%;">
<tr>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    <div class="noshow">
      <div id="diff1"></div>
    </div>
  </blockquote>
</td>
<td valign="top" style="width:50%">
  <blockquote style="background-color:#FFFFF5;">
    <div id="diff2"></div>
  </blockquote>
</td>
</tr>
</table>
</div>

<div class="collapse out" id="just_diff">
  <blockquote style="background-color:#FFFFF5;">
    <div id="diff3"></div>
  </blockquote>
</div>
<div class="collapse out" id="just_orig">
  <blockquote style="background-color:#FFFFF5;">
    <div id="orig1"></div>
  </blockquote>
</div>
    </div>
</div>
</div>
<!-- end difference code -->
@endif
@stop

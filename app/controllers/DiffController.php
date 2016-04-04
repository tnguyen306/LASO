<?php
include '/home/lasoadmin/laso/app/external/simplediff.php';
class DiffController extends BaseController {
    public function diff($i1,$i2)
    {
     $bill1 = DB::select('Select * from bills WHERE id=:id limit 1',['id' => $i1]);
     $bill2 = DB::select('Select * FROM bills WHERE id=:id limit 1',['id' => $i2]);
foreach ($bill1 as $d1) {
}
foreach ($bill2 as $d2) {
}
      $a11=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d1->author_id]);
foreach ($a11 as $a1) {
}
      $c11=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d1->coauthor_id]);
foreach ($c11 as $c1) {
}
      $an1=$a1->first_name." ".$a1->last_name;
      $cn1=$c1->first_name." ".$c1->last_name;
      $a21=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d2->author_id]);
foreach ($a21 as $a2) {
}
      $c21=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d2->coauthor_id]);
foreach ($c21 as $c2) {
}
      $an2=$a1->first_name." ".$a1->last_name;
      $cn2=$c1->first_name." ".$c1->last_name;

         $diff =  htmlDiff($d1->text,$d2->text);

         return View::make('compare')->with(array('diff'=>$diff,'d1'=>$d1,'d2'=>$d2,'an1'=>$an1,'an2'=>$an2,'cn1'=>$cn1,'cn2'=>$cn2));
    }
}

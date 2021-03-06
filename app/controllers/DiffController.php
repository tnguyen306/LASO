<?php
include '/home/lasoadmin/laso/app/external/simplediff.php';
class DiffController extends BaseController {
    public function diff($i1,$i2)
    {
     ini_set('memory_limit', '256M');
     $d1 = DB::select('Select * from bills WHERE id=:id limit 1',['id' => $i1])[0];
     $d2 = DB::select('Select * FROM bills WHERE id=:id limit 1',['id' => $i2])[0];
      $a1=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d1->author_id])[0];
      $c1=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d1->coauthor_id])[0];
      $an1=$a1->first_name." ".$a1->last_name;
      $cn1=$c1->first_name." ".$c1->last_name;
      $a2=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d2->author_id])[0];
      $c2=DB::select('Select first_name,last_name,district,bio,id,photo_path from legislators where id=?',[$d2->coauthor_id])[0];
      $an2=$a1->first_name." ".$a1->last_name;
      $cn2=$c1->first_name." ".$c1->last_name;

         //$diff =  htmlDiff($d1->text,$d2->text); // memory leak within?

         return View::make('compare')->with(array('d1'=>$d1,'d2'=>$d2,'an1'=>$an1,'an2'=>$an2,'cn1'=>$cn1,'cn2'=>$cn2));
    }
}
